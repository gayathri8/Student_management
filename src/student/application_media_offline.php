<?php
require_once('../../tbs/tbs_class.php');
require_once('../../tbs/tbs_plugin_html.php');
include_once('../../includes/include.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('application_media_offline.html');

$conn = get_conn();

$studentID = 0;

$errorArray = array();
$success = false;
$showError = false;
$showPre = true;
$signpic = " ";
$signmime = " ";

$photopic = " ";
$photomime = " ";

$email = "";
$showme = false;
$showform = true;
$enroll = " ";

if (isset($_POST['offlineMedia'])) {

    foreach ($_POST as $k => $v) {
        if (isset($_POST[$k])) {
            $_POST[$k] = filter_var($v, FILTER_SANITIZE_STRING);
        }
    }

    if (isset($_POST["enroll"])) {

        $enroll = $_POST["enroll"];


        $sql = "select student_id from student_original where enrollment_no = '" . $enroll . "' order by date_of_admission desc;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result1 = $stmt->fetchAll();

        $count = $stmt->rowCount();


        if ($count > 0) {
            $studentID = $result1[0][0];
        } else {
            echo "Not a valid student.";
            exit;
        }


        if($studentID) {

            $sql = $conn->prepare("SELECT media, mime from student_documents where student_id = '$studentID' and category = 'photo' ORDER BY document_id DESC ");
            $sql->execute();

            $result = $sql->fetchAll()[0];
            $mime = $result[1];
            $media = $result[0];

//            $photopic = base64_decode($media);
//            $photopic = base64_encode( $photopic );
            $photopic = $media;
            $photomime = $mime;

//            $sql = $conn->prepare("INSERT INTO student_documents (document_id,student_id,category,description,media,mime,status_value_id,log_id) VALUES ('', 11,'photo','Photo', :media, :mime, 1,1)");
//            $sql->bindParam(':media', $media, PDO::PARAM_LOB);
//            $sql->bindParam(':mime', $mime);
//
//            $sql->execute();

            $sql = $conn->prepare("SELECT media, mime from student_documents where student_id = '$studentID' and category = 'sign' ORDER BY document_id DESC ");
            $sql->execute();

            $result = $sql->fetchAll()[0];
            $mime = $result[1];
            $media = $result[0];

            $signpic = $media;
            $signmime = $mime;
            $showme = true;

        }
//        $_SESSION['reg_email'] = $email;
//        $_SESSION['studentID'] = $studentID;

    }
}
//else{
//
//    $studentID = $_SESSION['studentID'];
//
//    $sql = $conn->prepare("SELECT media, mime from student_documents where student_id = '$studentID' and category = 'photo' ORDER BY document_id DESC ");
//    $sql->execute();
//
//    $result = $sql->fetchAll();
//    print
//    if($result) {
//        $mime = $result[0][1];
//        $media = $result[0][0];
//        $photopic = base64_encode($media);
//        $photomime = $mime;
//    }else{
//        $showPre = false;
//    }
//    $sql = $conn->prepare("SELECT media, mime from student_documents where student_id = '$studentID' and category = 'sign' ORDER BY document_id DESC ");
//    $sql->execute();
//
//    $result = $sql->fetchAll();
//    if($result) {
//        $mime = $result[0][1];
//        $media = $result[0][0];
//        $signpic = base64_encode($media);
//        $signmime = $mime;
//    }
//}

$TBS->MergeBlock('errorBlock', $errorArray);
$TBS->Show();

?>
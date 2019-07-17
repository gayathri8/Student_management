<?php

include_once('../../includes/include.php');

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('general_manage_grade_type.html'); 

$success = "";
$msg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	foreach($_POST as $k=>$v) {
		if(isset($_POST[$k])) {
			$_POST[$k] = filter_var($v,FILTER_SANITIZE_STRING);
		}
	}

	if (isset($_POST['grades']) && !empty($_POST['grades']) && trim($_POST['grades']) != "") {
		$grades = trim($_POST['grades']);
		if (strpos($grades, ' ')) {
			$msg_err = "Grade name can not contain spaces.";
		}
	} else {
		$msg_err = "Please enter a grade name.\n";
	}

	if (isset($_POST['grade_credit']) && (is_numeric($_POST['grade_credit']))) {
		$grade_credit = trim($_POST['grade_credit']);
	} else {
		$msg_err .= "Improper grade credits entered.\n";
	}

	if (isset($_POST['grade_description']) && !empty($_POST['grade_description']) && trim($_POST['grade_description'])) {
		$grade_description = trim($_POST['grade_description']);
	} else {
		$msg_err .= "Please enter a grade description.\n";
	}

	if (isset($_POST['version_no']) && !empty($_POST['version_no']) && (is_numeric($_POST['version_no']))) {
		$version_no = trim($_POST['version_no']);
	} else {
		$msg_err .= "Improper version number entered.";
	}

	$sql = "SELECT * FROM allowed_grades WHERE grades=:grades AND version_no=:version_no";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':grades', $grades);
	$stmt->bindParam(':version_no', $version_no);
	$stmt->execute();
	$result = $stmt->fetchAll();
	if ($stmt->rowCount() == 1) {
		$msg_err = "Grade name $grades already entered for version number $version_no";
	}

	if ($msg_err == "") {
		try {
			$status_id = get_status('on', $conn);
			$sql = "INSERT INTO `allowed_grades`(`grade_id`, `grades`, `grade_credit`, `grade_description`, `version_no`, `log_id`, `status_id`) VALUES (NULL,'$grades','$grade_credit','$grade_description','$version_no','LOG_ID','$status_id')";
			$ac_on = "Entered a new grade: $grades.";
			$s_i = $_SESSION['staff_id'];
			$r = $_SESSION['rank'];
			$tn = 'allowed_grades';
			$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);				

			$sql = "INSERT INTO `allowed_grades`(`grade_id`, `grades`, `grade_credit`, `grade_description`, `version_no`, `log_id`, `status_id`) VALUES (NULL,:grades,:grade_credit,:grade_description,:version_no,:log_id,:status_id)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':grades', $grades);
			$stmt->bindParam(':grade_credit', $grade_credit);
			$stmt->bindParam(':grade_description', $grade_description);
			$stmt->bindParam(':version_no', $version_no);
			$stmt->bindParam(':log_id', $log_id);
			$stmt->bindParam(':status_id', $status_id);
			$stmt->execute();

			$success = "Success";
		} catch (PDOException $e) {
			// echo $sql . "<br>" . $e->getMessage();
		}
	}

}

$TBS->Show();

?>

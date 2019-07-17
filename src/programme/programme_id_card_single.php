<?php
include_once('../../includes/connect.php');
include_once('../../includes/procedure.php');
include_once('../../includes/session.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

error_reporting(E_ALL); ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);

if (!Sec_Session_Start()) {
	header("Location: ../../includes/logout.php");
}

if (!Login_Check($conn)) {
	header("Location: ../../includes/logout.php");
}

define('FPDF_FONTPATH', '../../fpdf/font/');
require('../../fpdf/fpdf.php');

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('programme_id_card_single.html'); 

$success = "";
$show_form = "y";
$msg_err = "";

if (!isset($_POST)) {
	$_POST = &$HTTP_POST_VARS;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	foreach ($_POST as $k => $v) {			
		if (isset($_POST[$k])) {
			$_POST[$k] = filter_var($v, FILTER_SANITIZE_STRING);
		}		
	}

	if (isset($_POST['enroll']) && (isAlphaNum($_POST['enroll']))) {
		$enrollment_no = strtoupper($_POST['enroll']); 
	}

	$pdf = new FPDF();
	$fonts = 'Times';

	function generatePdf($conn, $enroll_list, $count, $pdf, $fonts) {
		$y_axis = 0;
		$x_axis = 0;

		if ($count % 4 == 2) {
			$y_axis = 128;
			$x_axis = 0;
		} else if ($count % 4 == 3) {
			$x_axis = 105;
			$y_axis = 0;
		} else if ($count % 4 == 0) {
			$y_axis = 128;
			$x_axis = 105;
		} else {
			$y_axis = 0;
			$x_axis = 0;
		}

		$pdf -> rect($x_axis + 5, $y_axis + 2, 98, 120);

		$enroll = $enroll_list;

		$stmt = $conn->prepare("SELECT student_id, date_of_admission FROM student WHERE enrollment_no = :enroll");
		$stmt->bindParam(':enroll', $enroll);
		$stmt->execute();
		$row = $stmt->fetchAll();

		$student_id = $row[0]['student_id'];

		$DOA = $row[0]['date_of_admission'];
		$time = strtotime($DOA);
		$month = date("F",$time);
		$year = date("Y",$time);
		$a_date = $DOA;

		$stmt = $conn->prepare("SELECT * FROM student WHERE enrollment_no = :enroll");
		$stmt->bindParam(':enroll', $enroll);
		$stmt->execute();
		$row = $stmt->fetchAll();

		$first_name = $row[0]['first_name'];
		$middle_name = $row[0]['middle_name'];
		$last_name = $row[0]['last_name'];
		$year = $row[0]['year'];

		if (!empty($middle_name)) {
			$student_name = $first_name." ".$middle_name." ".$last_name;
		} else {
			$student_name = $first_name." ".$last_name;
		}

		$sname = $student_name;
		$hei = 5;

		$stmt = $conn->prepare("SELECT program_id, program_code, program_name, program_duration FROM program WHERE program_id = (SELECT program_id FROM student WHERE enrollment_no = :enroll)");
		$stmt->bindParam(':enroll', $enroll);
		$stmt->execute();
		$program = $stmt->fetchAll();

		$program_code = $program[0]['program_code'];
		$program_name = $program[0]['program_name'];
		$program_id = $program[0]['program_id'];
		$dur = $program[0]['program_duration'];
		$course = $program_name;

		$pdf->SetAutoPageBreak(false);
		$pdf->SetFont($fonts, 'B', 9);
		$pdf->SetY($y_axis+3);
		$pdf->SetX($x_axis+1);

		$im = '../../fpdf/name.png';
		$ins_name = 'Indian Institute of Information Technology, Allahabad';

		$len = $pdf->GetStringWidth($ins_name);
		$y_axis = $y_axis + $hei + 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(25, $hei, $ins_name);

		$Est_string1 = '(A University Established under sec 3 of UGC act, 1956 vide Notification';
				$Est_string2 = 'No.F. 9-4/99-U.3 Dated 4/08/2000 of Govt of India)';
		$pdf->SetFont($fonts, '', 6);

		$y_axis = $y_axis + $hei - 1.5;
		$len = $pdf->GetStringWidth($Est_string1);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(40, $hei, $Est_string1);

		$y_axis = $y_axis + $hei - 2;
		$len = $pdf->GetStringWidth($Est_string2);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis+ (100 - $len) / 2);
		$pdf->Cell(50, $hei, $Est_string2);

		$y_axis = $y_axis + $hei - 2;
		$string = 'A Center of Excellence in Information Technology, Estbld. By Ministry Of H.R.D.Govt  of India';
		$pdf->SetFont($fonts, 'BI', 6);
		$len = $pdf->GetStringWidth($string);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(40,$hei,$string);

		$y_axis = $y_axis + $hei - 2;

		$address = 'Deoghat, Jhalwa, Allahabad-210012, U.P. India';
		$pdf->SetFont($fonts, '', 6);
		$len = $pdf->GetStringWidth($address);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(50, $hei, $address);
		$y_axis = $y_axis + $hei - 2;
		$phone = 'Ph. (0532) 2922025 Fax :(0532) 2430006/ 2431689';
		$email = 'E-mail : contact@iiita.ac.in and ar.ex@iiita.ac.in';

		$len = $pdf->GetStringWidth($phone);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(50, $hei, $phone);
		$y_axis = $y_axis + $hei - 2;

		$len = $pdf->GetStringWidth($email);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis+(100 - $len) / 2);
		$pdf->Cell(50,$hei,$email);
		$y_axis = $y_axis + $hei - 2;

		$pdf->SetFont($fonts, 'BU', 7);
		$head = 'Identity Card';
		$len = $pdf->GetStringWidth($head);
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell($len,$hei,$head);
		$y_axis = $y_axis + $hei - 2;

		$pdf -> rect($x_axis + 10, $y_axis + 3, 20, 20);

		$y_axis = $y_axis + 1;
		$y = $y_axis;
		$pdf->SetFont($fonts, 'B', 7);

		$ini = 35;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);
		$pdf->Cell(25, $hei, 'Student Name:');
		$pdf->Cell(30, $hei, $sname);

		$ffirst_name = $row[0]['father_first_name'];
		$flast_name = $row[0]['father_last_name'];
		$fstudent_name = $ffirst_name." ".$flast_name;	
		$fname = $fstudent_name;

		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);
		$pdf->Cell(25, $hei, 'Father\'s name: ');
		$pdf->Cell(20, $hei, $fname);

		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);
		$pdf->Cell(25, $hei, 'Enrollment No. :');
		$pdf->Cell(15, $hei, $enroll);

		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);
		$dob = $row[0]['dob'];
		$pdf->Cell(25, $hei, 'Date of Birth:');
		$pdf->Cell(20, $hei, $dob);

		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);
		$cname = $program_code;
		$pdf->Cell(25, $hei, 'Course: ');
		$pdf->Cell(30, $hei, $cname);

		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);
		$Blood_group = $row[0]['blood_group'];;
		$pdf->Cell(25, $hei, 'Blood Group: ');
		$pdf->Cell(30, $hei, $Blood_group);

		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);

		$str = " + ".$dur." year";
		$end_date = $DOA;
		$end_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($DOA)) . $str));
		$end_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($end_date)) . "- 1 month"));

		$time = strtotime($DOA);
		$month1 = date("F", $time);
		$year1 = date("Y", $time);

		$time=strtotime($end_date);
		$month2=date("F", $time);
		$year2=date("Y", $time);		

		$a_date = $month1." ".$year1."-".$month2." ".$year2;

		$pdf->Cell(25, $hei, 'Period of Validity: ');
		$pdf->Cell(20, $hei, $a_date);

		$y_axis = $y_axis + $hei - 1;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + 45);	
		$dur = 'Assistant Registrar (Academics & Exam), IIIT-A';
		$pdf->Cell(20, $hei, $dur);

		$y_axis = $y_axis + $hei - 1;
		$com_addr = $row[0]['communication_addr'];
		$ini = 8;
		$y_axis = $y_axis + 2 * $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);

		$yq = $y_axis;
		$pdf->Cell(10, $hei, 'Communication ');
		$yq = $yq + $hei - 1.5;
		$pdf->SetY($yq);
		$pdf->SetX($x_axis + $ini);

		$pdf->Cell(10, $hei, 'Address');
		$w = $pdf->GetStringWidth($com_addr);

		if ($w > 60) {
			$str1 = substr($com_addr, 0, 60);
			$str2 = substr($com_addr, 61, $w);
			$pdf->SetY($y_axis);
			$pdf->SetX($x_axis + 30);
			$pdf->Cell(0, $hei, $str1);

			$y_axis = $y_axis + $hei - 1.5;
			$pdf->SetY($y_axis);
			$pdf->SetX($x_axis + 30);
			$pdf->Cell(0, $hei, $str2);
		} else {
			$pdf->SetY($y_axis);
			$pdf->SetX($x_axis + 30);
			$pdf->Cell(0, $hei, $com_addr);
		}

		$com_phone = $row[0]['comm_phone_no'];
		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + 30);
		$pdf->Cell(5, $hei, 'Ph. ');
		$pdf->Cell(20, $hei, $com_phone);

		$y_axis = $y_axis + $hei - 1;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + $ini);

		$pdf->Cell(25, $hei, 'Specimen Signature of Card Holder :');
		$pdf->rect($x_axis + 60, $y_axis, 30, 8);
		$pdf->SetFont($fonts, 'B', 8);

		$str = 'IF FOUND PLEASE RETURN TO';
		$len = $pdf->GetStringWidth($str);
		$y_axis = $y_axis + $hei + 5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(25,$hei,$str);

		$add_1 = 'Assistant Registrar (Academics & Exam)';
		$add_2 = 'Deoghat, Jhalwa,';
		$add_3 = 'Allahabad-210012 (U.P.) India';

		$len = $pdf->GetStringWidth($add_1);
		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(25, $hei, $add_1);

		$len = $pdf->GetStringWidth($ins_name);
		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(25, $hei, $ins_name);

		$len = $pdf->GetStringWidth($add_2);
		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(25, $hei, $add_2);

		$len = $pdf->GetStringWidth($add_3);
		$y_axis = $y_axis + $hei - 1.5;
		$pdf->SetY($y_axis);
		$pdf->SetX($x_axis + (100 - $len) / 2);
		$pdf->Cell(25, $hei, $add_3);
	}

	$stmt = $conn->prepare("SELECT * FROM student WHERE enrollment_no = :enroll");
	$stmt->execute(array(':enroll' => $enrollment_no));
	$row = $stmt->fetchAll();

	if (count($row)) {
		$pdf->AddPage();
		$count = 1;	

		foreach ($row as $key => $value) {
			$enroll = $value['enrollment_no'];

			if ($count % 4 == 1 && $count != 1 ) {
				$pdf->AddPage();
			}

			generatePdf($conn, $enroll, $count, $pdf, $fonts);
			$count++;
		}

		$file = $enrollment_no."_IdCard.pdf";
		$pdf->Output('I', $file);
	} else {
		$msg_err = "Enrollment number does not exist.";
	}
}

$TBS->Show();
?>

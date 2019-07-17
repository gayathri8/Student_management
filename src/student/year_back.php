<?php

include_once('../../includes/include.php');

//error_reporting(E_ALL); ini_set('display_errors', 1);

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('year_back.html'); 

$success = "";
$show_form = "y";
$msg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	foreach($_POST as $k=>$v) {

		if(isset($_POST[$k])) {
			$_POST[$k] = filter_var($v,FILTER_SANITIZE_STRING);
		}			
	}

	if (isset($_POST['program_id'])) {
		$program_id = $_POST['program_id'];
	}

	$_POST['student_roll_no'] = strtoupper($_POST['student_roll_no']);
	if (isset($_POST['student_roll_no'])) {
		$enrollment_no = $_POST['student_roll_no'];
	}

	$check_program = get_val('student', 'enrollment_no', $enrollment_no, 'program_id');
	if ($check_program != $program_id) {
		$msg_err .= "The student doesn't belong to the chosen program.";
	}

	$student_id = get_val('student', 'enrollment_no', $enrollment_no, 'student_id');
	if (!$student_id) {
		$msg_err .= "The student doesn't exist.\n";		
	}	

	if (isset($_POST['year_in']) && preg_match('/^[12]{1}[0-9]{3}$/', $_POST['year_in'])) {
		$year_in = $_POST['year_in'];
	} else {
		$msg_err .= "Please enter proper year in.\n";
	}

	if (isset($_POST['sem_code_in']) && filter_var($_POST['sem_code_in'],FILTER_VALIDATE_INT)) {
		$sem_code_in = $_POST['sem_code_in'];
	}

	if (isset($_POST['year_go_to']) && preg_match('/^[12]{1}[0-9]{3}$/', $_POST['year_go_to'])) {
		$year_go_to = $_POST['year_go_to'];
	} else {
		$msg_err .= "Please enter proper year go to.\n";
	}

	if (isset($_POST['sem_code_go_to']) && filter_var($_POST['sem_code_go_to'],FILTER_VALIDATE_INT)) {
		$sem_code_go_to = $_POST['sem_code_go_to'];
	}

	if ($year_go_to < $year_in) {
		$msg_err .= "Year to go to must be greater than or equal to year in.";
	}

	try {

		$status_id = get_status('on');

		$sql = "INSERT INTO `year_back`(`program_id`, `student_id`, `year_in`, `sem_code_in`, `year_go_to`, `sem_code_go_to`, `log_id`, `status_id`) VALUES ('$program_id', '$student_id', '$year_in', '$sem_code_in', '$year_go_to', '$sem_code_go_to', 
			'LOG_ID', '$status_id')";

		$ac_on = "Entered year back for ".$enrollment_no;
		$s_i = $_SESSION['staff_id'];
		$r = $_SESSION['rank'];
		$tn = 'year_back';

		$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);			

		$sql = "INSERT INTO `year_back`(`program_id`, `student_id`, `year_in`, `sem_code_in`, `year_go_to`, `sem_code_go_to`, `log_id`, 
			`status_id`) VALUES (:program_id, :student_id, :year_in, :sem_code_in, :year_go_to, :sem_code_go_to, 
				:log_id, :status_id)";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':program_id',$program_id);
		$stmt->bindParam(':year_go_to',$year_go_to);
		$stmt->bindParam(':student_id',$student_id);
		$stmt->bindParam(':sem_code_in',$sem_code_in);
		$stmt->bindParam(':year_in',$year_in);
		$stmt->bindParam(':sem_code_go_to',$sem_code_go_to);
		$stmt->bindParam(':log_id',$log_id);
		$stmt->bindParam(':status_id',$status_id);

		$stmt -> execute();

		$show_form = "";
		$success = "Success";

	} catch (PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

}

$TBS->MergeBlock('program', $conn, 'SELECT * FROM program');
$TBS->MergeBlock('sem_code_description, sem_code_description1', $conn, 'SELECT * FROM sem_code_description');

$TBS->Show();

?>

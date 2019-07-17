<?php

include_once('../../includes/include.php');

error_reporting(E_ALL); ini_set('display_errors', 1);

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('programme_manage_program.html'); 

$success = "";
$show_up = "y";
$show_down = "";
$msg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	foreach($_POST as $k=>$v) {
		if(isset($_POST[$k])) {
			$_POST[$k] = filter_var($v,FILTER_SANITIZE_STRING);
		}			
	}

	if (isset($_POST['deadline_duration'])) {
		$deadline_duration = $_POST['deadline_duration']; 
	}

	if (isset($_POST['year_end'])) {
		$year_end = $_POST['year_end']; 
	}	    

	if (isset($_POST['program_duration'])) {
		$program_duration = $_POST['program_duration']; 
	}

	if (isset($_POST['no_of_sems'])) {
		$no_of_sems = $_POST['no_of_sems']; 
	}

	if (isset($_POST['deadline_duration'])) {
		$deadline_duration = $_POST['deadline_duration']; 
	}

	if (isset($_POST['program_code'])) {
		$program_code = $_POST['program_code']; 
	}

	if (isset($_POST['program_name'])) {
		$program_name = $_POST['program_name'];
	}

	if (isset($_POST['year_start'])) {
		$year_start = $_POST['year_start'];
	}

	if (isset($_POST['introduced_by'])) {
		$introduced_by = $_POST['introduced_by'];
	}

	if (isset($_POST['contact_person'])) {
		$contact_person = $_POST['contact_person'];
	}

	if (isset($_POST['program_prefix'])) {
		$program_prefix = $_POST['program_prefix'];
	}

	if (isset($_POST['program_id'])) {
		$program_id = $_POST['program_id'];
	}

	if (isset($_POST['submit_detail'])) {

		$_SESSION['program_id'] = $program_id;

		$show_up = "";
		$show_down = "y";

		$TBS->MergeBlock('update', $conn, "SELECT * FROM program WHERE program_id='$program_id'");

	} else if (isset($_POST['submit_update'])) {

		try {

			$program_id = $_SESSION['program_id'];

			unset($_SESSION['program_id']);

			$status_id = get_status('on');

			$sql = "UPDATE `program` SET `program_code`=:program_code,`program_name`=:program_name,`program_prefix`=:program_prefix,`year_start`=:year_start,`status_id`=:status_id,`introduced_by`=:introduced_by,`year_end`=:year_end,`contact_person`=:contact_person,`log_id`=:log_id,`program_duration`=:program_duration,`program_yr_sem_code`=:no_of_sems,`program_deadline_duration`=:deadline_duration WHERE program_id = :program_id";

			$ac_on = "Updated details of $program_name.";
			$s_i = $_SESSION['staff_id'];
			$r = $_SESSION['rank'];
			$tn = 'program';

			$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);

			$sql = "UPDATE `program` SET `program_code`=:program_code,`program_name`=:program_name,`program_prefix`=:program_prefix,`year_start`=:year_start,`status_id`=:status_id,`introduced_by`=:introduced_by,`year_end`=:year_end,`contact_person`=:contact_person,`log_id`=:log_id,`program_duration`=:program_duration,`program_yr_sem_code`=:no_of_sems,`program_deadline_duration`=:deadline_duration WHERE program_id = :program_id";

			$stmt = $conn->prepare($sql);

			$stmt->bindParam(':program_id', $program_id);
			$stmt->bindParam(':program_code', $program_code);
			$stmt->bindParam(':program_name', $program_name);
			$stmt->bindParam(':program_prefix', $program_prefix);
			$stmt->bindParam(':year_start', $year_start);
			$stmt->bindParam(':status_id', $status_id);
			$stmt->bindParam(':introduced_by', $introduced_by);
			$stmt->bindParam(':year_end', $year_end);
			$stmt->bindParam(':contact_person', $contact_person);
			$stmt->bindParam(':log_id', $log_id);
			$stmt->bindParam(':program_duration', $program_duration);
			$stmt->bindParam(':no_of_sems', $no_of_sems);
			$stmt->bindParam(':deadline_duration', $deadline_duration);

			$stmt->execute();

		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$success = "Success";

	}

}

$TBS->MergeBlock('program', $conn, 'SELECT * FROM program');
$TBS->MergeBlock('sem_code_description', $conn, "SELECT * FROM sem_code_description");

$TBS->Show();

?>

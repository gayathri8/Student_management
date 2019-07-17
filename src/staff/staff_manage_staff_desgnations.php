<?php

include_once('../../includes/include.php');

if ($_SESSION['rank'] < 50) {
	$denied = true;
} else {
	$permitted = true;
}

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('staff_manage_staff_desgnations.html'); 

$msg = "";
$success_add = "";

$status_on_id = get_status('on');
$status_off_id = get_status('off');

if (!isset($_POST)) {
	$_POST = &$HTTP_POST_VARS;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	foreach($_POST as $k=>$v) {

		if(isset($_POST[$k]) && ($k != "password")) {
			$_POST[$k] = filter_var($v, FILTER_SANITIZE_STRING);
		}
	}

	if (isset($_POST['submit_add'])) {
		if (isset($_POST['new_title']) && !empty($_POST['new_title'])) {
			$new_title = $_POST['new_title'];
		} else {	
			$msg = "Please enter a title.";
		}

		if (isset($_POST['new_rank']) && !empty($_POST['new_rank']) && is_numeric($_POST['new_rank'])) {
			$new_rank = $_POST['new_rank'];
		} else {	
			$msg .= "<br>Please enter a rank.";
		}

		$sql = "SELECT designation, rank FROM staff_designations WHERE status_id=$status_on_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$designations = array_map(function($r) {
				return $r['designation'];
				}, $result);

		$ranks = array_map(function($r) {
				return $r['rank'];
				}, $result);

		if (in_array($new_rank, $ranks)) {
			$msg = "Rank already asssigned. Please choose a different rank.";
		} else if (in_array($new_title, $designations)) {
			$msg = "Designation already asssigned. Please choose a new designation.";
		} else {
			$sql = "INSERT INTO staff_designations (designation, rank) VALUES ($new_title, $new_rank);";
			$ac_on = "Creating new staff designation for $new_title title and rank $new_rank.";
			$s_i = $_SESSION['staff_id'];
			$r = $_SESSION['rank'];
			$t_n="staff";
			$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$t_n);

			$sql = "INSERT INTO staff_designations (designation, rank, status_id, log_id) VALUES (:new_title, :new_rank, :status_on_id, :log_id);";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':new_title',$new_title);
			$stmt->bindParam(':new_rank', $new_rank);
			$stmt->bindParam(':status_on_id', $status_on_id);
			$stmt->bindParam(':log_id', $log_id);
			$stmt->execute();

			$success_add = "Success";
		}
	}

	if (isset($_POST['submit_remove'])) {
		if (isset($_POST['staff_designation_id']) && !empty($_POST['staff_designation_id'])) {
			$staff_designation_id = $_POST['staff_designation_id'];

			$sql = "UPDATE staff_designations SET status_id=$status_off_id WHERE staff_designation_id=$staff_designation_id";

			$ac_on = "Turning status for Staff Designation with id=$staff_designation_id to off.";
			$s_i = $_SESSION['staff_id'];
			$r = $_SESSION['rank'];
			$t_n="staff";
			$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$t_n);

			$stmt = $conn->prepare($sql);
			$stmt->execute();

			$success_remove = "Success";
		} else {
			$msg = "Please enter a Staff Designation.";
		}
	}
}

$sql = "SELECT staff_designation_id, designation FROM staff_designations WHERE status_id=$status_on_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$designations = $stmt->fetchAll();

$TBS->MergeBlock('designation_blk', $designations);
$TBS->Show();

?>

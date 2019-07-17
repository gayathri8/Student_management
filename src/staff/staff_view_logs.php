<?php

include_once('../../includes/include.php');

$show_val = "";

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('staff_view_logs.html'); 

$msg = "";

$TBS->MergeBlock('staff', $conn, 'select * from staff WHERE rank < ' . $_SESSION['rank']);

if (!isset($_POST)) {
	$_POST = &$HTTP_POST_VARS;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	if (isset($_POST['username']) &&  (trim($_POST['username']) != '')) {
		$staff_id = $_POST['username'];
	} else {
		$msg= "Enter Valid Staff Name";
	}

	if (isset($_POST['date']) && ($msg == "") ) {
		$date = $_POST['date'];
		if (preg_match('/\d{4}-\d{2}-\d{2}/', $date)) {
			try {
				$show_val = "y";
				$TBS->MergeBlock('result', $conn, "SELECT * FROM log WHERE staff_id = '$staff_id' AND DATE(time) >= '$date'");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		} else {
			$msg = "Please enter a valid date";
		}
	} else {
		$msg = "Please Select date";
	}
}

$TBS->Show();

?>

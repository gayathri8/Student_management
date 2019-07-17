<?php

include_once('../../includes/include.php');

$show_val = "";

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('profile_check_log.html'); 

$msg = "";

if (!isset($_POST)) {
	$_POST = &$HTTP_POST_VARS;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	if (isset($_POST['date']) && !empty($_POST['date'])) {
		$date = $_POST['date'];
		if (!preg_match('/\d{4}-\d{2}-\d{2}/', $date)) {
			$msg = "Please enter date in the correct format.";
		}
	} else {
		$msg = "Please enter date";
	}

	if($msg == "") {
		try {

			$sql = "SELECT * FROM log JOIN staff ON log.staff_id=staff.staff_id WHERE username=:username AND DATE(time) >= :date";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':username', $_SESSION['username']);
			$stmt->bindparam(':date', $date);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count) {
				$show_val = "y";
				$TBS->MergeBlock('result', $conn, "SELECT * FROM log JOIN staff ON log.staff_id=staff.staff_id WHERE username='" . $_SESSION['username'] ."' AND DATE(time) >= '$date'");
			} else {
				$msg = "No logs found.";
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

$TBS->Show();

?>

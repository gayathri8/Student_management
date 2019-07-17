<?php

// error_reporting(E_ALL); ini_set('display_errors', 1);

include_once('../../includes/include.php');

if ($_SESSION['rank'] < 50) {
	$denied = true;
} else {
	$permitted = true;
}

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('staff_add_staff.html'); 

$success = "";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	foreach($_POST as $k=>$v) {
		if(isset($_POST[$k]) && ($k != "password")) {
			$_POST[$k] = filter_var($v,FILTER_SANITIZE_STRING);
		}
	}

	if (isset($_POST['staff_name']) && (isStringValid($_POST['staff_name']))) {
		if (preg_match("/^[A-z ]{1,}$/", $_POST['staff_name'])) {
			$name = $_POST['staff_name'];
		} else {
			$msg .= "Only letters and spaces are allowed in staff name.\n";
		}
	} else {
		$msg .= "Only letters and spaces are allowed in staff name.\n";
	}

	if (isset($_POST['username']) && (isAlphaNum($_POST['username']))) {
		$username=$_POST['username'];
		try {
			$sql = "SELECT COUNT(username) AS num FROM staff WHERE username = :username";
			$stmt = $conn->prepare($sql);
			$stmt->bindparam(':username', $username);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($row['num'] > 0) {
				$msg .= "Username already exists\n";
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	} else {
		$msg .= "Username can contain only letters and digits.\n";
	}

	if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['confirm_password'])) {
		if (($_POST['password'] == $_POST['confirm_password'])) {
			$password = $_POST['password'];
			$password = password_hash($password, PASSWORD_DEFAULT);
		} else {
			$msg .= "Passwords do not match.\n";
		}
	} else {
		$msg .= "Please enter password.\n";
	}

	if (isset($_POST['designation']) && ($_POST['designation'] != 0)) {
		$designation = $_POST['designation'];
		$sql = "SELECT rank FROM staff_designation WHERE designation_id=:designation";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':designation', $designation);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$rank = $row['rank'];
	} else {
		$msg .= "Please Select Designation\n";
	}

	if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST['email'];
		$sql = "SELECT COUNT(email) AS num FROM staff WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->bindparam(':email', $email);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['num'] > 0) {
			$msg .= "Email already exists.\n";
		}
	} else {
		$msg .= "Enter valid email.\n";
	}

	if($msg == "") {

		$sql = "INSERT INTO staff (staff_name, username, password, rank, status_id, email) VALUES (:staff_name,:username,:password,:rank,:status,:email);";
		$ac_on = "Creating new account for $name having username $username and designation $designation.";
		$s_i = $_SESSION['staff_id'];
		$r = $_SESSION['rank'];
		$t_n="staff";
		$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$t_n);

		try {

			$status_on_id = get_status('on');
			$sql = "INSERT INTO staff (staff_name, username, password, email, rank, status_value_id, log_id) VALUES (:staff_name,:username,:password,:email,:rank,:status,:log);";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':staff_name',$name, PDO::PARAM_STR);
			$stmt->bindParam(':username',$username, PDO::PARAM_STR);
			$stmt->bindParam(':password',$password, PDO::PARAM_STR);
			$stmt->bindParam(':rank',$rank, PDO::PARAM_INT);
			$stmt->bindParam(':log',$log_id, PDO::PARAM_INT);
			$stmt->bindParam(':status',$status_on_id, PDO::PARAM_INT);
			$stmt->bindParam(':email',$email, PDO::PARAM_STR);

			$stmt->execute();

			$success = "New Staff $name Added";

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

$sql = "SELECT DISTINCT(designation_id), designation FROM staff_designation, status_value, status WHERE status.status_name='on'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$designations = $stmt->fetchAll();

$TBS->MergeBlock('designation_blk', $designations);
$TBS->Show();

?>

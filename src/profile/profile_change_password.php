<?php
include_once('../../includes/include.php');

if ($_SESSION['rank'] < 50) {
	$denied = true;
} else {
	$permitted = true;
}

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('profile_change_password.html'); 

//$success = "";
//$show_form = "y";
$msg = "";

if (!isset($_POST)) {
	$_POST = &$HTTP_POST_VARS;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['current_password']) && ($_POST['current_password']) != '') {
		$current_password = $_POST['current_password'];

		$sql = "SELECT `password` FROM `staff` WHERE `username`=:username";;
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$actual_password = $result[0]['password'];

		if (password_verify($current_password, $actual_password)) {

			if (isset($_POST['new_password']) && isset($_POST['confirm_password']) && ($_POST['new_password']) != '') {
				if ($_POST['new_password'] == $_POST['confirm_password']) {
					$new_password = $_POST['new_password'];
					$new_password = password_hash($new_password, PASSWORD_DEFAULT);
				} else {
					$msg = "Passwords do not match.";
				}
			} else {
				$msg = "Please enter valid password";
			}

			if ($msg == "") {

				$msghash = md5($new_password, $_SESSION['username']);
				if(isset($_SESSION['msghash']) && ($_SESSION['msghash'] == $msghash)){
					$msg = "Password Already Rested for $username";
				} else {

					$sql = "UPDATE staff SET password = :password WHERE username = :username;";			
					$ac_on = "Resetting password for " . $_SESSION['username'];
					$s_i = $_SESSION['staff_id'];
					$r = $_SESSION['rank'];
					$tn = "staff";
					$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);

					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':password', $new_password, PDO::PARAM_STR);       
					$stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR); 
					$stmt->execute();

					$_SESSION['msghash'] = $msghash;
					$success = "Password successfully reset for " . $_SESSION['username'];
					header("Location: ../../includes/logout.php?pc");
				}
			}

		} else {
			$msg = "Please enter current password correctly.";
		}

	} else {
		$msg = "Enter correct password.";
	}
}

$TBS->Show();

?>

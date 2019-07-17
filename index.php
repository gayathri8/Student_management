<?php
	
	// ini_set("display_errors", "1");
	// error_reporting(E_ALL);

	include_once('./includes/procedure.php');
	include_once('./includes/session.php');
	include_once('./includes/connect.php');
	include_once('tbs/tbs_class.php');
	include_once('tbs/tbs_plugin_html.php');

	if(!Sec_Session_Start()) {
		header("Location: ./includes/logout.php");
	}
	
	if(Login_Check($conn)) {
		login_user($_SESSION['rank']);
	}
	
	$TBS = new clsTinyButStrong;
	$TBS->LoadTemplate('index.html'); 
	$check_password="";
	$msg = "";
	$pc_mag = "";

	if (isset($_GET['pc'])) {
		$pc_mag = "Password changed successfully.";
	}
	
	if (!isset($_POST)) {
		$_POST = &$HTTP_POST_VARS;
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['username']) &&  (trim($_POST['username']) != '')) {
			$username = $_POST['username'];
		} else {
			$msg = "Please Enter Valid Username";
		}
		if (isset($_POST['password']) ) {
			$password = $_POST['password'];
		} else {
			$msg = "Please Enter Password";
		}
		
		if(!$msg) {
			
			$sql = "SELECT staff.password,staff.rank,status.status_name,staff.staff_id from staff,status_value,status WHERE staff.status_value_id=status_value.status_value_id AND status_value.status_id=status.status_id AND username = :username;";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username', $username, PDO::PARAM_STR);
			$stmt->execute();

			if($stmt->rowCount() == 1) {
				$row = $stmt->fetchObject();
				$check_password = $row->password;
				$rank = $row->rank;
				$status = $row->status_name;
				$staff_id = $row->staff_id;
			}	

			if (password_verify($password, $check_password)) {
				if( $status == 'on' ) { 
					Set_Session_Parameter($staff_id,$username,$check_password,$rank);
					login_user($rank);
				} else {
					$msg="Sorry, you are not ACTIVE user.";
				}	
			} else {
				$msg = "You've Entered Wrong Credentials.";
			}
		
		}	
	}

	$TBS->Show();

	function login_user($rank) {
		if($rank < 50 && $rank >= 40) {
			header("Location: src/home/home_home.php");
		} else if($rank < 40){
			header("Location: src/home/home_home.php");
		} else {
			header("Location: src/home/home_home.php");
		}
	}

?>

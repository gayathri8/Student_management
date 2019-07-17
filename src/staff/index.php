<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

include_once('../../includes/session.php');
include_once('../../includes/connect.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

if(!Sec_Session_Start()) {
	header("Location: includes/logout.php");
}

if ($_GET['page'] == 'add_staff') {
	if ($_SESSION['rank'] >= 50) {
		require_once('staff_add_staff.php');
	} else {
		header("Location: ../home/home_home.php");
		//		require_once("../../includes/error.php");
	}
} else if ($_GET['page'] == 'modify_staff_status') {
	if ($_SESSION['rank'] >= 50) {
		require_once('staff_modify_staff_status.php');
	} else {
		header("Location: ../home/home_home.php");
		//		require_once('../../includes/error.php');
	}
} else if ($_GET['page'] == 'reset_password') {
	if ($_SESSION['rank'] >= 50) {
		require_once('staff_reset_passwd.php');
	} else {
		header("Location: ../home/home_home.php");
		//		require_once('../../includes/error.php');
	}
} else if ($_GET['page'] == 'view_log') {
	if ($_SESSION['rank'] >= 40) {
		require_once('staff_view_logs.php');
	} else {
		header("Location: ../home/home_home.php");
		//		require_once('../../includes/error.php');
	}
} else if ($_GET['page'] == 'modify_rank') {
	if ($_SESSION['rank'] >= 50) {
		require_once('staff_modify_rank.php');
	} else {
		header("Location: ../home/home_home.php");
		//		require_once('../../includes/error.php');
	}
} else if ($_GET['page'] == 'manage_designation') {
	if ($_SESSION['rank'] >= 50) {
		require_once('staff_manage_staff_desgnations.php');
	} else {
		header("Location: ../home/home_home.php");
		//		require_once('../../includes/error.php');
	}
} else {
	header("Location: ../home/home_home.php");
}

?>

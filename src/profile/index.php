<?php
include_once('../../includes/session.php');
include_once('../../includes/connect.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

if(!Sec_Session_Start()) {
	header("Location: includes/logout.php");
}

if ($_GET['page'] == 'change_password') {
	require_once("profile_change_password.php");
} else if ($_GET['page'] == 'check_activity') {
	require_once('profile_check_log.php');
} else {
	header("Location: ../home/home_home.php");
}

?>

<?php
include_once('../../includes/session.php');
include_once('../../includes/connect.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

if(!Sec_Session_Start()) {
	header("Location: includes/logout.php");
}

if ($_GET['page'] == 'home') {
	require_once("home_home.php");
} else {
	header("Location: ../home/home_home.php");
}

?>

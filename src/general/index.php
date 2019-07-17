<?php
include_once('../../includes/session.php');
include_once('../../includes/connect.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

if(!Sec_Session_Start()) {
	header("Location: includes/logout.php");
}

if ($_GET['page'] == 'manage_university_list') {
	require_once("general_manage_university_list.php");
} else if ($_GET['page'] == 'manage_state_list') {
	require_once("general_manage_state_list.php");
} else if ($_GET['page'] == 'manage_grade_types') {
	require_once("general_manage_grade_type.php");
} else if ($_GET['page'] == 'manage_other_lists') {
	require_once("general_misc_registration.php");
} else if ($_GET['page'] == 'manage_board_list') {
	require_once("general_manage_board_list.php");
} else {
	header("Location: ../home/home_home.php");
}
?>

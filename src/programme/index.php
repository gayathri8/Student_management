<?php
include_once('../../includes/session.php');
include_once('../../includes/connect.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

if(!Sec_Session_Start()) {
	header("Location: includes/logout.php");
}

if ($_GET['page'] == 'id_card_all') {
	require_once("programme_id_card_all.php");
} else if ($_GET['page'] == 'id_card_single') {
	require_once('programme_id_card_single.php');
} else if ($_GET['page'] == 'add_programme') {
	require_once("programme_program_registration.php");
} else if ($_GET['page'] == 'manage_programmes') {
	require_once("programme_manage_program.php");
} else if ($_GET['page'] == 'view_course_structure') {
	require_once("programme_view_course_structure.php");
} else {
	header("Location: ../home/home_home.php");
}

?>

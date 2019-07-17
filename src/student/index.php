<?php
include_once('../../includes/session.php');
include_once('../../includes/connect.php');
include_once('../../tbs/tbs_class.php');
include_once('../../tbs/tbs_plugin_html.php');

if(!Sec_Session_Start()) {
	header("Location: ../../includes/logout.php");
}

if ($_GET['page'] == 'register_courses') {
	require_once("student_registered_courses_gui.php");
} else if ($_GET['page'] == 'register_courses_csv') {
	require_once("student_registered_courses_csv.php");
} else if ($_GET['page'] == 'branch_change') {
	require_once("student_branch_change_history.php");
} else if ($_GET['page'] == 'academic_back') {
	require_once("student_academic_back.php");
} else if ($_GET['page'] == 'enroll_student_csv') {
	require_once("student_csv.php");
} else if ($_GET['page'] == 'student_media') {
	require_once("application_media_offline.php");
} else if ($_GET['page'] == 'enroll_student') {
	require_once("student_get_online_detail.php");
} else {
	header("Location: ../home/home_home.php");
}
?>

<?php

// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);

include_once('../../includes/include.php');

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('programme_view_course_structure.html');

$courses = array();
$coursesname = array();
$success = "";
$show_table = false;
$show_form = true;
$msg_err = '';

$sem_query = "select sem_code, title from sem_code_description";
$sth = $conn->prepare($sem_query);
$sth->execute();
$semblock = $sth->fetchAll();

$sql = "SELECT * FROM status WHERE status_name='on'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() == 1) {
	foreach ($result as $row) {
		$status_id = $row['status_id'];
	}
}

$error = '';
$allcorrect = true;

if (isset($_POST["submit"])) {

	$year_of_joining = $_POST['year_of_joining'];
	$program_id = $_POST['course_code'];
	$sem_code_of_joining = $_POST['sem_code_of_joining'];

	$sql = "SELECT courses.course_id, course_structure.semester_title, course_code, course_name from courses, sem_structure, course_structure WHERE sem_structure.course_id = courses.course_id AND course_structure.program_id=:program_id AND course_structure.year_of_joining=:year_of_joining AND course_structure.sem_code_of_joining=:sem_code_of_joining AND course_structure.semester_id = sem_structure.semester_id ORDER BY course_structure.year ASC, course_structure.sem_code ASC";
	$query = $conn->prepare($sql);
	$query->bindParam(':program_id', $program_id);
	$query->bindParam(':year_of_joining', $year_of_joining);
	$query->bindParam(':sem_code_of_joining', $sem_code_of_joining);
	$query->execute();

	if ($query->rowCount()) {
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$TBS->MergeBlock('coursesBlk', $res);
		$show_table = true;
		$show_form = false;
	} else {
		$msg_err = 'No courses for specified entries.';
	}

}

$TBS->MergeBlock('courseBlk', $courses);
$TBS->MergeBlock('coursesNameBlk', $coursesname);
$TBS->MergeBlock('program', $conn, 'SELECT * FROM program');
$TBS->MergeBlock('sem_code', $conn, 'SELECT * FROM sem_code_description');

$TBS->Show();

?>

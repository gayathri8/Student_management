<?php

include_once('../../includes/include.php');

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('back_exam.html'); 

$success = "";
$msg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	foreach($_POST as $k=>$v) {	
		if(isset($_POST[$k])) {
			$_POST[$k] = filter_var($v,FILTER_SANITIZE_STRING);
		}
	}

	if (isset($_POST['course_code'])) {
		$course_id = $_POST['course_code'];
	}

	$_POST['student_roll_no'] = strtoupper($_POST['student_roll_no']);
	if (isset($_POST['student_roll_no'])) {
		$enrollment_no = $_POST['student_roll_no'];
	}

	if (isset($_POST['sem_code'])) {
		$sem_code = $_POST['sem_code'];
	}

	if (isset($_POST['year']) && preg_match('/^[12]{1}[0-9]{3}$/', $_POST['year'])) {
		$year = $_POST['year'];
	} else {
		$msg_err .= "Please enter proper year.\n";
	}

	if (isset($_POST['theory_grade'])) {
		$theory_grade = $_POST['theory_grade'];
	}		

	if (isset($_POST['lab_grade'])) {
		$lab_grade = $_POST['lab_grade'];
	}

	$student_id = get_val('student', 'enrollment_no', $enrollment_no, 'student_id');
	if (!$student_id) {
		$msg_err .= "The student doesn't exist.\n";
	}

	if (!$msg_err) {

		$sql = "SELECT * FROM courses WHERE course_id=:course_id AND year=:year AND sem_code=:sem_code";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':course_id', $course_id);
		$stmt->bindParam(':year', $year);
		$stmt->bindParam(':sem_code', $sem_code);

		$stmt->execute();

		if ($stmt->rowCount() != 1) {
			$msg_err .= "The course doesn't belong to the given year and semester code.\n";
		}

	}

	if (!$msg_err) {

		try {

			$status_id = get_status('on');

			$sql = "INSERT INTO `back_exam`(`course_id`, `student_id`, `sem_code`, `year`, `theory_grade`, `lab_grade`, `log_id`, `status_id`) VALUES (:course_id, :student_id, :sem_code, :year, :theory_grade, :lab_grade, :log_id, :status_id)";

			$ac_on = "Registered ".$enrollment_no." for back exam in ".$course_id;
			$s_i = $_SESSION['staff_id'];
			$r = $_SESSION['rank'];
			$tn = 'back_exam';

			$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);

			$sql = "INSERT INTO `back_exam`(`course_id`, `student_id`, `sem_code`, `year`, `theory_grade`, `lab_grade`, `log_id`, `status_id`) VALUES (:course_id, :student_id, :sem_code, :year, :theory_grade, :lab_grade, :log_id, :status_id)";

			$stmt = $conn->prepare($sql);

			$stmt->bindParam(':course_id', $course_id);
			$stmt->bindParam(':student_id', $student_id);
			$stmt->bindParam(':sem_code', $sem_code);
			$stmt->bindParam(':year', $year);
			$stmt->bindParam(':theory_grade', $theory_grade);
			$stmt->bindParam(':lab_grade', $lab_grade);
			$stmt->bindParam(':log_id', $log_id);
			$stmt->bindParam(':status_id', $status_id);

			$stmt->execute();

			$show_form = "";
			$success = "Success";

		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

	}

}

$TBS->MergeBlock('course', $conn, 'SELECT * FROM courses');
$TBS->MergeBlock('sem_code_description', $conn, 'SELECT * FROM sem_code_description');
$TBS->MergeBlock('theory_grade, lab_grade', $conn, 'SELECT * FROM allowed_grades');

$TBS->Show();

?>

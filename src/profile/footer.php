<?php

include_once('../../includes/include.php');

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('footer.html'); 

$sql = "SELECT MD5( GROUP_CONCAT( CONCAT_WS('#', course_id, student_id, year_of_joining, sem_code_of_joining, year, sem_code, timestamp, course_grade, lab_grade, status_id, log_id) SEPARATOR '##' ) ) FROM grade";
$stmt = $conn->prepare($sql);
$stmt->execute();
$hash = $stmt->fetchAll()[0][0];

$sql = "SELECT staff.staff_name, log.time FROM log, staff WHERE table_name='grade' AND staff.staff_id=log.staff_id ORDER BY time DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();
$staff_name = $res['staff_name'];
$time = $res['time'];

$TBS->Show();

?>

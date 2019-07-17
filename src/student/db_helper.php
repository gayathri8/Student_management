<?php

include_once('../../includes/include.php');

function get_program($program_id, $offlineConnection)
{
	$programQuery = $offlineConnection->prepare("Select program_name from program where program_id = '$program_id'");
	$programQuery->execute();
	$data = $programQuery->fetchAll(PDO::FETCH_COLUMN)[0];
	return $data;
}

function get_category($category_id, $offlineConnection)
{
	$categoryQuery = $offlineConnection->prepare("Select category_name from student_category where category_id = '$category_id'");
	$categoryQuery->execute();
	$data = $categoryQuery->fetchAll(PDO::FETCH_COLUMN)[0];
	return $data;
}
function get_board($board_id, $offlineConnection)
{
	$boardQuery = $offlineConnection->prepare("Select board_name from board where board_id = '$board_id'");
	$boardQuery->execute();
	$data = $boardQuery->fetchAll(PDO::FETCH_COLUMN)[0];
	return $data;
}
function get_relegion($religion_id, $offlineConnection)
{
	$religionQuery = $offlineConnection->prepare("Select religion_name from religion where religion_id = '$religion_id'");
	$religionQuery->execute();
	$data = $religionQuery->fetchAll(PDO::FETCH_COLUMN)[0];
	return $data;
}

function yesno($data)
{
	if ($data == 0) {
		return "NO";
	} else {
		return "YES";
	}
}

function get_state($state_id, $offlineConnection)
{
	$stateQuery = $offlineConnection->prepare("Select state_name from state where state_id = '$state_id'");
	$stateQuery->execute();
	$data = $stateQuery->fetchAll(PDO::FETCH_COLUMN)[0];
	return $data;
}

function get_marital($data)
{
	if ($data == 0) {
		return "Unmarried";
	} else {
		return "Married";
	}
}

function updated_university($university, $offlineConnection)
{
	$universityQuery = $offlineConnection->prepare("SELECT university_id FROM universities where university_name = :university");
	$universityQuery->bindParam(':university', $university);
	$universityQuery->execute();
	if ($universityQuery->rowCount() == 0) {
		//now insert university in table and fetch the id

		$ac_on = "Entered a new university with enrollment_no " . $university;
		$s_i = $_SESSION['staff_id'];
		$r = $_SESSION['rank'];
		$tn = 'universities';
		$sql = "insert into universities";
		$log_id = log_procedure($s_i, $r, $sql, $ac_on, $offlineConnection, $tn);
		$universityQuery = $offlineConnection->prepare("INSERT INTO  universities VALUES ('', :university, 1,1,$log_id)");
		$universityQuery->bindParam(':university', $university);
		$universityQuery->execute();

		//        $universityQuery = $offlineConnection->prepare("SELECT university_id FROM universities where university_name = :university");
		//        $universityQuery->bindParam(':university', $university);
		//        $universityQuery->execute();
		//        $result = $universityQuery->fetchAll();
		//        return $result[0];
	}
	$universityQuery = $offlineConnection->prepare("SELECT university_id FROM universities where university_name = :university");
	$universityQuery->bindParam(':university', $university);
	$universityQuery->execute();
	return $universityQuery->fetchAll(PDO::FETCH_COLUMN)[0];
}

function updated_board($board, $offlineConnection)
{
	$boardQuery = $offlineConnection->prepare("SELECT board_id FROM board where board_name = :board");
	$boardQuery->bindParam(':board', $board);
	$boardQuery->execute();
	if ($boardQuery->rowCount() == 0) {
		//now insert university in table and fetch the id

		$ac_on = "Entered a new university with enrollment_no " . $board;
		$s_i = $_SESSION['staff_id'];
		$r = $_SESSION['rank'];
		$tn = 'board';
		$sql = "insert into board";
		$log_id = log_procedure($s_i, $r, $sql, $ac_on, $offlineConnection, $tn);
		$status_value_id = get_status('on');

		$boardQuery = $offlineConnection->prepare("INSERT INTO  board VALUES ('', :board, 1,$status_value_id,$log_id)");
		$boardQuery->bindParam(':board', $board);
		$boardQuery->execute();
	}
	$boardQuery = $offlineConnection->prepare("SELECT board_id FROM board where board_name = :board");
	$boardQuery->bindParam(':board', $board);
	$boardQuery->execute();
	return $boardQuery->fetchAll(PDO::FETCH_COLUMN)[0];
}

function get_DASA($data)
{
	if ($data == 0) {
		return "NO";
	} else if ($data == 1) {
		return "NRI";
	} else if ($data == 2) {
		return "SAARC";
	} else if ($data == 3) {
		return "CIWG";
	}
}

function get_program_type($program_id, $offlineConnection)
{
	$programTypeQuery = $offlineConnection->prepare("Select program_type from program where program_id = '$program_id'");
	$programTypeQuery->execute();
	$data = $programTypeQuery->fetchAll(PDO::FETCH_COLUMN)[0];
	return $data;
}

?>

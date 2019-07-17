<?php

include_once('../../includes/include.php');

error_reporting(E_ALL); ini_set('display_errors', 1);

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('student_allot_section.html');

$show_form  = "y";
$success    = "";
$msg_err    = "";

if (isset($_FILES['file']['name'])) {
	if ($_FILES["file"]["error"] > 0) {

		$errorArray[] = "Please upload the file.";

	} else {

		$uploadedFile = $_FILES['file']['tmp_name'];
		$uploadedFP = fopen($uploadedFile, 'rb');
		$linecount  = 0;
		$all_correct = 1;

		if (!feof($uploadedFP)) {
			while ($data = fgetcsv($uploadedFP)) {

				if($linecount == 0) {
					$linecount++;
					continue;
				}

				$registration_no = filter_var($data[0], FILTER_SANITIZE_STRING);
				$student_roll_no = filter_var($data[1], FILTER_SANITIZE_STRING);

				$student_id = get_val('student', 'enrollment_no', $registration_no, 'student_id');
				if (!$student_id) {
					$msg_err .= "The student at line no " . $linecount . " doesn't exist.\n";
					$all_correct = 0;
				}
				$linecount++;
			}

		}

		$uploadedFile = $_FILES['file']['tmp_name'];
		$uploadedFP = fopen($uploadedFile, 'rb');

		$linecount = 0;

		if (!feof($uploadedFP) && $all_correct) {
			while ($data = fgetcsv($uploadedFP)) {

				if($linecount == 0) {
					$linecount++;
					continue;
				}

				$status_id = get_status('on');

				$enrollment_no = filter_var($data[0], FILTER_SANITIZE_STRING);
				$section = filter_var($data[1], FILTER_SANITIZE_STRING);

				$student_id = get_val('student', 'enrollment_no', $enrollment_no, 'student_id');

				$sql = "SELECT * FROM student_current WHERE enrollment_no=:enrollment_no ORDER BY date_of_admission DESC";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':enrollment_no', $enrollment_no);
				$stmt->execute();

				if (!$stmt->rowCount()) {
					$sql = "SELECT * FROM student WHERE enrollment_no=:enrollment_no ORDER BY date_of_admission DESC";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':enrollment_no', $enrollment_no);
					$stmt->execute();
				} else {
				}

				$res = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

				$sql = "INSERT INTO `student_current` (`student_id`, `program_id`, `campus_id`, `date_of_admission`, `photo`, `mime_photo`, `briefcase`, `mime_briefcase`, `first_name`, `middle_name`, `last_name`, `hindi_name`, `enrollment_no`, `dob`, `birth_place`, `category_id`, `sub_category`, `religion_id`, `gender`, `marital_status`, `area`, `blood_group`, `nationality`, `communication_addr`, `comm_city`, `comm_state_id`, `comm_pincode`, `comm_phone_no`, `comm_email`, `father_first_name`, `father_last_name`, `father_profession`, `father_office_addr`, `father_city`, `father_state_id`, `father_pincode`, `father_phone_no`, `father_email`, `mother_first_name`, `mother_last_name`, `mother_profession`, `permanent_addr`, `perm_city`, `perm_state_id`, `perm_pincode`, `perm_phone_no`, `perm_email`, `local_guardian_name`, `local_guardian_addr`, `local_guard_city`, `local_guard_phone_no`, `admission_category_id`, `admit_card`, `jee_rank_card`, `jee_roll_no`, `jee_rank_pos`, `jee_seat_allot_letter`, `marksheet_10`, `cert_10`, `percentage_10`, `board_id_10`, `board_10_passing_state`, `marksheet_12`, `cert_12`, `percentage_12`, `board_id_12`, `board_12_passing_state`, `marksheet_grad`, `degree_grad`, `percentage_grad`, `university_grad_id`, `marksheet_pg`, `degree_pg`, `percentage_pg`, `university_pg_id`, `gate_score_card`, `gate_year`, `gate_score`, `cat_score_card`, `cat_year`, `cat_score`, `tc`, `character_cert`, `caste_cert`, `ph_cert`, `passport`, `passport_no`, `validity_period`, `mcaip`, `DASA`, `remark`, `anti_rag_st`, `anti_rag_pr`, `med_cert`, `muslim_minority`, `other_minority`, `admission_letter`, `status_id`, `log_id`, `sem_code`, `year`, `section`, `aadhaar`, `hostel_no`, `hostel_room`, `dasa_country`)
					VALUES
					(:student_id,:program_id,:campus_id,:date_of_admission,:photo,:mime_photo,:briefcase,:mime_briefcase,:first_name,:middle_name,:last_name,:hindi_name,:enrollment_no,:dob,:birth_place,:category_id,:sub_category,:religion_id,:gender,:marital_status,:area,:blood_group,:nationality,:communication_addr,:comm_city,:comm_state_id,:comm_pincode,:comm_phone_no,:comm_email,:father_first_name,:father_last_name,:father_profession,:father_office_addr,:father_city,:father_state_id,:father_pincode,:father_phone_no,:father_email,:mother_first_name,:mother_last_name,:mother_profession,:permanent_addr,:perm_city,:perm_state_id,:perm_pincode,:perm_phone_no,:perm_email,:local_guardian_name,:local_guardian_addr,:local_guard_city,:local_guard_phone_no,:admission_category_id,:admit_card,:jee_rank_card,:jee_roll_no,:jee_rank_pos,:jee_seat_allot_letter,:marksheet_10,:cert_10,:percentage_10,:board_id_10,:board_10_passing_state,:marksheet_12,:cert_12,:percentage_12,:board_id_12,:board_12_passing_state,:marksheet_grad,:degree_grad,:percentage_grad,:university_grad_id,:marksheet_pg,:degree_pg,:percentage_pg,:university_pg_id,:gate_score_card,:gate_year,:gate_score,:cat_score_card,:cat_year,:cat_score,:tc,:character_cert,:caste_cert,:ph_cert,:passport,:passport_no,:validity_period,:mcaip,:DASA,:remark,:anti_rag_st,:anti_rag_pr,:med_cert,:muslim_minority,:other_minority,:admission_letter,:status_id,:log_id,:sem_code,:year,:section,:aadhaar,:hostel_no,:hostel_room,:dasa_country)";

				$stmt = $conn->prepare($sql);

				$ac_on = "Updated section for $enrollment_no to $section";
				$s_i = $_SESSION['staff_id'];
				$r = $_SESSION['rank'];
				$tn = 'student';

				$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);

				$res['section'] = $section;
				$res['log_id'] = $log_id;

				foreach ($res as $k => $v) {
					$stmt->bindParam(":$k", $res[$k]);
				}

				$stmt->execute();
				$success = "Success";
			}

		}
	}
}

if (!isset($_POST['file']) && isset($_POST['submit'])) {
	$msg_err = "Please upload a file.";
}

$TBS->Show();

?>

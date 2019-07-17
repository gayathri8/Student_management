<?php
include_once('../../includes/include.php');
require_once ('../../includes/validator.php');
require_once ('db_helper.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$TBS = new clsTinyButStrong;

$TBS->LoadTemplate('application.html');

$msg = "";
$specialError= "";
$errorArray = array();

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "offline";
$type = " ";
$showerr = false;
$showform = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	foreach ($_POST as $k => $v) {
		if (isset($_POST[$k])) {
			$_POST[$k] = filter_var($v, FILTER_SANITIZE_STRING);
		}
	}

	if (isset($_POST["registered_email"])) {
		$registered_email = $_POST["registered_email"];
		if (!filter_var($registered_email, FILTER_VALIDATE_EMAIL)) {
			header("Location: offline_registration_error.php");
		}
		try {
			$conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn1->exec("set names 'utf8'");
			$sql  = "select * from student where comm_email = '".$registered_email." ' ";

			$stmt = $conn1->prepare($sql);
			$stmt->execute();

			$result1 = $stmt->fetchAll();

			$count   = $stmt->rowCount();

			if ($count > 0) {
				$result = $result1[0];
			} else {
				$specialError =  "Please enter registered Email.";
				unset($_SESSION['emial']);
				$showform = false;
			}
		}
		catch (PDOException $e) {
			$specialError =  $sql . "<br>" . $e->getMessage();
		}


		if(isset($result)) {

			$mydetails = $result;

			$type = trim($mydetails['type']);
			$_SESSION['type'] = $type;

			$jeeOptions = false;
			$ugOptions = false;
			$gateOptions = false;
			$catOptions = false;
			$pgOptions = false;

			if (strcmp($type, "B.Tech") == 0) {
				$jeeOptions = true;
			} else if (strcmp($type, "M.Tech") == 0) {
				$ugOptions = true;
				$gateOptions = true;
			} else if (strcmp($type, "MBA") == 0) {
				$ugOptions = true;
				$catOptions = true;
			} else if (strcmp($type, "PhD") == 0) {
				$pgOptions = true;
			}

			$program_id = $mydetails['program_id'];
			$aadhaar = $mydetails['aadhaar'];

			$first_name = $mydetails['first_name'];
			$middle_name = $mydetails['middle_name'];
			$last_name = $mydetails['last_name'];
			$hindi_name = $mydetails['hindi_name'];
			$birth_place = $mydetails['birth_place'];
			$category_id = $mydetails['category_id'];
			$sub_category = $mydetails['sub_category'];
			$religion_id = $mydetails['religion_id'];
			$gender = $mydetails['gender'];
			$marital_status = $mydetails['marital_status'];
			$area = $mydetails['area'];
			$blood_group = $mydetails['blood_group'];
			$nationality = $mydetails['nationality'];
			$communication_addr = $mydetails['communication_addr'];
			$comm_city = $mydetails['comm_city'];
			$comm_state_id = $mydetails['comm_state_id'];
			$comm_pincode = $mydetails['comm_pincode'];

			$email = $mydetails["comm_email"];
			$_SESSION['email'] = $email;

			$father_first_name = $mydetails['father_first_name'];
			$father_last_name = $mydetails['father_last_name'];
			$father_profession = $mydetails['father_profession'];
			$father_office_addr = $mydetails['father_office_addr'];
			$city2 = $mydetails['father_city'];
			$state_id2 = $mydetails['father_state_id'];
			$pincode2 = $mydetails['father_pincode'];
			$phone_no2 = $mydetails['father_phone_no'];
			$email2 = $mydetails['father_email'];
			$mother_first_name = $mydetails['mother_first_name'];
			$mother_last_name = $mydetails['mother_last_name'];
			$mother_profession = $mydetails['mother_profession'];
			$permanent_addr = $mydetails['permanent_addr'];
			$city3 = $mydetails['perm_city'];
			$state_id3 = $mydetails['perm_state_id'];
			$pincode3 = $mydetails['perm_pincode'];
			$phone_no3 = $mydetails['perm_phone_no'];
			$email3 = $mydetails['perm_email'];
			$local_guardian_name = $mydetails['local_guardian_name'];
			$loca_guardian_addr = $mydetails['local_guardian_addr'];
			$city4 = $mydetails['local_guard_city'];
			$phone_no4 = $mydetails['local_guard_phone_no'];
			$comm_phone_no = $mydetails['comm_phone_no'];
			$admission_category_id = $mydetails['admission_category_id'];
			$marsheek_10 = $mydetails['marksheet_10'];
			$cert_10 = $mydetails['cert_10'];
			$percentage_10 = $mydetails['percentage_10'];

			//$board_id_10 = $mydetails['board_id_10'];
			$board_id_10 = updated_board($mydetails['board_id_10'], $conn);

			$marksheet_12 = $mydetails['marksheet_12'];
			$cert_12 = $mydetails['cert_12'];
			$percentage_12 = $mydetails['percentage_12'];

			//$board_id_12 = $mydetails['board_id_12'];
			$board_id_12 = updated_board($mydetails['board_id_12'], $conn);

			$admit_card = $mydetails['admit_card'];
			$jee_rank_card = $mydetails['jee_rank_card'];
			$jee_roll_no = $mydetails['jee_roll_no'];
			$jee_rank_pos = $mydetails['jee_rank_pos'];
			$jee_seat_allot_letter = $mydetails['jee_seat_allot_letter'];
			$marksheet_grad = $mydetails['marksheet_grad'];
			$degree_grad = $mydetails['degree_grad'];
			$percentage_grad = $mydetails['percentage_grad'];

			$university_grad_id = updated_university($mydetails['university_grad_id'], $conn);

			$gate_score_card = $mydetails['gate_score_card'];
			$gate_year = $mydetails['gate_year'];
			$gate_score = $mydetails['gate_score'];
			$cat_score_card = $mydetails['cat_score_card'];
			$cat_year = $mydetails['cat_year'];
			$cat_score = $mydetails['cat_score'];
			$marksheet_pg = $mydetails['marksheet_pg'];
			$degree_pg = $mydetails['degree_pg'];
			$percentage_pg = $mydetails['percentage_pg'];

			$university_pg_id = updated_university($mydetails['university_pg_id'], $conn);

			$tc = $mydetails['tc'];
			$character_cert = $mydetails['character_cert'];
			$caste_cert = $mydetails['caste_cert'];
			$ph_cert = $mydetails['ph_cert'];
			$passport = $mydetails['passport'];
			$passport_no = $mydetails['passport_no'];
			$validity_period = $mydetails['validity_period'];
			$DASA = $mydetails['DASA'];
			$remark = $mydetails['remark'];
			$anti_rag_st = $mydetails['anti_rag_st'];
			$anti_rag_pr = $mydetails['anti_rag_pr'];
			$med_cert = $mydetails['med_cert'];
			$muslim_minority = $mydetails['muslim_minority'];
			$other_minority = $mydetails['other_minority'];
			$admission_letter = $mydetails['admission_letter'];
			$dob = $mydetails["dob"];
			$tdob = explode('-', $dob);
			$dob = $tdob[1] . '/' . $tdob[2] . '/' . $tdob[0];
		}

	} elseif (isset($_POST['submit'])) {
		$program_id = $_POST['program_id'];
		$campus_id = $_POST['campus_id'];

		$type = $_SESSION['type'];

		$jeeOptions = false;
		$ugOptions  = false;
		$gateOptions  = false;
		$catOptions  = false;
		$pgOptions  = false;

		if(strcmp($type,"B.Tech") == 0){
			$jeeOptions = true;
		} else if(strcmp($type,"M.Tech") == 0){
			$ugOptions = true;
			$gateOptions = true;
		} else if(strcmp($type,"MBA") == 0){
			$ugOptions = true;
			$catOptions = true;
		} else if(strcmp($type,"PhD") == 0){
			$pgOptions = true;
		}

		foreach ($_POST as $k => $v) {
			if (isset($_POST[$k]) && ($k != "hindi_name")) {
				$_POST[$k] = filter_var($v, FILTER_SANITIZE_STRING);
			}
		}

		$conn->beginTransaction();

		$year = date('Y');
		$sem_code              = $_POST["sem_code"];
		$program_id            = $_POST["program_id"];
		$campus_id             = $_POST["campus_id"];

		$sql  = "SELECT COUNT(DISTINCT enrollment_no) FROM `student` WHERE campus_id=:campus_id AND program_id=:program_id 
			AND year=:year AND sem_code=:sem_code";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':campus_id', $campus_id);
		$stmt->bindParam(':program_id', $program_id);
		$stmt->bindParam(':year', $year);
		$stmt->bindParam(':sem_code', $sem_code);
		$stmt->execute();
		$count = $stmt->fetchAll()[0][0] + 1;
		$sql   = "SELECT * FROM program WHERE program_id=:program_id";
		$stmt  = $conn->prepare($sql);
		$stmt->bindParam(':program_id', $program_id);
		try {
			$stmt->execute();
		} catch (PDOException $e) {
			$specialError = "Query unsuccessful. Please try again.";
		}
		$result = $stmt->fetchAll();
		if ($stmt->rowCount() == 1) {
			foreach ($result as $row) {
				$program_prefix = $row['program_prefix'];
			}
		}else{
			$specialError = "Please select valid Program";
		}
		$enrollment_no         = $program_prefix . date("Y") . str_pad((string) $count, 3, "0", STR_PAD_LEFT);
		$comm_phone_no            = $_POST["comm_phone_no"];
		$first_name            = $_POST["first_name"];
		$middle_name           = $_POST["middle_name"];
		$last_name             = $_POST["last_name"];
		$hindi_name            = $_POST["hindi_name"];
		$birth_place           = $_POST["birth_place"];
		$category_id           = $_POST["category_id"];
		$sub_category          = $_POST["sub_category"];
		$religion_id           = $_POST["religion_id"];
		$gender                = $_POST["gender"];
		$marital_status        = $_POST["marital_status"];
		$area                  = $_POST["area"];
		$blood_group           = $_POST["blood_group"];
		$nationality           = $_POST["nationality"];
		$communication_addr    = $_POST["communication_addr"];
		$comm_city                 = $_POST["comm_city"];
		$comm_state             = $_POST["comm_state_id"];
		$comm_pincode              = $_POST["comm_pincode"];
		$email                 = $_SESSION['email'];
		unset($_SESSION['email']);
		$father_first_name     = $_POST["father_first_name"];
		$father_last_name      = $_POST["father_last_name"];
		$father_profession     = $_POST["father_profession"];
		$father_office_addr    = $_POST["father_office_addr"];
		$city2                 = $_POST["city2"];
		$state_id2             = $_POST["state_id2"];
		$pincode2              = $_POST["pincode2"];
		$phone_no2             = $_POST["phone_no2"];
		$email2                = $_POST["email2"];
		$mother_first_name     = $_POST["mother_first_name"];
		$mother_last_name      = $_POST["mother_last_name"];
		$mother_profession     = $_POST["mother_profession"];
		$permanent_addr        = $_POST["permanent_addr"];
		$city3                 = $_POST["city3"];
		$state_id3             = $_POST["state_id3"];
		$pincode3              = $_POST["pincode3"];
		$phone_no3             = $_POST["phone_no3"];
		$email3                = $_POST["email3"];
		$local_guardian_name   = $_POST["local_guardian_name"];
		$local_guardian_addr   = $_POST["loca_guardian_addr"];
		$city4                 = $_POST["city4"];
		$phone_no4             = $_POST["phone_no4"];
		$admission_category_id = $_POST["admission_category_id"];
		if ($jeeOptions) {
			$admit_card = $_POST["admit_card"];
			$jee_rank_card = $_POST["jee_rank_card"];
			$jee_roll_no = $_POST["jee_roll_no"];
			$jee_rank_pos = $_POST["jee_rank_pos"];
			$jee_seat_allot_letter = $_POST["jee_seat_allot_letter"];
		} else{
			$admit_card = 0;
			$jee_rank_card = 0;
			$jee_roll_no = 0;
			$jee_rank_pos = 0;
			$jee_seat_allot_letter = 0;
		}
		$marsheek_10           = $_POST["marsheek_10"];
		$cert_10               = $_POST["cert_10"];
		$percentage_10         = $_POST["percentage_10"];
		$board_id_10           = $_POST["board_id_10"];
		$marksheet_12          = $_POST["marksheet_12"];
		$cert_12               = $_POST["cert_12"];
		$percentage_12         = $_POST["percentage_12"];
		$board_id_12           = $_POST["board_id_12"];

		if($ugOptions) {
			$marksheet_grad = $_POST["marksheet_grad"];
			$degree_grad = $_POST["degree_grad"];
			$percentage_grad = $_POST["percentage_grad"];
			$university_grad_id = $_POST["university_grad_id"];
		}
		else{
			$marksheet_grad = 0;
			$degree_grad = 0;
			$percentage_grad = 0;
			$university_grad_id = 1;
		}
		if($pgOptions) {
			$marksheet_pg = $_POST["marksheet_pg"];
			$degree_pg = $_POST["degree_pg"];
			$percentage_pg = $_POST["percentage_pg"];
			$university_pg_id = $_POST["university_pg_id"];
		}
		else{
			$marksheet_pg = 0;
			$degree_pg = 0;
			$percentage_pg = 0;
			$university_pg_id = 1;
		}
		if($gateOptions) {
			$gate_score_card = $_POST["gate_score_card"];
			$gate_year = $_POST["gate_year"];
			$gate_score = $_POST["gate_score"];
		} else {
			$gate_score_card = 0;
			$gate_year = 0;
			$gate_score = 0;
		}
		if($catOptions) {
			$cat_score_card = $_POST["cat_score_card"];
			$cat_year = $_POST["cat_year"];
			$cat_score = $_POST["cat_score"];
		}
		else{
			$cat_score_card = 0;
			$cat_year = 0;
			$cat_score = 0;
		}
		$tc                    = $_POST["tc"];
		$character_cert        = $_POST["character_cert"];
		$caste_cert            = $_POST["caste_cert"];
		$ph_cert               = $_POST["ph_cert"];
		$passport              = $_POST["passport"];
		$passport_no           = $_POST["passport_no"];
		$validity_period       = $_POST["validity_period"];
		$mcaip                 = $_POST["mcaip"];
		$DASA                  = $_POST["DASA"];
		$remark                = $_POST["remark"];
		$anti_rag_st           = $_POST["anti_rag_st"];
		$anti_rag_pr           = 0;
		$med_cert              = $_POST["med_cert"];
		$muslim_minority       = $_POST["muslim_minority"];
		$other_minority        = $_POST["other_minority"];
		$admission_letter      = $_POST["admission_letter"];
		$dob                   = $_POST["dob"];
		$aadhaar              = $_POST['aadhaar'];
		$dasa_country         = $_POST['dasa_country'];
		$admission_withdrawal = " ";

		if (!isset($first_name)) {
			$errorArray[] = "first name is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
				$errorArray[] = "Only letters and white space allowed in first name";
			}
		}
		if (!isset($last_name)) {
			$errorArray[] = "last name is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
				$errorArray[] = "Only letters and white space allowed in last name";
			}
		}
		if (isset($middle_name)) {
			if (!preg_match("/^[a-zA-Z ]*$/", $middle_name)) {
				$errorArray[] = "Only letters and white space allowed in middle name";
			}
		}

		if (!isset($birth_place)) {
			$errorArray[] = "Birth place is required";
		} else {
			if (!preg_match("/^[A-z]{1}[A-z\-,. ]{0,}$/", $birth_place)) {
				$errorArray[] = "Birth Place: Must start with a letter and contain only letters, spaces, comma, hyphen(-) and fullstop.";
			}
		}
		if (!isset($category_id)) {
			$errorArray[] = "Category is required";
		}
		if (!isset($sub_category)) {
			$errorArray[] = "sub_category is required";
		} else {
			if (!preg_match("/^[A-z]{1}[A-z- ]{0,}$/", $sub_category)) {
				$errorArray[] = "Sub Category : Only letters and white space allowed";
			}
		}
		if (!isset($religion_id)) {
			$errorArray[] = "Religion is required";
		}
		if (!isset($gender)) {
			$errorArray[] = "Gender is required";
		}
		if (!isset($marital_status)) {
			$errorArray[] = "Marital status is required";
		}
		if (!isset($area)) {
			$errorArray[] = "Area is required";
		} else {
			if (!preg_match("/^[A-z0-9]{1}[A-z0-9-,.\/\\' ]{1,}$/", $area)) {
				$errorArray[] = "Area : can contain only letters, spaces, comma, hyphen(-) and dot(.)";
			}
		}
		if (!isset($blood_group)) {
			$errorArray[] = "Blood group is required";
		}
		if (!isset($nationality)) {
			$errorArray[] = "Nationality is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]{1,}$/", $nationality)) {
				$errorArray[] = "Only letters and white space allowed in nationality.";
			}
		}
		if (!isset($communication_addr)) {
			$errorArray[] = "communication_addr is required";
		} else {
			if (!preg_match("/^[A-Za-z0-9-,.\/ ]{1,}$/", $communication_addr)) {
				$errorArray[] = "Address can contain only letters, digits, commas(,) and dots(.)";
			}
		}
		if (!isset($comm_city)) {
			$errorArray[] = "City is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $comm_city)) {
				$errorArray[] = "City : Only letters and white space allowed";
			}
		}
		if (!isset($comm_state)) {
			$errorArray[] = "State is required";
		}
		if (!isset($comm_pincode)) {
			$errorArray[] = "communication pincode is required";
		} else {
			if (!preg_match("/^[0-9]{6}$/", $comm_pincode)) {
				$errorArray[] = "Pincode : Only 6 digits are allowed";
			}
		}
		if (isset($aadhaar) && !empty($aadhaar)) {
			if (!preg_match("/^[0-9]{12}$/", $aadhaar)) {
				$errorArray[] = "AADHAAR: Only 12 digits are allowed";
			}
		}
		if (!isset($father_first_name)) {
			$errorArray[] = "Father's first name is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $father_first_name)) {
				$errorArray[] = "Father's first name : Only letters and white space allowed";
			}
		}
		if (!isset($father_last_name)) {
			$errorArray[] = "Father's last name is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $father_last_name)) {
				$errorArray[] = "Father's last name : Only letters and white space allowed";
			}
		}
		if (isset($father_office_addr) && !empty($father_office_addr)) {
			if (!preg_match("/^[A-Za-z0-9-,.\/ ]{1,}$/", $father_office_addr)) {
				$errorArray[] = "Father's Office Address can contain only letters, digits, commas(,) and dots(.)";
			}
		}
		if (isset($father_profession) && !empty($father_profession)) {
			if (!preg_match("/^[A-z ]{1,}$/", $father_profession)) {
				$errorArray[] = "Profession : Only letters and spces are allowed";
			}
		}
		if (isset($city2) && !empty($city2)) {
			if (!preg_match("/^[a-zA-Z ]*$/", $city2)) {
				$errorArray[] = "City : Only letters and white space allowed";
			}
		}
		if (isset($state_id2) && !empty($state_id2)) {
			//            $errorArray[] = "State is required";
		}
		if (isset($pincode2) && !empty($pincode2)) {
			if (!preg_match("/^[0-9]{6}$/", $pincode2)) {
				$errorArray[] = "Pincode : Only 6 digits are allowed";
			}
		}
		if (isset($phone_no2) && !empty($phone_no2)) {
			if (!preg_match("/^[0-9]{10,15}$/", $phone_no2)) {
				$errorArray[] = "Phone : Only digits are allowed";
			}
		}
		if (isset($email2) && !empty($email2)) {
		}
		if (!isset($mother_first_name)) {
			$errorArray[] = "Mother's first name is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $mother_first_name)) {
				$errorArray[] = "Mother's first name : Only letters and white space allowed";
			}
		}
		if (!isset($mother_last_name)) {
			$errorArray[] = "Mother's last name is required";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $mother_last_name)) {
				$errorArray[] = "Mother's last name : Only letters and white space allowed";
			}
		}
		if (isset($mother_profession) && !empty($mother_profession)) {
			if (!preg_match("/^[A-z ]{1,}$/", $father_profession)) {
				$errorArray[] = "Profession : Only letters and spces are allowed";
			}
		}
		if (isset($permanent_addr) && !empty($permanent_addr)) {
			if (!preg_match("/^[A-Za-z0-9-,.\/ ]{1,}$/", $permanent_addr)) {
				$errorArray[] = "Permanent Address can contain only letters, digits, commas(,) and dots(.)";
			}
		}
		if (isset($city3) && !empty($city3)) {
			if (!preg_match("/^[a-zA-Z ]*$/", $city3)) {
				$errorArray[] = "City : Only letters and white space allowed";
			}
		}
		if (isset($state_id3) && !empty($state_id3)) {

		}
		if (isset($pincode3) && !empty($pincode3)) {
			if (!preg_match("/^[0-9]{6}$/", $pincode3)) {
				$errorArray[] = "Pincode : Only 6 digits are allowed";
			}
		}
		if (isset($phone_no3) && !empty($phone_no3)) {
			if (!preg_match("/^[0-9]{10,15}$/", $phone_no3)) {
				$errorArray[] = "Phone : Only digits are allowed";
			}
		}

		if (isset($local_guardian_name) && !empty($local_guardian_name)) {
			if (!preg_match("/^[a-zA-Z ]*$/", $local_guardian_name)) {
				$errorArray[] = "Guardian name : Only letters and white space allowed";
			}
		}
		if (isset($city4) && !empty($city4)) {
			if (!preg_match("/^[a-zA-Z ]*$/", $city4)) {
				$errorArray[] = "City : Only letters and white space allowed";
			}
		}
		if (isset($loca_guardian_addr) && !empty($loca_guardian_addr)) {
			if (!preg_match("/^[A-Za-z0-9-,.\/ ]{1,}$/", $loca_guardian_addr)) {
				$errorArray[] = "Local guardian address  can contain only letters, digits, commas(,) and dots(.)";
			}
		}
		if (isset($phone_no4) && !empty($phone_no4)) {
			if (!preg_match("/^[0-9]{10,15}$/", $phone_no4)) {
				$errorArray[] = "Guardian's phone : Only digits are allowed";
			}
		}

		if (!isset($admission_category_id)) {
			$errorArray[] = "Admission Category is required";
		}

		if (!isset($marsheek_10)) {
			$errorArray[] = "Marksheet of class 10 is required";
		}
		if (!isset($cert_10)) {
			$errorArray[] = "10th certificate  is required";
		}
		if (!isset($percentage_10)) {
			$errorArray[] = "Percentage for class 10 is required";
		} else if (!preg_match('/^[0-9]{1,}[.]?[0-9]{0,}$/', $percentage_10)) {
			$errorArray[] = '10th percentage can contain only digits and dot(.). Must beign with a digit.';
		}
		if (!isset($board_id_10) || empty($board_id_10)) {
			$errorArray[] = "10th Board is required";
		}
		if (!isset($marksheet_12)) {
			$errorArray[] = "12th Marksheet is required";
		}
		if (!isset($cert_12)) {
			$errorArray[] = "12th certificate is required";
		}
		if (!isset($percentage_12)) {
			$errorArray[] = "12th percentage is required";
		} else if (!preg_match('/^[0-9]{1,}[.]?[0-9]{0,}$/', $percentage_12)) {
			$errorArray[] = '12th percentage can contain only digits and dot(.). Must beign with a digit.';
		}
		if (!isset($board_id_12) || empty($board_id_12)) {
			$errorArray[] = "Class 12 Board required";
		}

		if (!isset($tc)) {
			$errorArray[] = "Transfer Certificate required";
		}
		if (!isset($character_cert)) {
			$errorArray[] = "Character Certificate is required";
		}
		if (!isset($caste_cert)) {
			$errorArray[] = "Caste Certificate is required";
		}
		if (!isset($passport)) {
			$errorArray[] = "Passport is required";
		} else if ($passport == 1) {
			if (!isset($passport_no) || empty($passport_no)) {
				$errorArray[] = "Passport Number is required.";
			}
			if (!isset($validity_period) || empty($validity_period)) {
				$errorArray[] = "Passport validity period is required.";
			} else if (!preg_match('/^[0-9]{4}$/', $validity_period)) {
				$errorArray[] = "Passport validity period needs to be a valid year.";
			}
		} else if ($passport == 0) {
			$passport_no = 0;
			$validity_period = 0;
		}

		if (!isset($DASA)) {
			$errorArray[] = "DASA is required";
		} else if ($DASA > 0) {
			if (!isset($dasa_country)) {
				$errorArray[] = "DASA Country is required.";
			} else {
				if (!preg_match("/^[A-Za-z ]{1,}$/", $dasa_country)) {
					$errorArray[] = "Country name can contain only letters and digits.";
				}
			}

		} else  {
			$dasa_country = 0;
		}

		if (!isset($anti_rag_st)) {
			$errorArray[] = "Anti ragging certificate  is required";
		}

		if (!isset($_POST["muslim_minority"])) {
			$errorArray[] = "Muslim Minority  is required";
		}
		if (!isset($dob)) {
			$errorArray[] = "Date of birth is required";
		} else {
			if (!preg_match('/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/', $dob)) {
				$errorArray[] = "Please enter a valid date in MM/DD/YYYY format.";
			}
		}
		if (!isset($comm_phone_no)) {
			$errorArray[] = "communication Phone number is required";
		}else{
			if (!preg_match("/^[0-9]{10,15}$/", $comm_phone_no)) {
				$errorArray[] = "Phone : Only digits are allowed";
			}
		}


		if($jeeOptions) {
			$admit_card = test_input($_POST["admit_card"]);
			$jee_rank_card = test_input($_POST["jee_rank_card"]);
			$jee_roll_no = test_input($_POST["jee_roll_no"]);
			$jee_rank_pos = test_input($_POST["jee_rank_pos"]);
			$jee_seat_allot_letter = test_input($_POST["jee_seat_allot_letter"]);

			if (!isset($admit_card)) {
				$errorArray[] = "Admit card details are required.";
			}
			if (!isset($jee_rank_card)) {
				$errorArray[] = "JEE rank card details are required.";
			} 
			if (!isset($jee_roll_no) || empty($jee_roll_no)) {
				$errorArray[] = "JEE roll no. is required.";
			}
			if (!isset($jee_rank_pos) || empty($jee_rank_pos)) {
				$errorArray[] = "JEE rank is required.";
			} else {
				if (!preg_match("/^[0-9]{1,}$/", $jee_rank_pos)) {
					$errorArray[] = "JEE Rank : Only digits are allowed";
				}
			}
			if (!isset($jee_seat_allot_letter)) {
				$errorArray[] = "JEE rank card details are required.";
			}
		}

		//ugOptions
		if($ugOptions) {
			$marksheet_grad = test_input($_POST["marksheet_grad"]);
			$degree_grad = test_input($_POST["degree_grad"]);
			$percentage_grad = test_input($_POST["percentage_grad"]);
			$university_grad_id = test_input($_POST["university_grad_id"]);

			if (!isset($marksheet_grad)) {
				$errorArray[] = "Graduation marksheet details are required.";
			}
			if (!isset($degree_grad)) {
				$errorArray[] = "Graduation degree details are required.";
			}
			if (!isset($percentage_grad) || empty($percentage_grad)) {
				$errorArray[] = "Graduation percentage/cgpa is required.";
			} else {
				if (!preg_match("/^[0-9]{1,}[\.]?[0-9]{0,}$/", $percentage_grad)) {
					$errorArray[] = "Graduation percentage can contain only digits and decimal and must begin with a digit.";
				}
			}
			if (!isset($university_grad_id) || empty($university_grad_id)) {
				$errorArray[] = "Graduation University is required.";
			}

		}

		//gateOptions
		if($gateOptions) {
			$gate_score_card = test_input($_POST["gate_score_card"]);
			$gate_year = test_input($_POST["gate_year"]);
			$gate_score = test_input($_POST["gate_score"]);

			if (!isset($gate_score_card)) {
				$errorArray[] = "GATE Score Card details are required.";
			}

			if (!isset($gate_year) || empty($gate_year)) {
				$errorArray[] = "GATE year is required.";
			} else {
				//            if (preg_match("/^[0-9]{4}$/", trim($gate_year))) {
				//                $errorArray[] = "Gate year entered is not a proper year. $gate_year";
				//            }
			}
			if (!isset($gate_score) || empty($gate_score)) {
				$errorArray[] = "GATE percentage/cgpa is required.";
			} else {
				if (!preg_match("/^[0-9]{1,}[\.]?[0-9]{0,}$/", $gate_score)) {
					$errorArray[] = "GATE percentage can contain only digits and decimal and must begin with a digit.";
				}
			}
		}

		//pgOptions
		if($pgOptions) {
			$marksheet_pg = test_input($_POST["marksheet_pg"]);
			$degree_pg = test_input($_POST["degree_pg"]);
			$percentage_pg = test_input($_POST["percentage_pg"]);
			$university_pg_id = test_input($_POST["university_pg_id"]);

			if (!isset($marksheet_pg)) {
				$errorArray = "Marksheet PG: Please check input field.";
			}
			if (!isset($degree_pg)) {
				$errorArray = "Degree PG: Please check input field.";
			}
			if (!isset($percentage_pg) || empty($percentage_pg)) {
				$errorArray[] = "GATE percentage/cgpa is required.";
			} else {
				if (!preg_match("/^[0-9]{1,}[\.]?[0-9]{0,}$/", $percentage_pg)) {
					$errorArray[] = "GATE percentage can contain only digits and decimal and must begin with a digit.";
				}
			}
			if (!isset($university_pg_id) || empty($university_pg_id)) {
				$errorArray[] = "Graduation University is required.";
			}
		}

		if($catOptions) {
			if (!isset($_POST["cat_score_card"])) {
				$errorArray[] = "CAT Score Card";
			} else if ($_POST["cat_score_card"] == 1) {
				if (empty($_POST["cat_year"])) {
					$errorArray[] = "CAT year is required";
				}
				if (empty($_POST["cat_score"])) {
					$errorArray[] = "CAT score  is required";
				} else {
					if (!preg_match("/^[0-9]{1,}[\.]?[0-9]{0,}$/", $_POST["cat_score"])) {
						$errorArray[] = "CAT percentile can contain only digits and decimal and must begin with a digit.";
					}
				}
			}
		}



		if (count($errorArray) == 0) {
			$status_id = get_status('on');

			$tdob = explode('/', $dob);
			$dob = $tdob[2] . '-' . $tdob[0] . '-' . $tdob[1];
			try {

				$sql = "INSERT INTO `student` (`student_id`, `program_id`, `campus_id`, `date_of_admission`, `photo`, `mime_photo`, `briefcase`, `mime_briefcase`, `first_name`, `middle_name`, `last_name`, `hindi_name`, `enrollment_no`, `dob`, `birth_place`, `category_id`, `sub_category`, `religion_id`, `gender`, `marital_status`, `area`, `blood_group`, `nationality`, `communication_addr`, `comm_city`, `comm_state_id`, `comm_pincode`, `comm_phone_no`, `comm_email`, `father_first_name`, `father_last_name`, `father_profession`, `father_office_addr`, `father_city`, `father_state_id`, `father_pincode`, `father_phone_no`, `father_email`, `mother_first_name`, `mother_last_name`, `mother_profession`, `permanent_addr`, `perm_city`, `perm_state_id`, `perm_pincode`, `perm_phone_no`, `perm_email`, `local_guardian_name`, `local_guardian_addr`, `local_guard_city`, `local_guard_phone_no`, `admission_category_id`, `admit_card`, `jee_rank_card`, `jee_roll_no`, `jee_rank_pos`, `jee_seat_allot_letter`, `marksheet_10`, `cert_10`, `percentage_10`, `board_id_10`, `board_10_passing_state`, `marksheet_12`, `cert_12`, `percentage_12`, `board_id_12`, `board_12_passing_state`, `marksheet_grad`, `degree_grad`, `percentage_grad`, `university_grad_id`, `marksheet_pg`, `degree_pg`, `percentage_pg`, `university_pg_id`, `gate_score_card`, `gate_year`, `gate_score`, `cat_score_card`, `cat_year`, `cat_score`, `tc`, `character_cert`, `caste_cert`, `ph_cert`, `passport`, `passport_no`, `validity_period`, `mcaip`, `DASA`, `remark`, `anti_rag_st`, `anti_rag_pr`, `med_cert`, `muslim_minority`, `other_minority`, `admission_letter`, `status_id`, `log_id`, `sem_code`, `year`, `section`, `aadhaar`, `hostel_no`, `hostel_room`, `dasa_country`) 
					VALUES 
					(:student_id,:program_id,:campus_id,:date_of_admission,:photo,:mime_photo,:briefcase,:mime_briefcase,:first_name,:middle_name,:last_name,:hindi_name,:enrollment_no,:dob,:birth_place,:category_id,:sub_category,:religion_id,:gender,:marital_status,:area,:blood_group,:nationality,:communication_addr,:comm_city,:comm_state_id,:comm_pincode,:comm_phone_no,:comm_email,:father_first_name,:father_last_name,:father_profession,:father_office_addr,:father_city,:father_state_id,:father_pincode,:father_phone_no,:father_email,:mother_first_name,:mother_last_name,:mother_profession,:permanent_addr,:perm_city,:perm_state_id,:perm_pincode,:perm_phone_no,:perm_email,:local_guardian_name,:local_guardian_addr,:local_guard_city,:local_guard_phone_no,:admission_category_id,:admit_card,:jee_rank_card,:jee_roll_no,:jee_rank_pos,:jee_seat_allot_letter,:marksheet_10,:cert_10,:percentage_10,:board_id_10,:board_10_passing_state,:marksheet_12,:cert_12,:percentage_12,:board_id_12,:board_12_passing_state,:marksheet_grad,:degree_grad,:percentage_grad,:university_grad_id,:marksheet_pg,:degree_pg,:percentage_pg,:university_pg_id,:gate_score_card,:gate_year,:gate_score,:cat_score_card,:cat_year,:cat_score,:tc,:character_cert,:caste_cert,:ph_cert,:passport,:passport_no,:validity_period,:mcaip,:DASA,:remark,:anti_rag_st,:anti_rag_pr,:med_cert,:muslim_minority,:other_minority,:admission_letter,:status_id,:log_id,:sem_code,:year,:section,:aadhaar,:hostel_no,:hostel_room,:dasa_country)";

				$ac_on = "Entered a new student with enrollment_no " . $enrollment_no;
				$s_i = $_SESSION['staff_id'];
				$r = $_SESSION['rank'];
				$tn = 'student';

				$log_id = log_procedure($s_i, $r, $sql, $ac_on, $conn, $tn);

				$sql = "INSERT INTO `student` (`student_id`, `program_id`, `campus_id`, `date_of_admission`, `photo`, `mime_photo`, `briefcase`, `mime_briefcase`, `first_name`, `middle_name`, `last_name`, `hindi_name`, `enrollment_no`, `dob`, `birth_place`, `category_id`, `sub_category`, `religion_id`, `gender`, `marital_status`, `area`, `blood_group`, `nationality`, `communication_addr`, `comm_city`, `comm_state_id`, `comm_pincode`, `comm_phone_no`, `comm_email`, `father_first_name`, `father_last_name`, `father_profession`, `father_office_addr`, `father_city`, `father_state_id`, `father_pincode`, `father_phone_no`, `father_email`, `mother_first_name`, `mother_last_name`, `mother_profession`, `permanent_addr`, `perm_city`, `perm_state_id`, `perm_pincode`, `perm_phone_no`, `perm_email`, `local_guardian_name`, `local_guardian_addr`, `local_guard_city`, `local_guard_phone_no`, `admission_category_id`, `admit_card`, `jee_rank_card`, `jee_roll_no`, `jee_rank_pos`, `jee_seat_allot_letter`, `marksheet_10`, `cert_10`, `percentage_10`, `board_id_10`, `board_10_passing_state`, `marksheet_12`, `cert_12`, `percentage_12`, `board_id_12`, `board_12_passing_state`, `marksheet_grad`, `degree_grad`, `percentage_grad`, `university_grad_id`, `marksheet_pg`, `degree_pg`, `percentage_pg`, `university_pg_id`, `gate_score_card`, `gate_year`, `gate_score`, `cat_score_card`, `cat_year`, `cat_score`, `tc`, `character_cert`, `caste_cert`, `ph_cert`, `passport`, `passport_no`, `validity_period`, `mcaip`, `DASA`, `remark`, `anti_rag_st`, `anti_rag_pr`, `med_cert`, `muslim_minority`, `other_minority`, `admission_letter`, `status_id`, `log_id`, `sem_code`, `year`, `section`, `aadhaar`, `hostel_no`, `hostel_room`, `dasa_country`) 
					VALUES 
					(:student_id,:program_id,:campus_id,:date_of_admission,:photo,:mime_photo,:briefcase,:mime_briefcase,:first_name,:middle_name,:last_name,:hindi_name,:enrollment_no,:dob,:birth_place,:category_id,:sub_category,:religion_id,:gender,:marital_status,:area,:blood_group,:nationality,:communication_addr,:comm_city,:comm_state_id,:comm_pincode,:comm_phone_no,:comm_email,:father_first_name,:father_last_name,:father_profession,:father_office_addr,:father_city,:father_state_id,:father_pincode,:father_phone_no,:father_email,:mother_first_name,:mother_last_name,:mother_profession,:permanent_addr,:perm_city,:perm_state_id,:perm_pincode,:perm_phone_no,:perm_email,:local_guardian_name,:local_guardian_addr,:local_guard_city,:local_guard_phone_no,:admission_category_id,:admit_card,:jee_rank_card,:jee_roll_no,:jee_rank_pos,:jee_seat_allot_letter,:marksheet_10,:cert_10,:percentage_10,:board_id_10,:board_10_passing_state,:marksheet_12,:cert_12,:percentage_12,:board_id_12,:board_12_passing_state,:marksheet_grad,:degree_grad,:percentage_grad,:university_grad_id,:marksheet_pg,:degree_pg,:percentage_pg,:university_pg_id,:gate_score_card,:gate_year,:gate_score,:cat_score_card,:cat_year,:cat_score,:tc,:character_cert,:caste_cert,:ph_cert,:passport,:passport_no,:validity_period,:mcaip,:DASA,:remark,:anti_rag_st,:anti_rag_pr,:med_cert,:muslim_minority,:other_minority,:admission_letter,:status_id,:log_id,:sem_code,:year,:section,:aadhaar,:hostel_no,:hostel_room,:dasa_country)";

				$stmt = $conn->prepare($sql);

				$student_id = NULL;
				$date_of_admission = NULL;
				$photo = NULL;
				$mime_photo = 'MIME';
				$briefcase = NULL;
				$mime_briefcase = 'MIME';
				$board_10_passing_state = '1';
				$board_12_passing_state = '1';
				$section = " ";
				$hostel_no = " ";
				$hostel_room = " ";

				$stmt->bindParam(':student_id', $student_id);
				$stmt->bindParam(':program_id', $program_id);
				$stmt->bindParam(':campus_id', $campus_id);
				$stmt->bindParam(':date_of_admission', $date_of_admission);
				$stmt->bindParam(':photo', $photo);
				$stmt->bindParam(':mime_photo', $mime_photo);
				$stmt->bindParam(':briefcase', $briefcase);
				$stmt->bindParam(':mime_briefcase', $mime_briefcase);
				$stmt->bindParam(':first_name', $first_name);
				$stmt->bindParam(':middle_name', $middle_name);
				$stmt->bindParam(':last_name', $last_name);
				$stmt->bindParam(':hindi_name', $hindi_name);
				$stmt->bindParam(':enrollment_no', $enrollment_no);
				$stmt->bindParam(':dob', $dob);
				$stmt->bindParam(':birth_place', $birth_place);
				$stmt->bindParam(':category_id', $category_id);
				$stmt->bindParam(':sub_category', $sub_category);
				$stmt->bindParam(':religion_id', $religion_id);
				$stmt->bindParam(':gender', $gender);
				$stmt->bindParam(':marital_status', $marital_status);
				$stmt->bindParam(':area', $area);
				$stmt->bindParam(':blood_group', $blood_group);
				$stmt->bindParam(':nationality', $nationality);
				$stmt->bindParam(':communication_addr', $communication_addr);
				$stmt->bindParam(':comm_city', $comm_city);
				$stmt->bindParam(':comm_state_id', $comm_state);
				$stmt->bindParam(':comm_pincode', $comm_pincode);
				$stmt->bindParam(':comm_phone_no', $comm_phone_no);
				$stmt->bindParam(':comm_email', $email);
				$stmt->bindParam(':father_first_name', $father_first_name);
				$stmt->bindParam(':father_last_name', $father_last_name);
				$stmt->bindParam(':father_profession', $father_profession);
				$stmt->bindParam(':father_office_addr', $father_office_addr);
				$stmt->bindParam(':father_city', $city2);
				$stmt->bindParam(':father_state_id', $state_id2);
				$stmt->bindParam(':father_pincode', $pincode2);
				$stmt->bindParam(':father_phone_no', $phone_no2);
				$stmt->bindParam(':father_email', $email2);
				$stmt->bindParam(':mother_first_name', $mother_first_name);
				$stmt->bindParam(':mother_last_name', $mother_last_name);
				$stmt->bindParam(':mother_profession', $mother_profession);
				$stmt->bindParam(':permanent_addr', $permanent_addr);
				$stmt->bindParam(':perm_city', $city3);
				$stmt->bindParam(':perm_state_id', $state_id3);
				$stmt->bindParam(':perm_pincode', $pincode3);
				$stmt->bindParam(':perm_phone_no', $phone_no3);
				$stmt->bindParam(':perm_email', $email3);
				$stmt->bindParam(':local_guardian_name', $local_guardian_name);
				$stmt->bindParam(':local_guardian_addr', $local_guardian_addr);
				$stmt->bindParam(':local_guard_city', $city4);
				$stmt->bindParam(':local_guard_phone_no', $phone_no4);
				$stmt->bindParam(':admission_category_id', $admission_category_id);
				$stmt->bindParam(':admit_card', $admit_card);
				$stmt->bindParam(':jee_rank_card', $jee_rank_card);
				$stmt->bindParam(':jee_roll_no', $jee_roll_no);
				$stmt->bindParam(':jee_rank_pos', $jee_rank_pos);
				$stmt->bindParam(':jee_seat_allot_letter', $jee_seat_allot_letter);
				$stmt->bindParam(':marksheet_10', $marsheek_10);
				$stmt->bindParam(':cert_10', $cert_10);
				$stmt->bindParam(':percentage_10', $percentage_10);
				$stmt->bindParam(':board_id_10', $board_id_10);
				$stmt->bindParam(':board_10_passing_state', $board_10_passing_state);
				$stmt->bindParam(':marksheet_12', $marksheet_12);
				$stmt->bindParam(':cert_12', $cert_12);
				$stmt->bindParam(':percentage_12', $percentage_12);
				$stmt->bindParam(':board_id_12', $board_id_12);
				$stmt->bindParam(':board_12_passing_state', $board_12_passing_state);
				$stmt->bindParam(':marksheet_grad', $marksheet_grad);
				$stmt->bindParam(':degree_grad', $degree_grad);
				$stmt->bindParam(':percentage_grad', $percentage_grad);
				$stmt->bindParam(':university_grad_id', $university_grad_id);
				$stmt->bindParam(':marksheet_pg', $marksheet_pg);
				$stmt->bindParam(':degree_pg', $degree_pg);
				$stmt->bindParam(':percentage_pg', $percentage_pg);
				$stmt->bindParam(':university_pg_id', $university_pg_id);
				$stmt->bindParam(':gate_score_card', $gate_score_card);
				$stmt->bindParam(':gate_year', $gate_year);
				$stmt->bindParam(':gate_score', $gate_score);
				$stmt->bindParam(':cat_score_card', $cat_score_card);
				$stmt->bindParam(':cat_year', $cat_year);
				$stmt->bindParam(':cat_score', $cat_score);
				$stmt->bindParam(':tc', $tc);
				$stmt->bindParam(':character_cert', $character_cert);
				$stmt->bindParam(':caste_cert', $caste_cert);
				$stmt->bindParam(':ph_cert', $ph_cert);
				$stmt->bindParam(':passport', $passport);
				$stmt->bindParam(':passport_no', $passport_no);
				$stmt->bindParam(':validity_period', $validity_period);
				$stmt->bindParam(':mcaip', $mcaip);
				$stmt->bindParam(':DASA', $DASA);
				$stmt->bindParam(':remark', $remark);
				$stmt->bindParam(':anti_rag_st', $anti_rag_st);
				$stmt->bindParam(':anti_rag_pr', $anti_rag_pr);
				$stmt->bindParam(':med_cert', $med_cert);
				$stmt->bindParam(':muslim_minority', $muslim_minority);
				$stmt->bindParam(':other_minority', $other_minority);
				$stmt->bindParam(':admission_letter', $admission_letter);
				$stmt->bindParam(':status_id', $status_id);
				$stmt->bindParam(':log_id', $log_id);
				$stmt->bindParam(':sem_code', $sem_code);
				$stmt->bindParam(':year', $year);
				$stmt->bindParam(':section', $section);
				$stmt->bindParam(':aadhaar', $aadhaar);
				$stmt->bindParam(':hostel_no', $hostel_no);
				$stmt->bindParam(':hostel_room', $hostel_room);
				$stmt->bindParam(':dasa_country', $dasa_country);

				$stmt->execute();

				$msg = "The roll number given is $enrollment_no.";

				$tdob = explode('-', $dob);
				$dob = $tdob[1] . '/' . $tdob[2] . '/' . $tdob[0];
			} catch (PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}else{
			$showerr = true;
			$TBS->MergeBlock('errBlock', $errorArray);
		}

	}
}
else if(isset($_SESSION['email']) ){
	$registered_email = $_SESSION['email'];
	try {
		$conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn1->exec("set names 'utf8'");
		$sql  = "select * from student where comm_email = '".$registered_email." ' ";

		$stmt = $conn1->prepare($sql);
		$stmt->execute();

		$result1 = $stmt->fetchAll();

		$count   = $stmt->rowCount();

		if ($count > 0) {
			$result = $result1[0];
		} else {
			$specialError =  "Entry is not found in database";
		}
	}
	catch (PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}


	$mydetails = $result;

	$type  = trim($mydetails['type']);

	$jeeOptions = false;
	$ugOptions  = false;
	$gateOptions  = false;
	$catOptions  = false;
	$pgOptions  = false;

	if(strcmp($type,"B.Tech") == 0){
		$jeeOptions = true;
	} else if(strcmp($type,"M.Tech") == 0){
		$ugOptions = true;
		$gateOptions = true;
	} else if(strcmp($type,"MBA") == 0){
		$ugOptions = true;
		$catOptions = true;
	} else if(strcmp($type,"PhD") == 0){
		$pgOptions = true;
	}

	$program_id = $mydetails['program_id'];
	$aadhaar = $mydetails['aadhaar'];

	$first_name = $mydetails['first_name'];
	$middle_name = $mydetails['middle_name'];
	$last_name = $mydetails['last_name'];
	$hindi_name = $mydetails['hindi_name'];
	$birth_place = $mydetails['birth_place'];
	$category_id = $mydetails['category_id'];
	$sub_category = $mydetails['sub_category'];
	$religion_id = $mydetails['religion_id'];
	$gender = $mydetails['gender'];
	$marital_status = $mydetails['marital_status'];
	$area = $mydetails['area'];
	$blood_group = $mydetails['blood_group'];
	$nationality = $mydetails['nationality'];
	$communication_addr = $mydetails['communication_addr'];
	$comm_city = $mydetails['comm_city'];
	$comm_state_id = $mydetails['comm_state_id'];
	$comm_pincode = $mydetails['comm_pincode'];

	$email = $mydetails["comm_email"];
	$_SESSION['email'] = $email;

	$father_first_name = $mydetails['father_first_name'];
	$father_last_name = $mydetails['father_last_name'];
	$father_profession = $mydetails['father_profession'];
	$father_office_addr = $mydetails['father_office_addr'];
	$city2 = $mydetails['father_city'];
	$state_id2 = $mydetails['father_state_id'];
	$pincode2 = $mydetails['father_pincode'];
	$phone_no2 = $mydetails['father_phone_no'];
	$email2 = $mydetails['father_email'];
	$mother_first_name = $mydetails['mother_first_name'];
	$mother_last_name = $mydetails['mother_last_name'];
	$mother_profession = $mydetails['mother_profession'];
	$permanent_addr = $mydetails['permanent_addr'];
	$city3 = $mydetails['perm_city'];
	$state_id3 = $mydetails['perm_state_id'];
	$pincode3 = $mydetails['perm_pincode'];
	$phone_no3 = $mydetails['perm_phone_no'];
	$email3 = $mydetails['perm_email'];
	$local_guardian_name = $mydetails['local_guardian_name'];
	$loca_guardian_addr = $mydetails['local_guardian_addr'];
	$city4 = $mydetails['local_guard_city'];
	$phone_no4 = $mydetails['local_guard_phone_no'];
	$comm_phone_no = $mydetails['comm_phone_no'];
	$admission_category_id = $mydetails['admission_category_id'];
	$marsheek_10 = $mydetails['marksheet_10'];
	$cert_10 = $mydetails['cert_10'];
	$percentage_10 = $mydetails['percentage_10'];
	$board_id_10 = $mydetails['board_id_10'];
	$marksheet_12 = $mydetails['marksheet_12'];
	$cert_12 = $mydetails['cert_12'];
	$percentage_12 = $mydetails['percentage_12'];
	$board_id_12 = $mydetails['board_id_12'];
	$admit_card = $mydetails['admit_card'];
	$jee_rank_card = $mydetails['jee_rank_card'];
	$jee_roll_no = $mydetails['jee_roll_no'];
	$jee_rank_pos = $mydetails['jee_rank_pos'];
	$jee_seat_allot_letter = $mydetails['jee_seat_allot_letter'];
	$marksheet_grad = $mydetails['marksheet_grad'];
	$degree_grad = $mydetails['degree_grad'];
	$percentage_grad = $mydetails['percentage_grad'];
	$university_grad_id = $mydetails['university_grad_id'];
	$gate_score_card = $mydetails['gate_score_card'];
	$gate_year = $mydetails['gate_year'];
	$gate_score = $mydetails['gate_score'];
	$cat_score_card = $mydetails['cat_score_card'];
	$cat_year = $mydetails['cat_year'];
	$cat_score = $mydetails['cat_score'];
	$marksheet_pg = $mydetails['marksheet_pg'];
	$degree_pg = $mydetails['degree_pg'];
	$percentage_pg = $mydetails['percentage_pg'];
	$university_pg_id = $mydetails['university_pg_id'];
	$tc = $mydetails['tc'];
	$character_cert = $mydetails['character_cert'];
	$caste_cert = $mydetails['caste_cert'];
	$ph_cert = $mydetails['ph_cert'];
	$passport = $mydetails['passport'];
	$passport_no = $mydetails['passport_no'];
	$validity_period = $mydetails['validity_period'];
	$DASA = $mydetails['DASA'];
	$remark = $mydetails['remark'];
	$anti_rag_st = $mydetails['anti_rag_st'];
	$med_cert = $mydetails['med_cert'];
	$muslim_minority = $mydetails['muslim_minority'];
	$other_minority = $mydetails['other_minority'];
	$admission_letter = $mydetails['admission_letter'];
	$dob = $mydetails["dob"];
	$tdob = explode('-', $dob);
	$dob = $tdob[1] . '/' . $tdob[2] . '/' . $tdob[0];
}



$query_program = "SELECT program_id, program_code, program_name FROM program where program_type = '" . $type . "'";
$blood_groups = array('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'NA');
$TBS->MergeBlock('bloodgroupBlk', $blood_groups);

$TBS->MergeBlock('genderBlk', array('Male', 'Female', 'Other'));

$TBS->MergeBlock('board12Blk, board10Blk', $conn, 'SELECT * from board');
$TBS->MergeBlock('program', $conn, $query_program);
$TBS->MergeBlock('religion', $conn, 'SELECT * FROM religion');
$TBS->MergeBlock('category , acategoryblk', $conn, 'SELECT * FROM category');
$TBS->MergeBlock('campus', $conn, 'SELECT * FROM campus');
$TBS->MergeBlock('universityBlk, PGUniversityBlk', $conn, 'SELECT * FROM universities');
$TBS->MergeBlock('state, state2, state3', $conn, 'SELECT * FROM state');
$TBS->MergeBlock('sem_code_description', $conn, 'SELECT * FROM sem_code_description');
$TBS->Show();
?>

<?php

	include_once('../../includes/include.php');

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$TBS = new clsTinyButStrong;
	$TBS->LoadTemplate('general_misc_registration.html'); 

	$success = "";
	$msg_err = "";

	if (!isset($_POST)) {
		$_POST = &$HTTP_POST_VARS;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		foreach($_POST as $k=>$v) {
		
			if(isset($_POST[$k])) {
				$_POST[$k] = filter_var($v,FILTER_SANITIZE_STRING);
			}
		}

		if (isset($_POST['table_name']) && isset($_POST['name'])) {

			if (empty($_POST['name'])) {

				$msg_err = "Name should not be empty.";
			
			} else {
				
				try {
					
					$table_name = $_POST['table_name'];
					$name = $_POST['name'];

					if ($table_name == 'sem_code_description') {
						
						$status_id = get_status('on');
						
						$sql = "INSERT INTO $table_name VALUES (NULL, '$name', 'LOG_ID', '$status_id')";
			  			
						$ac_on = "Inserted a new ".$table_name;
			            $s_i = $_SESSION['staff_id'];
			            $r = $_SESSION['rank'];
			           	$tn = $table_name;

			           	$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);

						$sql = "INSERT INTO $table_name VALUES (NULL, '$name', '$status_id', '$log_id')";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':name', $name);
            			$stmt->bindParam(':log_id', $log_id);
            			$stmt->bindParam(':status_id', $status_id);
						
					} else {
						
						$status_id = get_status('on');

						$sql = "INSERT INTO $table_name VALUES (NULL, '$name', '$status_id', 'LOG_ID')";
			  			
						$ac_on = "Inserted a new ".$table_name;
			            $s_i = $_SESSION['staff_id'];
			            $r = $_SESSION['rank'];
			           	$tn = $table_name;

			           	$log_id = log_procedure($s_i,$r,$sql,$ac_on,$conn,$tn);

						$sql = "INSERT INTO $table_name VALUES (NULL, '$name', '$status_id', '$log_id')";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':table_name', $table_name);
            			$stmt->bindParam(':name', $name);
            			$stmt->bindParam(':log_id', $log_id);
			
					}

					$stmt->execute();

					$success = "Success";

				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();	
				}				
			}
		}
	}

	$TBS->Show();

?>

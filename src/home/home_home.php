
<?php

include_once('../../includes/include.php');


$rank = $_SESSION['rank'];


if($rank >= 100 ) {
	$msg = "\nWelcome Director";
} else if(($rank == 75)) {
	$msg = "\nWelcome Dean";
}  else if(($rank == 76)) {
	$msg = "\nWelcome DR";
}  else if(($rank == 61)) {
	$msg = "\nWelcome AR";
} else if (($rank == 60)) {
	$msg = "\nWelome Faculty Incharge";
} else if (($rank == 48)) {
	$msg = "\nWelcome Temporary AR";
} else {
	$msg = "\nWelcome Staff";
}

function getStat($action, $onlineConnection)
{
	$sqlQuery = $onlineConnection->prepare("SELECT status from admin  where action = :action ORDER by timestamp DESC");
	$sqlQuery->bindParam(':action', $action, PDO::PARAM_STR);
	$sqlQuery->execute();
	if ($sqlQuery->rowCount() > 0) {
		$result = $sqlQuery->fetchAll()[0];
		return $result[0];
	} else {
		return 0;
	}
}
function get_reg_status($onlineConnection)
{
	$btech_status = getStat("btech_reg", $onlineConnection);
	$mtech_status = getStat("mtech_reg", $onlineConnection);
	$mba_status = getStat("mba_reg", $onlineConnection);
	$phd_status = getStat("phd_reg", $onlineConnection);

	$current_status = "";
	if ($btech_status == 1) {
		$current_status = " B.Tech";
	}
	if ($mtech_status == 1) {
		if (empty($current_status)) {
			$current_status = " M.Tech";
		} else {
			$current_status = $current_status . ", M.Tech";
		}
	}
	if ($mba_status == 1) {
		if (empty($current_status)) {
			$current_status = " MBA";
		} else {
			$current_status = $current_status . ", MBA";
		}
	}
	if ($phd_status == 1) {
		if (empty($current_status)) {
			$current_status = " PhD";
		} else {
			$current_status = $current_status . ", PhD";
		}
	}

	return $current_status;
}
try{
	$onlineConnection = get_conn_fedratecd();
	if($onlineConnection) {
		$current_status = get_reg_status($onlineConnection);

		$status = "";
		if (empty($current_status)) {
			$status = "Registrations are closed.";
		} else {
			$status = "Registrations for " . $current_status . " are active.";
		}
	}
}catch(Exception $e){
	$status = "Online server connection needs attention!!";
}
$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('home_home.html'); 
$TBS->Show();
?>

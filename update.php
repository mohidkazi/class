<?php 
require("config.php");
// update faculty
if (isset($_POST['faculty-submit'])) {
	$firstname = secure($_POST['firstname']);
	$lastname = secure($_POST['lastname']);
	$contact = secure($_POST['contact']);
	$email = secure($_POST['email']);
	$address = secure($_POST['address']);
	$qualification = secure($_POST['qualification']);
	$experience = secure($_POST['experience']);
	// $picture = secure($_POST['picture']);
	$about = secure($_POST['about']);
	$doj = secure($_POST['doj']);
	$id = secure($_GET['fid']);

	$string = "UPDATE `faculty` SET `F_fname`='$firstname',`F_lname`='$lastname',`F_contact`='$contact',`F_email`='$email',`F_address`='$address',`F_qualification`='$qualification',`F_experience`='$experience',`F_picture`='',`F_about`='$about',`F_DOJ`='$doj' WHERE `F_ID`=$id AND D_flag=0";
	$temp = $sql->query($string);
	if ($temp) {
		header("location:faculty.php?update-success");
	}
	else{
		header("location:faculty.php?update-failed");
	}
}

// update batch
if (isset($_POST['batch-submit'])) {
	$name = secure($_POST['name']);
	$venue = secure($_POST['venue']);
	$fees = secure($_POST['fees']);
	$fid = secure($_POST['id']);
	$startdate = secure($_POST['startdate']);
	$enddate = secure($_POST['enddate']);
	$duration = secure($_POST['duration']);
	$status = secure($_POST['status']);
	$id = secure($_GET['bid']);
	$string = "UPDATE `batch` SET `B_name`='$name',`B_venue`='$venue',`B_fees`='$fees',`B_F_ID`='$fid',`B_startdate`='$startdate',`B_enddate`='$enddate',`B_duration`='$duration',`B_status`='$status' WHERE `B_ID`=$id AND D_flag=0";
	$temp = $sql->query($string);
	if ($temp) {
		header("location:batch.php?update-success");
	}
	else{
		header("location:batch.php?update-failed");
	}
}

// update support staff
if (isset($_POST['ss-submit'])) {
	$firstname = SECURE($_POST['firstname']);
	$lastname = SECURE($_POST['lastname']);
	$contact = SECURE($_POST['contact']);
	$email = SECURE($_POST['email']);
	$address = SECURE($_POST['address']);
	$doj = SECURE($_POST['doj']);
	$id = SECURE($_GET['ssid']);

	$string = "UPDATE `supportstaff` SET `SS_fname`='$firstname',`SS_lname`='$lastname',`SS_contact`='$contact',`SS_email`='$email',`SS_address`='$address',`SS_DOJ`='$doj' WHERE `SS_ID`=$id AND D_flag=0";
	$temp = $sql->query($string);
	if($temp){
		header("location:staff.php?update-success");
	}
	else{
		header("location:staff.php?update-failed");
	}
}

//update admission table
if (isset($_POST['adm-submit'])) {
	$fees = secure($_POST['fees']);
	$date = secure($_POST['date']);
	$status = secure($_POST['status']);
	$id = secure($_GET['admid']);

	$string = "UPDATE `admission` SET `A_fees`='$fees',`A_date`='$date' WHERE `A_ID`=$id AND D_flag=0";
	$temp = $sql->query($string);
	if($temp){
		header("location:admission.php?update-success");
	}
	else{
		header("location:admission.php?update-failed");
	}
}

// update expense table
if (isset($_POST['exp-submit'])) {
	$eid = secure($_GET['eid']);
	$reason = secure($_POST['reason']);
	$amount = secure($_POST['amount']);

	$string = "UPDATE `expense` SET `E_reason`='$reason',`E_amount`='$amount' WHERE `E_ID`=$eid";
	$temp = $sql->query($string);
	if ($temp) {
		header("location:expense.php?update-success");
	}
	else{
		header("location:expense.php?update-failed");
	}
}
?>


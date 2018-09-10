<?php 
require("config.php");
// update faculty
if (isset($_POST['faculty-submit'])) {
	$firstname = secure($_POST['firstname']);
	$lastname = secure($_POST['lastname']);
	$contact = secure($_POST['contact']);
	$email = secure($_POST['email']);
	$address = secure($_POST['address']);
	$qualification = secure($_POST['quali']);
	$description = secure($_POST['description']);
	$id = secure($_GET['fid']);

	$string = "UPDATE `faculty` SET `firstname`='$firstname',`lastname`='$lastname',`contact`='$contact',`email`='$email',`address`='$address',`qualification`='$qualification',`description`='$description' WHERE id=$id ";
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
	$fid = secure($_POST['fid']);
	$startdate = secure($_POST['startdate']);
	$enddate = secure($_POST['enddate']);
	$duration = secure($_POST['duration']);
	$status = secure($_POST['status']);
	$id = secure($_GET['bid']);
	$string = "UPDATE `batch` SET `name`='$name',`venue`='$venue',`fees`='$fees',`fid`='$fid',`startdate`='$startdate',`enddate`='$enddate',`duration`='$duration',`status`='$status' WHERE id=$id ";
	$temp = $sql->query($string);
	if ($temp) {
		header("location:batch.php?update-success");
	}
	else{
		header("location:batch.php?update-failed");
	}
}
?>
<?php
require("config.php");
	// delete faculty
if(isset($_GET['fid'])){
	$id=secure($_GET['fid']);
	$string = "DELETE FROM `faculty` WHERE `F_ID`=$id";
	$temp=$sql->query($string);
	header("location:faculty.php?del-success");
}
	// delete batch
if(isset($_GET['bid'])){
	$id = secure($_GET['bid']);
	$string = "DELETE FROM `batch` WHERE `B_ID`=$id";
	$temp = $sql->query($string);
	header("location:batch.php?del-success");
}

//delete support staff
if (isset($_GET['ssid'])) {
	$id = secure($_GET['ssid']);
	$string = "DELETE FROM `supportstaff` WHERE `SS_ID`=$id";
	$temp = $sql->query($string);
	header("location:staff.php?del-success");
}

//delete admission
if (isset($_GET['admid'])) {
	$id = secure($_GET['admid']);
	$string = "DELETE FROM `admission` WHERE `A_ID`=$id";
	$temp = $sql->query($string);
	header("location:admission.php?del-success");
}

//delete student
if(isset($_GET['sid'])){
	$id = secure($_GET['sid']);
	$string = "DELETE FROM `student` WHERE `S_ID`=$id";
	$temp = $sql->query($string);
	header("location:student.php?del-success");
}
?>
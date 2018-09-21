<?php 
require("config.php");
	//delete faculty
	if (isset($_GET['fid'])) {
		$id = secure($_GET['fid']);
		$string = "UPDATE `faculty` SET `D_flag`=1 WHERE F_ID=$id";
		$temp = $sql->query($string);
		header("location:faculty.php?del-success");
	}
	//delete batch
	if (isset($_GET['bid'])) {
		$id = secure($_GET['bid']);
		$string = "UPDATE `batch` SET `D_flag`=1 WHERE B_ID=$id";
		$temp = $sql->query($string);
		header("location:batch.php?del-success");
	}
	//delete support staff
	if (isset($_GET['ssid'])) {
		$id = secure($_GET['ssid']);
		$string = "UPDATE `supportstaff` SET `D_flag`=1 WHERE SS_ID=$id";
		$temp = $sql->query($string);
		header("location:staff.php?del-success");
	}
	//delete student
	if (isset($_GET['aid'])) {
		$id = secure($_GET['aid']);
		$string = "UPDATE `admission` SET `D_flag`=1 WHERE A_ID=$id";
		$temp = $sql->query($string);
		header("location:admission.php?del-success");
	}
	//delete expense table
	if (isset($_GET['eid'])) {
		$id = secure($_GET['eid']);
		$string = "UPDATE `expense` SET `D_flag`=1 WHERE E_ID=$id";
		$temp = $sql->query($string);
		header("location:expense.php?del-success");
	}
	//delete test marks
	if (isset($_GET['tmid'])) {
		$id = secure($_GET['tmid']);
		$string = "UPDATE `testmarks` SET `D_flag`=1 WHERE Test_ID=$id";
		$temp = $sql->query($string);
		header("location:testmark.php?del-success");
	}
 ?>
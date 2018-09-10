<?php
require("config.php");
	// delete faculty
if(isset($_GET['fid'])){
	$id=secure($_GET['fid']);

	$string = "DELETE FROM `faculty` WHERE `id`='$id'";
	$temp=$sql->query($string);
	header("location:faculty.php?del-success");
}
	// delete batch
if(isset($_GET['bid'])){
	$id = secure($_GET['bid']);
	$string = "DELETE FROM `batch` WHERE `id`=$id";
	$temp = $sql->query($string);
	header("location:batch.php?del-success");
}
?>
<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- add new batch -->
<form action="add-batch.php" method="post">
	<div class="form-group">
		<input type="text" name="name" placeholder="Name" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="venue" placeholder="Venue" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="num" name="fees" placeholder="Fees" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="fid" placeholder="fid" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="date" name="startdate" placeholder="Start Date" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="date" name="enddate" placeholder="End Date" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="duration" placeholder="Duration" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="status" placeholder="Status" class="col-sm-6">
	</div>
	<button class="btn btn-success" name="add-batch-submit">Submit</button>
</form>
<?php  
if(isset($_POST['add-batch-submit'])){
	$name = secure($_POST['name']);
	$venue = secure($_POST['venue']);
	$fees = secure($_POST['fees']);
	$fid = secure($_POST['fid']);
	$startdate = secure($_POST['startdate']);
	$enddate = secure($_POST['enddate']);
	$duration = secure($_POST['duration']);
	$status = secure($_POST['status']);

	$string ="INSERT INTO `batch`(`name`, `venue`, `fees`, `fid`, `startdate`, `enddate`, `duration`, `status`) VALUES ('$name','$venue','$fees','$fid','$startdate','$enddate','$duration','$status')";
	$temp = $sql->query($string);
	if($temp){
		echo "<div>insert successful</div>";
	}
	else{
		echo "<scrip>alert('insert failed');</script>";
	}
}
?>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#addbatch , #dbatch').addClass('active');
	});

</script>
</body>
</html>
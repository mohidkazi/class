<?php
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php if (isset($_GET['failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FF7F7F; color: #FA0404; border-color: red;text-align: center;"><div class="card-body">Failed To Add Batch</div></div></div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class="card-body">Batch Added Successfully</div></div></div>
<?php } ?>
<!-- add new batch -->
<div class="container">
	<form action="add-batch.php" method="post">
		<div class="form-row">
			<div class="form-group col-sm-6">
				<label for="name">Name<code>*</code></label>
				<input type="text" class="form-control" id="name"  placeholder="Batch Name" name="name">
			</div>
			<div class="form-group col-sm-6">
				<label for="venue">Venue<code>*</code></label>
				<input type="text" class="form-control" id="venue" placeholder="Venue" name="venue">
			</div>
			<div class="form-group col-sm-6">
				<label for="fees">Fees<code>*</code></label>
				<input type="number" class="form-control" id="fees" placeholder="Fees" name="fees">
			</div>
			<div class="form-group col-sm-6">
				<label for="fid">ID<code>*</code></label>
				<input type="text" class="form-control" id="fid" placeholder="ID" name="id">
			</div>
			<div class="form-group col-sm-6">
				<label for="Date">Start Date<code>*</code></label>
				<input type="date" class="form-control" id="Date" name="startdate">
			</div>
			<div class="form-group col-sm-6">
				<label for="Date">End Date<code>*</code></label>
				<input type="date" class="form-control" id="Date" name="enddate">
			</div>
			<div class="form-group col-sm-6">
				<label for="dur">Duration<code>*</code></label>
				<input type="text" class="form-control" id="dur" placeholder="Duration" name="duration">
			</div>
			<div class="form-group col-sm-6">
				<label for="status">Status<code>*</code></label>
				<input type="number" class="form-control" id="status" placeholder="Status" name="status">
			</div>
		</div>
		<div class="form-row justify-content-center">
			<button class="btn btn-primary" name="add-batch-submit" type="submit">Submit</button>
		</div>
	</form>
</div>
<?php  
if(isset($_POST['add-batch-submit'])){
	$name = secure($_POST['name']);
	$venue = secure($_POST['venue']);
	$fees = secure($_POST['fees']);
	$fid = secure($_POST['id']);
	$startdate = secure($_POST['startdate']);
	$enddate = secure($_POST['enddate']);
	$duration = secure($_POST['duration']);
	$status = secure($_POST['status']);
	$string = "INSERT INTO `batch`(`B_name`, `B_venue`, `B_fees`, `B_F_ID`, `B_startdate`, `B_enddate`, `B_duration`, `B_status`) VALUES ('$name','$venue','$fees','$fid','$startdate','$enddate','$duration','$status')";
	$temp = $sql->query($string);
	if($temp){
		header("location:add-batch.php?success");
	}
	else{
		header("location:add-batch.php?failed");
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
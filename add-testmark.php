<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php if (isset($_GET['wrong'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">student name or batch name incorrect</div></div></div>
<?php } ?>
<?php if (isset($_GET['failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Failed To Insert Details</div></div></div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class="card-body">Details Inserted Successfully</div></div></div>
<?php } ?>
<!-- right side content -->
<div class="container">
	<div class="row mb-1 mx-0">
		<div class="col-sm-3 col-md-4">
			<h2>Add Details:-</h2>
		</div>
	</div>
	<form action="" method="post">
		<div class="row mx-0">
			<div class="form-group col-sm-4">
				<label for="bname">Batch Name</label>
				<!-- <input type="text" class="form-control" id="bname" placeholder="Batch Name" name="batchname"> -->
				<select name="batchname" id="bname" class="form-control">
					<option value="">Batch Name</option>
					<?php
					$string = "SELECT * FROM `batch` WHERE D_flag=0";
					$temp = $sql->query($string);
					while($demo = $temp->fetch_row()){
						echo "<option value='$demo[0]'> $demo[1]</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="row mx-0">
			<div class="form-group col-sm-6 col-md-4">
				<label for="roll">Roll No</label>
				<input type="text" class="form-control" id="roll" aria-describedby="emailHelp" placeholder="Roll Number" name="rollno">
			</div>
			
			<div class="form-group col-sm-6 col-md-4">
				<label for="tm">Test Marks</label>
				<input type="text" class="form-control" id="tm" placeholder="Test Marks" name="marks">
			</div>
			<div class="form-group col-sm-6 col-md-4">
				<label for="tt">Test Type</label>
				<input type="text" class="form-control" id="tt" placeholder="Test Type" name="testtype">
			</div>
			<div class="form-group col-sm-6 col-md-4">
				<label for="c">Comment</label>
				<input type="text" class="form-control" id="c" placeholder="Comment" name="testcomment">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="form-group">
				<button type="submit" name="add-test-submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
</div>
<?php 
if (isset($_POST['add-test-submit'])) {
	$rollno = secure($_POST['rollno']);
	$batchname = secure($_POST['batchname']);
	$marks = secure($_POST['marks']);
	$testtype = secure($_POST['testtype']);
	$testcomment = secure($_POST['testcomment']);

	$string = "SELECT admission.A_ID FROM ((`admission` INNER JOIN `batch` ON batch.B_name='$batchname' AND batch.B_ID=admission.A_B_ID) INNER JOIN `student` ON student.S_Roll='$rollno' AND student.S_ID=admission.A_S_ID)";
	$temp = $sql->query($string);
	if ($demo = $temp->fetch_row()) {

		$string1 = "INSERT INTO `testmarks`(`Test_A_ID`, `Test_Marks`, `Test_Type`, `Test_Comment`) VALUES ('$demo[0]','$marks','$testtype','$testcomment')";
		$temp1 = $sql->query($string1);
		if ($temp1) {
			header("location:add-testmark.php?success");
		}
		else{
			header("location:add-testmark.php?failed");
		}
	}
	else{
		header("location:add-testmark.php?wrong");
	}
}
?>

</div>
</div>
<script>
	$(document).ready(function(){
		$('#addtestmark , #dstudent').toggleClass('active');
	});
</script>
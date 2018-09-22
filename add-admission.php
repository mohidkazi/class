<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<?php if (isset($_GET['wrong'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FF7F7F; color: #FA0404; border-color: red;text-align: center;"><div class="card-body">Student Name or Batch Name Incorrect</div></div></div>
<?php } ?>
<?php if (isset($_GET['failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FF7F7F; color: #FA0404; border-color: red;text-align: center;"><div class="card-body">Failed To Insert Details</div></div></div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class="card-body">Details Inserted Successfully</div></div></div>
<?php } ?>
<!-- page content on right side -->
<div class="container">
	<form action="add-admission.php" method="post">
		<div class="row">
			<div class="form-group col-sm-6">
				<label for="stu">Student Name<code>*</code></label>
				<input type="text" class="form-control" id="stu"  placeholder="First Name" name="firstname">
			</div>
			<div class="form-group col-sm-6">
				<label for="stu1"><code>*</code></label>
				<input type="text" class="form-control" id="stu1"  placeholder="Last Name" name="lastname">
			</div>
			<div class="form-group col-sm-3">
				<label for="bat">Batch Name<code>*</code></label>
				<input type="text" class="form-control" id="bat" placeholder="Batch ID" name="batch_name">
			</div>
			<div class="form-group col-sm-3">
				<label for="fees">Fees<code>*</code></label>
				<input type="number" class="form-control" id="fees" placeholder="Fees" name="fees">
			</div>
			<div class="form-group col-sm-3">
				<label for="date">Date<code>*</code></label>
				<input type="date" class="form-control" id="date" name="date">
			</div>
			<div class="form-group col-sm-3">
				<label for="stat">Status<code>*</code></label>
				<input type="text" class="form-control" id="stat"  placeholder="Status" name="status">
			</div>
		</div>
		<div class="row justify-content-center">
			<button type="submit" class="btn btn-primary" name="adm-submit">Submit</button>
		</div>
	</form>
</div>
<?php 
if (isset($_POST['adm-submit'])) {
	$firstname = secure($_POST['firstname']);
	$lastname = secure($_POST['lastname']);
	$batch_name = secure($_POST['batch_name']);
	$fees = secure($_POST['fees']);
	$date = secure($_POST['date']);
	$status = secure($_POST['status']);
	if ($status = 'Ongoing' OR $status = 'ongoing' OR $status = 'on' OR $status = 'started') {
		$status = 1;
		$str1 = "SELECT S_ID FROM student WHERE S_fname='$firstname' AND S_lname='$lastname' AND D_flag=0";
		$temp1 = $sql->query($str1);
		$str2 = "SELECT B_ID FROM batch WHERE B_name='$batch_name' AND D_flag=0";
		$temp2 = $sql->query($str2);
		if ($demo2 = $temp2->fetch_row() AND $demo1 = $temp1->fetch_row()) {

			$string = "INSERT INTO `admission` (`A_S_ID`, `A_B_ID`, `A_fees`, `A_date`, `A_status`) VALUES ('$demo1[0]','$demo2[0]','$fees','$date','$status')";
			$temp = $sql->query($string);
			if($temp){
				header("location:add-admission.php?success");
			}
			else{
				header("location:add-admission.php?failed");
			}
		}
		else{
			header("location:add-admission.php?wrong");
		}
	}
}
?>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#addadmission , #dadmission').addClass('active');
	});

</script>
</body>
</html>
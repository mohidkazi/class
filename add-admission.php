<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>

<?php if (isset($_GET['wrong'])) {
	?>
	<div class="container">
		<div class="row justify-content-center"><div class="card mb-2 col-sm-4 mx-0" style="background-color: #ff6666; color: red; border-color: red;text-align: center;"><div class="card-body">student name or batch name incorrect!!!</div></div></div>
	<?php } ?>
	<!-- page content on right side -->
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
				<input type="number" class="form-control" id="stat"  placeholder="Status" name="status">
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

	$str1 = "SELECT S_ID FROM student WHERE S_fname='$firstname' AND S_lname='$lastname'";
	$temp1 = $sql->query($str1);
	$str2 = "SELECT B_ID FROM batch WHERE B_name='$batch_name'";
	$temp2 = $sql->query($str2);
	if ($demo2 = $temp2->fetch_row() AND $demo1 = $temp1->fetch_row()) {
		$fees = secure($_POST['fees']);
		$date = secure($_POST['date']);
		$status = secure($_POST['status']);

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
?>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#addadmission').addClass('active');
	});

</script>
</body>
</html>
<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php if (isset($_GET['wrong'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Student Name or Batch Name Incorrect</div></div></div>
<?php } ?>
<?php if (isset($_GET['failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Failed To Insert Details</div></div></div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class="card-body">Details Inserted Successfully</div></div></div>
<?php } ?>
<!-- page content on right side -->
<div class="container">
	<div class="row mb-1 mx-0">
		<div class="col-sm-3 col-md-4">
			<h2>Add Details:-</h2>
		</div>
	</div>
	<form action="add-admission.php" method="post">
		<div class="row">
			<?php
			if (isset($_GET['sid'])) {
				$sid = secure($_GET['sid']);
				$string = "SELECT * FROM `student` WHERE S_ID=$sid";
				$temp = $sql->query($string);
				while($demo = $temp->fetch_row()){
					?>
					<div class="form-group col-sm-6">
						<label for="stu">Student Name<code>*</code></label>
						<input type="text" class="form-control" id="stu"  placeholder="First Name" name="firstname" value="<?php echo $demo[2]; ?>">
					</div>
					<div class="form-group col-sm-6 mt-4 pt-2">
						<input type="text" class="form-control" id="stu1"  placeholder="Last Name" name="lastname" value="<?php echo $demo[3]; ?>">
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="form-group col-sm-6">
					<label for="stu">Student Name<code>*</code></label>
					<input type="text" class="form-control" id="stu"  placeholder="First Name" name="firstname">
				</div>
				<div class="form-group col-sm-6 mt-4 pt-2">
					<input type="text" class="form-control" id="stu1"  placeholder="Last Name" name="lastname">
				</div>
				<?php
			}
			?>

			
			<div class="form-group col-sm-4">
				<label for="bat">Batch Name<code>*</code></label>
				
				<select multiple="multiple" class="form-control" name="batch_name[]" id="bat">
					<option value="">Batch Name</option>
					<?php
					$string = "SELECT * FROM `batch` WHERE D_flag=0";
					$temp = $sql->query($string);
					while($demo = $temp->fetch_row()){
						?>
						<option value="<?php echo $demo[0]; ?>"><?php echo $demo[1]; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label for="fees">Fees<code>*</code></label>
				<input type="number" class="form-control" id="fees" placeholder="Fees" name="fees">
			</div>
			<div class="form-group col-sm-4">
				<label for="date">Date<code>*</code></label>
				<input type="date" class="form-control" id="date" name="date">
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
	$batch_name = $_POST['batch_name'];
	$fees = secure($_POST['fees']);
	$date = secure($_POST['date']);

	foreach ($batch_name as $bn) {
		

		$str1 = "SELECT S_ID FROM student WHERE S_fname='$firstname' AND S_lname='$lastname' AND D_flag=0";
		$temp1 = $sql->query($str1);
		if ($demo1 = $temp1->fetch_row()) {

			$string = "INSERT INTO `admission` (`A_S_ID`, `A_B_ID`, `A_fees`, `A_date`) VALUES ('$demo1[0]','".mysqli_real_escape_string($sql, $bn)."','$fees','$date')";
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
	$(document).ready(function(){
		$('#addadmission , #dadmission').addClass('active');

	});

</script>
</body>
</html>
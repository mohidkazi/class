<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- page content on right side -->

<form action="add-faculty.php" method="post">
	<div class="form-group">
		<input type="text" name="firstname" placeholder="First Name" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="lastname" placeholder="Last Name" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="contact" placeholder="Contact" class="col-sm-6">
	</div>
	<div class="form-group">
		<input type="text" name="email" placeholder="E-mail" class="col-sm-6">
	</div>
	<div class="form-group">
		<textarea name="address" id="" cols="30" rows="3" placeholder="Address" class="col-sm-6"></textarea>
	</div>
	<div class="form-group">
		<label for="qualiii">qualification</label>
		<select class="form-control col-sm-4" name="quali" id="qualiii">
			<option value="">be</option>
			<option value="">me</option>
			<option value="">mtech</option>
			<option value="">mba</option>
			<option value="">phd</option>
		</select>
	</div>
	<div class="form-group">
		<input type="text" name="description" placeholder="Description" class="col-sm-6">
	</div>
	<button class="btn btn-info justify-content-center" type="submit" name="faculty-submit">Submit</button>
</form>
<?php 
if(isset($_POST['faculty-submit'])){
	$firstname = secure($_POST['firstname']);
	$lastname = secure($_POST['lastname']);
	$contact = secure($_POST['contact']);
	$email = secure($_POST['email']);
	$address = secure($_POST['address']);
	$qualification = secure($_POST['quali']);
	$description = secure($_POST['description']);

	$string = "INSERT INTO `faculty`(`firstname`, `lastname`, `contact`, `email`, `address`, `qualification`, `description`) VALUES ('$firstname','$lastname','$contact','$email','$address','$qualification','$description')";
	$temp = $sql->query($string);
	if ($temp) {
		# code...
	}
	// if($temp){header("location:add-faculty.php?success");}
	// else{header("location:add-faculty.php?failed");}
}
?>

<?php /* if(isset($_GET['success'])){echo "<div class='card text-center'><div class='card-header'>Faculty</div><div class='card-body'> $temp[firstname] $temp[lastname] added into the system</div><div class='card-footer'></div></div>";}
if(isset($_GET['failed'])){echo "<div class='card bg-success'>could not add faculty into the system</div>";}*/ ?>

</div>
</div>
<script>
	$(document).ready(function(){
		$('#addfaculty , #dfaculty').addClass('active');
	});
</script>
</body>
</html>
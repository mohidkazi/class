<?php
ob_start();
require("config.php");
include("sidebar.php");
?>
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
	<form action="add-faculty.php" method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="fname1">First Name<code>*</code></label>
				<input type="text" class="form-control" id="fname1" placeholder="First Name" name="firstname">
			</div>
			<div class="form-group col-md-6">
				<label for="lname1">Last Name<code>*</code></label>
				<input type="texte" class="form-control" id="lname1" placeholder="Last Name" name="lastname">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="contact1">Contact<code>*</code></label>
				<input type="tel" class="form-control" id="contact1" placeholder="Contact" name="contact">
			</div>
			<div class="form-group col-md-6">
				<label for="InputEmail1">Email address<code>*</code></label>
				<input type="email" class="form-control" id="InputEmail1" placeholder="Enter email" name="email">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="add1">Address<code>*</code></label>
				<textarea class="form-control" id="add1" rows="3" placeholder="Address" name="address"></textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="exampleFormControlSelect1">Qualification<code>*</code></label>
				<select class="form-control" id="exampleFormControlSelect1" name="qualification">
					<option value="">select</option>
					<option value="B.E">B.E</option>
					<option value="BTech">BTech</option>
					<option value="M.E">M.E</option>
					<option value="M.Tech">M.Tech</option>
					<option value="MBA">MBA</option>
					<option value="PhD">PhD</option>
					<option value="BSc(IT)">BSc(IT)</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="pic">Picture</label>
				<input type="file" class="form-control-file" id="pic" name="file" accept=".jpeg,.jpg,.png">
			</div>
			<div class="form-group col-md-6">
				<label for="exp1">Experience<code>*</code></label>
				<input type="text" class="form-control" id="exp1" placeholder="Experience" name="experience">
			</div>
			<div class="form-group col-md-6">
				<label for="about1">About</label>
				<input type="text" class="form-control" id="about1" placeholder="About" name="about">
			</div>
			<div class="form-group col-md-6">
				<label for="exampleInputEmail1">Date of Joining<code>*</code></label>
				<input type="date" class="form-control" id="exampleInputEmail1" placeholder="Date of Joining" name="doj">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="faculty-submit">Submit</button>
			</div>
		</div>
	</form>
</div>
<?php 
if(isset($_POST['faculty-submit'])){
	$firstname = secure($_POST['firstname']);
	$lastname = secure($_POST['lastname']);
	$contact = secure($_POST['contact']);
	$email = secure($_POST['email']);
	$address = secure($_POST['address']);
	$qualification = secure($_POST['qualification']);
	// $image = $_FILES['file']['name'];
	$experience = secure($_POST['experience']);
	$about = secure($_POST['about']);
	$doj = secure($_POST['doj']);

	// move_uploaded_file($_FILES['file']['tmp_name'],"image/".$_FILES['file']['name']);
	$string = "INSERT INTO `faculty`(`F_fname`, `F_lname`, `F_contact`, `F_email`, `F_address`, `F_qualification`, `F_experience`, `F_picture` , `F_about`, `F_DOJ`) VALUES ('$firstname','$lastname','$contact','$email','$address','$qualification','$experience', '' ,'$about','$doj')";
	$temp = $sql->query($string);
	if($temp){header("location:add-faculty.php?success");}
	else{header("location:add-faculty.php?failed");}
}
?>

</div>
</div>
<script>
	$(document).ready(function(){
		$('#addfaculty , #dfaculty').addClass('active');
	});
</script>
</body>
</html>
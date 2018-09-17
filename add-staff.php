<?php 
require("config.php");
ob_start();
include("sidebar.php")
?>
<?php if (isset($_GET['failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FF7F7F; color: #FA0404; border-color: red;text-align: center;"><div class="card-body">Failed To Insert Details</div></div></div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class="card-body">Details Inserted Successfully</div></div></div>
<?php } ?>
<!-- right side content -->
<div class="container">
	<form action="#" method="post">
	<div class="row">
		<div class="form-group col-sm-6">
			<label for="fname">First Name</label>
			<input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="First Name" name="firstname">
		</div>
		<div class="form-group col-sm-6">
			<label for="lname">Last Name</label>
			<input type="text" class="form-control" id="lname" placeholder="Last Name" name="lastname">
		</div>
		<div class="form-group col-sm-6">
			<label for="contact1">Contact</label>
			<input type="number" class="form-control" id="contact1" aria-describedby="emailHelp" placeholder="Contact" name="contact">
		</div>
		<div class="form-group col-sm-6">
			<label for="InputEmail1">Email address</label>
			<input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
		</div>
		<div class="form-group col-sm-6">
			<label for="exampleInputPassword1">Address</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Address" name="address"></textarea>
		</div>
		<div class="form-group col-sm-6">
			<label for="doj">Date Of Join</label>
			<input type="date" class="form-control" id="doj" name="doj">
		</div>
	</div>
	<div class="row justify-content-center">
		<button type="submit" class="btn btn-primary" name="ss-submit">Submit</button>
	</div>
</form>
</div>

<?php 
if (isset($_POST['ss-submit'])) {
	$firstname = secure($_POST['firstname']);
	$lastname = secure($_POST['lastname']);
	$contact = secure($_POST['contact']);
	$email= secure($_POST['email']);
	$address = secure($_POST['address']);
	$doj = secure($_POST['doj']);
	$string = "INSERT INTO `supportstaff`(`SS_fname`, `SS_lname`, `SS_contact`, `SS_email`, `SS_address`, `SS_DOJ`) VALUES ('$firstname','$lastname','$contact','$email','$address','$doj')";
	$temp = $sql->query($string);
	if($temp){
		header("location:add-staff.php?success");
	}
	else{
		echo "<script>alert('insert staff failed');</script>";
	}
}
?>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#addstaff , #supportstaff').toggleClass('active');
		$('#datatable').DataTable();
	});

</script>
</body>
</html>
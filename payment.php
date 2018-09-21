<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php 
if (isset($_GET['update-success'])) {
	?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3   mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Payment Table Updated</div></div></div>
<?php } ?>
<?php if (isset($_GET['del-success'])) { ?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['update-failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['added'])) {
	?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-4 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Payment Details Added</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['not-added'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-4 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Payment Details Could Not be Added</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['incorrect'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Error</div></div></div>
<?php } ?>
<!-- page content on right side -->
<!-- Nav tabs -->
<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-color: #183755;">
		<a class="nav-item nav-link active col-sm-6" id="nav-home-tab" data-toggle="tab" href="#nav-show" role="tab" aria-controls="nav-home" aria-selected="true">Payment Table</a>
		<a class="nav-item nav-link col-sm-6" id="nav-profile-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-profile" aria-selected="false">Add Payment Details</a>
	</div>
</nav>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade active show mt-4" id="nav-show" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="table-responsive">
			<table class="display table" id="datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Roll No</th>
						<th>Full Name</th>
						<th>batch name</th>
						<th>Batch Fees</th>
						<th>Amount Paid</th>
						<th>Date of Payment</th>
						<th>Edit</th>
						<th>Receipt</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$string = "SELECT batch.B_name , admission.A_fees , student.S_Roll , student.S_fname , student.S_lname  , feepayment.Fee_ID , feepayment.Fee_amount , feepayment.Fee_date
					 FROM feepayment
					  INNER JOIN admission
					   ON admission.A_ID=feepayment.Fee_A_ID AND admission.D_flag=0
					    INNER JOIN student
						 ON student.S_ID=admission.A_S_ID AND student.D_flag=0
						  INNER JOIN batch
						   ON batch.B_ID=admission.A_B_ID AND batch.D_flag=0 ORDER BY feepayment.Fee_date DESC";
					$temp = $sql->query($string);
					$i=1;
					while($demo = $temp->fetch_row()){
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $demo[2]; ?></td>
							<td><?php echo $demo[3]." ".$demo[4]; ?></td>
							<td><?php echo $demo[0]; ?></td>
							<td><?php echo $demo[1]; ?></td>
							<td><?php echo $demo[6]; ?></td>
							<td><?php echo $demo[7]; ?></td>
							<td>
								<a data-toggle="modal" data-target="#deletebtn" title="delete"><i class="fas fa-trash-alt text-danger"></i></a>&nbsp
								<a href="edit.php?pid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
							</td>
							<!---------------------------------------------------------------------------------->
								<!-- Modal for delete-->
							<div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content bg-dark text-light">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Delete Operation</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Are you sure you want to delete Fee Payment <?php ?> ?
										</div>
										<div class="modal-footer ">
											<button type="button" class="btn btn-light" data-dismiss="modal">
												Close
											</button>
											<a href="delete.php?pid=<?php echo $demo[5]; ?>" title="delete"><button type="button" class="btn btn-danger">Delete
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
							<td>.</td>
						</tr>
					<?php 
				$i++;
				} ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="tab-pane fade mt-4" id="nav-add" role="tabpanel" aria-labelledby="nav-profile-tab">
		<div class="container">
			<form action="#" method="post">
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="stu">Contact / Roll No.<code>*</code></label>
						<input type="text" class="form-control" id="stu"  placeholder="firstname" name="firstname">
					</div>
					<div class="form-group col-sm-6">
						<label for="bn">Batch<code>*</code></label>
						<input type="text" class="form-control" id="bn"  placeholder="Batch Name" name="batchname">
					</div>
					<div class="form-group col-sm-6">
						<label for="p">Payment<code>*</code></label>
						<input type="number" class="form-control" id="p"  placeholder="Payment" name="payment">
					</div>
					<div class="form-group col-sm-6">
						<label for="d">Date<code>*</code></label>
						<input type="date" class="form-control" id="d" name="date">
					</div>
				</div>
				<div class="row justify-content-center">
					<button type="submit" class="btn btn-primary" name="payment-submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['payment-submit'])) {
	$firstname = secure($_POST['firstname']);
	$batchname = secure($_POST['batchname']);
	$payment = secure($_POST['payment']);
	$date = secure($_POST['date']);

	$string = "SELECT admission.A_ID , feepayment.Fee_amount
	 FROM feepayment
	  INNER JOIN admission
	   ON admission.A_ID=feepayment.Fee_A_ID AND admission.D_flag=0
	    INNER JOIN student
	     ON student.S_fname='$firstname'
	      AND student.S_ID=admission.A_S_ID AND student.D_flag=0
		   INNER JOIN batch
			ON batch.B_name='$batchname' AND batch.B_ID=admission.A_B_ID AND batch.D_flag=0";
	$temp = $sql->query($string);
	if ($demo = $temp->fetch_row()) {
		$aid = $demo[0];
		$string1 = "INSERT INTO `feepayment`(`Fee_A_ID`,`Fee_amount`,`Fee_date`) VALUES ('$aid','$payment','$date')";
		$temp1 = $sql->query($string1);
		if ($temp1) {
			header("location:payment.php?added");
		}
		else{
			header("location:payment.php?not-added");
		}
	}
	else{
		header("location:payment.php?incorrect");
	}
}
?>
</div>
</div>
<script>
	$(document).ready(function(){
		$('#payment , #dstudent').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
<?php
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php 
if (isset($_GET['update-success'])) { ?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Batch Details Updated</div></div></div>
<?php } ?>
<?php if (isset($_GET['del-success'])) { ?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['update-failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #ff6666; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
<?php } ?>
<!-- page content on right side -->
<div class="table-responsive">
	<table class="display table" id="datatable">
		<thead>
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Venue</th>
				<th>Fees</th>
				<th>Faculty</th>
				<th>Startdate</th>
				<th>Enddate</th>
				<th>Duration</th>
				<th>Status</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			$string = "SELECT * FROM `batch` WHERE D_flag=0 ORDER BY B_startdate DESC";
			$temp = $sql->query($string);
			$i=1;
			while($demo = $temp->fetch_row()){
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $demo[1]; ?></td>
					<td><?php echo $demo[2]; ?></td>
					<td><?php echo $demo[3]; ?></td>
					<td><?php 
					$str = "SELECT * FROM `faculty` WHERE F_ID=$demo[4] AND D_flag=0";
					$tmp = $sql->query($str);
					if ($dem = $tmp->fetch_row()) {
						echo "$dem[1] $dem[2]";
					} ?></td>
					<td><?php echo $demo[5]; ?></td>
					<td><?php echo $demo[6]; ?></td>
					<td><?php echo $demo[7]; ?></td>
					<td><?php 
					if ($demo[8]) {
						echo "Ongoing";
					}
					else{
						echo "Completed";
					} ?></td>
					<td>
						<a data-toggle="modal" data-target="#deletebtn<?php echo $demo[0]; ?>" title="delete">
							<i class="fas fa-trash-alt text-danger"></i>
						</a>&nbsp
						<a href='edit.php?bid=<?php echo $demo[0];?>' title="edit">
							<i class="fas fa-user-edit text-dark"></i>
						</a>&nbsp
						<a data-toggle="modal" data-target="#feesmodal<?php echo $demo[0]; ?>" title="fees">
							<i class="fas fa-money-bill-alt text-blue"></i>
						</a>
						<!-------------------------------------------------------------------------------->
						<!-- Modal for Fees-->
						<div class="modal fade bd-example-modal-lg" id="feesmodal<?php echo $demo[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="feemodal" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="feemodal">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<table class="display table" id="datatable1">
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
												$string1 = "SELECT batch.B_name , admission.A_fees , student.S_Roll , student.S_fname , student.S_lname  , feepayment.Fee_ID , feepayment.Fee_amount , feepayment.Fee_date
												FROM feepayment
												INNER JOIN admission
												ON admission.A_ID=feepayment.Fee_A_ID AND admission.A_B_ID=$demo[0] AND admission.D_flag=0
												INNER JOIN student
												ON student.S_ID=admission.A_S_ID AND student.D_flag=0
												INNER JOIN batch
												ON batch.B_ID=admission.A_B_ID AND batch.D_flag=0";
												$temp1 = $sql->query($string1);
												$j=1;
												while($demo1 = $temp1->fetch_row()){
													?>
													<tr>
														<td><?php echo $j; ?></td>
														<td><?php echo $demo1[2]; ?></td>
														<td><?php echo $demo1[3]." ".$demo1[4]; ?></td>
														<td><?php echo $demo1[0]; ?></td>
														<td><?php echo $demo1[1]; ?></td>
														<td><?php echo $demo1[6]; ?></td>
														<td><?php echo $demo1[7]; ?></td>
														<td>
															<a href="delete.php?pid=<?php echo $demo1[5]; ?>"><i class="fas fa-trash-alt text-danger"></i></a>
															<a href="edit.php?pid=<?php echo $demo1[5]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
														</td>
														<td></td>
													</tr>
													<?php 
													$j++;
												} ?>
											</tbody>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
										<!-- <button type="button" class="btn btn-blue btn-blue-1">Save changes</button> -->
									</div>
								</div>
							</div>
						</div>
						<!--============================================================================-->
						<!-- Modal for delete-->
						<div class="modal fade" id="deletebtn<?php echo $demo[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content bg-dark text-light">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Delete Operation</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										Are you sure you want to delete Branch <?php echo $demo[1]; ?> ?
									</div>
									<div class="modal-footer ">
										<button type="button" class="btn btn-light" data-dismiss="modal">
											Close
										</button>
										<a href='delete.php?bid=<?php echo $demo[0]; ?>' title="delete"><button type="button" class="btn btn-danger">Delete
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!------------------------------------------------------------------------------------>
				</td>
			</tr>
			<?php 
			$i++;
		} ?>
	</tbody>
</table>
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#batch , #dbatch').addClass('active');

		$('#datatable , #datatable1').DataTable();

	});

</script>
</body>
</html>
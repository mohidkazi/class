<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php 
if (isset($_GET['update-success'])) {
	?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-4 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Test Marks Updated</div></div></div>
<?php } ?>
<?php if (isset($_GET['del-success'])) { ?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['update-failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
<?php } ?>
<!-- right side content -->
<div class="container">
	<div class="row mb-1 mx-0">
		<div class="col-sm-4 col-md-5">
			<h2>Test Marks:-</h2>
		</div>
	</div>
	<table class="table display" id="datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Batch Name</th>
				<th>Student Marks	</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$string1 = "SELECT * FROM `batch` WHERE D_flag=0 ORDER BY B_startdate DESC";
			$temp1 = $sql->query($string1);
			$j=1;
			while($demo1 = $temp1->fetch_row()){
				?>
				<tr>
					<td><?php echo $j; ?></td>
					<td><?php echo $demo1[1]; ?></td>
					<td>
						<a data-toggle="modal" data-target="#testmark<?php echo $j; ?>" title="fees">
							<i class="fas fa-user-graduate"></i>
						</a>
						<!------------------------------------------------------------------------------------->
						<!-- Modal -->
						<div class="modal fade bd-example-modal-lg" id="testmark<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog  modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Test Marks for <?php echo $demo1[1]; ?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="table-responsive">
											<table class="display table" id="datatable">
												<thead>
													<tr>
														<th>#</th>
														<th>Roll No.</th>
														<th>Full Name</th>
														<th>Marks</th>
														<th>Type</th>
														<th>Comment</th>
														<th>Operation</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$string = "SELECT batch.B_name,student.S_Roll,student.S_fname,student.S_lname , testmarks.*
													FROM testmarks
													INNER JOIN admission
													ON admission.A_ID=testmarks.Test_A_ID AND admission.D_flag=0
													INNER JOIN student
													ON student.S_ID=admission.A_S_ID AND student.D_flag=0
													INNER JOIN batch
													ON batch.B_ID=$demo1[0] AND batch.B_ID=admission.A_B_ID AND batch.D_flag=0";
													$temp = $sql->query($string);
													$i=1;
													while ($demo = $temp->fetch_row()) {
														?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $demo[1]; ?></td>
															<td><?php echo "$demo[2] $demo[3]"; ?></td>
															<td><?php echo $demo[6]; ?></td>
															<td><?php echo $demo[7]; ?></td>
															<td><?php echo $demo[8]; ?></td>
															<td>
																<a data-toggle="modal" data-target="#deletebtn<?php echo $demo[4]; ?>" title="delete"><i class="fas fa-trash-alt text-danger"></i></a>
																&nbsp
																<a href="edit.php?tmid=<?php echo $demo[4]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
																<!-------------------------------------------------------------------------------------->
																<!-- Modal for delete-->
																<div class="modal fade" id="deletebtn<?php echo $demo[4]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content bg-dark text-light">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">Delete Operation</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				Are you sure you want to delete TestMark Table <?php echo $demo[4]; ?> ?
																			</div>
																			<div class="modal-footer ">
																				<button type="button" class="btn btn-light" data-dismiss="modal">
																					Close
																				</button>
																				<a href="delete.php?tmid=<?php echo $demo[4]; ?>" title="delete"><button type="button" class="btn btn-danger">Delete
																				</button>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
															<!------------------------------------------------------------------------------------------>
														</td>
													</tr>
													<?php 
													$i++;
												} ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!------------------------------------------------------------------------------------->
				</td>
			</tr>
			<?php 
			$j++;
		} ?>
	</tbody>
</table>
</div>



</div>
</div>
<script>
	$(document).ready(function(){
		$('#testmark , #dstudent').toggleClass('active');
		$('#datatable , #datatable1').DataTable();
	});
</script>
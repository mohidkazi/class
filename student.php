<?php
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php
if (isset($_GET['update-success'])) {
	?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-4 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Student Table Updated</div></div></div>
	<?php
}
if (isset($_GET['del-success'])) { ?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
	<?php
}
if (isset($_GET['update-failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
	<?php
}
?>
<!-- page content on right side -->
<div class="container">
	<div class="row mb-1 mx-0">
		<div class="col-sm-3 col-md-4">
			<h2>Expense:-</h2>
		</div>
	</div>
<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-item nav-link active col-sm-6" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Registered Student List</a>
		<a class="nav-item nav-link col-sm-6" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Admission List</a>
	</div>
</nav>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active mt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="container">
			<div class="table-responsive">
				<table class="display table" id="datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Roll No.</th>
							<th>Full Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Address</th>
							<th>Institute</th>
							<th>Branch</th>
							<th>Year</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<!-- WHERE D_flag=0"; -->
						<?php
						$string = "SELECT * FROM `student` WHERE `S_ID` NOT IN (SELECT `A_S_ID` FROM admission)";
						$temp = $sql->query($string);
						$i=1;
						while ($demo = $temp->fetch_row()) {
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $demo[1]; ?></td>
								<td><?php echo "$demo[2] $demo[3]"; ?></td>
								<td><?php echo $demo[4]; ?></td>
								<td><?php echo $demo[5]; ?></td>
								<td><?php echo $demo[6]; ?></td>
								<td><?php echo $demo[7]; ?></td>
								<td><?php echo $demo[8]; ?></td>
								<td><?php echo $demo[9]; ?></td>
								<td class="text-center">
									<a data-toggle="modal" data-target="#deletebtn<?php echo $demo[0]; ?>" title="delete">
										<i class="fas fa-trash-alt text-danger"></i></a>
										<a href="add-admission.php?sid=<?php echo $demo[0]; ?>" title="Admission"><i class="fas fa-edit"></i></a>
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
														Are you sure you want to delete Student <?php echo $demo[1]; ?> ?
													</div>
													<div class="modal-footer ">
														<button type="button" class="btn btn-light" data-dismiss="modal">
															Close
														</button>
														<a href="delete.php?sid=<?php echo $demo[0]; ?>" title="delete"><button type="button" class="btn btn-danger">Delete
														</button>
													</a>
												</div>
											</div>
										</div>
									</div>
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
	<div class="tab-pane fade mt-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		<!-- table content -->
		<div class="container">
			<div class="table-responsive">
				<table class="display table" id="datatable1">
					<thead>
						<tr>
							<th>#</th>
							<th>Roll No.</th>
							<th>Full Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Address</th>
							<th>Institute</th>
							<th>Branch</th>
							<th>Year</th>
							<th>Date of Joining</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$string = "SELECT * FROM `student` AS s
						INNER JOIN `admission` AS a
						ON s.`S_ID`=a.A_S_ID ";
						$temp = $sql->query($string);
						$i=1;
						while ($demo = $temp->fetch_row()) {
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $demo[1]; ?></td>
								<td><?php echo "$demo[2] $demo[3]"; ?></td>
								<td><?php echo $demo[4]; ?></td>
								<td><?php echo $demo[5]; ?></td>
								<td><?php echo $demo[6]; ?></td>
								<td><?php echo $demo[7]; ?></td>
								<td><?php echo $demo[8]; ?></td>
								<td><?php echo $demo[9]; ?></td>
								<td><?php echo $demo[10]; ?></td>
								<td class="text-center">
									<a data-toggle="modal" data-target="#deletebtn1<?php echo $demo[0]; ?>" title="delete">
										<i class="fas fa-trash-alt text-danger"></i></a>
										<!-- Modal for delete-->
										<div class="modal fade" id="deletebtn1<?php echo $demo[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content bg-dark text-light">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Delete Operation</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														Are you sure you want to delete Student <?php echo $demo[1]; ?> ?
													</div>
													<div class="modal-footer ">
														<button type="button" class="btn btn-light" data-dismiss="modal">
															Close
														</button>
														<a href="delete.php?sid=<?php echo $demo[0]; ?>" title="delete"><button type="button" class="btn btn-danger">Delete
														</button>
													</a>
												</div>
											</div>
										</div>
									</div>
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
</div>
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#student , #dstudent').addClass('active');
		$('#datatable , #datatable1').DataTable();
	});
</script>
</body>
</html>
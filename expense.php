<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<?php 
if (isset($_GET['update-success'])) {
	?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-4 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Expense Table Updated</div></div></div>
<?php } ?>
<?php if (isset($_GET['del-success'])) { ?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['update-failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #ff6666; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
<?php } ?>
<!-- right side content -->
<div class="table-responsive">
	<table class="table display" id="datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>Reason</th>
				<th>Amount</th>
				<th>Date</th>
				<th>Operation</th>
			</tr>
		</thead>
		<?php 
		$string = "SELECT * FROM `expense` WHERE D_flag=0";
		$temp = $sql->query($string);
		$i=1;
		while ($demo = $temp->fetch_row()) {
			?>
			<tbody>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php $str = "SELECT * FROM `admin` WHERE `Admin_ID`=$demo[3]";
					$tmp = $sql->query($str);
					if ($row = $tmp->fetch_row()) {	
						echo "$row[1] $row[2]"; 
					} ?></td>
					<td><?php echo "$demo[1]"; ?></td>
					<td><?php echo "$demo[2]"; ?></td>
					<td><?php echo "$demo[4]"; ?></td>
					<td>
						<a data-toggle="modal" data-target="#deletebtn<?php echo $demo[0]; ?>" title="delete"><i class="fas fa-trash-alt text-danger"></i></a>
						&nbsp
						<a href="edit.php?eid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
						<!--------------------------------------------------------------------------------->
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
										Are you sure you want to delete Expense ?
									</div>
									<div class="modal-footer ">
										<button type="button" class="btn btn-light" data-dismiss="modal">
											Close
										</button>
										<a href="delete.php?eid=<?php echo $demo[0]; ?>"><button type="button" class="btn btn-danger">Delete
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</td>
				<!----------------------------------------------------------------------------------------->
			</tr>
		</tbody>
		<?php 
		$i++;
	} ?>
</table>
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#expense').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
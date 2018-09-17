<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<?php 
if (isset($_GET['update-success'])) {
	?>
	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-4 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Student Table Updated</div></div></div>
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
		<?php 
		$string = "SELECT * FROM `student`";
		$temp = $sql->query($string);
		while ($demo = $temp->fetch_row()) {
			?>
			<tbody>
				<tr>
					<td><?php echo $demo[1]; ?></td>
					<td><?php echo "$demo[2] $demo[3]"; ?></td>
					<td><?php echo $demo[4]; ?></td>
					<td><?php echo $demo[5]; ?></td>
					<td><?php echo $demo[6]; ?></td>
					<td><?php echo $demo[7]; ?></td>
					<td><?php echo $demo[8]; ?></td>
					<td><?php echo $demo[9]; ?></td>
					<td><?php echo $demo[10]; ?></td>
					<td><a href="edit.php?sid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
						&nbsp&nbsp&nbsp&nbsp&nbsp<a href="delete.php?sid=<?php echo $demo[0]; ?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
					</tr>
				</tbody>
			<?php } ?>
		</table>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#student , #dstudent').addClass('active');
		$('#datatable').DataTable();
	});

</script>
</body>
</html>
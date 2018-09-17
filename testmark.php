<?php 
require("config.php");
ob_start();
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
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #ff6666; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
<?php } ?>
 <!-- right side content -->
<div class="table-responsive">
	<table class="display table" id="datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Roll No.</th>
				<th>Full Name</th>
				<th>Batch</th>
				<th>Marks</th>
				<th>Type</th>
				<th>Comment</th>
				<th>Operation</th>
			</tr>
		</thead>
		<?php 
		$string = "SELECT batch.B_name,student.S_Roll,student.S_fname,student.S_lname FROM ((`admission` INNER JOIN `batch` ON batch.B_ID=admission.A_B_ID) INNER JOIN `student` ON student.S_ID=admission.A_S_ID)";
		$temp = $sql->query($string);
		$string1 = "SELECT * FROM testmarks";
		$temp1 = $sql->query($string1);
		while ($demo = $temp->fetch_row() AND $demo1 = $temp1->fetch_row()) {
		 ?>
		 <tbody>
		 	<tr>
		 		<td><?php echo $demo1[0]; ?></td>
		 		<td><?php echo $demo[1]; ?></td>
		 		<td><?php echo $demo[2]." ".$demo[3]; ?></td>
		 		<td><?php echo $demo[0]; ?></td>
		 		<td><?php echo $demo1[2]; ?></td>
		 		<td><?php echo $demo1[3]; ?></td>
		 		<td><?php echo $demo1[4]; ?></td>
		 		<td>
		 			<a href="delete.php?tmid=<?php echo $demo1[0]; ?>"><i class="fas fa-trash-alt text-danger"></i></a>
		 			&nbsp&nbsp&nbsp&nbsp&nbsp
		 			<a href="edit.php?tmid=<?php echo $demo1[0]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
		 		</td>
		 	</tr>
		 </tbody>
		<?php } ?>
	</table>
</div>


</div>
</div>
<script>
	$(document).ready(function(){
		$('#testmark , #dstudent').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
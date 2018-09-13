<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- style="background-color: #ff6666; color: red; border-color: red; -->
<?php if (isset($_GET['del-success'])) { ?>
	<div class="conatiner"><div class='card mb-2 col-sm-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>faculty deleted</div></div></div>
	<?php } ?>

<?php 
if (isset($_GET['update-success'])) { ?>
	<div class="container"><div class='card mb-2 col-sm-3 mx-auto' style="background-color: ; color: green; border-color: green;text-align: center;"><div class='card-body'>faculty updated</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['update-failed'])) {
	?>
	<div class="container"><div class="card mb-2 col-sm-4 mx-auto" style="background-color: #ff6666; color: red; border-color: red;text-align: center;"><div class="card-body">update failed</div></div>
<?php } ?>
<!-- page content on right side -->

<div class="table-responsive">
	<table class="table display" id="datatable">
	<thead class="">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Firstname</th>
			<th scope="col">Lastname</th>
			<th scope="col">Contact</th>
			<th scope="col">Email</th>
			<th scope="col">Address</th>
			<th scope="col">Qualification</th>
			<th scope="col">Experience</th>
			<th scope="col">Picture</th>
			<th scope="col">About</th>
			<th scope="col">Date of Joining</th>
			<th scope="col">Operations</th>
		</tr>
	</thead>
	<?php 
	$string = "SELECT * FROM `faculty`";
	$temp = $sql->query($string);
	while($demo=$temp->fetch_row()){
		?>
		<tbody>
			<tr>
				<td><?php echo $demo[0]; ?></td>
				<td><?php echo $demo[1]; ?></td>
				<td><?php echo $demo[2]; ?></td>
				<td><?php echo $demo[3]; ?></td>
				<td><?php echo $demo[4]; ?></td>
				<td><?php echo $demo[5]; ?></td>
				<td><?php echo $demo[6]; ?></td>
				<td><?php echo $demo[7]; ?></td>
				<td><?php echo $demo[8]; ?></td>
				<td><?php echo $demo[9]; ?></td>
				<td><?php echo $demo[10]; ?></td>
				<td><a href='delete.php?fid=<?php echo $demo[0]; ?>'><i class="fas fa-trash-alt text-danger"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
					<a href='edit.php?fid=<?php echo $demo[0];?>'><i class="fas fa-user-edit text-primary"></i></a></td>
				</tr>
			</tbody>
			<?php 
		} ?>
	</table>
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#faculty , #dfaculty').addClass('active');

		/*data table*/
		$('#datatable').DataTable();
	});

</script>
</body>
</html>
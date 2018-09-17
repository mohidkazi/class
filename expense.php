<?php 
require("config.php");
ob_start();
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
			<th>Reason</th>
			<th>Amount</th>
			<th>Full Name</th>
			<th>Date</th>
			<th>Operation</th>
		</tr>
	</thead>
	<?php 
		$string = "SELECT * FROM `expense`";
		$temp = $sql->query($string);
		while ($demo = $temp->fetch_row()) {
	 ?>
	 <tbody>
	 	<tr>
	 		<td><?php echo "$demo[0]"; ?></td>
	 		<td><?php echo "$demo[1]"; ?></td>
	 		<td><?php echo "$demo[2]"; ?></td>
	 		<td><?php $str = "SELECT * FROM `admin` WHERE `Admin_ID`=$demo[3]";
	 		$tmp = $sql->query($str);
	 		if ($row = $tmp->fetch_row()) {	
	 		 echo "$row[1] $row[2]"; } ?></td>
	 		<td><?php echo "$demo[4]"; ?></td>
	 		<td>
	 			<a href="delete.php?eid=<?php echo $demo[0]; ?>"><i class="fas fa-trash-alt text-danger"></i></a>
	 			&nbsp&nbsp&nbsp&nbsp&nbsp
	 			<a href="edit.php?eid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
	 		</td>
	 	</tr>
	 </tbody>
	<?php } ?>
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
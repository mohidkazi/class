<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<?php if (isset($_GET['del-success'])) {
	echo "<div>delete successful</div>";
} 
if (isset($_GET['update-success'])) {
	echo "<div>update successful</div>";
}
?>
<!-- page content on right side -->
<div class="table-responsive">
<table class="display table" id="datatable">
	<thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Venue</th>
			<th>Fees</th>
			<th>Fid</th>
			<th>Startdate</th>
			<th>Enddate</th>
			<th>Duration</th>
			<th>Status</th>
			<th>Operation</th>
		</tr>
	</thead>
	<?php  
	$string = "SELECT * FROM `batch`";
	$temp = $sql->query($string);
	while($demo = $temp->fetch_row()){
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
				<td><a href='delete.php?bid=<?php echo $demo[0]; ?>'><i class="fas fa-trash-alt text-danger"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
					<a href='edit.php?bid=<?php echo $demo[0];?>'><i class="fas fa-user-edit text-primary"></i></a></td>
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
		$('#batch , #dbatch').addClass('active');

		$('#datatable').DataTable();
	});

</script>
</body>
</html>
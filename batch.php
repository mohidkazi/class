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
<table class="display table" id="datatable">
	<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>venue</th>
			<th>fees</th>
			<th>fid</th>
			<th>startdate</th>
			<th>enddate</th>
			<th>duration</th>
			<th>status</th>
			<th>operations</th>
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
				<td><a href="delete.php?bid=<?php echo $demo[0]; ?>">delete</a>
					<a href="edit.php?bid=<?php echo $demo[0]; ?>">edit</a>
				</td>
			</tr>
		</tbody>
	<?php } ?>
</table>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#batch , #dbatch').addClass('active');

		$('#datatble').DataTable();
	});

</script>
</body>
</html>
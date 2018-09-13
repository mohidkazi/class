<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<table class="display table" id="datatable">
	<thead>
		<tr>
			<th>#</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact</th>
			<th>Email</th>
			<th>Address</th>
			<th>DOJ</th>
			<th>Operation</th>
		</tr>
	</thead>
	<?php 
	$string = "SELECT * FROM `supportstaff`";
	$temp = $sql->query($string);
	while ($demo = $temp->fetch_row()) {
		?>
		<tbody>
			<tr>
				<td><?php echo $demo[0]; ?></td>
				<td><?php echo $demo[1]." ".$demo[2]; ?></td>
				<td><?php echo $demo[3]; ?></td>
				<td><?php echo $demo[4]; ?></td>
				<td><?php echo $demo[5]; ?></td>
				<td><?php echo $demo[6]; ?></td>
				<td><?php  ?></td>
				<td><a href='delete.php?ssid=<?php echo $demo[0]; ?>'><i class="fas fa-trash-alt text-danger"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
					<a href='edit.php?ssid=<?php echo $demo[0];?>'><i class="fas fa-user-edit text-primary"></i></a></td>
				</tr>
			</tbody>
		<?php } ?>
	</table>


</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#sstaff , #supportstaff').toggleClass('active');
		$('#datatable').DataTable();
	});

</script>
</body>
</html>
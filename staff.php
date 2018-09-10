<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<table class="display table" id="datatable">
	<tr>
		<th>#</th>
		<th>name</th>
		<th>contact</th>
		<th>email</th>
		<th>address</th>
		<th>doj</th>
		<th>operations</th>
	</tr>
	<?php 
	$string = "SELECT * FROM `faculty`";
	$temp = $sql->query($string);
	while ($demo = $temp->fetch_row()) {
		?>
		<tr>
			<td><?php echo $demo[0]; ?></td>
			<td><?php echo $demo[1]." ".$demo[2]; ?></td>
			<td><?php echo $demo[3]; ?></td>
			<td><?php echo $demo[4]; ?></td>
			<td><?php echo $demo[5]; ?></td>
			<td><?php  ?></td>
			<td><a href="delete.php?ssid=<?php echo $demo[0]; ?>">delete</a>
				<a href="edit.php?ssid=<?php echo $demo[0]; ?>">edit</a></td>
		</tr>
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
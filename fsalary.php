<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- page content on right side -->
<table class="table display" id="datatable">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Salary</th>
		</tr>
	</thead>
	<?php 
	$string = "SELECT * FROM `faculty`";
	$temp = $sql->query($string);
	while($demo = $temp->fetch_row()){

		?>
		<tbody>
			<tr>
				<td><?php echo $demo[0]; ?></td>
				<td><?php echo $demo[1]." ".$demo[2]; ?></td>
				<td><?php echo $demo[8]; ?></td>
			</tr>
		</tbody>
	<?php } ?>
</table>


</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#facultysalary , #dfaculty').addClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
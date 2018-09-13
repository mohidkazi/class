<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- page content on right side -->
<div class="table-responsive">
<table class="table display" id="datatable">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Amount</th>
			<th>Comment</th>
			<th>DOP</th>
		</tr>
	</thead>
	<?php 
	$string = "SELECT * FROM `fsalary`";
	$temp = $sql->query($string);
	while($demo = $temp->fetch_row()){

		?>
		<tbody>
			<tr>
				<td><?php echo $demo[0]; ?></td>
				<td><?php $string1="SELECT `F_fname`, `F_lname` FROM `faculty` WHERE `F_ID`=$demo[1]";
				$temp1 = $sql->query($string1);
				if($demo1 = $temp1->fetch_row()){
				 echo $demo1[0]." ".$demo1[1]; } ?></td>
				<td><?php echo $demo[2]; ?></td>
				<td><?php echo $demo[3]; ?></td>
				<td><?php echo $demo[4]; ?></td>
			</tr>
		</tbody>
	<?php } ?>
</table>
</div>


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
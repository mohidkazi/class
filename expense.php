<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>

<table class="table display" id="datatable">
	<thead>
		<tr>
			<th>#</th>
			<th>reason</th>
			<th>amount</th>
			<th>name</th>
			<th>date</th>
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
	 		<td><?php $str = "SELECT * FROM `customers` WHERE `id`=$demo[3]";
	 		$tmp = $sql->query($str);
	 		if ($row = $tmp->fetch_row()) {	
	 		 echo $row[1]; } ?></td>
	 		<td><?php echo "$demo[4]"; ?></td>
	 	</tr>
	 </tbody>
	<?php } ?>
</table>

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
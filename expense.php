<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<div class="table-responsive">
<table class="table display" id="datatable">
	<thead>
		<tr>
			<th>#</th>
			<th>Reason</th>
			<th>Amount</th>
			<th>Full Name</th>
			<th>Date</th>
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
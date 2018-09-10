<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>

<table class="display table" id="datatable">
	<tr>
		<th>#</th>
		<th>b_id</th>
		<th>monday</th>
		<th>tuesday</th>
		<th>wednesday</th>
		<th>thursday</th>
		<th>friday</th>
		<th>saturday</th>
		<th>sunday</th>
	</tr>
	<?php 
		$string = "SELECT * FROM `timetable`";
		$temp = $sql->query($string);
		while ($demo = $temp->fetch_row()) {
	 ?>
	 <tr>
	 	<td><?php echo "$demo[0]"; ?></td>
	 	<td><?php echo "$demo[1]"; ?></td>
	 	<td><?php echo "$demo[2] - $demo[3]"; ?></td>
	 	<td><?php echo "$demo[4] - $demo[5]"; ?></td>
	 	<td><?php echo "$demo[6] - $demo[7]"; ?></td>
	 	<td><?php echo "$demo[8] - $demo[9]"; ?></td>
	 	<td><?php echo "$demo[10] - $demo[11]"; ?></td>
	 	<td><?php echo "$demo[12] - $demo[13]"; ?></td>
	 	<td><?php echo "$demo[14] - $demo[15]"; ?></td>
	 </tr>
	<?php } ?>
</table>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#timetable').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
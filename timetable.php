<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<div class="table-responsive">
	<table class="display table" id="datatable">
		<tr>
			<th>#</th>
			<th>Batch</th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
			<th>Saturday</th>
			<th>Sunday</th>
		</tr>
		<?php 
		$string = "SELECT * FROM `timetable`";
		$temp = $sql->query($string);
		while ($demo = $temp->fetch_row()) {
			?>
			<tr>
				<td><?php echo "$demo[0]"; ?></td>
				<td><?php 
				$str = "SELECT B_name FROM batch WHERE B_ID=$demo[1]";
				$tmp = $sql->query($str);
				if($dem = $tmp->fetch_row()){
					echo "$dem[0]"; } ?></td>
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
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#timetable').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
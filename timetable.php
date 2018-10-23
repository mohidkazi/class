<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<!-- right side content -->
	<div class="container">
		<div class="row mb-1 mx-0">
		<div class="col-sm-3 col-md-4">
			<h2>Timetable:-</h2>
		</div>
	</div>
<div class="table-responsive">
	<table class="display table" id="datatable">
		<thead>
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
		</thead>
		<tbody>
			<?php 
			$string = "SELECT * FROM `timetable` WHERE D_flag=0";
			$temp = $sql->query($string);
			$i=1;
			while ($demo = $temp->fetch_row()) {
				?>
				<tr>
					<td><?php echo "$i"; ?></td>
					<td><?php 
					$str = "SELECT B_name FROM batch WHERE B_ID=$demo[1] AND D_flag=0";
					$tmp = $sql->query($str);
					if($dem = $tmp->fetch_row()){
						echo "$dem[0]";
					} ?></td>
					<td><?php echo "$demo[2] - $demo[3]"; ?></td>
					<td><?php echo "$demo[4] - $demo[5]"; ?></td>
					<td><?php echo "$demo[6] - $demo[7]"; ?></td>
					<td><?php echo "$demo[8] - $demo[9]"; ?></td>
					<td><?php echo "$demo[10] - $demo[11]"; ?></td>
					<td><?php echo "$demo[12] - $demo[13]"; ?></td>
					<td><?php echo "$demo[14] - $demo[15]"; ?></td>
				</tr>
				<?php 
				$i++;
			} ?>
		</tbody>
	</table>
</div>
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#timetable , #dbatch').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
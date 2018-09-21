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
		$string = "SELECT * FROM `fsalary` WHERE D_flag=0 ORDER BY FS_DOP DESC ";
		$temp = $sql->query($string);
		$i=1;
		while($demo = $temp->fetch_row()){
			?>
			<tbody>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php $string1="SELECT `F_fname`, `F_lname` FROM `faculty` WHERE `F_ID`=$demo[1] AND D_flag=0";
					$temp1 = $sql->query($string1);
					if($demo1 = $temp1->fetch_row()){
						echo $demo1[0]." ".$demo1[1]; } ?></td>
						<td><?php echo $demo[2]; ?></td>
						<td><?php echo $demo[3]; ?></td>
						<td><?php echo $demo[4]; ?></td>
					</tr>
				</tbody>
				<?php 
				$i++;
			} ?>
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
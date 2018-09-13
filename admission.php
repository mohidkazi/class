<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- page content on right side -->
<?php 
if (isset($_GET['update-success'])) {
	?>
	<div class="container"><div class='card mb-2 col-sm-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Admission table updated</div></div></div>
<?php } ?>
<?php if (isset($_GET['del-success'])) { ?>
	<div class="container"><div class='card mb-2 col-sm-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
<?php } ?>
<?php 
if (isset($_GET['update-failed'])) {
	?>
	<div class="container"><div class="card mb-2 col-sm-4 mx-auto" style="background-color: #ff6666; color: red; border-color: red;text-align: center;"><div class="card-body">update failed</div></div>
<?php } ?>
<!-- page content on right side -->

<div class="table-responsive">
	<table class="display table" id="datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>Batch</th>
				<th>Fees</th>
				<th>Date</th>
				<th>Status</th>
				<th>Operation</th>
			</tr>
		</thead>
		<?php
		$string = "SELECT * FROM `admission`";
		$temp = $sql->query($string);
		$i=1;
		while ($demo = $temp->fetch_row()) {
			?>
			<tbody>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php 
					$string1 = "SELECT `S_fname`, `S_lname` FROM `student` WHERE `S_ID`=$demo[1]";
					$temp1 = $sql->query($string1);
					if($demo1 = $temp1->fetch_row()) {
						echo "$demo1[0] $demo1[1]";
					}?></td>
					<td><?php 
					$string2 = "SELECT `B_name` FROM `batch` WHERE `B_ID`=$demo[2]";
					$temp2 = $sql->query($string2);
					if ($demo2 = $temp2->fetch_row()) {
						echo "$demo2[0]";
					}?></td>
					<td><?php echo $demo[3]; ?></td>
					<td><?php echo $demo[4]; ?></td>
					<td><?php echo $demo[5]; ?></td>
					<td><a href="edit.php?admid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-primary"></i></a>
						&nbsp&nbsp&nbsp&nbsp&nbsp <a href="delete.php?admid=<?php echo $demo[0]; ?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
					</tr>
				</tbody>
				<?php 
				$i++;
			}
			?>
		</table>
	</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#admission').addClass('active');
		$('#datatable').DataTable();
	});

</script>
</body>
</html>
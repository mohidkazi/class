<?php
require("config.php");
ob_start();
include("sidebar.php");
?>
<?php if (isset($_GET['del-success'])) {
	echo "<div>delete successful</div>";}
	if (isset($_GET['update-success'])) {
		echo "<div>update successful</div>";
	}
		?>
	<!-- page content on right side -->

	<table class="display table" id="datatable">
		<thead class="">
			<tr>
				<th scope="col">#</th>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Handle</th>
				<th scope="col">operations</th>
			</tr>
		</thead>
		<?php 
		$string = "SELECT * FROM `faculty`";
		$temp = $sql->query($string);
		while($demo=$temp->fetch_row()){
			?>
			<tbody>
				<tr>
					<td><?php echo $demo[0]; ?></td>
					<td><?php echo $demo[1]; ?></td>
					<td><?php echo $demo[2]; ?></td>
					<td><?php echo $demo[4]; ?></td>
					<td><a href='delete.php?fid=<?php echo $demo[0]; ?>'><i class=""></i>delete</a>
						<a href='edit.php?fid=<?php echo $demo[0];?>'><i class=""></i>edit</a></td>
					</tr>
				</tbody>
				<?php 
			} ?>
		</table>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#faculty , #dfaculty').addClass('active');

		/*data table*/
		$('#datatable').DataTable();
	});

</script>
</body>
</html>
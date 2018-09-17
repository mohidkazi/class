<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<div class="table-responsive">
	<table class="display table" id="datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Student Name</th>
				<th>Attendence</th>
				<th>date</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>



</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#attendence , #dstudent').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
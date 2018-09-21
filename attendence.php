<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- right side content -->

<!-- header for attendence including batch name, faculty and date -->
<div class="container">
	<form action="" method="post">
		<div class="row">
			<div class="form-group col-sm-3">
				<h2>Attendence:-</h2>
			</div>
			<div class="form-group col-sm-3">
				<label for="sel">Batch Name:</label>
				<select class="form-control" id="sel">
					<option value="">Select</option>
					<option value="math-1">math-1</option>
					<option value="math-2">math-2</option>
					<option value="math-3">math-3</option>
					<option value="tcs">tcs</option>
				</select>
			</div>
			<div class="form-group col-sm-3">
				<label for="sel">Faculty:</label>
				<input class="form-control" value="<?php ?>" disabled></input>
			</div>
			<div class="form-group col-sm-3">
				<label for="sel">Date:</label>
				<input class="form-control" value="<?php echo Date('d-m-Y'); ?>" disabled></input>
			</div>
		</div>
	</form>
</div>
<!-- table starts here -->
<div class="table-responsive">
	<table class="display table" id="datatable">
		<thead>
			<tr>
				<th>#</th>
				<th>Roll No.</th>
				<th>Student Name</th>
				<th>Attendence</th>
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
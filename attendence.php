<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<!-- right side content -->
<!-- header for attendence including batch name, faculty and date -->
<div class="container">
	<div class="row mb-1 mx-0">
			<div class="col-sm-3 col-md-4">
				<h2>Attendence:-</h2>
			</div>
		</div>
	<form action="#" method="post">
		<div class="row">
			<div class="form-group col-sm-4">
				<label>Batch Name:</label>
				<select class="form-control" id="Batch" name="batch" onchange="thisshouldwork()">
					<option value="">Batch</option>
					<?php
					$string = "SELECT * FROM `batch`";
					$temp = $sql->query($string);
					while($demo = $temp->fetch_row()){
						?> 
						<option value="<?php echo $demo[0]; ?>"><?php echo $demo[1]; ?></option> 
						<?php 
					}
					?> 
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label>Faculty:</label>
				<input class="form-control" value="" id="Faculty" disabled></input>
			</div>
			<div class="form-group col-sm-4">
				<label>Date:</label>
				<input class="form-control" value="<?php echo Date('Y-m-d'); ?>" id="date" name="date" disabled></input>
			</div>
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
				<tbody class="ajaxtable">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="form-group text-center">
				<button type="submit" name="submit" class="btn btn-primary">submit</button>
			</div>
		</div>
	</form>
</div>
<?php
if (isset($_POST['submit']) && !empty($_POST['batch'])) {
	$batch = secure($_POST['batch']);

	$string = "SELECT *  FROM `admission` WHERE A_B_ID=$batch AND D_flag=0";
	$temp = $sql->query($string);
	$i=1;
	while ($demo = $temp->fetch_row()) {
		if (!empty($_POST['checkbox'.$i]))
		{
			$checkbox = 1;
		}
		if(empty($_POST['checkbox'.$i]))
		{
			$checkbox = 0;
		}
		// echo "<script>console.log('Admision id : ' + $demo[0] );</script>";
			// $checkbox = secure($_POST['checkbox'.$i]);
		// echo "<script>console.log('checkbox no :'+ $i );</script>";
		$string1 = "INSERT INTO `attendence`(`Att_Adm_ID`, `Att_status`, `Att_Date`) VALUES ($demo[0] ,'$checkbox' ,'".Date('Y-m-d')."')";
		$temp1 = $sql->query($string1);
		$i++;
	}
}
?>


</div>
</div>
<script type="text/javascript">
	function thisshouldwork(){
			//ajax starts here
			// fetching data from faculty and student using batch id
			// $('#Batch').change(function(){
				var bname = $('#Batch').val();
				$.ajax(
				{
					type : "POST",
					datatype : "json",
					url : "backend.php",
					data :
					{
						bname : bname
					},
					success : function(data)
					{
						var Data = JSON.parse(data);
						$('.ajaxtable').html(Data[1]);
						$('#Faculty').val(Data[0].F_fname+" "+Data[0].F_lname);
						// console.log(Data[0]);
					}
				});

				// $.post(
				// 	"backend.php",
				// 	{bname : bname},
				// 	function(data)
				// 	{
				// 		console.log(data);
				// 	}
				// 	);

			// });
		}

		$(document).ready(function(){
			$('#attendence , #dstudent').toggleClass('active');
		// $('#datatable').DataTable();
	});
</script>
</body>
</html>
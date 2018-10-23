<?php
ob_start();
require("config.php");
include("sidebar.php");
?>
<!-- right side content -->
<div class="container">
	<div class="row mb-1 mx-0">
		<div class="col-sm-3 col-md-4">
			<h2>Add Details:-</h2>
		</div>
	</div>
	<form action="add-timetable.php" method="post">
		<div class="row mx-0">
			<div class="form-group col-sm-12">
				<label for="batch">Batch Name</label>
				<select name="batchname" id="batch" class="form-control col-sm-6 col-md-4 col-lg-3">
					<option value="">Batch Name</option>
					<?php
					$string = "SELECT * FROM `batch` WHERE D_flag=0";
					$temp = $sql->query($string);
					while($demo = $temp->fetch_row()){
						echo "<option value='$demo[0]'>$demo[1]</option>";
					}
					?>
				</select>
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Monday</label>
				<input type="time" class="form-control" name="mstart" value="09:00:00">
				<input type="time" class="form-control" name="mend" value="12:00:00">	
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Tuesday</label>
				<input type="time" class="form-control" name="tstart" value="09:00:00">
				<input type="time" class="form-control" name="tend" value="12:00:00">	
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Wednesday</label>
				<input type="time" class="form-control" name="wstart" value="09:00:00">
				<input type="time" class="form-control" name="wend" value="12:00:00">	
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Thursday</label>
				<input type="time" class="form-control" name="thstart" value="09:00:00">
				<input type="time" class="form-control" name="thend" value="12:00:00">	
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Friday</label>
				<input type="time" class="form-control" name="fstart" value="09:00:00">
				<input type="time" class="form-control" name="fend" value="12:00:00">	
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Saturday</label>
				<input type="time" class="form-control" name="sstart" value="09:00:00">
				<input type="time" class="form-control" name="send" value="12:00:00">	
			</div>
			<div class="form-group col-sm-6 col-md-4 col-lg-3">
				<label for="">Sunday</label>
				<input type="time" class="form-control" name="sustart" value="09:00:00">
				<input type="time" class="form-control" name="suend" value="12:00:00">	
			</div>
		</div>
		<div class="form-row justify-content-center">
			<button class="btn btn-primary" name="tt-submit">Submit</button>
		</div>
	</form>
</div>
<?php
if (isset($_POST['tt-submit'])) {
	$batch = secure($_POST['batchname']);
	$mstart = secure($_POST['mstart']);
	$mend = secure($_POST['mend']);
	$tstart = secure($_POST['tstart']);
	$tend = secure($_POST['tend']);
	$wstart = secure($_POST['wstart']);
	$wend = secure($_POST['wend']);
	$thstart = secure($_POST['thstart']);
	$thend = secure($_POST['thend']);
	$fstart = secure($_POST['fstart']);
	$fend = secure($_POST['fend']);
	$sstart = secure($_POST['sstart']);
	$send = secure($_POST['send']);
	$sustart = secure($_POST['sustart']);
	$suend = secure($_POST['suend']);

	$string = "INSERT INTO `timetable`(`TT_B_ID`, `TT_Start_Mon`, `TT_End_Mon`, `TT_Start_Tue`, `TT_End_Tue`, `TT_Start_Wed`, `TT_End_Wed`, `TT_Start_Thu`, `TT_End_Thu`, `TT_Start_Fri`, `TT_End_Fri`, `TT_Start_Sat`, `TT_End_Sat`, `TT_Start_Sun`, `TT_End_Sun`, `D_flag`) VALUES ('$batch','$mstart','$mend','$tstart','$tend','$wstart','$wend','$thstart','$thend','$fstart','$fend','$sstart','$send','$sustart','$suend','0')";
	$temp = $sql->query($string);
	if ($temp) {
		header("location:timetable.php?success");
	}
	else
	{
		header("location:timetable.php?failed");
	}
}
// else
// {
// 	header("location:timetable.php?wrong");
// }
?>

</div>
</div>
<script>
	$(document).ready(function(){
		$('#dbatch , #addtimetable').toggleClass('active');
	});
</script>
</body>
</html>
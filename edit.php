<?php 
require("config.php");
ob_start();
include("sidebar.php");
?>
<!-- edit and update for faculty only -->
<?php if(isset($_GET['fid'])){
	$id = secure($_GET['fid']);
	$string = "SELECT * FROM `faculty` WHERE `id`=$id";
	$temp = $sql->query($string);
	if($demo = $temp->fetch_row()){
		?>
		<form action="update.php?fid=<?php echo $id; ?>" method="post">
			<div class="form-group">
				<input type="text" name="firstname" placeholder="First Name" class="col-sm-6" value='<?php echo $demo[1] ?>'>
			</div>
			<div class="form-group">
				<input type="text" name="lastname" placeholder="Last Name" class="col-sm-6" value='<?php echo $demo[2]; ?>'>
			</div>
			<div class="form-group">
				<input type="text" name="contact" placeholder="Contact" class="col-sm-6" value='<?php echo $demo[3]; ?>'>
			</div>
			<div class="form-group">
				<input type="text" name="email" placeholder="E-mail" class="col-sm-6" value='<?php echo $demo[4]; ?>'>
			</div>
			<div class="form-group">
				<textarea name="address" cols="30" rows="3" placeholder="Address" class="col-sm-6" value='<?php echo $demo[5]; ?>'></textarea>
			</div>
			<div class="form-group">
				<label for="qualiii">qualification</label>
				<select class="form-control col-sm-4" name="quali" id="qualiii" value='<?php echo $demo[6]; ?>'>
					<option value="">be</option>
					<option value="">me</option>
					<option value="">mtech</option>
					<option value="">mba</option>
					<option value="">phd</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="description" placeholder="Description" class="col-sm-6" value='<?php echo $demo[7]; ?>'>
			</div>
			<button class="btn btn-info justify-content-center" type="submit" name="faculty-submit">Submit</button>
		</form>
	<?php } }?>

	<!-- edit and update for batch only -->
	<?php 
	if(isset($_GET['bid'])){
		$id = secure($_GET['bid']);
		$string = "SELECT * FROM `batch` WHERE `id`=$id";
		$temp = $sql->query($string);
		if($asdf = $temp->fetch_row()){
			?> 
			<form action="update.php?bid=<?php echo $id; ?>" method="post">
				<div class="form-group">
					<input type="text" name="name" placeholder="Name" class="col-sm-6" value="<?php echo $asdf[1]; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="venue" placeholder="Venue" class="col-sm-6" value="<?php echo $asdf[2]; ?>">
				</div>
				<div class="form-group">
					<input type="num" name="fees" placeholder="Fees" class="col-sm-6" value="<?php echo $asdf[3]; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="fid" placeholder="fid" class="col-sm-6" value="<?php echo $asdf[4]; ?>">
				</div>
				<div class="form-group">
					<input type="date" name="startdate" placeholder="Start Date" class="col-sm-6" value="<?php echo $asdf[5]; ?>">
				</div>
				<div class="form-group">
					<input type="date" name="enddate" placeholder="End Date" class="col-sm-6" value="<?php echo $asdf[6]; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="duration" placeholder="Duration" class="col-sm-6" value="<?php echo $asdf[7]; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="status" placeholder="Status" class="col-sm-6" value="<?php echo $asdf[8]; ?>">
				</div>
				<button class="btn btn-success" name="batch-submit" type="submit">Submit</button>
			</form>
			<?php
		}
	}
	?>
</div>
</div>
</body>
</html>
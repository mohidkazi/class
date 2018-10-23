<?php 
ob_start();
require("config.php");
include("sidebar.php");
?>
<!-- edit and update for faculty only -->
<?php if(isset($_GET['fid'])){
	$id = secure($_GET['fid']);
	$string = "SELECT * FROM `faculty` WHERE `F_ID`=$id AND D_flag=0";
	$temp = $sql->query($string);
	if($demo = $temp->fetch_row()){
		?>
		<div class="container">
			<div class="row mb-1 mx-0">
				<div class="col-sm-3 col-md-4">
					<h2>Edit Faculty:-</h2>
				</div>
			</div>
			<form action="update.php?fid=<?php echo $id; ?>" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="fname1">First Name</label>
						<input type="text" class="form-control" id="fname1" placeholder="First Name" name="firstname" value='<?php echo $demo[1]; ?>'>
					</div>
					<div class="form-group col-md-6">
						<label for="lname1">Last Name</label>
						<input type="texte" class="form-control" id="lname1" placeholder="Last Name" name="lastname" value='<?php echo $demo[2]; ?>'>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="contact1">Contact</label>
						<input type="tel" class="form-control" id="contact1" placeholder="Contact" name="contact" value='<?php echo $demo[3]; ?>'>
					</div>
					<div class="form-group col-md-6">
						<label for="InputEmail1">Email address</label>
						<input type="email" class="form-control" id="InputEmail1" placeholder="Enter email" name="email" value='<?php echo $demo[4]; ?>'>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="add1">Address</label>
						<textarea class="form-control" id="add1" rows="3" placeholder="Address" name="address"><?php echo $demo[5]; ?></textarea>
					</div>
					<div class="form-group col-md-6">
						<label for="exampleFormControlSelect1">Qualification</label>
						<select class="form-control" id="exampleFormControlSelect1" name="qualification">
							<option value="<?php echo $demo[6]; ?>" selected><?php echo $demo[6]; ?></option>
							<option value="B.E">B.E</option>
							<option value="BTech">BTech</option>
							<option value="M.E">M.E</option>
							<option value="M.Tech">M.Tech</option>
							<option value="MBA">MBA</option>
							<option value="PhD">PhD</option>
							<option value="BSc(IT)">BSc(IT)</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="pic">Picture</label>
						<input type="file" class="form-control-file" id="pic" name="image" value='<?php echo $demo[7]; ?>'>
					</div>
					<div class="form-group col-md-6">
						<label for="exp1">Experience</label>
						<input type="text" class="form-control" id="exp1" placeholder="Experience" name="experience" value='<?php echo $demo[8]; ?>'>
					</div>
					<div class="form-group col-md-6">
						<label for="about1">About</label>
						<input type="text" class="form-control" id="about1" placeholder="About" name="about" value='<?php echo $demo[9]; ?>'>
					</div>
					<div class="form-group col-md-6">
						<label for="exampleInputEmail1">Date of Joining</label>
						<input type="date" class="form-control" id="exampleInputEmail1" placeholder="Date of Joining" name="doj" value='<?php echo $demo[10]; ?>'>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="faculty-submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	<?php } }?>

	<!-- edit and update for batch only -->
	<?php 
	if(isset($_GET['bid'])){
		$id = secure($_GET['bid']);
		$string = "SELECT * FROM `batch` WHERE `B_ID`=$id AND D_flag=0";
		$temp = $sql->query($string);
		if($demo = $temp->fetch_row()){
			?>
			<div class="container">
				<div class="row mb-1 mx-0">
					<div class="col-sm-3 col-md-4">
						<h2>Edit Batch:-</h2>
					</div>
				</div>
				<form action="update.php?bid=<?php echo $id; ?>" method="post">
					<div class="form-row">
						<div class="form-group col-sm-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name"  placeholder="Name" name="name" value="<?php echo $demo[1]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="venue">Venue</label>
							<input type="text" class="form-control" id="venue" placeholder="Venue" name="venue" value="<?php echo $demo[2]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="fees">Fees</label>
							<input type="number" class="form-control" id="fees" placeholder="Fees" name="fees" value="<?php echo $demo[3]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="fid">ID</label>
							<input type="text" class="form-control" id="fid" placeholder="ID" name="id" value="<?php echo $demo[4]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="Date">Start Date</label>
							<input type="date" class="form-control" id="Date" name="startdate" value="<?php echo $demo[5]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="Date">End Date</label>
							<input type="date" class="form-control" id="Date" name="enddate" value="<?php echo $demo[6]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="dur">Duration</label>
							<input type="text" class="form-control" id="dur" placeholder="Duration" name="duration" value="<?php echo $demo[7]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="status">Status</label>
							<input type="number" class="form-control" id="status" placeholder="Status" name="status" value="<?php echo $demo[8]; ?>">
						</div>
					</div>
					<div class="form-row justify-content-center">
						<button class="btn btn-primary" name="batch-submit" type="submit">Submit</button>
					</div>
				</form>
			</div>
			<?php
		}
	}
	?>
	<!-- edit and update fot support staff -->
	<?php 
	if (isset($_GET['ssid'])) {
		$id = secure($_GET['ssid']);
		$string = "SELECT * FROM `supportstaff` WHERE `SS_ID`=$id AND D_flag=0";
		$temp = $sql->query($string);
		if ($demo = $temp->fetch_row()) {
			?>
			<div class="container">
				<div class="row mb-1 mx-0">
					<div class="col-sm-4 col-md-6">
						<h2>Edit Support Staff:-</h2>
					</div>
				</div>
				<form action="update.php?ssid=<?php echo $id; ?>" method="post">
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="First Name" name="firstname" value="<?php echo $demo[1]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" id="lname" placeholder="Last Name" name="lastname" value="<?php echo $demo[2]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="contact1">Contact</label>
							<input type="number" class="form-control" id="contact1" aria-describedby="emailHelp" placeholder="Contact" name="contact" value="<?php echo $demo[3]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="InputEmail1">Email address</label>
							<input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $demo[4]; ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="exampleInputPassword1">Address</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Address" name="address"><?php echo $demo[5]; ?></textarea>
						</div>
						<div class="form-group col-sm-6">
							<label for="doj">Date Of Join</label>
							<input type="date" class="form-control" id="doj" name="doj" value="<?php echo $demo[6]; ?>">
						</div>
					</div>
					<div class="row justify-content-center">
						<button type="submit" class="btn btn-primary" name="ss-submit">Submit</button>
					</div>
				</form>
			</div>
			<?php
		}
	}
	?>
	<!-- edit and update admission table -->
	<?php 
	if (isset($_GET['admid'])) {
		$id = secure($_GET['admid']);
		
		$string = "SELECT * FROM `admission` WHERE `A_ID`=$id AND D_flag=0";
		$temp = $sql->query($string);
		if ($demo = $temp->fetch_row()) {
			$str1 = "SELECT * FROM `student` WHERE `S_ID`=$demo[1] AND D_flag=0";
			$tmp1 = $sql->query($str1);

			$str2 = "SELECT * FROM `batch` WHERE `B_ID`=$demo[2] AND D_flag=0";
			$tmp2= $sql->query($str2);
			if ($demo1 = $tmp1->fetch_row() AND $demo2 = $tmp2->fetch_row()) {
				?>
				<div class="container">
					<div class="row mb-1 mx-0">
						<div class="col-sm-3 col-md-4">
							<h2>Edit Admission:-</h2>
						</div>
					</div>
					<form action="update.php?admid=<?php echo $id; ?>" method="post">
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="stu">Student First Name</label>
								<input type="text" class="form-control" id="stu"  placeholder="First Name" name="firstname" value="<?php echo $demo1[2]; ?>" disabled>
							</div>
							<div class="form-group col-sm-6">
								<label for="stu1">Last Name</label>
								<input type="text" class="form-control" id="stu1"  placeholder="Last Name" name="lastname" value="<?php echo $demo1[3]; ?>" disabled>
							</div>
							<div class="form-group col-sm-3">
								<label for="bat">Batch Name</label>
								<input type="text" class="form-control" id="bat" placeholder="Batch ID" name="batch_name" value="<?php echo $demo2[1]; ?>" disabled>
							</div>
							<div class="form-group col-sm-3">
								<label for="fees">Fees</label>
								<input type="number" class="form-control" id="fees" placeholder="Fees" name="fees" value="<?php echo $demo[3]; ?>">
							</div>
							<div class="form-group col-sm-3">
								<label for="date">Date</label>
								<input type="date" class="form-control" id="date" name="date" value="<?php echo $demo[4]; ?>">
							</div>
							<div class="form-group col-sm-3">
								<label for="stat">Status</label>
								<input type="text" class="form-control" id="stat"  placeholder="Status" name="status" value="<?php echo $demo[5]; ?>">
							</div>
						</div>
						<div class="row justify-content-center">
							<button type="submit" class="btn btn-primary" name="adm-submit">Submit</button>
						</div>
					</form>
				</div>
				<?php
			}
		}
	}
	//  edit and update expense 
	if (isset($_GET['eid'])) {
		$eid = secure($_GET['eid']);

		$string = "SELECT * FROM `expense` WHERE E_ID=$eid AND D_flag=0";
		$temp = $sql->query($string);
		while($demo = $temp->fetch_row()){
			?>
			<div class="container">
				<div class="row mb-1 mx-0">
					<div class="col-sm-3 col-md-4">
						<h2>Edit Expense:-</h2>
					</div>
				</div>
				<form action="update.php?eid=<?php echo $eid; ?>" method="post">
					<div class="form-row">
						<div class="form-group col-sm-12">
							<label for="reas">Reason<code>*</code></label>
							<textarea type="text" class="form-control" id="reas" name="reason"><?php echo $demo[1]; ?>
						</textarea>
					</div>
					<div class="form-group col-sm-4">
						<label for="amt">Amount<code>*</code></label>
						<input type="text" class="form-control" id="amt"  placeholder="Amount" name="amount" value="<?php echo $demo[2]; ?>">
					</div>
					<div class="form-group col-sm-4">
						<label for="faculty">Faculty<code>*</code></label>
						<select name="faculty" id="faculty" class="form-control" disabled>
							<?php 
							$string = "SELECT * FROM `faculty` WHERE D_flag=0";
							$temp = $sql->query($string);
							while($demo = $temp->fetch_row()){
								?>
								<option value="<?php echo $demo[0]; ?>"><?php echo $demo[1]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label for="date">Date<code>*</code></label>
						<input type="text" class="form-control" id="date" value="<?php echo Date('Y-m-d'); ?>" disabled>
					</div>
				</div>
				<div class="form-row justify-content-center">
					<button class="btn btn-primary" name="exp-submit" type="submit">Submit</button>
				</div>
			</form>
		</div>
		<?php
	}
}
?>

</div>
</div>
</body>
</html>
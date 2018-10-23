<?php
ob_start();
require("config.php");
include("sidebar.php");

if (isset($_GET['failed'])) {
	?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Failed To Add Expense</div></div></div>
	<?php
}
if (isset($_GET['success'])) { ?>
	<div class="container" id="dispnone"><div class="card mb-2 col-sm-6 col-lg-4 mx-auto" style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class="card-body">Expense Details Added Successfully</div></div></div>
<?php } ?>
<!-- right side content -->
<!-- add expense -->
<div class="container">
	<div class="row mb-1 mx-0">
		<div class="col-sm-3 col-md-4">
			<h2>Add Details:-</h2>
		</div>
	</div>
	<form action="add-expense.php" method="post">
		<div class="form-row">
			<div class="form-group col-sm-12">
				<label for="reas">Reason<code>*</code></label>
				<textarea type="text" class="form-control" id="reas" name="reason">
				</textarea>
			</div>
			<div class="form-group col-sm-4">
				<label for="amt">Amount<code>*</code></label>
				<input type="text" class="form-control" id="amt"  placeholder="Amount" name="amount">
			</div>
			<div class="form-group col-sm-4">
				<label for="faculty">Faculty<code>*</code></label>
				<select name="faculty" id="faculty" class="form-control">
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
			<button class="btn btn-primary" name="add-exp-submit" type="submit">Submit</button>
		</div>
	</form>
</div>
<?php
if (isset($_POST['add-exp-submit'])) {
	$reason = secure($_POST['reason']);
	$amount = secure($_POST['amount']);
	$faculty = secure($_POST['faculty']);

	$string = "INSERT INTO `expense`(`E_reason`, `E_amount`, `E_Admin_ID`, `E_date`) VALUES ('$reason' , '$amount' , '$faculty' , '".Date('Y-m-d')."')";
	$temp = $sql->query($string);
	if ($temp) {
		header("location:add-expense.php?success");
	}
	else {
		header("location:add-expense?failed");
	}
}
?>


</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#dexpense , #add-expense').toggleClass('active');
		$('#datatable').DataTable();
	});
</script>
</body>
</html>
 <?php
 ob_start();
 require("config.php");
 include("sidebar.php");
 ?>
 <!-- page content on right side -->
 <?php 
 if (isset($_GET['update-success'])) {
 	?>
 	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Admission Table Updated</div></div></div>
 <?php } ?>
 <?php if (isset($_GET['del-success'])) { ?>
 	<div class="container" id="dispnone"><div class='card mb-2 col-sm-5 col-lg-3 mx-auto' style="background-color: #4CFF65; color: green; border-color: green;text-align: center;"><div class='card-body'>Row Deleted</div></div></div>
 <?php } ?>
 <?php 
 if (isset($_GET['update-failed'])) {
 	?>
 	<div class="container" id="dispnone"><div class="card mb-2 col-sm-5 col-lg-3 mx-auto" style="background-color: #FFAAA1; color: red; border-color: red;text-align: center;"><div class="card-body">Update Failed</div></div></div>
 <?php } ?>
 <!-- page content on right side -->
 <div class="row mb-1">
 	<div class="col-sm-3">
 		<h2>Admission:-</h2>
 	</div>
 </div>
 <nav>
 	<div class="nav nav-tabs" id="nav-tab" role="tablist">
 		<a class="nav-item nav-link active col-sm-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
 		<a class="nav-item nav-link col-sm-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Batch</a>
 		<a class="nav-item nav-link col-sm-4" id="nav-dues-tab" data-toggle="tab" href="#nav-dues" role="tab" aria-controls="nav-dues" aria-selected="false">Dues</a>
 	</div>
 </nav>
 <div class="tab-content" id="nav-tabContent">
 	<div class="tab-pane fade show active mt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
 		<div class="container">
 			<div class="table-responsive">
 				<table class="display table" id="datatable">
 					<thead>
 						<tr>
 							<th>#</th>
 							<th>Full Name</th>
 							<th>Batch</th>
 							<th>Fees</th>
 							<th>Date</th>
 							<th>Operation</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php
 						$string = "SELECT * FROM `admission` WHERE `D_flag`=0 ORDER BY `A_B_ID` ASC";
 						$temp = $sql->query($string);
 						$i=1;
 						while ($demo = $temp->fetch_row()) {
 							?>
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
 								<td>
 									<a data-toggle="modal" data-target="#deletebtn<?php echo $demo[0]; ?>" title="delete" class="mr-2"><i class="fas fa-trash-alt text-danger"></i></a>
 									<a href="edit.php?admid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-dark" title="edit"></i></a>
 									<!-- Modal for delete-->
 									<div class="modal fade" id="deletebtn<?php echo $demo[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 										<div class="modal-dialog" role="document">
 											<div class="modal-content bg-dark text-light">
 												<div class="modal-header">
 													<h5 class="modal-title" id="exampleModalLabel">Delete Operation</h5>
 													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 														<span aria-hidden="true">&times;</span>
 													</button>
 												</div>
 												<div class="modal-body">
 													Are you sure you want to delete Admission Table ?
 												</div>
 												<div class="modal-footer ">
 													<button type="button" class="btn btn-light" data-dismiss="modal">
 														Close
 													</button>
 													<a href="delete.php?admid=<?php echo $demo[0]; ?>" title="delete"><button type="button" class="btn btn-danger">Delete
 													</button>
 												</a>
 											</div>
 										</div>
 									</div>
 								</div>
 							</td>
 						</tr>
 						<?php 
 						$i++;
 					}
 					?>
 				</tbody> 
 			</table>
 		</div>
 	</div>
 </div>
 <!-- first collpasible close here -->
 <!-- batch nav -->
 <div class="tab-pane fade mt-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 	<form action="admission.php" method="post">
 		<div class="row">
 			<div class="form-group col-sm-4">
 				<label>Batch Name:</label>
 				<select class="form-control" id="batch_id" name="batch">
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
 		</div>
 	</form>
 	<div class="table-responsive">
 		<table class="diplay table" id="datatable1">
 			<thead>
 				<tr>
 					<th>#</th>
 					<th>Student Name</th>
 					<th>Fees</th>
 					<th>Date</th>
 					<th>Operation</th>
 				</tr>
 			</thead>
 			<tbody class="ajax_value">
 				<!-- table will display here -->
 				<tr class="dsdsds">
 					<td></td>
 					<td class="text-right">Please Select Batch</td>
 				</tr>
 			</tbody>
 		</table>
 	</div>
 </div>
 <!-- dues nav -->
 <div class="tab-pane fade mt-3" id="nav-dues" role="tabpanel" aria-labelledby="nav-dues-tab">
 	<div class="container">
 		<div class="table-responsive">
 			<table class="display table" id="datatable">
 				<thead>
 					<tr>
 						<th>#</th>
 						<th>Full Name</th>
 						<th>Batch</th>
 						<th>Dues</th>
 						<th>Operation</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php
 					$string = "SELECT * FROM `admission` WHERE `A_ID` NOT IN (SELECT `Fee_A_ID` FROM `feepayment`) AND `D_flag`=0 ORDER BY `A_B_ID` ASC";
 					$temp = $sql->query($string);
 					$i=1;
 					while ($demo = $temp->fetch_row()) {
 						?>
 						<tr>
 							<td><?php echo $i; ?></td>
 							<td><?php 
 							$string1 = "SELECT `S_fname`, `S_lname` , `S_Roll` FROM `student` WHERE `S_ID`=$demo[1]";
 							$temp1 = $sql->query($string1);
 							if($demo1 = $temp1->fetch_row()) {
 								echo "$demo1[0] $demo1[1]";
 							}?></td>
 							<td><?php 
 							$string2 = "SELECT `B_ID` , `B_name` FROM `batch` WHERE `B_ID`=$demo[2]";
 							$temp2 = $sql->query($string2);
 							if ($demo2 = $temp2->fetch_row()) {
 								echo "$demo2[1]";
 							}?></td>
 							<td><?php
 							$string3 = "SELECT a.`A_fees`-SUM(f.`Fee_amount`) FROM `feepayment` AS f
 							INNER JOIN `admission` AS a ON f.`Fee_A_ID`=a.A_ID AND f.`Fee_A_ID`=$demo[0]
 							";
 							$temp3 = $sql->query($string3);
 							while($demo3 = $temp3->fetch_row()){
 								echo $demo3[0];
 							}
 							?></td>
 							<td><a href="payment.php?srid=<?php echo $demo1[2]; ?>&bid=<?php echo $demo2[0]; ?>"><i class="fas fa-money-bill-alt text-dark" title="payment"></i></a></td>
 						</tr>
 						<?php 
 						$i++;
 					}
 					?>
 				</tbody> 
 			</table>
 		</div>
 	</div>
 </div>
</div>


</div>
</div>
<script type="text/javascript">
	$('#batch_id').change(function(){
		var batch = $(this).val();
		console.log(batch);
		// ajax
		if (batch) {
			$.ajax(
			{
				type : "POST",
				datatype : "json",
				url : "backend.php",
				data : {
					batch : batch
				},
				success : function(data)
				{
					console.log
					$('.ajax_value').html(data);
				}
			}
			);
		}
		else
		{
			$('.dsdsds').show();
		}
	});
	$(document).ready(function(e){
		$('#admission , #dadmission').addClass('active');
		$('#datatable , #datatable1').DataTable();

		
	});

</script>
</body>
</html>
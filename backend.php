<?php
require("config.php");
//fetchig data from student and faculty table
if (isset($_POST['bname']) && !empty($_POST['bname'])) {
	$bname = secure($_POST['bname']);

	$string1 = "SELECT f.`F_fname` , f.`F_lname`
	FROM `batch` AS b
	INNER JOIN `faculty` AS f
	ON b.`B_ID`=$bname AND f.`F_ID`=b.B_F_ID";
	$temp1 = $sql->query($string1);

	$string = "SELECT s.`S_Roll` , s.`S_fname` , s.`S_lname` , a.`A_ID`
	FROM `student` AS s
	INNER JOIN `admission` AS a
	ON a.`A_B_ID`=$bname AND s.`S_ID`=a.A_S_ID";
	$temp = $sql->query($string);

	$data = array();
	if($demo1 = $temp1->fetch_assoc())
		array_push($data, $demo1);

	$response = "";
	$i=1;
	while($demo = $temp->fetch_row())
	{
		$response = $response."
		<tr>
		<td> $i</td>
		<td> $demo[0]</td>
		<td> $demo[1] $demo[2]</td>
		<td> <div class='form-check'>
		<input type='checkbox' class='form-check-input' value='1' name='checkbox".$i."' checked>
		</div></td>
		</tr>";
		$i++;
	}
	array_push($data, $response);
	echo json_encode($data);
}

//fetching data from admission using batch
if (isset($_POST['batch'])) {
	$batch = secure($_POST['batch']);

	$string = "SELECT * FROM `admission` WHERE A_B_ID=$batch AND D_flag=0";
	$temp = $sql->query($string);
	$i=1;
	while($demo = $temp->fetch_row()){
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php 
			$string1 = "SELECT `S_fname`, `S_lname` FROM `student` WHERE `S_ID`=$demo[1]";
			$temp1 = $sql->query($string1);
			if($demo1 = $temp1->fetch_row()) {
				echo "$demo1[0] $demo1[1]";
			}
			?></td>
			<td><?php echo $demo[3]; ?></td>
			<td><?php echo $demo[4]; ?></td>
			<td>
				<a data-toggle="modal" data-target="#deletebtn1<?php echo $demo[0]; ?>" title="delete"><i class="fas fa-trash-alt text-danger mr-1"></i></a>
				<a href="edit.php?admid=<?php echo $demo[0]; ?>"><i class="fas fa-user-edit text-dark"></i></a>
				<!-- Modal for delete-->
				<div class="modal fade" id="deletebtn1<?php echo $demo[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
}

// fetching batch name using student roll no
if (isset($_POST['sname'])) {
	$sname = secure($_POST['sname']);

	$string = "SELECT b.B_ID , b.B_name FROM `admission` AS a
	INNER JOIN batch AS b ON b.B_ID=a.`A_B_ID`
	INNER JOIN student AS s on s.S_Roll='$sname' AND s.S_ID=a.`A_S_ID`";
	$temp = $sql->query($string);
	while($demo = $temp->fetch_row()){
		?>
		<option value="<?php echo $demo[0]; ?>"><?php echo $demo[1]; ?></option>
		<?php 
	}
}
?>

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
?>

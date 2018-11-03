<?php
	include '../../classes/Databases.php';
	$db = new Databases;

	/* report generation of nurses */
	if(isset($_POST['load'])) {
		$output = '';
		$sql = "select * from nurses";
		$result = mysqli_query($db->conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['phone'].'</td>
							<td>'.$row['gender'].'</td>
							<td>'.$row['status'].'</td>
							<td>'.$row['hired'].'</td>
							<td>'.$row['shift'].'</td>
							<td>'.$row['dep'].'</td>
							<td>$ '.$row['salary'].'</td>
						</tr>';
		}
		echo $output;
	}

	if(isset($_POST['nfilter'])) {
		$output = '';
		$filter = '';
		$sDate = mysqli_real_escape_string($db->conn, $_POST['sDate']);
		$eDate = mysqli_real_escape_string($db->conn, $_POST['eDate']);
		$shift = mysqli_real_escape_string($db->conn, $_POST['shift']);
		if($shift == "all") {
			$filter = "";
		}
		else {
			$filter = "and shift = '$shift'";
		}
		$sql = "SELECT * FROM nurses WHERE hired BETWEEN '$sDate' AND '$eDate' ".$filter." ORDER BY id DESC";
		$result = mysqli_query($db->conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			$count = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$count += $row['salary'];
				$output .= '<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['phone'].'</td>
								<td>'.$row['gender'].'</td>
								<td>'.$row['status'].'</td>
								<td>'.$row['hired'].'</td>
								<td>'.$row['shift'].'</td>
								<td>'.$row['dep'].'</td>
								<td>$ '.number_format($row['salary'],2).'</td>
							</tr>';
			}
			$output .= '<tr>
							<td colspan="8">Total</td>
							<td>$ '.number_format($count,2).'</td>
						</tr>';
		}
		else {
			$output .= '<tr>
							<td colspan="9">No Data found ...</td>
						</tr>';
		}
		echo $output;
	}

	/* report generation of doctors */
	if(isset($_POST['docload'])) {
		$output = '';
		$sql = "select * from doctors";
		$result = mysqli_query($db->conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['phone'].'</td>
							<td>'.$row['gender'].'</td>
							<td>'.$row['status'].'</td>
							<td>'.$row['hired'].'</td>
							<td>'.$row['shift'].'</td>
							<td>'.$row['dep'].'</td>
							<td>$ '.$row['salary'].'</td>
						</tr>';
		}
		echo $output;
	}

	if(isset($_POST['docfilter'])) {
		$output = '';
		$filter = '';
		$sDate = mysqli_real_escape_string($db->conn, $_POST['sDate']);
		$eDate = mysqli_real_escape_string($db->conn, $_POST['eDate']);
		$shift = mysqli_real_escape_string($db->conn, $_POST['shift']);
		if($shift == "all") {
			$filter = "";
		}
		else {
			$filter = "and shift = '$shift'";
		}
		$sql = "SELECT * FROM doctors WHERE hired BETWEEN '$sDate' AND '$eDate' ".$filter." ORDER BY id DESC";
		$result = mysqli_query($db->conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			$count = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$count += $row['salary'];
				$output .= '<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['phone'].'</td>
								<td>'.$row['gender'].'</td>
								<td>'.$row['status'].'</td>
								<td>'.$row['hired'].'</td>
								<td>'.$row['shift'].'</td>
								<td>'.$row['dep'].'</td>
								<td>$ '.number_format($row['salary'],2).'</td>
							</tr>';
			}
			$output .= '<tr>
							<td colspan="8">Total</td>
							<td>$ '.number_format($count,2).'</td>
						</tr>';
		}
		else {
			$output .= '<tr>
							<td colspan="9">No Data found ...</td>
						</tr>';
		}
		echo $output;
	}
?>

<?php 
	include '../../classes/Databases.php'; 
	$db = new Databases;
	
	error_reporting(0);

	if(isset($_POST['delguest'])) {
		$id = mysqli_real_escape_string($db->conn, $_POST['id']);
		if ($db->delete_query("guest", $id)) { 
			echo "deleted successfull";
		}
	}
	if(isset($_POST['delExp_daily'])) {
		$id = mysqli_real_escape_string($db->conn, $_POST['id']);
		if ($db->delete_query("exp_daily", $id)) { 
			echo "deleted successfull";
		}
	}

	if(isset($_POST['delPayroll'])) {
		$id = mysqli_real_escape_string($db->conn, $_POST['id']);
		if ($db->delete_query("payroll", $id)) { 
			echo "deleted successfull";
		}
	}

	if(isset($_POST['delstaff'])) {
		$id = mysqli_real_escape_string($db->conn, $_POST['id']);
		if ($db->delete_query("staff", $id)) { 
			echo "deleted successfull";
		}
	}

	if(isset($_POST['delbail'])) {
		$id = mysqli_real_escape_string($db->conn, $_POST['id']);
		if ($db->delete_query("guarantee", $id)) { 
			echo "deleted successfull";
		}
	}

	if(isset($_POST['delroomtype'])) {
		$id = mysqli_real_escape_string($db->conn, $_POST['id']);
		if ($db->delete_query("roomtype", $id)) { 
			echo "deleted successfull";
		}
	}

 ?>
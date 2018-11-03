<?php 
	include '../../classes/Databases.php';
	$db = new Databases;
	
	error_reporting(0);

	/*==============================================================================
     |                              UPDATE USERS                                   |
     ===============================================================================*/
	if(isset($_POST['insertusers'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];
		$data = array(
			'username' => mysqli_real_escape_string($db->conn, $username),
			'email' => mysqli_real_escape_string($db->conn, $email),
			'password' => mysqli_real_escape_string($db->conn, $password),
			'phone' => mysqli_real_escape_string($db->conn, $phone),
			'status' => mysqli_real_escape_string($db->conn, $status),
		);
		$query = $db->insert_query('users', $data);
		echo 'Data inserted Successfull';                             
	}

	/*==============================================================================
     |                              INSERT  GUEST                                   |
     ===============================================================================*/
	if(isset($_POST['insertguest'])) {
		$fullname = mysqli_real_escape_string($db->conn, $_POST['name']);
		$phone = mysqli_real_escape_string($db->conn, $_POST['phone']);
		$nationality = mysqli_real_escape_string($db->conn, $_POST['nationality']);
		$gender = mysqli_real_escape_string($db->conn, $_POST['gender']);
		$description = mysqli_real_escape_string($db->conn, $_POST['description']);
		$grname = mysqli_real_escape_string($db->conn, $_POST['grname']);
		$grphone = mysqli_real_escape_string($db->conn, $_POST['grphone']);
		$grtitle = mysqli_real_escape_string($db->conn, $_POST['grtitle']);
		if($grname == '' || $grphone == '' || $grtitle == '') {
				$data = array(
					'name' => htmlspecialchars($fullname),
					'phone' => htmlspecialchars($phone),
					'nationality' => htmlspecialchars($nationality),
					'gender' => htmlspecialchars($gender),
					'description' => htmlspecialchars($description),
					'verifiyed' => 1
				);
			}
			else {
				$data = array(
					'name' => htmlspecialchars($fullname),
					'phone' => htmlspecialchars($phone),
					'nationality' => htmlspecialchars($nationality),
					'gender' => htmlspecialchars($gender),
					'description' => htmlspecialchars($description),
					'verifiyed' => 1,
					'grname' => htmlspecialchars($grname),
					'grphone' => htmlspecialchars($grphone),
					'grtitle' => htmlspecialchars($grtitle)
				);
			}
			if($db->insert_query('guest', $data)) {
				echo 'Data inserted Successfull';
			}
			else {
				echo 'Failed to Insert';
			}
	}

	/*==============================================================================
     |                            INSERT ROOM TYPE                                  |
     ===============================================================================*/
	if(isset($_POST['insertroomtype'])) {
		$roomtype = mysqli_real_escape_string($db->conn, $_POST['roomtype']);
		$price = mysqli_real_escape_string($db->conn, $_POST['price']);
		$data = array(
			'type' => htmlspecialchars($roomType),
			'price' => htmlspecialchars($price)
		);
		if($db->insert_query('roomtype', $data)) {
			echo 'Data inserted Successfull';
		}
		else {
			echo "Failed to Insert";
		}
	}

	/*==============================================================================
     |                            INSERT CHECKIN                                    |
     ===============================================================================*/
	if(isset($_POST['inserchecking'])) {
		$guest_id = mysqli_real_escape_string($db->conn, $_POST['guest_id']);
		$booking = mysqli_real_escape_string($db->conn, $_POST['booking']);
		$roomno = mysqli_real_escape_string($db->conn, $_POST['roomno']);
		$checking = mysqli_real_escape_string($db->conn, $_POST['checking']);
		$checkout = mysqli_real_escape_string($db->conn, $_POST['checkout']);
		$staying = mysqli_real_escape_string($db->conn, $_POST['staying']);
		$price = mysqli_real_escape_string($db->conn, $_POST['tot_price']);
		$tot_price = $staying * $price;
		$update = array();
		$condition = array();
		$print = "";
		$sqlPrice = "SELECT ";
		// $response = mysqli_query($db->conn, $sqlPrice);
		// foreach ($response as $post) {
			if($checking == '' || $checkout == '' || $staying == '') {
				$data = array(
					'guest_id' => htmlspecialchars($guest_id),
					'booking' => htmlspecialchars($booking),
					'room_no' => htmlspecialchars($roomno) /*,
					'tot_price' => mysqli_real_escape_string($db->conn, $tot_price)*/
				);
			}
			else {
				$data = array(
					'guest_id' => htmlspecialchars($guest_id),
					'booking' => htmlspecialchars($booking),
					'room_no' => htmlspecialchars($roomno),
					'checkin' => htmlspecialchars($checking),
					'checkout' => htmlspecialchars($checkout),
					'staying' => htmlspecialchars($staying),
					'status' => 1,
					'rem_price' => htmlspecialchars($tot_price),
					'tot_price' => htmlspecialchars($tot_price)
				);
			}
		//}
		
		$sql = "SELECT * FROM room r, roomtype rt WHERE r.id = $roomno AND (rt.id = r.type_id)";
		$result = mysqli_query($db->conn, $sql);
			while($row = mysqli_fetch_assoc($result)) {
				if($row['type'] == 'single' || $row['type'] == 'family') {
					$update['status'] = 1;
					$condition['id'] = $roomno;
					$print = $db->update_query('room', $update, $condition);
				}
				else {
					$counter = $row['counter'];
					if($counter < 1 ) {
						//$counter++;
						$update['counter'] = $counter + 1;
						$condition['id'] = $roomno;
						$print = $db->update_query('room', $update, $condition);
					}
					else  {
						$update['counter'] = 2;
						$update['status'] = 1;
						$condition['id'] = $roomno;
						$print = $db->update_query('room', $update, $condition);
					}
				}
			}
			$query = $db->insert_query('checkin', $data);
		
		// fields means the colums of the room table
		//$fields = 
		echo 'Data inserted Successfull';
	}

	/*==============================================================================
     |                       INSERT DAILY EXPENSES                                 |
     ===============================================================================*/
	if(isset($_POST['insertDailyExp'])) {
		$type = mysqli_real_escape_string($db->conn, $_POST['type']);
		$amount = mysqli_real_escape_string($db->conn, $_POST['amount']);
		$description = mysqli_real_escape_string($db->conn, $_POST['description']);
		$dt = date('Y-m-d');
	    $data = array(
	        'type' => htmlspecialchars($type),
	        'amount' => htmlspecialchars($amount),
	        'description' => htmlspecialchars($description)
	    );
		$query = $db->insert_query('exp_daily', $data);
		$sql = "select debit from medium where dates = CURRENT_DATE";
		$result = mysqli_query($db->conn, $sql);
		if(mysqli_num_rows($result) > 0) {
			// update code
			$sql1 = "UPDATE medium SET debit = debit + ".$amount." WHERE dates = CURRENT_DATE";
			if(mysqli_query($db->conn, $sql1)) {
				echo 'Data inserted Successfull';
			}
		}
		else {
			// insert code
			$datas = array(
				'debit' => htmlspecialchars($amount),
				'credit' => 0,
				'dates' => $dt
			);
			$db->insert_query('medium', $datas);
			echo 'Data inserted Successfull';
		}
	 }

	/*==============================================================================
     |                            INSERT PAYROLL                                    |
     ===============================================================================*/
	 if(isset($_POST['insertPayroll'])) {
		$staff_id = $_POST['staff_id'];
		$advancePay = $_POST['advancePay'];
		$remainPay = $_POST['remainPay'];
		$amount = $_POST['amount'];
    
     
      	$data = array(
			'staff_id' => mysqli_real_escape_string($db->conn, $staff_id),
			'amount' => mysqli_real_escape_string($db->conn, $amount),
          	'advance_pay' => mysqli_real_escape_string($db->conn, $advancePay),
          	'rem_pay' => mysqli_real_escape_string($db->conn, $remainPay)
        );
	  	$query = $db->insert_query('payroll', $data);
	  	//echo '<pre>' ,print_r($data,1), '</pre>';
      	echo 'Data inserted Successfull';
  
   }

	/*==============================================================================
    |                                INSERT STAFF                                   |
    ===============================================================================*/
	if(isset($_POST['insertstaff'])) {
		$name = mysqli_real_escape_string($db->conn, $_POST['name']);
		$phone = mysqli_real_escape_string($db->conn, $_POST['phone']);
		$gender = mysqli_real_escape_string($db->conn, $_POST['gender']);
		$type = mysqli_real_escape_string($db->conn, $_POST['type']);
		$shift = mysqli_real_escape_string($db->conn, $_POST['shift']);
		$salary = mysqli_real_escape_string($db->conn, $_POST['salary']);

	    $data = array(
	        'name' => htmlspecialchars($name),
	        'phone' => htmlspecialchars($phone),
			'gender' => htmlspecialchars($gender),
			'type' => htmlspecialchars($type),
	        'shift' => htmlspecialchars($shift),
	        'salary' => htmlspecialchars($salary)
	    );
	    if($db->insert_query('staff', $data)) {
	    	echo 'Data inserted Successfull';
	    }
	    else {
	    	echo "Failed to insert";
	    }
 	}

 	//insert rooooom
 	if(isset($_POST['insertRooms'])) {
		$roomType = mysqli_real_escape_string($db->conn, $_POST['roomType']);
		$floor = mysqli_real_escape_string($db->conn, $_POST['floor']);
		$roomno = mysqli_real_escape_string($db->conn, $_POST['roomno']);
		$beds = mysqli_real_escape_string($db->conn, $_POST['beds']);
	    $data = array(
	        'type_id' => mysqli_real_escape_string($db->conn, $roomType),
	        'floor_id' => mysqli_real_escape_string($db->conn, $floor),
	        'room_no' => mysqli_real_escape_string($db->conn, $roomno),
	        'beds' => mysqli_real_escape_string($db->conn, $beds)
	    );
	    if($db->insert_query('room', $data)) {
	    	echo 'Data inserted Successfull';
	    }
	    else {
	    	echo "Failed to insert";
	    }
 	}

 ?>
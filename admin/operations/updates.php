<?php 
    session_start();
	include '../../classes/Databases.php'; 
	$db = new Databases;
	
	//error_reporting(0);
    /*==============================================================================
     |                              UPDATE USERS                                   |
     ===============================================================================*/
if(isset($_POST['updateProfile'])) {
	$id = $_SESSION['userid'];
	$pictext;
	$fullname = mysqli_real_escape_string($db->conn, $_POST['upname']);
	$username = mysqli_real_escape_string($db->conn, $_POST['upusername']);
	$email = mysqli_real_escape_string($db->conn, $_POST['upemail']);
	$phone = mysqli_real_escape_string($db->conn, $_POST['upphone']);
	$picname = mysqli_real_escape_string($db->conn, $_POST['picname']);
    $picture = mysqli_real_escape_string($db->conn, $_FILES['uppicture']['name']);
    
    if(!($_FILES['uppicture']['name'])) {
        $pictext = mysqli_real_escape_string($db->conn, $picname);
    }
    else {
        $pictext = "uploads/".$_FILES['uppicture']['name'];
    }
    $target_path = $db->document_root().$pictext;
    
	$data = array(
	    'name' => htmlspecialchars($fullname),
		'username' => htmlspecialchars($username),
		'email' => htmlspecialchars($email),
		'phone' => htmlspecialchars($phone),
		'picture' => htmlspecialchars($pictext)
	);

	$where_condition = array(
		'id' => mysqli_real_escape_string($db->conn, $id)
	);
	if($db->update_query("users", $data, $where_condition)){
	    move_uploaded_file($_FILES['uppicture']['tmp_name'], $target_path);
		//echo "updated data successfull";
		echo $pictext;
	}
	else {
		echo "waxba lama xarayn";
	}
}

if(isset($_POST['changepwd'])) {
    $oldpwd = mysqli_real_escape_string($db->conn, $_POST['oldpwd']);
    $newpwd = mysqli_real_escape_string($db->conn, $_POST['newpwd']);
    $oldpwd = htmlspecialchars($oldpwd);
    $newpwd = htmlspecialchars($newpwd);
    $hashpwd = password_hash($newpwd, PASSWORD_DEFAULT);
    $data = array(
        'password'=>$hashpwd
    );
    $where_condition = array(
        'id'=>$_SESSION['userid']
    );
    $sql = "SELECT password FROM users WHERE id = ".$_SESSION['userid'];
    $result = mysqli_query($db->conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            $pass_hash = $row['password'];
            if(password_verify($oldpwd, $pass_hash)) {
                $query = "UPDATE users SET password = '$hashpwd' WHERE id=".$_SESSION['userid'];
                if($db->update_sql($query)){
                    echo "updated Password successfull";
                }
                else {
                    echo "waxba lama xarayn";
                }
            }
            else {
                echo "invalid password";
            }
        }
    }
}


    /*==============================================================================
     |                   UPDATE ROOM TYPE FOR SINGLE, FAMILY, TRIPLE               |
     ===============================================================================*/
if(isset($_POST['updateroomtype'])) {
	$id = mysqli_real_escape_string($db->conn, $_POST['updateid']);
	$roomtype = mysqli_real_escape_string($db->conn, $_POST['uproomtype']);
	$price = mysqli_real_escape_string($db->conn, $_POST['upprice']);
	$data = array(
		'type' => htmlspecialchars($roomtype),
		'price' => htmlspecialchars($price)
	);

	$where_condition = array(
		'id' => htmlspecialchars($id)
	);
	if($db->update_query("roomtype", $data, $where_condition)){
		echo "updated data successfull";
	}
	else {
		echo "waxba lama xarayn";
	}
}

    /*==============================================================================
     |                              UPDATE STAFF                                   |
     ===============================================================================*/
if(isset($_POST['updatestaff'])) {
	$id = mysqli_real_escape_string($db->conn, $_POST['updateid']);
	$name = mysqli_real_escape_string($db->conn, $_POST['upname']);
	$phone = mysqli_real_escape_string($db->conn, $_POST['upphone']);
	$gender = mysqli_real_escape_string($db->conn, $_POST['upgender']);
	$type = mysqli_real_escape_string($db->conn, $_POST['uptype']);
	$shift = mysqli_real_escape_string($db->conn, $_POST['upshift']);
	$salary = mysqli_real_escape_string($db->conn, $_POST['upsalary']);
	$data = array(
		'name' => htmlspecialchars($name),
		'phone' => htmlspecialchars($phone),
		'gender' => htmlspecialchars($gender),
		'type' => htmlspecialchars($type),
		'shift' => htmlspecialchars($shift),
		'salary' => htmlspecialchars($salary)
	);
	$where_condition = array(
		'id' => htmlspecialchars($id)
	);
	if($db->update_query("staff", $data, $where_condition)){
		echo "updated data successfull";
	}
	else {
		echo "waxba lama xarayn";
	}
}

    /*==============================================================================
     |                              UPDATE HOTEL                                   |
     ===============================================================================*/
    if(isset($_POST['updateHotel'])) {
        $id = $_SESSION['hotelid'];
        $pictext;
        $name = mysqli_real_escape_string($db->conn, $_POST['upname']);
        $location = mysqli_real_escape_string($db->conn, $_POST['uplocation']);
        $address = mysqli_real_escape_string($db->conn, $_POST['upaddress']);
        $picname = mysqli_real_escape_string($db->conn, $_POST['picname']);
        $picture = mysqli_real_escape_string($db->conn, $_FILES['uppicture']['name']);

        /*removing the cross site scripting*/
        $name = htmlspecialchars($name);
        $location = htmlspecialchars($location);
        $address = htmlspecialchars($address);
        $picname = htmlspecialchars($picname);
        
       if(!($_FILES['uppicture']['name'])) {
            // $pictext = mysqli_real_escape_string($db->conn, substr($picname, 8));
            $pictext = mysqli_real_escape_string($db->conn, $picname);
        }
        else {
            $pictext = "uploads/".$_FILES['uppicture']['name'];
        }
        $target_path = $db->document_root().$pictext;
        $sql = "UPDATE hotel SET name = '$name', location='$location', address='$address', picture='$pictext' WHERE id = $id";
        if($db->update_sql($sql)) {
            move_uploaded_file($_FILES['uppicture']['tmp_name'], $target_path);
             echo "updated data successfull";
        }
        else {
            echo "waxba lama xarayn";
        }
    }

    /*==============================================================================
     |                              UPDATE GUEST                                    |
     ===============================================================================*/
    if(isset($_POST['updateguest'])) {
        $id = mysqli_real_escape_string($db->conn, $_POST['updateid']);
        $upname = mysqli_real_escape_string($db->conn, $_POST['upname']);
        $upphone = mysqli_real_escape_string($db->conn, $_POST['upphone']);
        $upnationality = mysqli_real_escape_string($db->conn, $_POST['upnationality']);
        $upgender = mysqli_real_escape_string($db->conn, $_POST['upgender']);
        $updescription = mysqli_real_escape_string($db->conn, $_POST['updescription']);
        $upgrname = mysqli_real_escape_string($db->conn, $_POST['upgrname']);
        $upgrphone = mysqli_real_escape_string($db->conn, $_POST['upgrphone']);
        $upgrtitle = mysqli_real_escape_string($db->conn, $_POST['upgrtitle']);

        $data = array(
            'name' => htmlspecialchars($upname),
            'phone' => htmlspecialchars($upphone),
            'nationality' => htmlspecialchars($upnationality),
            'gender' => htmlspecialchars($upgender),
            'description' => htmlspecialchars($updescription),
            'grname' => htmlspecialchars($upgrname),
            'grphone' => htmlspecialchars($upgrphone),
            'grtitle' => htmlspecialchars($upgrtitle)
        );

        $where_condition = array(
            'id' => htmlspecialchars($id)
        );
        if($db->update_query("guest", $data, $where_condition)){
            echo "updated data successfull";
        }
        else {
            echo "waxba lama xarayn";
        }
    }

    /*==============================================================================
     |                              UPDATE CHECKIN                                  |
     ===============================================================================*/

    // main function for subtracting rooms and paid money
    if(isset($_POST['subCheckin'])) {
    	$id = mysqli_real_escape_string($db->conn, $_POST['id']);
    	$guest_id = mysqli_real_escape_string($db->conn, $_POST['guest_id']);
    	$paid = mysqli_real_escape_string($db->conn, $_POST['paid']);
        $last_row = mysqli_insert_id($db->conn);
    	$tot_price=0;
    	$room;
    	$query = "SELECT id, room_no, rem_price , tot_price FROM checkin WHERE id = $id AND guest_id = $guest_id";
    	$result = mysqli_query($db->conn, $query);
    	foreach($result as $row) {
            $data = array(
                "guest_id"=>$guest_id,
                "check_id"=>$row['id'], 
                "amount"=>$paid
            );
    		if(($row['rem_price'] - $paid) == 0) {
    			$tot_price = $row['tot_price'];
    			$room = $row['room_no'];
    			$sql = "UPDATE checkin SET status = 0, rem_price = rem_price - $paid , paid = paid + $paid WHERE id = $id AND guest_id = $guest_id";
    			$query = "SELECT * FROM room r, roomtype rt WHERE r.id = $room AND (rt.id = r.type_id)";
    			$room_post = $db->execute_sql($query);
    			foreach ($room_post as $key) {
    				if($key['type'] == 'single' || $key['type'] == 'family') {
    					$sql1 = "UPDATE room SET status = 0 WHERE id = $room";
    					$db->update_sql($sql1);
    				}
    				else {
    					if($key['counter'] < 1) {
    						echo "all beds are available";
    						return;
    					}
    					else {
    						$query1 = "UPDATE room SET counter = counter - 1, status = 0 WHERE id = $room";
    						$db->update_sql($query1);
    					}
    					
    				}
    			}
		    	$db->update_sql($sql);
		    	$db->insert_query("check_trn",$data); 
		    	echo "Transactions Completed";
    		}
    		else {
	    		$sql = "UPDATE checkin SET rem_price = rem_price - $paid , paid = paid + $paid WHERE id = $id AND guest_id = $guest_id";
		    	$db->update_sql($sql);
                $db->insert_query("check_trn",$data);
		    	echo "successfull paid this check";
		    	// echo $sql;
	    	}
    	}
    	
    }

 // update checkin
    if(isset($_POST['updateChecking'])) {
        $tot_price = 0;
        $id = htmlspecialchars(mysqli_real_escape_string($db->conn, $_POST['id']));
        $guest_id = htmlspecialchars(mysql_real_escape_string($db->conn, $_POST['guest_id']));
        $type_id = htmlspecialchars(mysqli_real_escape_string($db->conn, $_POST['type_id']));
        // waa room id-ga inta aan la badalin oo kan cusub la qaadan baa ah beforeroom
        $beforeroom = $_POST['beforeroom'];
        $checkeddate = htmlspecialchars(mysqli_real_escape_string($db->conn, $_POST['checkeddate']));
        $checkout = htmlspecialchars(mysqli_real_escape_string($db->conn, $_POST['checkout']));
        $staying = htmlspecialchars(mysql_real_escape_string($db->conn, $_POST['staying']));
        $room = $_POST['room'];
        $rem_price=0;
        $total_price=0;
        $price = $_POST['price'];
        $tot_price = $price * $staying;
        $update = array();
        $update1 = array();
        $condition = array();
        $condition1 = array();
        $counter = 0;
        $counter1 = 0;
        $checknull; /* waa marka aan rabo in aan u xareeyo qof qol booking ku samaystay baa hubin in checkin null yahay*/
        $sql = "SELECT * FROM checkin WHERE id=$id";
        $data_post = $db->execute_sql($sql);
        foreach ($data_post as $post) {
            $checknull = $post['checkin'];
            $rem_price = $post['rem_price'];
            $total_price = $post['tot_price'];
        }
        $rem_price = $rem_price + ($tot_price - $total_price);
        if($checknull == null) {
            
            $query = "UPDATE checkin SET guest_id=$guest_id, checkin='$checkeddate', checkout='$checkout', room_no=$room, staying=$staying, status = 1, rem_price = $rem_price, tot_price = $tot_price WHERE id=$id";
        }
        else {
            $query = "UPDATE checkin SET guest_id=$guest_id, checkin='$checkeddate', checkout='$checkout', room_no=$room, staying=$staying, rem_price = $rem_price, tot_price = $tot_price WHERE id=$id";

            if($beforeroom != $room) {
                // marka hore qolkii hore tirtir xogtiisa
                $sql1 = "SELECT * FROM room r, roomtype rt WHERE (r.id = $beforeroom) AND r.type_id = rt.id";
                $result = mysqli_query($db->conn, $sql1);
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['type'] == "single" || $row['type'] == "family") {
                        $update['status'] = 0;
                        $condition['id'] = $beforeroom;
                        $print = $db->update_query('room', $update, $condition);
                    }
                    // triple system code generation
                    /*else if ($row['type']=="triple") {
                        $counter = $row['counter'];
                        if($counter > 1 ) {
                            //$counter++;
                            $update['counter'] = $counter - 1;
                            $update['status'] = 0;
                            $condition['id'] = $beforeroom;
                            $print = $db->update_query('room', $update, $condition);
                        }
                        else  {
                            $update['counter'] = 0;
                            $update['status'] = 0;
                            $condition['id'] = $beforeroom;
                            $print = $db->update_query('room', $update, $condition);
                        }
                    }*/
                    else {
                        $counter = $row['counter'];
                        if($counter > 1 ) {
                            //$counter++;
                            $update['counter'] = $counter - 1;
                            $update['status'] = 0;
                            $condition['id'] = $beforeroom;
                            $print = $db->update_query('room', $update, $condition);
                        }
                        else  {
                            $update['counter'] = 0;
                            $update['status'] = 0;
                            $condition['id'] = $beforeroom;
                            $print = $db->update_query('room', $update, $condition);
                        }
                    }
                }

                // marka labaad u cosbonaysii oo gali qolka cusub
                $sql2 = "SELECT * FROM room r, roomtype rt WHERE (r.id = $room) AND r.type_id = rt.id";
                $result1 = mysqli_query($db->conn, $sql2);
                while($data = mysqli_fetch_assoc($result1)) {
                    if($data['type'] == "single" || $data['type'] == "family") {
                        $update1['status'] = 1;
                        $condition1['id'] = $room;
                        $print = $db->update_query('room', $update1, $condition1);
                    }
                    else {
                        $counter1 = $data['counter'];
                        if($counter1 < 1 ) {
                            //$counter++;
                            $update1['counter'] = $counter1 + 1;
                            $condition1['id'] = $room;
                            $print = $db->update_query('room', $update1, $condition1);
                        }
                        else  {
                            $update1['counter'] = 2;
                            $update1['status'] = 1;
                            $condition1['id'] = $room;
                            $print = $db->update_query('room', $update1, $condition1);
                        }
                    }
                }
            }
        }
        if($db->update_sql($query)){
            echo "updated data successfull";
            echo $query;
        }
        else {
            echo "waxba lama xarayn";
        }
    //}
    }

    // lacagaha khaldamay ee gadaal laga saxay
    if(isset($_POST['updateReview'])) {
        $count = 0; $total = 0;
        $check_id = 0;
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $guest_id = mysqli_real_escape_string($db->conn, $_POST['guest_id']);
        $amount = mysqli_real_escape_string($db->conn, $_POST['amount']);
        $id = htmlspecialchars($id);
        $guest_id = htmlspecialchars($guest_id);
        $amount = htmlspecialchars($amount);
        $sql = "UPDATE check_trn SET amount = $amount WHERE id = $id AND guest_id = $guest_id";
        $sql1 = "SELECT check_id, amount FROM check_trn WHERE guest_id = $guest_id AND id = $id";
        $data_post = $db->execute_sql($sql1);
        foreach ($data_post as $row) {
            $count = $row['amount'];
            $check_id = $row['check_id'];
        }
        $total = $count - $amount;
        $query = "UPDATE checkin SET rem_price = rem_price + ($total), paid = paid - ($total) WHERE guest_id = $guest_id AND id = $check_id";
        if(mysqli_query($db->conn, $query)) {
            $db->update_sql($sql);
        }
        //echo $query;
        //$db->update_sql($sql);
        //echo $sql;
    }

    /*==============================================================================
     |                              UPDATE EXPENSES                                |
     ===============================================================================*/

     if(isset($_POST['updateDailyExp'])) {
        $id = mysqli_real_escape_string($db->conn, $_POST['updateid']);
        $type = mysqli_real_escape_string($db->conn, $_POST['uptype']);
        $amount = mysqli_real_escape_string($db->conn, $_POST['upamount']);
        $description = mysqli_real_escape_string($db->conn, $_POST['updescription']);
        $checkAmount = 0;
        $balance = 0;
        $data = array(
           'type' => htmlspecialchars($type),
           'amount' => htmlspecialchars($amount),
           'description' => htmlspecialchars($description)
        );
    
        $where_condition = array(
            'id' => htmlspecialchars($id)
        );
        $sql = "SELECT amount FROM exp_daily WHERE id = $id";
        $result = mysqli_query($db->conn, $sql);
        foreach($result as $row) {
            $checkAmount = $row['amount'];
        }
        $balance = $checkAmount - $amount;
        $query = "UPDATE medium SET debit = debit - ($balance) WHERE dates = CURRENT_DATE";
        if(mysqli_query($db->conn, $query)) {
            if($db->update_query("exp_daily", $data, $where_condition)){
                echo "updated data successfull";
            }
            else {
                echo "waxba lama xarayn";
            }
        }
    }

    // inserts and transfers money from medium table to expenses table per daily transaction
    if(isset($_POST['insertTransfer'])) {
        $transfer = mysqli_real_escape_string($db->conn, $_POST['TranDate']);
        $amount = mysqli_real_escape_string($db->conn, $_POST['TranAmount']);
        $balance = 0;
        $data = array(
            'amount' => htmlspecialchars($amount),
            'transfer' => htmlspecialchars($transfer)
        );
        if($amount <= 0) {
            echo "Please enter valid Money.";
        }
        else {
            $sql = "SELECT * FROM medium WHERE dates = '$transfer'";
            $result = mysqli_query($db->conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    $balance = $row['debit'];
                }
                if($balance == 0) {
                    echo "Allready Transfered";
                }
                else {
                    if($db->insert_query('expenses', $data)) {
                        $query = "UPDATE medium SET debit = debit - $amount, credit = $amount WHERE dates = '$transfer'";
                        $db->update_sql($query);
                        echo "Successfull Transfered";
                    }
                }
            }
            else {
                echo "Please select a valid date";
            }
        }
    
    }

    /*==============================================================================
     |                              UPDATE PAYROLL                                  |
     ===============================================================================*/

     // updates payroll table
     if(isset($_POST['UpdatePayroll'])) {
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $staff_id = mysqli_real_escape_string($db->conn, $_POST['staff_id']);
        $payroll_id = mysqli_real_escape_string($db->conn, $_POST['payroll_id']);
        $updateamount = mysqli_real_escape_string($db->conn, $_POST['updateAmount']);
        $checkAmount = 0;
        $amount = 0;
        $data = array(
            'staff_id' => htmlspecialchars($staff_id),
            'amount' => htmlspecialchars($updateamount)
        );
    
        $where_condition = array(
            'id' => htmlspecialchars($id)
        );
        $sql = "SELECT amount FROM salary_activity WHERE id = $id";
        $result = mysqli_query($db->conn, $sql);
        foreach($result as $row) {
            $checkAmount = $row['amount'];
        }
        $amount = $checkAmount - $updateamount;
        $query = "UPDATE payroll SET amount=amount - ($amount), advance_pay = advance_pay - ($amount), rem_pay = rem_pay + ($amount) WHERE staff_id= $staff_id and id = $payroll_id";
        if(mysqli_query($db->conn, $query)) {
            if($db->update_query("salary_activity", $data, $where_condition)){
                echo "updated data successfull";
            }
            else {
                echo "waxba lama xarayn";
            }
        }
    }

    // inserts the data into salary activity table and updates into payroll table
    // waa qaybta lacag horumarinta ama advanced payment 
    if(isset($_POST['insertPayroll'])) {
        $staff_id = mysqli_real_escape_string($db->conn, $_POST['staff_id']);
        $payroll_id;
        $id;
        $salary = mysqli_real_escape_string($db->conn, $_POST['salary']);
        $advance = mysqli_real_escape_string($db->conn, $_POST['advancePay']);
        $remaining = $salary - $advance;
        $getDate = date('Y-m');
        $condition = array();
        $data2 = array();
        $data = array(
            'staff_id' => htmlspecialchars($staff_id),
            'amount' => htmlspecialchars($advance),
            'advance_pay' => htmlspecialchars($advance),
            'rem_pay' => mysqli_real_escape_string($db->conn, $remaining)
        );

        $query = "SELECT id , created_at FROM payroll WHERE staff_id = $staff_id AND created_at LIKE '%$getDate%'";
        $result = mysqli_query($db->conn, $query);
        if(mysqli_num_rows($result) > 0) {
            //update code code for payroll table and inserts into salary activity 
            foreach ($result as $row) {
                $id = $row['id'];
                $payroll_id = $id;
            }
            $condition['staff_id'] = mysqli_real_escape_string($db->conn, $staff_id);
            $data2['staff_id'] = mysqli_real_escape_string($db->conn, $staff_id);
            $data2['payroll_id'] = mysqli_real_escape_string($db->conn, $payroll_id);
            $data2['amount'] = mysqli_real_escape_string($db->conn, $advance);
            $data2['paid_date'] = date('Y-m-d');
            $query = "update payroll set amount = amount + $advance , advance_pay = advance_pay + $advance , rem_pay = rem_pay - $advance where id = $id";
            $db->update_sql($query);
            $db->insert_query('salary_activity', $data2);
            echo "Transaction Completed";
        }
        else {
            // insert code for salary activity table
            $db->insert_query('payroll', $data);
            $last_row = mysqli_insert_id($db->conn);
            $data2 = array(
                'staff_id' => mysqli_real_escape_string($db->conn, $staff_id),
                'payroll_id' => mysqli_real_escape_string($db->conn, $last_row),
                'amount' => mysqli_real_escape_string($db->conn, $advance),
                'paid_date' => date('Y-m-d')
            );
            
            $db->insert_query('salary_activity', $data2);
            echo "Transaction Completed";
        }
    }

    // waa qaybta mushahar bixinta oo dhamaystiran marka ay bisha dhamaato
    if(isset($_POST['checkPayroll'])) {
        $staff_id = htmlspecialchars(mysqli_real_escape_string($db->conn, $_POST['staff_id']));
        $salary = htmlspecialchars(mysqli_real_escape_string($db->conn, $_POST['salary']));
        $dates = date('Y-m', strtotime("-1 months"));
        // midan hoose waa sanadka bisha iyo maalinta buu soo saaraya
        $dateDay = date('Y-m-d', strtotime("-1 months"));
        $remain;
        $status = 0;
        $sql = "SELECT * FROM payroll WHERE staff_id = $staff_id AND created_at LIKE '%$dates%'";
        $result = mysqli_query($db->conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            //update code hree
            foreach ($result as $row) {
                $remain = $row['rem_pay'];
                $status = $row['status'];
            }
            if($status == 1) {
                echo "All Ready Taked...";
            }
            else {
                $query = "UPDATE payroll SET rem_pay = rem_pay - $remain, amount = amount + $remain, status = 1, payroll_date = '$dateDay' WHERE staff_id = $staff_id AND created_at LIKE '%$dates%'";
                if($db->update_sql($query)) {
                    echo "Successfull Accepted Advance Salary...";
                }
                else {
                    echo "Failed to Update";
                }
            }
        }
        else {
            $query = "INSERT INTO payroll (staff_id, amount, status, payroll_date) VALUES ($staff_id, $salary, 1, '$dateDay')";
            //$db->insert_sql($query);
            if($db->insert_sql($query)) {
                echo "Taked the Complete Salary";
            }
            else {
                echo "Failed to Insert";
            }
        }
    }

    //======== update Rooms==========//
    if(isset($_POST['UpdateRooms'])) {
        $id = mysqli_real_escape_string($db->conn, $_POST['updateid']);
        $updateroomtype = mysqli_real_escape_string($db->conn, $_POST['uptype_id']);
        $updatefloors = mysqli_real_escape_string($db->conn, $_POST['upfloor_id']);
        $updateroomNo = mysqli_real_escape_string($db->conn, $_POST['uproomno']);
        $updatebeds = mysqli_real_escape_string($db->conn, $_POST['upbeds']);
        $data = array(
           'type_id' => htmlspecialchars($updateroomtype),
           'floor_id' => htmlspecialchars($updatefloors),
           'room_no' => htmlspecialchars($updateroomNo),
           'beds' => htmlspecialchars($updatebeds)
        );
    
        $where_condition = array(
            'id' => htmlspecialchars($id)
        );
        if($db->update_query("room", $data, $where_condition)){
            echo "updated data successfull";
        }
        else {
            echo "waxba lama xarayn";
        }
    }

?>


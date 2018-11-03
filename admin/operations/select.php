<?php
    session_start();
	include '../../classes/Databases.php';
	$db = new Databases;
	
	error_reporting(0);

    /*=======================| Login |============================
      ==============================================================
      || this section or block is protected by Login operations  ||
      ==============================================================
    */
    if(isset($_POST['LoginData'])){
        $status;
        $username = $_POST['username'];
        $password = $_POST['password'];
        //$password = md5($password);

        $response = array();

        $query = "SELECT * FROM users WHERE username = '$username' AND status = 1";
        $result = mysqli_query($db->conn, $query);
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status = $row['status'];
                $pass_hash = $row['password'];
                if(password_verify($password, $pass_hash)) {
                    $response['success'] = "Login Successfull";
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['fullname'] = $row['name'];
                    $_SESSION['picture'] = $db->base_url() . $row['picture'];
                    $_SESSION['username'] = $username;
                }
                else {
                    $response['error'] = "Incorrect Username or Password!";
                }
            }
            echo json_encode($response);
        }
        /*elseif($status !== 1) {
            $response['status'] = "User not active. Please Contact the Team";
        }*/
        else {
            //$response['status'] = "User not active. Please Contact the Team";
            $response['error'] = "Incorrect Username or Password!";
            echo json_encode($response);
            //echo $status;
        }
        
    }

    if(isset($_POST['hotelbrand'])) {
        $output = array();
        $query = $db->execute_query('hotel', null);
        foreach ($query as $row) {
            $output['name'] = $row['name'];
            //$_SESSION['hotelpic'] = "http://localhost/testing/".$row['picture'];
            $_SESSION['hotelpic'] = $db->base_url() . $row['picture'];
            $_SESSION['hotelid'] = $row['id'];
        }
        echo json_encode($output);
    }

    if(isset($_POST['loadProfile'])) {
        $output = array();
        $query = $db->execute_query('users', $_SESSION['userid']);
        foreach ($query as $row) {
            $output = $row;
        }
        echo json_encode($output);
    }

    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        echo "logged out successfull";
    }

    /*==================| Cards and Chart Section |==================
      ==============================================================
      || this section or block is protected by Guest operations  ||
      ==============================================================
    */

    if(isset($_POST['queryCards'])) {
        $output = array();
        $sql = "SELECT 'key_name', 'key_data' UNION SELECT 'guests', count(ch.guest_id) as total_guest from checkin ch where ch.status =1 UNION SELECT 'rooms', count(r.id) as total_rooms from room r where r.status =0";
        $result = mysqli_query($db->conn, $sql);
        foreach ($result as $row) {
            $output[] = $row;
        }
        echo json_encode($output);
        //print_r($output);
    }
    
    if(isset($_POST['displayChart'])) {
        $output = array();
        $sql = "SELECT amount AS month_value, CONCAT(LEFT(MONTHNAME(CURRENT_DATE), 3), ' ', DAY(transfer)) AS month_name FROM expenses WHERE MONTH(transfer) = MONTH(CURRENT_DATE) ORDER BY transfer ASC";
        $result = mysqli_query($db->conn, $sql);
        foreach ($result as $row) {
            $output[] = $row;
        }
        echo json_encode($output);
        //print_r($output);
    }


    /*=======================| Guest |============================
      ==============================================================
      || this section or block is protected by Guest operations  ||
      ==============================================================
    */
    //dispalaying data into table patient
    if(isset($_POST['loadGuest'])) {
     $output = '';
     $post_data = $db->execute_limit('guest', 100);
        $output .= '<div class="table-responsive">
                <table class="table table-condensed table-bordered table-sm" id="tbl">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>Description</th>
                            <th><span class="fa fa-gear"></span> Action</th>
                        </tr>
                    </thead>
                    <tbody>';
     foreach ($post_data as $post) {
         $output .= '<tr>
             <td>'.$post["name"].'</td>
             <td>'.$post["phone"].'</td>
             <td>'.$post["nationality"].'</td>
             <td>'.$post["gender"].'</td>
             <td>'.$post["description"].'</td>
             <td>
                 <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a> |
                 <a class="btn-popup" id="'.$post["id"].'"><i class="fa fa-eye fa-lg"></i></a> | 
                 <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
             </td>
         </tr>';
     }
     $output .= '</tbody></table></div>';
     echo $output;
    }
    if(isset($_POST['selectguest'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['id']);
    $output = array();
    $post_data = $db->execute_query('guest', $id);
    foreach ($post_data as $post) {
        $output = $post;
    }
    echo json_encode($output);
    }

    if(isset($_POST['sgtguest'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $sql = "SELECT id, name FROM guest WHERE name LIKE '%".$search."%' LIMIT 0, 5";
        $post_data = $db->execute_sql($sql);
        foreach ($post_data as $post) {
            $output .= '<ul class="list-group">
                <li data-id = "'.$post["id"].'" class="list-group-item selected">'.$post["name"].'</li> 
            </ul>';
        }
        echo $output;
    }

    /*Load guarantee info*/
    if(isset($_POST['loadbail'])) {
        $output = '';
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $sql = "SELECT grname, grphone, grtitle FROM guest WHERE id=$id AND (grname IS NOT NULL)";
        $result = mysqli_query($db->conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $output .= '<table class="table table-bordered">';
            foreach ($result as $row) {
                $output .= '<tr>
                        <td width="25%">Name</td>
                        <td width="75%">'.$row["grname"].'</td>
                        </tr>
                        <tr>
                        <td width="25%">Phone</td>
                        <td width="75%">'.$row["grphone"].'</td>
                        </tr>
                        <tr>
                        <td width="25%">Title</td>
                        <td width="75%">'.$row["grtitle"].'</td>
                    </tr>';
            }
            $output .= '</table>';
        }
        else {
            $output .= '<h4 class="noBailInfo">No Guarantee Info...</h4>';
        }
        echo $output;
    }
       /*=======================| Guest |============================
      ==============================================================
      || this section or block is protected by Patient operations  ||
      ==============================================================
    */
     //dispalaying data into table patient
     if(isset($_POST['loadusers'])) {
        $output = '';
        $post_data = $db->execute_limit('users', 10);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
                <td>'.$post["username"].'</td>
                <td>'.$post["email"].'</td>
                <td>'.$post["password"].'</td>
                <td>'.$post["phone"].'</td>
                <td><span id="checkstate" class="label label-danger">'.$post["status"].'</span></td>
                <td>'.$post["created_at"].'</td>
               
                <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }
    if(isset($_POST['selectusers'])) {
       $id = mysqli_real_escape_string($db->conn, $_POST['id']);
       $output = array();
       $post_data = $db->execute_query('users', $id);
       foreach ($post_data as $post) {
           $output = $post;
       }
       echo json_encode($output);
    }

    /*==============================================================================
    |                        ROOM AND FLOOR OPERATIONS                             |
    ===============================================================================*/

    // loads room price and type
     if(isset($_POST['loadroomtype'])) {
        $output = '';
        $post_data = $db->execute_limit('roomtype', 10);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["type"].'</td>
                <td align="right">$'.number_format($post["price"], 2).'</td>
                <td>'.$post["created_at"].'</td>
               
                <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    // select and display data into inputs
    if(isset($_POST['selectroomtype'])) {
       $id = mysqli_real_escape_string($db->conn, $_POST['id']);
       $output = array();
       $post_data = $db->execute_query('roomtype', $id);
       foreach ($post_data as $post) {
           $output = $post;
       }
       echo json_encode($output);
    }

    /* this code is worked for checking room selection and loods all floors */
    if(isset($_POST['loadFloor'])) {
        $output = '';
        $post_data = $db->execute_query('floor', null);
        foreach ($post_data as $post) {
            $output .= '<option value="'.$post["id"].'">'.$post["name"].'</option>';
        }
        echo $output;
    }

    /* this code is worked for checking room selection and display blanked rooms */
    if(isset($_POST['loadRoomFloor'])) {
        $output = '';
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $sql = "SELECT room.*, roomtype.price, roomtype.type FROM room LEFT JOIN roomtype on roomtype.id = room.type_id WHERE (roomtype.id = room.type_id AND floor_id = $id AND status = 0)";
        $post_data = $db->execute_sql($sql);
        foreach ($post_data as $post) {
            $output .= '<option value="'.$post["id"].'" data-price="'.$post["price"].'">'.$post["room_no"].' -- '.$post["type"].'</option>';
        }
        echo $output;
    }

    // this code is appear when assigning guest into a room
    if(isset($_POST['loadType'])) {
        $output = '';
        $post_data = $db->execute_query('roomtype', null);
        $output .= '<option value="all">All</option>';
        foreach ($post_data as $post) {
            $output .= '<option value="'.$post["id"].'" data-price="'.$post["price"].'">'.$post["type"].'</option>';
        }
        echo $output;
    }

    // loads rooms with status available when select a floor in checkin update section
    if(isset($_POST['loadRoom'])) {
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $output = '';
        $data = array('id', 'room_no');
        $condition = array(
            'floor_id = ' => $id
        );
        $post_data = $db->execute_get('room', $data, $condition, null);
        foreach ($post_data as $post) {
            $output .= '<option value="'.$post["id"].'">'.$post["room_no"].'</option>';
        }
        echo $output;
    }

    /*==============================================================================
    |                               BAIL OPERATIONS                                |
    ===============================================================================*/
    if(isset($_POST['bails'])) {
        $output = '';
        $post_data = $db->execute_limit('guarantee', 100);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["name"].'</td>
                <td>'.$post["phone"].'</td>
                <td>'.$post["title"].'</td>
                 <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    /* select one  information */
    if(isset($_POST['bail'])) {
        $idnr = $_POST['id'];
        $output = array();
        $post_data = $db->execute_query('guarantee', $idnr);
        foreach ($post_data as $row) {
                 $output["name"] = $row['name'];
            $output["name"] = $row['name'];
            $output["phone"] = $row['phone'];
            $output["title"] = $row['title'];
        }
        echo json_encode($output);
    }

    if(isset($_POST['SelectBail'])) {
        $id = $_POST['id'];
        $output = array();

        $post_data = $db->execute_query('guarantee', $id);
        foreach ($post_data as $row) {
            $output["name"] = $row['name'];
            $output["phone"] = $row['phone'];
            $output["title"] = $row['title'];

        }
        echo json_encode($output);
    }

    /*==============================================================================
    |                               STAFF OPERATIONS                               |
    ===============================================================================*/
    if(isset($_POST['loadstaff'])) {
        $output = '';
        $post_data = $db->execute_limit('staff', 100);
        $output .= '<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm" id="tbl">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Shift</th>
                                <th>Salary</th>
                                <th>Date</th>
                                <th><span class="fa fa-gear"></span> Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
                <td>'.$post["name"].'</td>
                <td align="right">'.$post["phone"].'</td>
                <td>'.$post["gender"].'</td>
                <td>'.$post["type"].'</td>
                <td>'.$post["shift"].'</td>
                <td align="right">$'.number_format($post["salary"],2).'</td>
                <td align="right">'.$post["created_at"].'</td>
               
                <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        $output .= '</tbody></table></div>';
        echo $output;
    }
 

    if(isset($_POST['hintStaff'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $sql = "SELECT id, name, salary FROM staff WHERE name LIKE '%".$search."%'";
        $post_data = $db->execute_sql($sql);
        foreach ($post_data as $post) {
            $output .= '<ul class="list-group">
                <li data-id = "'.$post["id"].'" data-salary = "'.$post["salary"].'" class="list-group-item selected">'.$post["name"].'</li> 
            </ul>';
        }
        echo $output;
    }

    //Search 

    if(isset($_POST['searchStaff'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $query = "SELECT * FROM staff WHERE name LIKE '%$search%' or
            name LIKE '%$search%' or id LIKE '%$search%' ORDER BY id DESC";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["name"].'</td>
                <td>'.$post["phone"].'</td>
                <td>'.$post["gender"].'</td>
                <td>'.$post["type"].'</td>
                <td>'.$post["shift"].'</td>
                <td>'.$post["salary"].'</td>
                <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    //limit search 
    if(isset($_POST['LimitStaff'])) {
        $limit = $_POST['LimitStaff'];
        $output = '';
        $post_data = $db->execute_limit('staff', $limit);
        foreach ($post_data as $post) {
            $output .= '<tr>
                    <td>'.$post["id"].'</td>
                    <td>'.$post["name"].'</td>
                    <td>'.$post["phone"].'</td>
                    <td>'.$post["gender"].'</td>
                    <td>'.$post["type"].'</td>
                    <td>'.$post["shift"].'</td>
                    <td>'.$post["salary"].'</td>
                 <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                 </td>
             </tr>';
        }
        echo $output;
    }
    /*==============================================================================
    |                               HOTEL OPERATIONS                               |
    ===============================================================================*/
     if(isset($_POST['loadhotel'])) {
        $output = array();
        $id = $_SESSION['hotelid'];
        $post_data = $db->execute_query('hotel', $id);
        foreach ($post_data as $post) {
            $output = $post;
        }
        echo json_encode($output);
    }
    if(isset($_POST['selecthotel'])) {
       $id = mysqli_real_escape_string($db->conn, $_POST['id']);
       $output = array();
       $post_data = $db->execute_query('hotel', $id);
       foreach ($post_data as $post) {
           $output = $post;
       }
       echo json_encode($output);
    }

    /*==============================================================================
    |                               CHECKIN OPERATIONS                             |
    ===============================================================================*/

    if(isset($_POST['loadchecking'])) {
      $output = '';
      /*$query = "SELECT ch.id, g.id AS guest_id, g.name, ch.checkin, ch.checkout, f.id as fl_id, f.name as floor_name, r.id AS room_id, r.room_no, rt.id AS room_type, rt.type, rt.price, ch.staying, ch.status FROM checkin AS ch, guest AS g, floor AS f, room AS r, roomtype AS rt WHERE ch.status = 1 and ch.guest_id = g.id AND ch.room_no = r.id AND r.floor_id = f.id AND r.type_id = rt.id ORDER BY ch.id DESC LIMIT 0, 100";*/
      $query = "SELECT ch.id, g.id AS guest_id, g.name, ch.checkin, ch.checkout, f.id as fl_id, f.name as floor_name, r.id AS room_id, r.room_no, rt.id AS room_type, rt.type, rt.price, ch.staying, ch.status FROM checkin AS ch, guest AS g, floor AS f, room AS r, roomtype AS rt WHERE (ch.status = 1 or ch.checkin is null) and ch.guest_id = g.id AND ch.room_no = r.id AND r.floor_id = f.id AND r.type_id = rt.id ORDER BY ch.id DESC LIMIT 0, 100";
        $post_data = $db->execute_sql($query);
        $output .= '<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm" id="tbl">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>name</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Floor</th>
                                <th>Room</th>
                                <th>Type</th>
                                <th>Staying</th>
                                <th><span class="fa fa-gear"></span> Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["name"].'</td>
                <td>'.$post["checkin"].'</td>
                <td>'.$post["checkout"].'</td>
                <td>'.$post["floor_name"].'</td>
                <td>'.$post["room_no"].'</td>
                <td>'.$post["type"].'</td>
                <td>'.$post["staying"].'</td>
               
                <td>
                    <a class="btn-edit" id="'.$post["id"].'" data-type="'.$post["room_type"].'" data-guest="'.$post["guest_id"].'" data-floor="'.$post["fl_id"].'" data-room="'.$post["room_id"].'" data-price="'.$post["price"].'"><i class="fa fa-edit fa-lg"></i></a> | 
                    <a class="btn-show" id="'.$post["id"].'"><i class="fa fa-eye fa-lg"></i></a> | 
                    <a class="btn-review" id="'.$post["guest_id"].'" data-checkin="'.$post["id"].'"><i class="fa fa-money fa-lg"></i></a> | 
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        $output .= '</tbody></table></div>';
        echo $output;
    }

    // waxa uu soo bandhigaya qolalka ka banaan dabaqa iyo lacagtooda
    if(isset($_POST['filterFloor'])) {
        $output = '';
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $query = "select r.id, f.id as floorid, r.room_no, rt.price, rt.type from floor as f, room as r, roomtype as rt where r.status = 0 and r.floor_id = $id and (r.floor_id = f.id and r.type_id = rt.id)";
        $post_data = $db->execute_sql($query);
        $output .= '<table class="table table-bordered table-stripped tables">
                    <tr class="success"><td>Room</td><td>Price</td><td>type</td><td>Action</td></tr>';
        foreach ($post_data as $row) {
            $output .='<tr class="trs">
                        <td>'.$row["room_no"].'</td>
                        <td>'.$row["type"].'</td>
                        <td>$ '.$row["price"].'</td>
                        <td><button class="btn btn-success btn-sm" id="bookNow" name="'.$row["id"].'" data-price="'.$row["price"].'">Book</button></td>
                    </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    // waxa uu soo bandhigaya nooca qolka ka banaan dabaqa
    if(isset($_POST['filterType'])) {
        $output = '';
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $floor_id = mysqli_real_escape_string($db->conn, $_POST['floor_id']);
        $condition = "";
        if($id == "all") {
            $condition = "";
        }
        else {
            $condition = " and r.type_id = $id ";
        }
        $query = "select r.id, f.id as floorid, r.room_no, rt.price, rt.type from floor as f, room as r, roomtype as rt where r.status = 0 ".$condition." and r.floor_id = $floor_id and (r.floor_id = f.id and r.type_id = rt.id)";
        $post_data = $db->execute_sql($query);
        $output .= '<table class="table table-bordered table-stripped tables">
                    <tr class="success"><td>Room</td><td>Type</td><td>Price</td><td>Action</td></tr>';
        foreach ($post_data as $row) {
            $output .='<tr>
                        <td>'.$row["room_no"].'</td>
                        <td>'.$row["type"].'</td>
                        <td class="priced">$ '.$row["price"].'</td>
                        <td><button class="btn btn-success btn-sm" id="bookNow" name="'.$row["id"].'" data-price="'.$row["price"].'">Book</button></td>
                    </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    // waxa ay muujinaysa lacagaha uu bixiyey guest marka la doorto magaciisa
    if(isset($_POST['loadReveiw'])) {
        $output = '';
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $checkid = mysqli_real_escape_string($db->conn, $_POST['checkid']);
        $output .= '<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th><span class="fa fa-gear"></span> Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        $sql = "SELECT * FROM check_trn WHERE guest_id = $id AND check_id = $checkid ORDER BY id DESC";
        $result = mysqli_query($db->conn, $sql);

        if(mysqli_num_rows($result)>0) {
            while($post = mysqli_fetch_assoc($result)) {
                $output .= '<tr>
                <td>'.$post["id"].'</td>
                    <td>'.$post["amount"].'</td>
                    <td>'.$post["created_at"].'</td>
                    <td>
                        <a class="btn-edit-review" id="'.$post["id"].'" data-guest="'.$post["guest_id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    </td>
                </tr>';
            }
            
        }
        else {
            $output .= '<tr>
            <td colspan="4" align="center">No Transactions...</td>
            </tr>';
        }
        $output .= '</tbody></table></div>';
        echo $output;
    }

    // waxa ay muujinaysaa xogta guest marka uu qol kiraysto iyada oo dhamaystiran
    if(isset($_POST['showCheck'])) {
        $id = mysqli_real_escape_string($db->conn, $_POST['id']);
        $output = '';
        $query = "SELECT ch.id, g.id AS guest_id, g.name, r.id AS room_id, r.room_no, ch.staying, ch.status, ch.discount, ch.paid, ch.tot_price, ch.rem_price from checkin AS ch, guest AS g, room AS r WHERE ch.id = $id AND (ch.guest_id = g.id and ch.room_no = r.id) ORDER BY ch.id DESC";
        $post_data = $db->execute_sql($query);
        $output .= '<table class="table table-bordered table-condensed table-responsive">
                    <tr><td>Type</td><td>Description</td></tr>';
        foreach ($post_data as $post) {
            $output .= '<input type="hidden" id="'.$post["id"].'" class="checkId" name="'.$post["guest_id"].'" />';
            $output .= '<tr>
                <td>Name</td>
                <td>'.$post["name"].'</td>
                </tr><tr>
                <td>Room</td>
                <td>'.$post["room_no"].'</td>
                </tr><tr>
                <td>Staying</td>
                <td>'.$post["staying"].' Days </td>
                </tr><tr>
                <td>Total Price</td>
                <td>$ '.number_format($post['tot_price'],2).'</td>
                </tr><tr>
                <td>Paid</td>
                <td>$ '.number_format($post['paid'],2).'</td>
                </tr><tr>
                <td>Remaining Price</td>
                <td id="curr_remain">$ '.number_format($post['rem_price'],2).'</td>
                </tr><tr>
                <td>Amount to be paid</td>
                <td contenteditable="true" id="subRem"></td>
                </tr>';
                // subRem means Subtract Remaining
        }
        $output .= '</table>';
        echo $output;
    }

    
     /**********************************************/
 
    /*==============================================================================
    |                            EXPENSES OPERATIONS                               |
    ===============================================================================*/
    if(isset($_POST['dailyExp'])) {
        $output = '';
        $total = 0;
        //$post_data = $db->execute_query('exp_daily', null);
        $sql = "SELECT * FROM exp_daily WHERE created_at LIKE '%".date('Y-m-d')."%' ORDER BY id DESC";
        // $sql = "SELECT * FROM exp_daily WHERE created_at = CURRENT_DATE";
        $result = mysqli_query($db->conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            foreach ($result as $post) {
                $output .= '<tr>
                    <td>'.$post["type"].'</td>
                    <td align="right"> $'.number_format($post["amount"]).'</td>
                    <td>'.$post["description"].'</td>
                     <td>
                        <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                        <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                    </td>
                </tr>';
                $total += $post["amount"];
            }
            $output .= '<tr><td colspan="3" >Total</td><td>$ '.number_format($total, 2).'</td></tr>';
        }
        else {
            $output .= '<tr><td colspan="5" align="center">No data Today...</td></tr>';
        }
        
        echo $output;
    }

    if(isset($_POST['SelectDailyExp'])) {
        $id = $_POST['id'];
        $output = array();

        $post_data = $db->execute_query('exp_daily', $id);
        foreach ($post_data as $row) {
            $output["type"] = $row['type'];
            $output["amount"] = $row['amount'];
            $output["description"] = $row['description'];
        }
        echo json_encode($output);
    }

    if(isset($_POST['LoadTransAmount'])) {
        $dates = mysqli_real_escape_string($db->conn, $_POST['dates']);
        $output = array();
        $data = array(
            'dates = ' => $dates
        );
        $fields = array('debit');

        $post_data = $db->execute_get('medium', $fields, $data,null);
        foreach ($post_data as $row) {
            $output["debit"] = $row['debit'];
        }
        echo json_encode($output);
        //echo $post_data;
    }

    /*==============================================================================
    |                             PAYROLL OPERATIONS                               |
    ===============================================================================*/
    if(isset($_POST['payroll'])) {
        $output = '';
        $sql = "select DISTINCT sa.payroll_id, sa.staff_id, s.name, (select sum(sa.amount) from salary_activity as sa where sa.payroll_id = p.id and sa.staff_id = s.id) as amount, s.salary from salary_activity as sa, staff as s, payroll as p where p.status = 0 and (sa.payroll_id = p.id and sa.staff_id = s.id)";
        $result = mysqli_query($db->conn, $sql);
        $output .= '<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm" id="tbl">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Salary</th>
                                <th><span class="fa fa-gear"></span> Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        if(mysqli_num_rows($result) > 0) {
            foreach ($result as $post) {
                $output .= '<tr>
                    <td width="40%">'.$post["name"].'</td>
                    <td width="25%" align="right">$ '.number_format($post["amount"], 2).'</td> <td width="25%" align="right">$ '.number_format($post["salary"], 2).'</td>
                    <td width="10%" align="center">
                        <a class="btn-preview" data-staff="'.$post["staff_id"].'" data-payroll="'.$post["payroll_id"].'"><i class="fa fa-eye fa-lg"></i></a>
                    </td>
                </tr>';
            }
        }
        else {
            $output .= '<tr>
            <td colspan="4" align="center">No Transactions...</td>
            </tr>';
        }
        $output .= '</tbody></table></div>';
        echo $output;
    }

    if(isset($_POST['completeSalary'])) {
        $output = '';
        $sql = "SELECT s.id as staff_id, s.name, p.amount, p.advance_pay, p.rem_pay, p.payroll_date FROM staff s, payroll p WHERE (p.status = 1 AND (p.payroll_date =DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH))) AND s.id = p.staff_id ORDER BY p.id DESC";
        $result = mysqli_query($db->conn, $sql);
        $output .= '<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm" id="tbl">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Advance</th>
                                <th>Remaining</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>';
        if(mysqli_num_rows($result) > 0) {
            foreach ($result as $post) {
                $output .= '<tr>
                    <td width="40%">'.$post["name"].'</td>
                    <td width="15%" align="right">$ '.number_format($post["amount"], 2).'</td> 
                    <td width="15%" align="right">$ '.number_format($post["advance_pay"], 2).'</td>
                    <td width="15%" align="right">$ '.number_format($post["rem_pay"], 2).'</td>
                    <td width="15%">'.$post["payroll_date"].'</td>
                </tr>';
            }
        }
        else {
            $output .= '<tr>
            <td colspan="5" align="center">No Transactions...</td>
            </tr>';
        }
        $output .= '</tbody></table></div>';
        echo $output;
    }

    /* select  information from Expenses and display into model */
    if(isset($_POST['SelectPayroll'])) {
        $id = $_POST['id'];
        $output = array();
        $sql="SELECT sa.id ,p.id as paid, s.id as sid, s.name , sa.amount FROM salary_activity as sa ,payroll as p , staff as s WHERE (sa.staff_id = s.id and sa.payroll_id = p.id) and sa.id = $id";
        $post_data = $db->execute_sql($sql);
        foreach ($post_data as $row) {
            $output = $row;
        }
        echo json_encode($output);
    }
    //review transection
     if(isset($_POST['loadpreveiw'])) {
        $output = '';
        $staff_id = mysqli_real_escape_string($db->conn, $_POST['staff_id']);
        $payrollid = mysqli_real_escape_string($db->conn, $_POST['payrollid']);
        $output .= '<div class="table-responsive">
                    <table class="table table-condensed table-bordered table-sm" id="tbl">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th><span class="fa fa-gear"></span> Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        $sql = "SELECT * FROM salary_activity WHERE staff_id = $staff_id AND payroll_id = $payrollid ORDER BY id DESC";
        $result = mysqli_query($db->conn, $sql);

        if(mysqli_num_rows($result)>0) {
            while($post = mysqli_fetch_assoc($result)) {
                $output .= '<tr>
                <td>'.$post["id"].'</td>
                    <td>'.$post["amount"].'</td>
                    <td>'.$post["created_at"].'</td>
                    <td>
                        <a class="btn-edit" id="'.$post["id"].'" data-payroll="'.$post["staff_id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    </td>
                </tr>';
            }
            
        }
        else {
            $output .= '<tr>
            <td colspan="4" align="center">No Transactions...</td>
            </tr>';
        }
        $output .= '</tbody></table></div>';
        echo $output;
    }
    // ======================================================================
     if(isset($_POST['loadguarantee'])) {
     $output = '';
     $post_data = $db->execute_limit('guarantee', 100);
        $output .= '<div class="table-responsive">
                <table class="table table-condensed table-bordered table-sm" id="tbl">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Title</th>
                            <th><span class="fa fa-gear"></span> Action</th>
                        </tr>
                    </thead>
                    <tbody>';
     foreach ($post_data as $post) {
         $output .= '<tr>
             <td>'.$post["name"].'</td>
             <td>'.$post["phone"].'</td>
             <td>'.$post["title"].'</td>
             <td>
                 <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                 <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
             </td>
         </tr>';
     }
     $output .= '</tbody></table></div>';
     echo $output;
    }
    if(isset($_POST['selectguarantee'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['id']);
    $output = array();
    $post_data = $db->execute_query('guest', $id);
    foreach ($post_data as $post) {
        $output = $post;
    }
    echo json_encode($output);
    }

    /*DASHBOARD CONTENTS INCLUDE AREA CHART AND SOME INFO*/
    //$sql = "SELECT debit FROM medium WHERE MONTH(dates) = MONTH(CURRENT_DATE())";
    //============ Room load ===================//
   if(isset($_POST['loadRooms'])) {
     $output = '';
     $sql = 'SELECT r.id, r.room_no, r.beds, rt.id AS rt_id, rt.type, f.id AS f_id, f.name AS f_name FROM room r, roomtype rt, floor f WHERE r.type_id = rt.id AND r.floor_id = f.id ORDER BY r.id DESC';
     $post_data = $db->execute_sql($sql);
        $output .= '<div class="table-responsive">
                <table class="table table-condensed table-bordered table-sm" id="tbl">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>RoomNo</th>
                            <th>RoomType</th>
                            <th>Floor</th>
                            <th>Beds</th>
                            <th><span class="fa fa-gear"></span> Action</th>
                        </tr>
                    </thead>
                    <tbody>';
     foreach ($post_data as $post) {
         $output .= '<tr>
             <td>'.$post["room_no"].'</td>
             <td data-type="'.$post['rt_id'].'">'.$post["type"].'</td>
             <td data-floor="'.$post['f_id'].'">'.$post["f_name"].'</td>
             <td>'.$post["beds"].'</td>
             <td>
                 <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                 <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
             </td>
         </tr>';
     }
     $output .= '</tbody></table></div>';
     echo $output;
    }
    if(isset($_POST['selectroom'])) {
    $id = mysqli_real_escape_string($db->conn, $_POST['id']);
    $output = array();
    $post_data = $db->execute_query('room_type', $id);
    $post_data = $db->execute_query('Floor', $id);
    foreach ($post_data as $post) {
        $output = $post;
    }
    echo json_encode($output);
    }
    ?>

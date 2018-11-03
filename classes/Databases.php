<?php
	class Databases {
		public $conn;
		private $host = 'localhost';
		private $user = 'id3096165_admin';
		private $password = 'admin';
		private $db = 'id3096165_kulmiye';
		public $webname = 'hotel';

		public function __construct() {
			$this->database_connect();
		}

		public function base_url() {
			$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
			
			if($_SERVER['SERVER_PORT'] == 80) {
				$site_url = $protocol.'://'.$_SERVER['SERVER_NAME'].'/'.$this->webname.'/';
			}
			else {
				$site_url = $protocol.'://'.$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].'/'.$this->webname.'/';
			}
			return $site_url;
		}

		public function document_root() {
			$path_url = $_SERVER['DOCUMENT_ROOT']."/".$this->webname."/";
			return $path_url;
		}

		public function database_connect() {
			$this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
			if(!$this->conn) {
				echo mysqli_error($this->conn);
			}
		}

		public function insert_query($table_name, $data) {
			$query = "INSERT INTO ".$table_name." (";
			$query .= implode(", ", array_keys($data)) . ') VALUES (';
			$query .= "'".implode("','", array_values($data)) . "')";
			if(mysqli_query($this->conn, $query)) {
				return true;
			}
			else {
				echo mysqli_error($this->conn);
			}
			//echo $query;
		}

		public function insert_sql($query) {
			if(mysqli_query($this->conn, $query)) {
				return true;
			}
				echo $query;
		}

		public function execute_query($table_name, $condition) {
			$array = array();
			$where_condition;
			$query = "";
			$sql = "SELECT * FROM ".$table_name;
			$where_condition = " WHERE id = ".$condition;
			$order = " ORDER BY id DESC";
			if(is_null($condition)) {
				$query = $sql . $order;
			}
			else {
				$query = $sql . $where_condition . $order;
			}
			$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
			return $array;
		}


		/* this function will list all info about table without sort or ordaring */

		public function execute_no_order($table_name) {
			$array = array();
			$query = "SELECT * FROM ".$table_name;
			$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
			return $array;
		}

		public function execute_sql($query) {
			$array = array();
			$sql = $query;
			$result = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
			return $array;
		}

		public function execute_get($table_name, $fields, $where_condition, $order) {
			$array = array();
			$data = '';
			$query = '';
			$sql = implode(", ", $fields);

			foreach ($where_condition as $key => $value) {
				$data .= $key . "'".$value."'";
			}
			if(is_null($order)) {
				$query .= "SELECT ".$sql. " FROM ".$table_name." WHERE ".$data;
			}
			elseif (is_null($where_condition)) {
				$query .= "SELECT ".$sql. " FROM ".$table_name. " ORDER BY ".$order." DESC";
			}
			else {
				$query .= "SELECT ".$sql. " FROM ".$table_name." WHERE ".$data. " ORDER BY ".$order." DESC";
			}

			$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}

			//echo $query;
			return $array;
		}

		public function execute_limit($table_name, $limit) {
			$array = array();
			$sql = "SELECT * FROM ".$table_name." ORDER BY id DESC LIMIT 0, ".$limit;
			$result = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
			return $array;
		}

		public function execute_limitData($table_name, $limit, $field, $value) {
			$array = array();
			$sql = "";
			$query = " WHERE ".$field." = ".$value;
			if(is_null($query)) {
				$sql .= "SELECT * FROM ".$table_name." ORDER BY id DESC LIMIT 0, ".$limit;
			}
			else {
				$sql .= "SELECT * FROM ".$table_name.$query." ORDER BY id DESC LIMIT 0, ".$limit;
			}
			$result = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
			return $array;
		}

		public function execute_limit_query($query, $limit) {
			$array = array();
			$sql = $query." ORDER BY id DESC LIMIT 0, ".$limit;
			$result = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = $row;
			}
			return $array;
		}
		public function update_field($field){
			if(mysqli_query($this->conn,$field)){
				return true;
			}
		}
		public function update_query($table_name, $fields, $wher_condition) {
			$query = '';
			$condition = '';
			foreach ($fields as $key => $value) {
				$query .= $key . "='".$value."', ";
			}
			$query = substr($query, 0, -2);
			foreach ($wher_condition as $key => $value) {
				$condition .= $key . "=".$value."";
			}
			$query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";
			if(mysqli_query($this->conn, $query)) {
				return true;
			}
		}
		public function update_sql($query) {
			if(mysqli_query($this->conn, $query)) {
				return true;
			}
		}
		public function delete_query($table_name, $data) {
			$query = "DELETE FROM ".$table_name." WHERE id = ".$data;
			if(mysqli_query($this->conn, $query)) {
				return true;
			}
		}

	}



 ?>

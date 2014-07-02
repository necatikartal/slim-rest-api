<?php 

class User {

	private $link;
	private $resource; 

	# Define default construct
	public function __construct() {
		include "../library/dbconnect.php";
		$this->link = new dbconnect;
		$this->resource = $this->link->connect();
	}

	# Define a SELECT Method 
	public function select($id = null) {

		$cmd = "SELECT id, username, userpassword FROM users";
		$cmd.= ($id == null) ? "" :  " WHERE id=" . $id ;
		
		$result = mysql_query( $cmd, $this->resource); 

		$resultSet = array();
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$tmp = array(
					'id' => $row["id"], 
					'username' => $row["username"], 
					"userpassword" => $row["userpassword"]);
				array_push($resultSet, $tmp);
			}
		echo json_encode($resultSet);
		mysql_free_result($result);
	}

	# Define a INSERT Method 
	public function insert($data){
		mysql_query("INSERT INTO users ( username , userpassword) 
			VALUES ('". $data.username ."','". $data.userpassword . "')"
			, $this->resource);
	}

	# Define a UPDATE Method
	public function update($id , $data){

		mysql_query("UPDATE users SET userpassword=" . $data.userpassword . "WHERE id=" . $id 
			, $this->resource);
	}

	# Define a DELETE Method
	public function delete($id){
		mysql_query("DELETE FROM users WHERE id=" . $id 
			, $this->resource);
	}

}
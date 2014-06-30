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

		if($id == null)
		{
			$result = mysql_query("SELECT id, username, userpassword FROM users", $this->resource);

			$resultSet = array();
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$tmp = array(
					'ID' => $row["id"], 
					'Username' => $row["username"], 
					"Userpassword" => $row["userpassword"]);
				array_push($resultSet, $tmp);
			}
		}
		else
		{
			$result = mysql_query("SELECT id, username, userpassword FROM users WHERE id =" . $id , $this->resource);

			$resultSet = array();
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$tmp = array(
					'ID' => $row["id"], 
					'Username' => $row["username"], 
					"Userpassword" => $row["userpassword"]);
				array_push($resultSet, $tmp);
			}
		}
		
		echo json_encode($resultSet);
		mysql_free_result($result);
	}

	# Define a INSERT Method 
	public function insert(){

	}

	# Define a UPDATE Method
	public function update($id){

	}

	# Define a DELETE Method
	public function delete($id){

	}

}
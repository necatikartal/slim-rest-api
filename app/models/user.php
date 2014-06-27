<?php 

class User {

	private $link;

	public function __construct(){
		$this->link = mysql_connect('localhost', 'root', 'nctkrtl13');
		mysql_select_db('SlimRESTDb', $this->link);
		mysql_set_charset('UTF-8', $this->link);
	}

	# Define a SELECT Method 
	public function select(){

		$result = mysql_query("SELECT id, username, userpassword FROM users", $this->link);

		$resultSet = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$tmp = array('ID' => $row["id"], 'Username' => $row["username"], "Userpassword" => $row["userpassword"]);
		array_push($resultSet, $tmp);
		}
		
		echo json_encode($resultSet);
		mysql_free_result($result);
	}

	# Define a INSERT Method 
	public function insert(){

	}

	# Define a UPDATE Method
	public function update(){

	}

	# Define a DELETE Method
	public function delete(){

	}

}

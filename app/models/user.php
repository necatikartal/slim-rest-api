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

		$this->resource->query($cmd);

		$resultSet = array();
		foreach($this->resource->query($cmd) as $row) {
			$tmp = array(
					'id' => $row["id"], 
					'username' => $row["username"], 
					"userpassword" => $row["userpassword"]);
				array_push($resultSet, $tmp);
			}
		
		echo json_encode($resultSet);
	}

	# Define a INSERT Method 
	public function insert($data){
		$this->resource->prepare("INSERT INTO users ( username , userpassword) VALUES (?,?)");
		$this->resource->execute(array($data['username'], $data['userpassword']));
	}

	# Define a UPDATE Method
	public function update($id , $data){
		$cmd = "UPDATE users SET userpassword=" . $data['userpassword'] . "WHERE id=" . $id;
		$this->resource->exec($cmd);
	}

	# Define a DELETE Method
	public function delete($id){
		$cmd = "DELETE FROM users WHERE id=" . $id;
		$this->resource->exec($cmd);
	}

}
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

		$resultSet = ($id == null) ? 
		$this->resource->fetchAll("SELECT id, username, userpassword FROM users") :
		$this->resource->fetchArray("SELECT id, username, userpassword FROM users WHERE id= ?" , array($id));
		echo json_encode($resultSet);
	}

	# Define a INSERT Method 
	public function insert($data){
		$this->resource->insert('users', array('username' => $data['username'], 'userpassword' => $data['userpassword']));
	}

	# Define a UPDATE Method
	public function update($id , $data){
		$this->resource->update('users', array('userpassword' => $data['userpassword']), array('id' => $id));
	}

	# Define a DELETE Method
	public function delete($id){
		$this->resource->delete('users', array('id' => $id));
	}

}
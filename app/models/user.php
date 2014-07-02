<?php 

class User {

	private $link;
	private $resource; 
	private $queryBuilder;

	# Define default construct
	public function __construct() {
		include "../library/dbconnect.php";
		$this->link = new dbconnect;
		$this->resource = $this->link->connect();
		$this->queryBuilder = $this->resource->createQueryBuilder();
	}

	# Define a get user method 
	public function getUser($id) {
		$this->queryBuilder
				->select('u.id','u.username','u.userpassword')
				->from('users', 'u')
				->where('u.id = ?')
				->setParameter(0, $id);

		$result = $this->resource->query($this->queryBuilder);
		$resultSet = $result->fetchAll();
		echo json_encode($resultSet);
	}

	# Define a get users method 
	public function getUsers() {
		$this->queryBuilder
				->select('u.id','u.username','u.userpassword')
				->from('users', 'u');
		
		$result = $this->resource->query($this->queryBuilder);
		$resultSet = $result->fetchAll();
		echo json_encode($resultSet);
	}

	# Define a order users method
	public function orderUsers($order, $dir) {
		$queryBuilder = $this->resource->createQueryBuilder();
		$queryBuilder
			->select('u.id','u.username','u.userpassword')
			->from('users', 'u')
			->orderBy('?', '?')
			->setParameter(0, 'u'. $order)
			->setParameter(1, $dir);

		$result = $this->resource->query($this->queryBuilder);
		$resultSet = $result->fetchAll();
		echo json_encode($resultSet);
	}

	# Define a INSERT Method 
	public function insertUser($data){
		$this->resource->insert('users', array('username' => $data['username'], 'userpassword' => $data['userpassword']));
	}

	# Define a UPDATE Method
	public function updateUser($id , $data){
		$this->resource->update('users', array('userpassword' => $data['userpassword']), array('id' => $id));
	}

	# Define a DELETE Method
	public function deleteUser($id){
		$this->resource->delete('users', array('id' => $id));
	}

}
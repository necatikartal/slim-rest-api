<?php

use Symfony\Component\Yaml\Parser;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
include "../app/models/user.php";

class controller {

	private $resource; 
	private $queryBuilder;

	public function __construct() {
		$this->resource = $this->connect();
		$this->queryBuilder = $this->resource->createQueryBuilder();
	}

	public function connect() {

        $yaml = new Parser();
        $connectionParams = $yaml->parse(file_get_contents('../config/dbconfig.yml'));

        $config = new Configuration();  
        $db = DriverManager::getConnection($connectionParams, $config);

        return $db;
    }

	public function getUsers($id = null, $order =null, $dir ="ASC") {
		
		if ($order != null) {
			$this->queryBuilder
				->select('u.id','u.username','u.userpassword')
				->from('users', 'u')
				->orderBy('?', '?')
				->setParameter(0, 'u'. $order)
				->setParameter(1, $dir);
		} elseif($id != null) {
			$this->queryBuilder
				->select('u.id','u.username','u.userpassword')
				->from('users', 'u')
				->where('u.id = ?')
				->setParameter(0, $id);
		} else {
			$this->queryBuilder
				->select('u.id','u.username','u.userpassword')
				->from('users', 'u');
		}

		$result = $this->resource->query($this->queryBuilder);
		$resultSet = $result->fetchAll();

		$users = array();
		foreach ($resultSet as $key => $value) {
			$user = new user;
			$user->setId($value['id']);
			$user->setUsername($value['username']);
			$user->setUserpassword($value['userpassword']);
			array_push($users, $user->toArray());
		}
		echo json_encode($users);
	}

	public function addUser($data) {
		$this->resource->insert('users', array('username' => $data['username']
			, 'userpassword' => $data['userpassword']));
	}

	public function updateUser($id, $data) {
		$this->resource->update('users', array('userpassword' => $data['userpassword'])
			, array('id' => $id));
	}

	public function deleteUser($id) {
		$this->resource->delete('users', array('id' => $id));
	}
}
<?php 

class User {

	private $id;
	private $username;
	private $userpassword;

	public function __construct() {
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUserpassword($userpassword) {
		$this->userpassword = $userpassword;
	}

	public function getUserpassword() {
		return $this->userpassword;
	}

	public function setUser($id, $username, $userpassword) {
		$this->id = $id;
		$this->username = $username;
		$this->userpassword = $userpassword;
	}
}
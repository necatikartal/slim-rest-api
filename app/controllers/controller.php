<?php

class controller {

	# Define default construct
	public function __construct() {
	}

	# Define a GET Method Controller
	public function get($id = null, $order =null, $dir ="ASC") {
		include "../app/models/user.php";
		$m = new user;
		
		if ($order != null)
			$m -> orderUsers($order, $dir);
		elseif($id != null)
			$m -> getUser($id);
		else 
			$m -> getUsers();
	}

	# Define a POST Method Controller
	public function post($data) {
		include "../app/models/user.php";
		$m = new user;
		$m -> insertUser($data);
	}

	# Define a PUT Method Controller
	public function put($id, $data) {
		include "../app/models/user.php";
		$m = new user;
		$m -> updateUser($id, $data);
	}

	# Define a DELETE Method Controller
	public function delete($id) {
		include "../app/models/user.php";
		$m = new user;
		$m -> deleteUser($id);
	}
}
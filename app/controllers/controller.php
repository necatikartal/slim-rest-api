<?php

class controller {

	# Define default construct
	public function __construct() {
	}

	# Define a GET Method Controller
	public function get($id = null) {
		include "../app/models/user.php";
		$m = new user;
		$m -> select($id);
	}

	# Define a POST Method Controller
	public function post($data) {
		include "../app/models/user.php";
		$m = new user;
		$m -> insert($data);
	}

	# Define a PUT Method Controller
	public function put($id, $data) {
		include "../app/models/user.php";
		$m = new user;
		$m -> update($id, $data);
	}

	# Define a DELETE Method Controller
	public function delete($id) {
		include "../app/models/user.php";
		$m = new user;
		$m -> delete($id);
	}
}
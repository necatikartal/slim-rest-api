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
	public function post() {
		include "../app/models/user.php";
		$m = new user;
		$m -> insert();
	}

	# Define a PUT Method Controller
	public function put($id) {
		include "../app/models/user.php";
		$m = new user;
		$m -> update($id);
	}

	# Define a DELETE Method Controller
	public function delete($id) {
		include "../app/models/user.php";
		$m = new user;
		$m -> delete($id);
	}
}
<?php

class controller {

	public function __construct() 
	{

	}

	# Define a GET Method Controller
	public function get()
	{
		include "../app/models/user.php";
		$m = new user;
		$m -> select();
	}

	# Define a POST Method Controller
	public function post()
	{
		include "../app/models/user.php";
		$m = new user;
		$m -> insert();
	}

	# Define a PUT Method Controller
	public function put()
	{
		include "../app/models/user.php";
		$m = new user;
		$m -> update();
	}

	# Define a DELETE Method Controller
	public function delete()
	{
		include "../app/models/user.php";
		$m = new user;
		$m -> delete();
	}

}
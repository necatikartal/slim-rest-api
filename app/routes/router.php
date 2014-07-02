<?php

	# Index Route
	$app->get('/', function () {
    //Show users
		echo "Hello";
	});

	# Define a GET Method Route
	$app->get('/users/', function () {
    //Show users
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> get();
	});

	# Define a GET Method Route
	$app->get('/users/:id', function ($id) {
    //Show user identified by $id
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> get($id);
	});

	# Define a POST Method Route
	$app->post('/users', function () {
    //Create user
		include "../app/controllers/controller.php";
		$c = new controller;

		if(isset($_POST['username']) && $_POST['userpassword']) {
			$c -> post(array('username'=> $_POST['username'], 'userpassword' => $_POST['userpassword'] ));
		} else die("Invalid args");

	});

	# Define a PUT Method Route
	$app->put('/users/:id', function ($id) {
    //Update user identified by $id
		include "../app/controllers/controller.php";
		$c = new controller;

		if(isset($_POST['userpassword'])) {
			$c -> post($id, array('userpassword' => $_POST['userpassword'] ));
		} else die("Invalid args");		
	});

	# Define a DELETE Method Route
	$app->delete('/users/:id', function ($id) {
    //Delete user identified by $id
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> delete($id);
    });
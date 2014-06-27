<?php

	##TEST ROUTER
	$app->get('/', function () {
		echo "Hello from ../routes/router.php";
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
		$c -> get();
	});

	# Define a POST Method Route
	$app->post('/users', function () {
    //Create user
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> post();
	});

	# Define a PUT Method Route
	$app->put('/users/:id', function ($id) {
    //Update user identified by $id
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> put();
	});

	# Define a DELETE Method Route
	$app->delete('/users/:id', function ($id) {
    //Delete user identified by $id
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> delete();
    });

?>
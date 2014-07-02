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

	# Define a POST Method Route //Create user
	$app->post('/users', function () use($app) {
		include "../app/controllers/controller.php";
		
		$username = $app->request()->params('username');
		$userpassword = $app->request()->params('userpassword');

		$c = new controller;
		$c -> post(array('username'=> $username, 'userpassword' => $userpassword));
	});

	# Define a PUT Method Route //Update user identified by $id
	$app->put('/users/:id', function ($id) use($app) {
		include "../app/controllers/controller.php";

		$userpassword = $app->request()->params('userpassword');

		$c -> post($id, array('userpassword' => $userpassword ));
		$c = new controller;	
	});

	# Define a DELETE Method Route //Delete user identified by $id
	$app->delete('/users/:id', function ($id) {
		include "../app/controllers/controller.php";
		$c = new controller;
		$c -> delete($id);
    });
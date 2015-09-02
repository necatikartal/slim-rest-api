<?php
	
	require '../vendor/autoload.php';

	$app = new \Slim\Slim();

    include "../app/routes/router.php";

    $app -> run();

    //include "../app/views/index.html";
 ?>
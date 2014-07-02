<?php

class dbconnect {
 
    private $db;
 
    # Define default construct
    public function __construct() {       
    }
 
    # Define a CONNECT Method 
    //@return resource 
    public function connect() {

        require "../library/config.php";

        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USERNAME , DB_PASSWORD) 
        or die('Could not connect to MySQL server.');

        return $db;
    }
}
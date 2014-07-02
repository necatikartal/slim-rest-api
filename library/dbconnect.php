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

        $config = new \Doctrine\DBAL\Configuration();

        $connectionParams = array(
            'dbname' => DB_NAME,
            'user' => DB_USERNAME,
            'password' => DB_PASSWORD,
            'host' => DB_HOST,
            'driver' => 'pdo_mysql',
        );
        
        $db = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

        return $db;
    }
}
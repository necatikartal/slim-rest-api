<?php

use Symfony\Component\Yaml\Parser;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class dbconnect {
 
    private $db;
 
    # Define default construct
    public function __construct() {       
    }
 
    # Define a CONNECT Method 
    //@return resource 
    public function connect() {

        $yaml = new Parser();
        $connectionParams = $yaml->parse(file_get_contents(__DIR__.'/dbconfig.yml'));

        $config = new Configuration();  
        $db = DriverManager::getConnection($connectionParams, $config);

        return $db;
    }
}
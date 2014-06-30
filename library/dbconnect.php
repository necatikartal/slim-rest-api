<?php

class dbconnect {
 
    private $this;
 
    # Define default construct
    public function __construct() {       
    }
 
    # Define a CONNECT Method 
    //@return resource 
    public function connect() {

        require "../library/config.php";
 
        $this->link = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die('Could not connect to MySQL server.');      
        mysql_select_db(DB_NAME, $this->link);
        mysql_set_charset('UTF-8', $this->link);

        return $this->link;
    }
}
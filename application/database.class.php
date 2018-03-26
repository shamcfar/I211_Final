<?php

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'book',
        'tblBook' => 'book',
        
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //private constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                        $this->param['host'],
                        $this->param['login'],
                        $this->param['password'],
                        $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            header("Location:" . BASE_URL . "/show_error.php?eMsg=" . $message);
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    

    //returns the name of the table that stores books
    public function getBookTable() {
        return $this->param['tblBook'];
    }

    
}
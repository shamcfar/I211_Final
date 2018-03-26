<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of book_manager
 *
 * @author laaf117
 */
require_once('application/database.class.php');
require_once('book.class.php');

class BookManager {
 //private data members
    private $db, $dbConnection;
    private $tblBook;
    static private $_instance = NULL;

    //the constructor. It initializes private data members.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getBookTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one book manager instance
    public static function getBookManager() {
        if (self::$_instance == NULL) {
            self::$_instance = new BookManager();
        }
        return self::$_instance;
    }

    /*
     * the listbook method retrieves all movies from the database and
     * returns an array of Movie objects if successful or false if failed.
     */
    public function list_book() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */
        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblBook .
                " WHERE " . $this->tblBook  ;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query)
            return false;

        //if the query succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned movies
        $book = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $book = new Book(stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->genre), 
                    stripslashes($obj->image), stripslashes($obj->publisher), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            //add the movie into the array
            $book[] = $book;
        }
        return $book;
    }

    //display details of a book
    public function view_book($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblbook .
                " WHERE " . $this->tblBook . ".rating=" . $this->tblbook . ".rating_id" .
                " AND " . $this->tblBook . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a movie object. Slashes in strings are stripped first by calling the stripslashes function.
            $book = new Book(stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->genre), 
                    stripslashes($obj->image), stripslashes($obj->publisher), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            return $book;
        }

        return false;
    }
        
    //search the database for books that match words in titles. Return an array of books if succeed; false otherwise.
    public function search_book($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblBook .
                " WHERE " . $this->tblBook . ".rating=" . $this->tblBook . ".rating_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }
        $sql .= ")";
       
        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query) {
            return false;
        }
        //search succeeded, but no movie was found.
        if ($query->num_rows == 0) {
            return 0;
        }
        //search succeeded, and found at least 1 book found.
        //create an array to store all the returned movies
        $book = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $book = new Book($obj->title, $obj->author, $obj->genre, $obj->image, $obj->publisher, $obj->description);

            //set the id for the movie
            $book->setId($obj->id);

            //add the book into the array
            $book[] = $book;
        }
        return $book;
    }

    
}

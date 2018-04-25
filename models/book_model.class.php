<?php

class BookModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBook;
    private $tblUser;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBookModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getBookTable();
        $this->tblUser = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

    }

    //static method to ensure there is just one BookModel instance
    public static function getBookModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    /*
     * the list_book method retrieves all books from the database and
     * returns an array of Book objects if successful or false if failed.
     * Books should also be filtered by categories and/or sorted by titles or category if they are available.
     */

    public function list_book() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblBook;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query)
            return false;

        //if the query succeeded, but no book was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned books
        $books = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $book = new Book(stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->genre), stripslashes($obj->image), stripslashes($obj->publisher), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            //add the book into the array
            $books[] = $book;
        }
        return $books;
    }

    /*
     * the viewBook method retrieves the details of the book specified by its id
     * and returns a book object. Return false if failed.
     */

    public function view_book($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblBook . " WHERE id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a book object
            $book = new Book(stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->genre), stripslashes($obj->image), stripslashes($obj->publisher), stripslashes($obj->description));

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
        $sql = "SELECT * FROM " . $this->tblBook . " WHERE";

        foreach ($terms as $term) {
            $sql .= " title LIKE '%$term%' AND";
        }
        
        //remove the final AND
        $sql = rtrim($sql, "AND");

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query)
            return false;

        //search succeeded, but no book was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 book found.
        //create an array to store all the returned books
        $books = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $book = new Book($obj->title, $obj->author, $obj->genre, $obj->image, $obj->publisher, $obj->description);

            //set the id for the book
            $book->setId($obj->id);

            //add the book into the array
            $books[] = $book;
        }
        return $books;
    }
    
    //update book in database
    public function update_book($id) {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'author') ||
                !filter_has_var(INPUT_POST, 'genre') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'publisher') ||
                !filter_has_var(INPUT_POST, 'description')) {
 
            return false;
        }
 
        //retrieve data for the new book; data are sanitized and escaped for security.
        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $author = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING)));
        $genre = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $publisher = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
 
        //query string for update
        $sql = "UPDATE " . $this->tblBook .
                " SET title='$title', author='$author', genre='$genre', image='$image', "
                . "publisher='$publisher', description='$description' WHERE id='$id'";
 
        //execute the query
        return $this->dbConnection->query($sql);
    }
    
    //add a new book into the database
    public function insert_book() {
        if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'author') ||
                !filter_has_var(INPUT_POST, 'genre') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'publisher') ||
                !filter_has_var(INPUT_POST, 'description')) {
 
            return;
        }
        
        //retrieve data for the new book; data are sanitized and escaped for security.
        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $author = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING)));
        $genre = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $publisher = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
        
        //query string for insert
        $sql = "INSERT INTO " . $this->tblBook . " VALUES (NULL, '$title', '$author', '$genre', '$image', '$publisher', '$description')";
        
        //execute the query
        $query = $this->dbConnection->query($sql);
        return $query;
        
        if (!$query) {
            return false;
        }
    }
    
    //delete a book from the database
    public function delete_book($id) {
        //define the MySQL delete statement
        $sql = "DELETE FROM ". $this->tblBook." WHERE id='$id'";
        
        //execute the query
        $query = $this->dbConnection->query($sql);
        return $query;
    }

}

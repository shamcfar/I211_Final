<?php

class BookController {

    private $book_model;

    //default constructor
    public function __construct() {
        //create an instance of the BookModel class
        $this->book_model = BookModel::getBookModel();
    }

    //index action that displays all books
    public function index() {
        //retrieve all books and store them in an array
        $books = $this->book_model->list_book();
        
        if (!$books) {
            //display an error
            $message = "There was a problem displaying books";
            $this->error($message);
            return;
        }
        
        //display all books
        $view = new BookIndex();
        $view->display($books);
    }

    //show details of a book
    public function detail($id) {
        //retrieve the specific book
        $book = $this->book_model->view_book($id);
        
        if (!$book) {
            //display an error
            $message = "There was a problem displaying the book id ='".$id."'.";
            $this->error($message);
        }
        
        //display mocie details
        $view = new BookDetail();
        $view->display($book);
    }

    //handle an error
    public function error($message) {
        //creatre an object of the Error class
        $error = new BookError();
        
        //display the error page
        $error->display($message);
    }
	
    //search books
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all books
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching books
        $books = $this->book_model->search_book($query_terms);

        if ($books === false) {
            //handle error
            $message = "HAHAHA An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched books
        $search = new BookSearch();
        $search->display($query_terms, $books);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $books = $this->book_model->search_book($query_terms);

        //retrieve all book titles and store them in an array
        $titles = array();
        if ($books) {
            foreach ($books as $book) {
                $titles[] = $book->getTitle();
            }
        }

        echo json_encode($titles);
    }


    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }
    
    //display a book in a form for editing
    public function edit($id) {
        //retrieve the specific book
        $book = $this->book_model->view_book($id);
 
        if (!$book) {
            //display an error
            $message = "There was a problem displaying the book id='" . $id . "'.";
            $this->error($message);
            return;
        }
 
        $view = new BookEdit();
        $view->display($book);
    }
    
    //update a book in the database
    public function update($id) {
        //update the book
        $update = $this->book_model->update_book($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the book id='" . $id . "'.";
            $this->error($message);
            return;
        }
 
        //display the updateed book details
        $confirm = "The book was successfully updated.";
        $book = $this->book_model->view_book($id);
 
        $view = new BookDetail();
        $view->display($book, $confirm);
    }
    
    //show registration form for a new user
    public function add() {
        $view = new BookAdd();
        $view->display();
    } 
    
    //add a new book into the database
    public function insert() {
/*        
//create a new instance of the UserModel class
        $book_model = new BookModel();
                //create a new instance of the User class
        $book = new Book($title, $author, $genre, $image, $publisher, $description);
 * 
 */
                
        //call the addUser method of UserModel object
        $newBook = $this->book_model->insert_book();

        
        if (!$newBook) {
            //handle errors
            $message = "Your book was not good enough. Please try again later";
            $this->error($message);
            return;
        }
        
        $view = new BookConfirm();
        $view->display();
    }
    
    public function delete($id) {
        //delete the user
        $delete = $this->book_model->delete_book($id);
        
        if (!$delete) {
            //handle errors
            $message = "There was a problem dropping book id='" . $id . "'.";
            $this->error($message);
            return;
        }
        
        $view = new BookDelete();
        $view->display();
    }

}

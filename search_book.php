<?php

require_once 'classes/book_manager.class.php';
require_once 'classes/search_book.class.php';
$book_manager = BookManager::getBookManager();

//search movies
if (isset($_GET['query-terms'])) { //request sent from the search form
    //retrieve query terms
    $query_terms = trim($_GET['query-terms']);

    //if search term is empty, list all movies
    if ($query_terms == "") {
        header("Location: list_book.php");
        exit();
    }

    //search the database for matching movies
    $book = $book_manager->search_book($query_terms);
    
    //something went wrong; redirect the user to display the error message
    if ($book === false) {
        //handle error
        $message = "An error has occurred.";
        header("Location: show_error.php?eMsg=$message");
        exit();
    }
    //display matched books
    $search = new SearchBook();
    $search->display($query_terms, $book);
}

//auto suggest book
if (filter_has_var(INPUT_GET, "q")) {//process ajax request
    $query_terms = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
    $book = $book_manager->search_book($query_terms);
    
    //retrieve all book titles and store them in an array
    $titles = array();
    if ($book) {
        foreach ($book as $book) {
            $titles[] = $book->getTitle();
        }
    }
    
    echo json_encode($titles);
} 
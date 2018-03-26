<?php

require_once 'classes/book_manager.class.php';
require_once 'classes/list_book.class.php';

$book_manager = BookManager:: getBookManager(); //create a BookManager
//
//retrieve books
$book = $book_manager->list_book();

//handle errors if the last query failed
if (!$book) {
    //handle errors
    $message = "There was a problem displaying books.";
    header("Location: show_error.php?eMsg=$message");
    exit();
}

// display all books
$view = new ListBook();
$view->display($book);

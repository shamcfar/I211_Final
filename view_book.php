<?php

//get book id from a query string variable
if (!isset($_GET['id']) || !is_int(intval($_GET['id']))) {
    //handle error
}
$id = intval($_GET['id']);

//view movie details
require_once 'classes/book_manager.class.php';
require_once 'classes/view_book.class.php';


//get the book
$book_manager = BookManager::getBookManager();
$book = $book_manager->view_book($id);

if (!$book) {
    //handle errors
    $message = "An error has occurred.";
    header("Location: show_error.php?eMsg=$message");
}

//display all books
$view = new ViewBook();
$view->display($book);

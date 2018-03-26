<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of book
 *
 * @author laaf117
 */
class Book {

    //private data members
    private $id, $title, $author, $genre, $image, $publisher, $description;

    //the constructor
    public function __construct($title, $author, $genre, $image, $publisher, $description) {
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->image = $image;
        $this->publisher = $publisher;
        $this->description = $description;
    }
    
    //get methods to return movie details
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

      public function getGenre() {
        return $this->genre;
    }
    
    public function getImage() {
        return $this->image;
    }

    public function getPublisher() {
        return $this->publisher;
    }


    public function getDescription() {
        return $this->description;
    }

    //set book id
    public function setId($id) {
        $this->id = $id;
    }

}
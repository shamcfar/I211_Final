<?php

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
	
    //getters
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

    //set movie id
    public function setId($id) {
        $this->id = $id;
    }

}
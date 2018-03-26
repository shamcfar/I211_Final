<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of list_book_class
 *
 * @author laaf117
 */
require_once 'application/app_view.class.php';

class ListBook extends Appview {

    public function display($book) {
        parent::displayHeader("List All Books"); 
        ?>

        <div id="main-header"> Books in the Library</div>
        <div class="grid-container">
            <?php
            if ($book === 0) {
                echo "No book was found.<br><br><br><br><br>";
            } else {
                //display books in a grid; six books per row
                foreach ($book as $i => $book) {
                    $id = $book->getId();
                    $title = $book->getTitle();
                    $author = $book->getAuthor();
                    
                    $image = $book->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BOOK_IMG . $image;
                    }
                    if ($i%6 == 0) {
                        echo "<div class='row'>";
                    }
                    echo "<div class='col'><p><a href='view_movie.php?id=" . $id . "'><img src='" . $image .
                    "'></a><span>$title<br>Author $author<br>" . "</span></p></div>";
                    ?>
                    <?php
                    if ($i%6 == 5 || $i == count($book) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
        <?php
        parent::displayFooter();
    }
}

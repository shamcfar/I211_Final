<?php

class BookSearch extends BookIndexView {
    /*
     * the displays accepts an array of book objects and displays
     * them in a grid.
     */

     public function display($terms, $books) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($books)) ? "( 0 - 0 )" : "( 1 - " . count($books) . " )");
            ?>
        </span>
        <hr>

       <!-- display all records in a grid -->
               <div class="grid-container">
            <?php
            if ($books === 0) {
                echo "No book was found.<br><br><br><br><br>";
            } else {
                //display books in a grid; six books per row
                foreach ($books as $i => $book) {
                    $id = $book->getId();
                    $title = $book->getTitle();
                    $author = $book->getAuthor();
                    $genre = $book->getGenre();
                    $image = $book->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . BOOK_IMG . $image;
                    }

                    $publisher = $book->getPublisher();
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='" . BASE_URL . "/book/detail/$id'><img src='" . $image .
                    "'></a><span>$title<br>$genre<br></span></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($books) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
        <a href="<?= BASE_URL ?>/book/index">Go to book list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
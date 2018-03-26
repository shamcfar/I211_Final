<?php
/*
 * Description: this script defines the SearchMovie class. The class contains a method named display, which
 *     accepts an array of Movie objects and displays them in a grid.
 * 
 */
require_once 'application/app_view.class.php';

class SearchBook extends Appview{

    public function display($terms, $book) {
        parent::displayHeader("Search Results");
        ?>

        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <hr>
        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($book === 0) {
                echo "The book isn't here!.<br><br><br><br><br>";
            } else {
                //display books in a grid; six movies per row
                foreach ($book as $i => $book) {
                    $id = $book->getId();
                    $title = $book->getTitle();
                    $author = $book->getAuthor();
                    $genre = $book->getGenre();

                    $image = $book->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . BOOK_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='view_book.php?id=" . $id . "'><img src='" . $image .
                    "'></a><span>$title<br>Author $author<br>" . $genre . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($book) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
        <a href="list_book.php?page=<?= $page ?>">Show me the Books!</a>
        <?php
        parent::displayFooter();
    }

}

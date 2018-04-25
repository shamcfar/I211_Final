`<?php

class BookIndex extends BookIndexView {
    /*
     * the display method accepts an array of book objects and displays
     * them in a grid.
     */

    public function display($books) {
        //display page header
       parent::displayHeader("List All Books");
	   
        ?>
        <div id="main-header2"> Books in the Library</div>
        
        <?php
        if ($_SESSION['role'] == 1) {
            echo "<div>";
            echo "<a href='",BASE_URL ,"/book/add'><img src='",BASE_URL ,"/www/img/addbook.png' title='Registration'/>Add new book</a>";
            echo "</div>";
        }
        ?>

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

                    echo "<div class='col'><p><a href='", BASE_URL, "/book/detail/$id'><img src='" . $image .
                    "'></a><span>$title<br>$genre<br></span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($books) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>

        <?php
        //display page footer
        parent::displayFooter();
		
    } //end of display method
}

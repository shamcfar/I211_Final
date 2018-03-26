<?php

require_once 'application/app_view.class.php';

class ViewBook extends Appview{

    //display details of a book
    public function display($book, $confirm = "") {
        parent::displayHeader('View Movie Details');

        //retrieve book details by calling get methods
        $id = $book->getId();
        $title = $book->getTitle();
        $author = $book->getAuthor();
        
        $genre = $book->getGenre();
        $image = $book->getImage();
        $publisher = $book->getPublisher();
        $description = $book->getDescription();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/'. BOOK_IMG . $image;
        }
        ?>
        <div id="main-header">About the Book!</div>
        <hr>
        <!-- display book details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $title ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Title:</strong></p>
                    <p><strong>Author:</strong></p>
                    <p><strong>Genre:</strong></p>
                    <p><strong>Publisher:</strong></p>
                    <p><strong>Description:</strong></p>
                </td>
                <td>
                    <p><?= $title ?></p>
                    <p><?= $author ?></p>
                    <p><?= $genre ?></p>
                    <p><?= $publisher ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href='list_book.php'>Show me the Books!</a>
        <?php
        parent::displayFooter();
    }

}

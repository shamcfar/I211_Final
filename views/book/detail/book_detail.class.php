<?php

class BookDetail extends BookIndexView {

    public function display($book, $confirm = "") {
        //display page header
        parent::displayHeader("Display Book Details");

        //retrieve book details by calling get methods
        $id = $book->getId();
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $genre = $book->getGenre();
        $image = $book->getImage();
        $publisher = $book->getPublisher();
        $description = $book->getDescription();


        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . BOOK_IMG . $image;
        }
        ?>

        <div id="main-header">Book Details</div>
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
                    <?php
                    if ($_SESSION['role'] == 1) {
                        ?>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/book/edit/<?= $id ?>'">&nbsp;
                        <input type="button" id="edit-button" value="   Delete   "
                               onclick="window.location.href = '<?= BASE_URL ?>/book/delete/<?= $id ?>'">&nbsp;
                    </div>
                    <?php
                    }
                    ?>
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
        <a href="<?= BASE_URL ?>/index">Go to book list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}

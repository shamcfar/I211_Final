<?php
 
class BookEdit extends BookIndexView {
 
    public function display($book) {
        //display page header
        parent::displayHeader("Edit Book");
 
        /*//get book ratings from a session variable
        if (isset($_SESSION['book_ratings'])) {
            $ratings = $_SESSION['book_ratings'];
        }*/
       
        //retrieve book details by calling get methods
        $id = $book->getId();
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $genre = $book->getGenre();
        $image = $book->getImage();
        $publisher = $book->getPublisher();
        $description = $book->getDescription();
        ?>
 
        <div id="main-header">Edit Book Details</div>
 
        <!-- display book details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/book/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
          <input type="hidden" name="id" value="<?= $id ?>">
            <p><strong>Title</strong>:<br>
                <input name="title" type="text" size="100" value="<?= $title ?>" required autofocus></p>
            <p><strong>Author</strong>:<br>
                <input name="author" type='text' size="100" value="<?= $author ?>" required></p>
            <p><strong>Genre</strong>:<br> <input name="genre" type="text" size="100" value="<?= $genre ?>" required=""></p>
            <p><strong>Publisher</strong>:<br>
                <input name="publisher" type="text" size="100" value="<?= $publisher ?>" required=""></p>
            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>"></p>
            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"><?= $description ?></textarea></p>
            <input type="submit" name="action" value="Update Book">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/book/detail/" . $id ?>"'>  
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }
 
//end of display method
}

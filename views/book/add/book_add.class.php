<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of book_add
 *
 * @author shaunmcfarland
 */
class BookAdd extends BookIndexView {
    public function display() {
        parent::displayHeader("Add Book");
?>
        
<div id="main-header">Add New Book</div>

<form class="new-media" method="post" action='<?= BASE_URL ."/book/insert" ?>' style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
    <p><strong>Title:</strong></p>
        <input type="text" name="title" size="100" required>
    <p><strong>Author:</strong></p>
        <input type="text" name="author" size="100" required>
    <p><strong>Genre:</strong></p>
        <input type="text" name="genre" size="100" required>
    <p><strong>Image:</strong></p>
        <input type="text" name="image" size="100" required>
    <p><strong>Publisher:</strong></p>
        <input type="text" name="publisher" size="100" required>
    <p><strong>Description:</strong></p>
        <textarea name="description" rows="8" cols="100" type="text" name="description" required></textarea>
    <input type="submit" name="action" value="Add">
    <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL ?>/index"'>
</form>
        
<?php        
    }
}

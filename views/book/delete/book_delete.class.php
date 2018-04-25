<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of book_delete
 *
 * @author shaunmcfarland
 */
class BookDelete extends BookIndexView {
    public function display() {
        parent::displayHeader("Deletion");
?>

<h2 id="main-header">Books At The Edge Of The World</h2>
<h3 style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">Rule No. 1: Don't speak of that book again.<br>Rule No. 2: Don't speak of that book again.</h3>
    <p><a href="<?= BASE_URL ?>/book/index">Back to acceptable books</p>

<?php
    }    
}

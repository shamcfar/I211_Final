<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of confirm_add
 *
 * @author shaunmcfarland
 */
class BookConfirm extends BookIndexView {
    public function display() {
        parent::displayHeader("Registration");
    ?>

    <h2 id="main-header">Books At The Edge Of The World</h2>
    <h3 style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">The book has been added into the library. Now go read it!!</h3>
    <p><a href="<?= BASE_URL ?>/book/index">Show all Books</p>

    <?php
    }
}

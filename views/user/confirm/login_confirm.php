<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_confirm
 *
 * @author shaunmcfarland
 */
class LoginConfirm extends UserIndexView {
    public function display() {
        parent::displayHeader("Registration");
    ?>

    <h2 id="main-header">Books At The Edge Of The World</h2>
    <h3 style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">You have been logged in.</h3>
    <p><a href="<?= BASE_URL ?>/book/index">Proceed to Books</p>

    <?php
    }
}

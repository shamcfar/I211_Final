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
class RegisterConfirm extends UserIndexView {
    public function display() {
        parent::displayHeader("Registration");
    ?>

    <h2 id="main-header">Books At The Edge Of The World</h2>
    <h3 style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">Thank you for registering. You should recieve a confirmation e-mail shortly.</h3>
    <p><a href="<?= BASE_URL ?>/book/index">Show all Books</p>

    <?php
    }
}

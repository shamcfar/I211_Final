<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_delete
 *
 * @author shaunmcfarland
 */
class UserDelete extends UserIndexView {
    public function display() {
        parent::displayHeader("Deletion");
?>

<h2 id="main-header">Books At The Edge Of The World</h2>
    <h3 style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">Target has been eliminated. Resume normal operations</h3>
    <p><a href="<?= BASE_URL ?>/user/index">Show remaining users</p>

<?php
    }    
}

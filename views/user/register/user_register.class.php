<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_register
 *
 * @author shaunmcfarland
 */
class UserRegister extends UserIndexView {
    public function display() {
        parent::displayHeader("Registration");
?>

<div id="main-header">New User Registration</div>

<div>
    <form class="new-media" method="post" action="<?= BASE_URL ?>/user/insert" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
        <p><strong>Username:</strong></p>
            <input type="text" name="username" size="100" required>
        <p><strong>Password:</strong></p>
            <input type="password" name="password" size="100" required>
        <p><strong>Full Name:</strong></p>
            <input type="text" name="fullname" size="100" required>
        <p><strong>E-Mail:</strong></p>
            <input type="text" name="email" size="100" required>
            <br><br>
        <input type="submit" name="action" value="Register">
        <input type="button" value="Nevermind" onclick='window.location.href = "<?= BASE_URL ?>/index"'>
    </form>
</div>

<?php
    }
}
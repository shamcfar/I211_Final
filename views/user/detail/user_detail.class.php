<?php


class UserDetail extends UserIndexView {

    public function display($user, $confirm = "") {
        //display page header
        parent::displayHeader("Display User Details");

        //retrieve user details by calling get methods
        $id = $user->getId();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $fullname = $user->getFullname();
        $email = $user->getEmail();
        $role = $user->getRole();

        ?>

        <div id="main-header">User Details</div>
        <hr>
        <!-- display user details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= BASE_URL ?>/www/img/user.png" alt="user_image" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Username:</strong></p>
                    <p><strong>Password:</strong></p>
                    <p><strong>Fullname:</strong></p>
                    <p><strong>E-Mail:</strong></p>
                    <p><strong>Role:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/user/edit/<?= $id ?>'">&nbsp;
                        <input type="button" id="edit-button" value="   Delete   "
                               onclick="window.location.href = '<?= BASE_URL ?>/user/delete/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $username ?></p>
                    <p style="opacity: 0"><?= $password ?></p>
                    <p><?= $fullname ?></p>
                    <p><?= $email ?></p>
                    <p><?= $role ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/user/index">Go to user list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}

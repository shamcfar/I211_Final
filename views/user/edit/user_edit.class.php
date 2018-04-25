<?php
 
class UserEdit extends UserIndexView {
 
    public function display($user) {
        //display page header
        parent::displayHeader("Edit User");
       
        //retrieve user details by calling get methods
        $id = $user->getId();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $fullname = $user->getFullname();
        $email = $user->getEmail();
        $role = $user->getRole();
        ?>
 
        <div id="main-header">Edit User Details</div>
 
        <!-- display user details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/user/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
          <input type="hidden" name="id" value="<?= $id ?>">
            <p><strong>Username</strong>:<br>
                <input name="username" type="text" size="100" value="<?= $username ?>" required autofocus></p>
            <p><strong>Password</strong>:<br>
                <input name="password" type='password' size="100" value="<?= $password ?>" required></p>
            <p><strong>Fullname</strong>:<br> 
                <input name="fullname" type="text" size="100" value="<?= $fullname ?>" required=""></p>
            <p><strong>Email</strong>:<br>
                <input name="email" type="text" size="100" value="<?= $email ?>" required=""></p>
            <p><strong>Role (1=Admin, 0=Regular User)</strong>:<br>
                <input name="role" type="text" size="100" value="<?= $role ?>" required=""></p>
            <input type="submit" name="action" value="Update User">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/user/detail/" . $id ?>"'>  
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }
 
//end of display method
}

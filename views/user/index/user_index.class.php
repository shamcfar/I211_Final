<?php

class UserIndex extends UserIndexView {
    /*
     * the display method accepts an array of user objects and displays
     * them in a grid.
     */

    public function display($users) {
        //display page header
       parent::displayHeader("List All Users");
	   
        ?>
        <div id="main-header">Registered Users</div>

        <div class="grid-container">
            <?php
            if ($users === 0) {
                echo "No user was found.<br><br><br><br><br>";
            } else {
                //display users in a grid; six users per row
                foreach ($users as $i => $user) {
                    $id = $user->getId();
                    $username = $user->getUsername();
                    $password = $user->getPassword();
                    $fullname = $user->getFullname();
                    $email = $user->getEmail();
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    /*if ($_SESSION['role'] == 1) {
                        echo "<div class='col'><p><a href='", BASE_URL, "/user/detail/$id'><img src='", BASE_URL, "/www/img/wonderWoman.png'></a><span>$fullname</span></p></div>";
                    } else {*/
                        echo "<div class='col'><p><a href='", BASE_URL, "/user/detail/$id'><img src='", BASE_URL, "/www/img/user.png'></a><span>$fullname</span></p></div>";
                    //}
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($users) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
       
        <?php
        //display page footer
        parent::displayFooter();
		
    } //end of display method
}

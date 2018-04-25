<?php

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Books At The Edge of The World Home");
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>    
        <div id="main-header">Welcome to Books At The Edge of The World Library!</div>
        <p></p>
        <br>
        <table style="border: none; width: 700px; margin: 5px auto">
            <tr>
                <td colspan="2" style="text-align: center; font-size: 30px; color: white"><strong>Major features include:</strong></td>
            </tr>
            <tr>
                <td style="text-align: left; font-size: 25px">
                    <ul>
                        <li>Getting great reading suggestions</li>
                        <li>Display details of specific books</li>
                        <li>Update or delete existing books</li>
                        <li>Add new books [if you're privileged]</li>
                    </ul>
                </td>
                <td style="text-align: left; font-size: 25px">
                    <ul>
                        <li>Search for books</li>
                        <li>Autosuggestion</li>
                    </ul></td>
            </tr>
        </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p style="font-size: 30px"><strong>Click an image below to navigate to that page. Click the logo in the banner to come back to this page.</strong></p>

            <a href="<?= BASE_URL ?>/book/index">
                <img src="<?= BASE_URL ?>/www/img/books.jpg" title="Book Library"/>
            </a>
            
            <?php
            if (!$_SESSION['login']){
                echo "<a href='",BASE_URL ,"/user/register'>";
                echo "<img src='",BASE_URL ,"/www/img/addUser.png' title='Registration'/>";
                echo "</a>";
                echo "<a href='",BASE_URL,"/user/login'>";
                echo "<img src='",BASE_URL,"/www/img/login.jpeg' title='User Login' />";
                echo "</a>";
            } else {
                echo "<a href='",BASE_URL,"/user/logout'>";
                echo "<img src='",BASE_URL,"/www/img/logout.jpeg' title='Logout' />";
                echo "</a>";
            }
            
            if ($_SESSION['role'] == 1) {
                echo "<a href='",BASE_URL,"/user/index'>";
                echo "<img src='",BASE_URL,"/www/img/myspace.png' title='User List' />";
                echo "</a>";
            }
            ?>
            
        </div>
        <br>
        <p style="text-align: center; color: red; font-weight: bold">Disclaimer</p>
        <p style="font-style: italic; text-align: center; font-size:25px">This application is created as a course project for I211. Use it at your own risk.</p><br>

        <?php
        //display page footer
        parent::displayFooter();
    }
}

<?php


require_once 'application/app_view.class.php';

class ShowError extends Appview{
    
    public function display($message) {
        parent::displayHeader('Error');
        ?>

        <div id="main-header">BBzzzBBrrrPTt  ERR0R</div>

        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3>DANGER!!! an ERR0R has gone DOWN!</h3>
                    <div style="color: red">
                        <?= $message ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><br>
        <hr>
        <a href="index.php">Show me the Books!</a>
        <?php
        parent::displayFooter();
        die();
    }
}
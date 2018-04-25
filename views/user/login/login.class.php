<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author shaunmcfarland
 */
class Login extends UserIndexView {

    public function display() {
        parent::displayHeader("Login");
        ?>

        <div id="main-header">Login</div>

        <div>
            <form class="new-media" method="post" action="<?= BASE_URL ?>/user/validate" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
                <table>
                    <tr>
                        <td colspan="2">Enter credentials<br><br></td>
                    </tr>
                    <tr>    
                        <td style="width: 80px">User name: </td>
                        <td><input type='text' name='username' required></td>
                    </tr>
                    <tr>
                        <td style="width: 70px">Password: </td>
                        <td><input type='password' name='password' required></td>
                    </tr>
                    <tr>
                        <td colspan='2' style='padding: 10px 0 0 85px'>
                            <input type='submit' value='Login'>
                            <input type="button" value="Run" onclick='window.location.href = "<?= BASE_URL ?>/index"' />     
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <?php
    }

}

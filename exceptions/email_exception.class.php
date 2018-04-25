<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email_exception
 *
 * @author shaunmcfarland
 */
class EmailException extends Exception {
    public function emailError($msg) {
        //create an object of UserController
        $user_controller = new UserController();
        
        $user_controller->error($msg);
    }
}

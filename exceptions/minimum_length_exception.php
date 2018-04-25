<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of minimum_length_exception
 *
 * @author shaunmcfarland
 */
class MinimumLengthException extends Exception {
    public function lengthError($msg) {
        //create an object of UserController
        $user_controller = new UserController();
        
        $user_controller->error($msg);
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of date_exception
 *
 * @author shaunmcfarland
 */
class DateException extends Exception {
    public function dateError($msg) {
        //create an object of UserController
        $user_controller = new UserController();
        
        $user_controller->error($msg);
    }
}

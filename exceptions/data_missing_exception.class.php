<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of data_missing_exception
 *
 * @author shaunmcfarland
 */
class DataMissingException extends Exception {
    public function dataError($msg) {
        //create an object of UserController
        $user_controller = new UserController();
        
        $user_controller->error($msg);
    }
}

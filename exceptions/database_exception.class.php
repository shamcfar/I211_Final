<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database_exception
 *
 * @author shaunmcfarland
 */
class DatabaseException extends Exception {
    public function databaseError($msg) {
        //create an object of UserController
        $user_controller = new UserController();
        
        $user_controller->error($msg);
    }
}

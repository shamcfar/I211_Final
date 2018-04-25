<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author shaunmcfarland
 */
class User {
    private $id, $username, $password, $fullname, $email, $role;
    
    public function __construct($username, $password, $fullname, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->email = $email;
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getRole() {
        return $this->role;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setRole($role) {
        $this->role = $role;
    }
}

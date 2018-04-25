<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_controller
 *
 * @author shaunmcfarland
 */
class UserController {

    private $user_model;

    //default constructor
    public function __construct() {
        //create an instance of the UserModel class
        $this->user_model = UserModel::getUserModel();
    }

    //index action that displays all users
    public function index() {
        //retrieve all users and store them in an array
        $users = $this->user_model->list_user();

        if (!$users) {
            //display an error
            $message = "There was a problem displaying users";
            $this->error($message);
            return;
        }

        //display all users
        $view = new UserIndex();
        $view->display($users);
    }

    //show details of a user
    public function detail($id) {
        //retrieve the specific user
        $user = $this->user_model->view_user($id);

        if (!$user) {
            //display an error
            $message = "There was a problem displaying the user id ='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display user details
        $view = new UserDetail();
        $view->display($user);
    }

    //handle an error
    public function error($message) {
        //creatre an object of the Error class
        $error = new UserError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

    //display a user in a form for editing
    public function edit($id) {
        //retrieve the specific user
        $user = $this->user_model->view_user($id);

        if (!$user) {
            //display an error
            $message = "There was a problem displaying the user id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new UserEdit();
        $view->display($user);
    }

    //update a user in the database
    public function update($id) {
        //update the user
        $update = $this->user_model->update_user($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the user id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed user details
        $confirm = "The user was successfully updated.";
        $user = $this->user_model->view_user($id);

        $view = new UserDetail();
        $view->display($user, $confirm);
    }

    //show registration form for a new user
    public function register() {
        $view = new UserRegister();
        $view->display();
    }

    //add a new user into the database
    public function insert() {
        $register = $this->user_model->insert_user();

        if (!$register) {
            //display an error
            $message = "Sorry we coud not understand your input. Care to try again?";
            $this->error($message);
            return;
        }

        $view = new RegisterConfirm();
        $view->display();
    }

    //Show login form
    public function login() {
        $view = new Login();
        $view->display();
    }

    //validate user's login input
    public function validate() {
        $login = $this->user_model->login();

        if (!$login) {
            $message = "An error has occured while trying to log in, please try again later";
            $this->error($message);
            return;
        }

        $view = new LoginConfirm();
        $view->display();
    }

    public function logout() {
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //unset all the session variables
        $_SESSION = array();

        //delete the session cookie
        setcookie(session_name(), "", time() - 3600);

        //destroy the session
        session_destroy();

        $view = new WelcomeIndex();
        $view->display();
    }
    
    public function delete($id) {
        //delete the user
        $delete = $this->user_model->delete_user($id);
        
        if (!$delete) {
            //handle errors
            $message = "There was a problem dropping user id='" . $id . "'.";
            $this->error($message);
            return;
        }
        
        $view = new UserDelete();
        $view->display();
    }

}

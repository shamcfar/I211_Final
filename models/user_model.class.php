<?php

class UserModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBook;
    private $tblUser;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getUserModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getBookTable();
        $this->tblUser = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one UserModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    /*
     * the list_user method retrieves all users from the database and
     * returns an array of User objects if successful or false if failed.
     * Users should also be filtered by categories and/or sorted by titles or category if they are available.
     */

    public function list_user() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblUser;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query)
            return false;

        //if the query succeeded, but no user was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned users
        $users = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $user = new User(stripslashes($obj->username), stripslashes($obj->password), stripslashes($obj->fullname), stripslashes($obj->email));

            //set the id for the user
            $user->setId($obj->id);

            //set the role for the user
            $user->setRole($obj->role);

            //add the user into the array
            $users[] = $user;
        }
        return $users;
    }

    /*
     * the viewUser method retrieves the details of the user specified by its id
     * and returns a user object. Return false if failed.
     */

    public function view_user($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblUser . " WHERE id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a user object
            $user = new User(stripslashes($obj->username), stripslashes($obj->password), stripslashes($obj->fullname), stripslashes($obj->email), stripslashes($obj->role));

            //set the id for the user
            $user->setId($obj->id);

            //set the role for the user
            $user->setRole($obj->role);

            return $user;
        }

        return false;
    }

    //add user into database
    public function insert_user() {
        if (!filter_has_var(INPUT_POST, 'username') ||
                !filter_has_var(INPUT_POST, 'password') ||
                !filter_has_var(INPUT_POST, 'fullname') ||
                !filter_has_var(INPUT_POST, 'email')) {
            return;
        }
        
        $utilities = new Utilities();

        //Retrieve properties of the User object
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        $fullname = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING));
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        
        try {
            if ($username == "" || $password == "" || $fullname == "" || $email == ""){
                throw new DataMissingException();
            }
            if (strlen($username) < 8 || strlen($password) < 8) {
                throw new MinimumLengthException();
            }
            if ($utilities->checkemail($email) == false) {
                throw new EmailException();
            }

        //Construct an INSERT query
        $sql = "INSERT INTO  user VALUES(NULL, '$username', '$password', '$fullname', '$email', 0)";

        $query = $this->dbConnection->query($sql);
        return $query;
        
        } catch (DataMissingException $e) {
            $message = $e->dataError("Please fill out all information");
            return $message;
        } catch (MinimumLengthException $e) {
            $message = $e->lengthError("Username and password must be at least 8 characters");
            return $message;
        } catch (EmailException $e) {
            $message = $e->emailError("Enter valid e-mail");
            return $message;
        } catch (Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    //update user in database
    public function update_user($id) {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'username') ||
                !filter_has_var(INPUT_POST, 'password') ||
                !filter_has_var(INPUT_POST, 'fullname') ||
                !filter_has_var(INPUT_POST, 'email') ||
                !filter_has_var(INPUT_POST, 'role')) {

            return false;
        }

        //retrieve data for the new user; data are sanitized and escaped for security.
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        $fullname = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING));
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $role = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING)));

        //query string for update
        $sql = "UPDATE " . $this->tblUser .
                " SET username='$username', password='$password', fullname='$fullname', email='$email', role='$role' WHERE id='$id'";

        //execute the query
        return $this->dbConnection->query($sql);
    }

    //User login function
    public function login() {
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //retrieve user name and password from the form in the login form
        if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
            $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
            $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        }

        //validate user name and password against a record in the users table in the database. If they are valid, create session variables.
        $sql = "SELECT * FROM " . $this->tblUser . " WHERE username='$username' AND password='$password'";

        $query = $this->dbConnection->query($sql);
        if ($query->num_rows) {
            //it is a valid user. Need to store the user in session variales.
            $row = $query->fetch_assoc();
            $_SESSION['login'] = $username;
            $_SESSION['role'] = $row['role'];
            $fullname = $row['fullname'];
            $firstName = rtrim($fullname, " ");
            $_SESSION['name'] = $firstName;
            //$_SESSION['name'] = $row['fullname'];
            $_SESSION['login_status'] = 1;
        }

        return $this->dbConnection->query($sql);
    }

    //delete a user from the database
    public function delete_user($id) {
        //define the MySQL delete statement
        $sql = "DELETE FROM ". $this->tblUser." WHERE id='$id'";
        
        //execute the query
        $query = $this->dbConnection->query($sql);
        return $query;
    }

}

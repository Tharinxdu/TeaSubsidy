<?php

// base controller -> all other controllers inherite from this
/*
    there are methods that all controllers require
    ex: get required model instance
        render givern view

*/
class Controller
{
    
    //private $previous = "";       link for previous 

    public function __construct($active)
    {
        //view NavBar
        session_start();
        $dp_location = "";
        // echo "view Navbar from core Controller<br>";
        // if user logged in navBar should show user image
        if(isset($_SESSION['User']))
        {
            $dp_location = $_SESSION['User']['dp_location'];
        }
        $this->view("navBar", ['active' => $active , 'dp_location' => $dp_location]);
    }

    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
        
    }

    protected function view($view , $data = [] )
    {
        require_once '../app/views/' . $view . '.php';
    }

    protected function generateCSRFToken()     //generate newly when login successfull;
    {
        if(empty($_SESSION('token')))
        {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
    }

    //verify input data given by user - remove unneccesary chars
    protected function input_verify($data){
        //remove empty spaces
        $data = trim($data);
        //remove back shlashes
        $data = stripslashes($data);
        //convert to html entities
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function validateEmail($email){
        $emailErr = "";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }

        return $emailErr;
    }

    protected function validatePassword($password){
        $passwdErr = "";
        
        if(strlen($password) <= '8'){
            $passwdErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#" , $password)){
            $passwdErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match( "#[A-Z]+#" , $password)){
            $passwdErr = "Your Password Must Contain At Least 1 Capital Letter";
        }
        elseif(!preg_match("#[a-z]+#" , $password)){
            $passwdErr = "Your Pasword Must Contain At Least 1 Lowercase Letter";
        }

        return $passwdErr;
    }

}

?>
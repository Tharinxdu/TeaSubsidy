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
        echo "view Navbar from core Controller<br>";
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

}

?>
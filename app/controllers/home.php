<?php

class Home extends Controller
{

    public function index(){
        if(isset($_SESSION['User']))
        {
            header("Location: /mvc/public/user/index");
        }
        echo "home/index<br>";
        $this->view('home/index');
    }
    public function regionaloffices(){
        if(isset($_SESSION['User']))
        {
            header("Location: ../user/index");
        }
        echo "home/regionaloffices<br>";
        $this->view('home/regionaloffices');
    }
    public function about(){
        if(isset($_SESSION['User']))
        {
            header("Location: ../user/index");
        }
        echo "home/about<br>";
        $this->view('home/about');
    }
    public function OurServices(){
        if(isset($_SESSION['User']))
        {
            header("Location: ../user/index");
        }
        echo "home/ourservices<br>";
        $this->view('home/ourservices');
    }

    public function register(){
        if(isset($_SESSION['User']))
        {
            header("Location: ../user/index");
        }
        echo "home/register<br>";
        $this->view('home/register');
    }

    public function login(){

        
        /*
            $user = $this->model('User')    $user is an User object   
            'User' is the name of the model php file.
            then model function'll require php file named 'User.php'
            
            echo $user->name; we do not render things from controllers in MVC ! ! ! 
            let rendering to do by views

            ! ! ! DO NOT ECHO ANY FROM CONTROLLERS (when deploying)
        */

        $userModel  = $this->model('LoginModel');        //got a user model like in node
        
        if(isset($_SESSION['User'])){
            
            header("Location: ../user/index");
            /*
                user class for any user *** i.e pass to user controller or redirect again***
                user class will handle any `USER` and common functions to all users
                it'll redirect any `USER` to his path forbbiding/blocking to go to another users path

                // currently this will redirect to hard coded locations
                // should imrove to redirect user to previous location. 
                // HINT : use prev_link in base controller for each user(Already commented)

            */
        }

        $role = "";
        $email = "";
        $password = "";
        $user = "";

        if(isset($_POST['Submit'])){

            $role = $this->input_verify($_POST['dropdown']);
            $email = $this->input_verify($_POST['email']);
            $password = md5($this->input_verify($_POST['password']));
            unset($_POST['Submit']);
            if($role == "none")
            {
                echo "<div class=\"red msg\">You Must Select a Role.</div>";
            }
            else
            {
                $table = 'Users';
                $result = $userModel->findbycredentials($table , [$email , $password , $role]);

                if($result == -1){
                    //wrong credentials
                    echo "<div class=\"red msg\">Invalid Username or Password.</div>";
                }
                else
                {
                    //login
                    $user = $result;

                    // Session Management
                    $_SESSION['User'] = $user;
                    $_SESSION['Role'] = $user['role'];//use to redirect user to path by user role in user.php
                    //create new csrf token

                    if(!empty($role))
                    {
                        header("Location: ../user/index");
                    }
                    else
                    {
                        echo "<div class=\"red msg\">You Must Select a Role.</div>";
                    }
                }
            }

            
        }

        echo "home/login<br>";
        $this->view('home/login');

    }

}

?>
<?php

class Home extends Controller
{

    public function index(){
        if(isset($_SESSION['User']))
        {
            header("Location: ../user/index");
        }
        // echo "home/index<br>";
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

    public function login()
    {
        //$user = $this->model('User');   //'User' is the name of the model php file. then model function'll require php file named 'User.php'
        //$user->name = $name ? $name : 'Admin';
        // print_r($user);      //a User object
        // echo $user->name; we do not render things from controllers in MVC ! ! ! let rendering to do by views
        
        // session_start();

        
        
        if(isset($_SESSION['User'])){
            
            header("Location: ../user/index");           //implement for any user *** i.e pass to user controller or redirect again***
        }

        $userModel  = $this->model('LoginModel');        //got a user model like in MERN

        $email = "";
        $password = "";
        $user = "";
        $msg = "";

        if(isset($_POST['Submit'])){

            if(empty($_POST['email']) || empty($_POST['password'])){
                $msg = "<div class=\"red msg\">Please fill all the fields.</div>";
            }
            else{
                $validateError = $this->validateEmail($_POST['email']);
                if(empty($validateError))
                {

                    $email = $this->input_verify($_POST['email']);
                    $password = md5($this->input_verify($_POST['password']));                    
    
                    $table = 'Users';
                    $result = $userModel->findbycredentials($table , [$email , $password]);
    
                    if($result == -1){
                        //wrong
                        $msg = "<div class=\"red msg\">Invalid Username or Password.</div>";
                    }
                    else
                    {
                        //login
                        $user = $result;
    
                        // Session Management
                        $_SESSION['User'] = $user; //$user['Fname'] . " " . $user['Lname'];
                        $_SESSION['Role'] = $user['role'];//use to redirect user to path by user role in loader.php
                        //create new csrf token
    
                        // echo "username = ".$_SESSION['User'];
                        // echo "Role = ".$_SESSION['Role'];
    
                        // if(!empty($role))
                        // {
                        //     header("Location: ../user/index");
                        // }
                        // else
                        // {
                        //     echo "<div class=\"red msg\">You Must Select a Role.</div>";
                        // }
    
                        header("Location: ../user/index");
                    }
                }
                else{
                    $msg = "<div class=\"red msg\">".$this->validateEmail($_POST['email'])."</div>";
                }
                
            }
            unset($_POST['Submit']);  
        }

        $this->view('home/login' , ['msg' => $msg]);
    }

}

?>
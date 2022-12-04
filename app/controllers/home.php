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
        //in login
    }

}

?>
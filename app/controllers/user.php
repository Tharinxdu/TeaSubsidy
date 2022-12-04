<?php
//user routes come to here
// if any user tryed to go to home/.. or unauthorized path -> this will handdle those
//after tracking previous lik. we can reduce this code to one common method & it will redirect anyone to
// previous location again
//methodes -> index() , Notifications() , FAQ() ;
// every user has logout() & profile() this will handdle those also

    class user extends Controller
    {

        public function index()
        {            
            if(!isset($_SESSION['User']))
            {
                header("Location: ../home/login");
            }
            echo "user/index<br>";
            
            if($_SESSION['Role'] == "Head Office")
            {
                header("Location: ../HeadOffice/index");
            }
            elseif($_SESSION['Role'] == "regional Office")
            {
                header("Location: ../RegionalOffice/index");
            }
            
        }
        public function Notifications()
        {
            echo "user/Notifications<br>";
            if($_SESSION['Role'] == "Head Office")
            {
                header("Location: ../HeadOffice/Notifications");
            }
            elseif($_SESSION['Role'] == "regional Office")
            {
                header("Location: ../RegionalOffice/Notifications");
            }
        }
        public function FAQ()
        {
            if($_SESSION['Role'] == "Head Office")
            {
                header("Location: ../HeadOffice/FAQ");
            }
            elseif($_SESSION['Role'] == "regional Office")
            {
                header("Location: ../RegionalOffice/FAQ");
            }
            echo "user/FAQ<br>";
        }
        public function logout(){
            session_start();
            echo "user/logout<br>";
            $_SESSION = array();    //empty session

            if(isset($_COOKIE[session_name()])){
                setcookie(session_name() , '' , time()-86400 , '/');    //destroy cookie
            }

            session_destroy();
            //generate session token again
            header("Location: /mvc/public/home/login");

        }
        public function profile()
        {
            echo "user/profile";
            $this->view("user/profile");
        }

    }


?>
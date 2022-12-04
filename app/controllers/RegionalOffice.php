<?php
//if role is RegionalOffice user class redirects to here


class RegionalOffice extends Controller
{
    public function index()
    {
        
        if($_SESSION['Role']!="regional Office")
        {
            header("Location: ../user/index");
        }
        echo "Regional Office/index<br>";
        echo "<h2 class='header'>Hello {$_SESSION['User']['userName']}</h2>";
    }
    public function Notifications()
    {
        if($_SESSION['Role']!="regional Office")
        {
            header("Location: ../user/Notifications");
        }
        echo "Regional Office/Notifications<br>";
    }
    public function FAQ()
    {
        if($_SESSION['Role']!="regional Office")
        {
            header("Location: ../user/FAQ");
        }
        echo "Regional Office/FAQ<br>";
    }
}

?>
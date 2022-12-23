<?php
//if role is HeadOffice user class redirects to here


class HeadOffice extends Controller
{
    public function index()
    {
        if($_SESSION['Role']!="Head Office")
        {
            header("Location: ../user/index");
        }
        // echo "HeadOffice/index<br>";
        // echo "<h2>Hello ${_SESSION['Username']}</h2>";

        //view Head office index file
        $this->view("user/index" , ["Head Office"]);
       
    }

    public function Notifications()
    {
        if($_SESSION['Role']!="Head Office")
        {
            header("Location: ../user/Notifications");
        }
        echo "HeadOffice/Notifications<br>";
    }

    public function FAQ()
    {
        if($_SESSION['Role']!="Head Office")
        {
            header("Location: ../user/FAQ");
        }
        echo "HeadOffice/FAQ<br>";
    }

}

?>
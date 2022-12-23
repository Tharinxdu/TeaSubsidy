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

    public function manage_regional_offices(){
        if($_SESSION['Role']!="Head Office")
        {
            header("Location: ../user/index");
        }

        $regionalModel = $this->model("regionModel");
        $msg = "";
        // echo "HeadOffice/manage regional offices<br>";

        if(isset($_POST['remove']))
        {
            $id = $_POST['remove'];
            // unset($_POST['remove']);
            // echo "id = ".$id."<br>";
            $data = $regionalModel->findById($id);

            if($data == -2)
            {
                $msg = "<div class = 'msg red imp'>Error Occured.Try Again or Contact Administrator immediately.</div>";
            }
            elseif($data == -1)
            {
                $msg = "<div class = 'msg red'>Already Deleted or not Found.</div>";
            }
            else
            {
                $deleted = $regionalModel->deleteById($id);
                // if($deleted == -2)
                // {
                //     $msg = "<div class='msg red'>Critical Error Occured.Contact Administrator. ASAP.</div>";
                // }
                if($deleted == -1)
                {
                    $msg = "<div class = 'msg red imp'>Error Occured.Try Again or Contact Administrator.</div>";
                }
                elseif($deleted == 1)
                {
                    $msg = "<div class = 'msg green'>{$data['region']} Regional Office successfully Deleted.</div>";
                }
            }
            // header("Location:manage_regional_offices");
        }

        $SearchResults = [];
        $SearchResults = $regionalModel->find();
        // print_r($SearchResults);
        
        if($SearchResults == -1)
        {
            //faild
            $msg = "<p class='red msg imp'>Database Connection Issue. Please try again Later or contact Administrator.</p>"; 
        }
        else
        {
            if(isset($_GET['search']))
            {
                if(!empty($_GET['search'])){
                //     $SearchResults = [];
                //     $msg = "<p class='header'>Please make sure you fill the search bar.</p>";
                // }
                // else
                // {
                    $SearchResults = $regionalModel->findByNameLike($_GET['search']);
                    if(empty($SearchResults))
                    {
                        $SearchResults = [];
                        $msg = "<p class='header'>There is no Regional  Offices with name '{$_GET['search']}';</p>";
                    }
                    elseif($SearchResults == -1)
                    {
                        $SearchResults = [];
                        $msg = "<div class='red msg imp'>Something went wrong. Try Again or contact your Administrator.</div>";
                    }
                }
                
            }
        }

        $this->view("headoffice/manageRegionalOffices" , ['heading'=>"Regional Offices",'data'=>$SearchResults,'msg'=>$msg]);      
    }

}

?>
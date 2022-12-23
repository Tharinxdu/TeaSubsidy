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

    public function newregionaloffice(){
        if($_SESSION['Role']!="Head Office")
        {
            header("Location: ../user/index");
        }
        // echo "Add new R office<br>";

        $regionalModel = $this->model("regionModel");
        $msg = "";

        if(isset($_POST['ADD']))
        {

            // Validate inputs
            $email = $this->input_verify($_POST['email']);
            $password = md5($this->input_verify($_POST['password']));
            $contact = $this->input_verify($_POST['contactNo']);
            $region = $this->input_verify($_POST['Region']);

            //check for null values
            if(empty($email) || empty($password) || empty($contact) || empty($region))
            {
                $msg = "<div class='msg red'>All fields must be filled. Enter only valid charactors.(special charactors like '\','spaces','>/</?' can be the cause of this ! ! !)</div>";
            }
            else
            {
                                // user <-- RO
                $UserRO['userID'] = "REG".date("YnjGis");
                $UserRO['userEmail'] = $email;
                $UserRO['userName'] = $region."MNG";
                $UserRO['userPassword'] = $password;
                $UserRO['contactNum'] = $contact;
                $UserRO['role'] = "regional Office";

                // user <-- Acc
                $UserAcc['userID'] = "ACC".date("YnjGis");
                $UserAcc['userEmail'] = $region."Accountant@yourmail.com";
                $UserAcc['userName'] = $region."Acc";
                $UserAcc['userPassword'] = $password;
                $UserAcc['contactNum'] = $contact;
                $UserAcc['role'] = "Accountant";

                // user <-- Clk
                $UserClk['userID'] = "Clk".date("YnjGis");
                $UserClk['userEmail'] = $region."Clerk@yourmail.com";
                $UserClk['userName'] = $region."Clk";
                $UserClk['userPassword'] = $password;
                $UserClk['contactNum'] = $contact;
                $UserClk['role'] = "Clerk";

                $Ro['firstName'] = $Acc['firstName'] = $Clk['firstName'] =  "userF";
                $Ro['lastName'] = $Acc['lastName'] = $Clk['lastName'] = "userL";
                $Ro['userID'] = $UserRO['userID'];
                $Acc['userID'] = $UserAcc['userID'];
                $Clk['userID'] =  $UserClk['userID'];
                $Acc['employeeID'] = $region."accEID";  //temporary
                $Clk['employeeID'] = $region."clerkEID";//temp

                $Ro['region'] = $region;
                $Ro['Clerk_userID'] = $UserClk['userID'];
                $Ro['Accountant_userID'] = $UserAcc['userID'];

                $Newuser = $regionalModel->findByRegion(['region' => $Ro['region'] , 'email' => $email]);
                // var_dump($user);
                if($Newuser == -2){
                    //database failure
                    $msg =  "<div class='msg red'>Database Failuire!. Try Again or contact your Administrator.</div>";
                }
                elseif($Newuser != -1){
                    //already
                    $msg =  "<div class='msg red'>Already Registered. Try Defferent (not used before) Region name and email</div>";
                }
                else{
                    $added =$regionalModel->create(['UserRO'=> $UserRO , 'UserAcc'=>$UserAcc , 'UserClk'=>$UserClk , 'Ro'=>$Ro,'Acc'=>$Acc,'Clk'=>$Clk]);
                    if($added == 1)
                    {
                        $msg = "<div class='msg green'>Add '{$Ro['region']}' Regional Office Successfully . . . </div>";
                    }
                    elseif($added = -1)
                    {
                        $msg = "<div class='msg red'>Error Occured. Try Again or Contact Administrator...</div>";
                    }
                    else
                    {
                        $msg = "<div class='msg red'>CRITICAL Error Occured.Contact Administrator immediately...</div>";
                    }
                }
            }


        }

        $this->view("headoffice/newRoOffice" , ['heading' => "Add New Regional Office" , 'msg' => $msg]);
    }

    public function viewR(){
        if($_SESSION['Role']!="Head Office")
        {
            header("Location: ../user/index");
        }
        // echo "view Regional office<br>";

        $regionalModel = $this->model("regionModel");
        $data = [];
        $msg = "";

        if(isset($_POST['view']))
        {
            $id = $_POST['id'];
            unset($_POST['view']);
            // echo "id = ".$id."<br>";
            $data = $regionalModel->findById($id);

            if($data == -2)
            {
                $msg = "<div class='msg red'>Error Occured.Try Again or Contact Administrator immediately...</div>";
            }
            elseif($data == -1)
            {
                $msg = "<div class='msg red'>Error Occured.Try Again or Contact Administrator immediately...</div>";
            }
            $this->view("headoffice/viewRoffice" , ['data' => $data , 'msg'=>$msg]);
            
        }
        else
        {
            header("Location: manage_regional_offices");
        }

        
    }

}

?>
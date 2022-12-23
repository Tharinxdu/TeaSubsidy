<?php

class regionModel
{
    public $conn;

    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","PROJECT");
        if(mysqli_connect_errno())
        {
            echo "database connection error : ".mysqli_connect_error()."<br>";
        }
        else{
            //echo "ok<br>";
        }
    }

    public function find()
    {
        //all data as a array of assoc raws
        $query = "SELECT * FROM regionaloffice";
        $result = mysqli_query($this->conn , $query);
        if(mysqli_num_rows($result) >= 0)
        {
            $data = [];
            while($row = mysqli_fetch_assoc($result))
            {
                array_push($data , $row);
            }
            mysqli_free_result($result);
            return $data;       //array of assoc arrays(rows)
        }
        else
        {
            return -1; //not found;
        }
    }

    public function findByRegion($data)
    {
        $query1 = "SELECT firstName , lastName , region , startDate time FROM regionaloffice WHERE region = '{$data['region']}' LIMIT 1";
        $query2 = "SELECT userName , contactNum FROM Users WHERE userEmail = '{$data['email']}' LIMIT 1";
        //think about joins
        // print_r($query1."<br>".$query2."<br>");
        
        $result1 = mysqli_query($this->conn , $query1);
        $result2 = mysqli_query($this->conn , $query2);
        $data = [];
        $count = 0;
        $failed =0;
        if($result1)
        {
            if(mysqli_num_rows($result1) == 1 )
            {
                $data = mysqli_fetch_assoc($result1);
                mysqli_free_result($result1); 
                $count++;
            }
        }
        else{
            $failed++;
        }
        if($result2)
        {
            if(mysqli_num_rows($result2) == 1){
                $data = array_merge($data , mysqli_fetch_assoc($result2));
                mysqli_free_result($result2);
                $count++;
            }
        }
        else
        {
            $failed++;
        }

        if($failed > 0 )
        {
            return -2;  //failed try again
        }
        
        if($count == 0){
            return -1;      //no data
        }
        elseif($count == 1) //1 executed
        {
            return $data;  //not have all required data
        }
        elseif($count == 2)
        {
            return $data;   //have all required data
        }
        else{
            return -2;  //can't happen. try again
        }

    }

    public function findById($id)
    {
        $query1 = "SELECT firstName , lastName , region , startDate FROM regionaloffice WHERE userID = '$id'";
        $query2 = "SELECT userEmail , userName , contactNum FROM Users WHERE userID = '$id'";
        // echo $query1."<br>".$query2."<br>";
        $result1 = mysqli_query($this->conn , $query1);
        $result2 = mysqli_query($this->conn , $query2);
        if($result1 && $result2)
        {
            if(mysqli_num_rows($result1) == 1 )
            {
                $data = mysqli_fetch_assoc($result1);
                mysqli_free_result($result1);
            }
            else{
                return -1;
            }

            if(mysqli_num_rows($result2) == 1 )
            {
                $data = array_merge($data , mysqli_fetch_assoc($result2));
                mysqli_free_result($result2);
            }
            else{
                return -1;
            }

            return $data;
        }
        else
        {
            return -2;  //database problem or query
        }

    }

    public function findByNameLike($name)
    {
        $query = "SELECT * FROM regionaloffice WHERE region LIKE '%$name%'";
        $result = mysqli_query($this->conn , $query);
        if($result)
        {
            if(mysqli_num_rows($result) >= 0 )
            {
                $data = [];
                while($row = mysqli_fetch_assoc($result))
                {
                    array_push($data , $row);
                }
                mysqli_free_result($result);
                return $data;
            }
            else{
                return -1;
            }
        }
        else{
            return -1;
        }
    }

    public function deleteById($id)
    {
        $regID = $id;
        $accID = 'ACC'.trim($regID , 'REG');
        $clkID = 'Clk'.trim($regID , 'REG');

        $query = "DELETE FROM Users WHERE userID = '$regID' OR userID = '$accID' OR userID = '$clkID' ";
        
        $result = mysqli_query($this->conn , $query);
        // print_r($query);
        if($result)
        {
            return 1;
        }
        else
        {
            return -1;
        }
    }

    public function create($data)
    {
        $userRO = $data['UserRO'];
        $userAcc = $data['UserAcc'];
        $userClk = $data['UserClk'];
        $Ro = $data['Ro'];
        $Acc = $data['Acc'];
        $Clk = $data['Clk'];

        $values = "";
        $keys = "";
        foreach($userRO as $column => $value)
        {
            $values.= "'".$value."' , ";
            $keys.= $column." , ";
        }
        $values = rtrim($values , ' , ');
        $keys = rtrim($keys , ' , ');
        $query1 = "INSERT INTO Users ( $keys ) VALUES  ( $values )";
        // print_r($query1."<br>");

        $values = "";
        $keys = "";
        foreach($userAcc as $column => $value)
        {
            $values.= "'".$value."' , ";
            $keys.= $column." , ";
        }
        $values = rtrim($values , ' , ');
        $keys = rtrim($keys , ' , ');
        $query2 = "INSERT INTO Users ( $keys ) VALUES  ( $values )";
        // print_r($query2."<br>");

        $values = "";
        $keys = "";
        foreach($userClk as $column => $value)
        {
            $values.= "'".$value."' , ";
            $keys.= $column." , ";
        }
        $values = rtrim($values , ' , ');
        $keys = rtrim($keys , ' , ');
        $query3 = "INSERT INTO Users ( $keys ) VALUES  ( $values )";
        // print_r($query3."<br>");

        $values = "";
        $keys = "";
        foreach($Acc as $column => $value)
        {
            $values.= "'".$value."' , ";
            $keys.= $column." , ";
        }
        $values = rtrim($values , ' , ');
        $keys = rtrim($keys , ' , ');
        $query4 = "INSERT INTO accountant ( $keys ) VALUES  ( $values )";
        // print_r($query4."<br>");

        $values = "";
        $keys = "";
        foreach($Clk as $column => $value)
        {
            $values.= "'".$value."' , ";
            $keys.= $column." , ";
        }
        $values = rtrim($values , ' , ');
        $keys = rtrim($keys , ' , ');
        $query5 = "INSERT INTO clerk ( $keys ) VALUES  ( $values )";
        // print_r($query5."<br>");

        $values = "";
        $keys = "";
        foreach($Ro as $column => $value)
        {
            $values.= "'".$value."' , ";
            $keys.= $column." , ";
        }
        $values = rtrim($values , ' , ');
        $keys = rtrim($keys , ' , ');
        $query6 = "INSERT INTO regionaloffice ( $keys ) VALUES  ( $values )";
        // print_r($query6."<br>");

        //result generate
        $result1 = mysqli_query($this->conn , $query1);
        $result2 = mysqli_query($this->conn , $query2);
        $result3 = mysqli_query($this->conn , $query3);
        $result4 = mysqli_query($this->conn , $query4);
        $result5 = mysqli_query($this->conn , $query5);
        $result6 = mysqli_query($this->conn , $query6);

        $failed = 0;
        if($result1 && $result2 && $result3 && $result4 && $result5 && $result6)
        {
            // mysqli_free_result($result1);
            return 1; //success
        }
        elseif($result1 || $result2 || $result3 || $result4 || $result5 || $result6){
            $failed++;
            return -2;      //denger!!! some added but some not!!! ?????? THINK
        }
        else{
            return -1;  //it's okay. but failure og DB...
        }
    }

    
}




?>
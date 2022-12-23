<?php

class LoginModel
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

    public function findBycredentials($table , $credentials= [])        //retrieve type
    {
        
        $query = "SELECT * FROM $table WHERE userEmail = '$credentials[0]' AND UserPassword = '$credentials[1]' LIMIT 1";
        $result = mysqli_query($this->conn , $query);
        if(mysqli_num_rows($result) == 1)
        {
            $data = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $data;
        }
        else
        {
            return -1; //not found;
        }
    }

    public function create($table , $data)      // $data = [ column1_name => insert_data , column2_name => insert_data , . . . ]
    {
        $values = "";
        $columns = "";
        foreach($data as $col => $value)
        {
            $columns .= $col." , ";
            if(gettype($value) == "integer" )
            {
                $values .= $value." , ";
            }
            else if(gettype($value) == "string" )
            {
                $values .= "'".$value."' , ";
            }
            
        }
        $columns = rtrim($columns , " , ");
        $values = rtrim($values , " , ");

        $query = "INSERT INTO $table ( $columns ) VALUES ( $values ) ";
        // print_r($query);
        //run query
        $result = mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result) == 1)
        {
            mysqli_free_result($result);
            return 1;   //inserted
        }
        else
        {
            return -1;  //not inserted
        }
    }
}

?>
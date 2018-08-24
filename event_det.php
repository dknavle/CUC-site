<?php
class DB{
     
    public function __construct(){
       $conn = new mysqli("localhost","root","","cucdb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        exit();
        } 
        $this->connection=$conn;

        
    }
    public function fetche(){
     
       $conn=$this->connection;
        $quer="SELECT * FROM events";
        $res=$conn->query($quer);
        //$row=mysqli_fetch_array($res);
        return $res;
        
    }     
}

?>
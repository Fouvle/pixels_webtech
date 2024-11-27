<?php


function connectDB(){
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = 'sustainify';
    
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die("Connection failed" . mysqli_connect_error());
    }else{
        //do nothing
        //echo "Connection successful";
    }
    return $conn;
}
?>
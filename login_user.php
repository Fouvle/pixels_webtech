<?php

include 'config.php';
session_start();

$db = connect_db();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password_hash']);

    if(empty($email) || empty($password)){
        die('Do not leave fields empty');
    }
    
    $query = "SELECT email,password_hash,userrole FROM users WHERE email = '$email'";
    $result = mysqli_query($db,$query);
    // If result matched $email and $password, table row must be 1 row
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    
    // If result matched $email and $password, table row must be 1 row
      
    if($count == 1 and password_verify($mypassword,$row["userpass"])) {
       
       $_SESSION['login_user'] = $email;

       if($row['userrole'] == 'admin'){
           header("location: admin_dashboard.php");
       }
       else{
          header("location: home2.php");
       }
    }
}    

?>
<?php
session_start();
include '/db/config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)){
        die('Do not leave fields empty');
    }

    $query = 'SELECT id, fname, lname, password_hash, userrole FROM users WHERE email = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $results = $stmt->get_result();

    if($results->num_rows>0){
        $row =  $results->fetch_assoc();

        $user_id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $user_password = $row['password_hash'];
        $user_role = $row['role'];

        if (password_verify($password,$user_password)){
            $_SESSION['user_id']= $user_id;
            $_SESSION['fname']=$fname;
            $_SESSION['lname']=$lname;
            $_SESSION['userrole']=$user_role;


            if ($user_role == 'admin'){
                header('Location: admin_dashboard.php');

            }elseif ($user_role == 'regular'){
                header('Location: index.php');

            }else{
                header('Location: login.php');
            }
    }

    }else{
        echo "<script> alert('user not registered')</script>";
    }

}

$stmt;

?>
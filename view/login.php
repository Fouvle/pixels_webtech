<?php

// Include the database configuration file
include 'config.php';

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
// Start the session to store user information once logged in
session_start();

if($_SERVER['REQUEST_METHOD']==="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        die('Please fill in all required fields.');
    }

    $stmt = $conn->prepare('SELECT user_id, password_hash, role  FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $results = $stmt->get_result();

    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();
        $user_id = $row['user_id'];
        $user_password = $row['password_hash'];
        $user_role = $row['role'];

        echo 'user_id'.$user_id;

        if (password_verify($password, $user_password)) {
            $_SESSION['id'] = $user_id;
            $_SESSION['role'] = $user_role;


            switch ($user_role) {
                case 'admin':
                    header('Location: admin.php');
                    break;
                case 'user':
                    header('Location: landing_page.php');
                    break;
                default:
                    header('Location: login.php');
                    break;
            }
        } else {
            echo '<script>alert("Invalid password. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("User not registered.");</script>';
    }



}

// // Check if the form was submitted using the POST method
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     echo '23';

//     // Validate the existence of POST keys before using them
    // $email = $_POST['email'];
    // $password = $_POST['password'];
//     echo $email;
//     // Check if email or password fields are empty
    // if (empty($email) || empty($password)) {
    //     die('Please fill in all required fields.');
    // }

//     echo '34';

//     // Prepare a statement to retrieve user data from the database based on email
    // $stmt = $conn->prepare('SELECT user_id, password_hash, role  FROM users WHERE email = ?');
    // $stmt->bind_param('s', $email);
    // $stmt->execute();
    // $results = $stmt->get_result();
//     echo '45';

//     // Check if a matching user is found
    // if ($results->num_rows > 0) {
    //     $row = $results->fetch_assoc();
    //     $user_id = $row['user_id'];
    //     $user_password = $row['password_hash'];
    //     $user_role = $row['role'];

    //     echo 'user_id'.$user_id;

//         // Verify the password entered by the user matches the hashed password in the database
        // if (password_verify($password, $user_password)) {
        //     $_SESSION['id'] = $user_id;
        //     $_SESSION['role'] = $user_role;

//             // Redirect the user based on their role
            // switch ($user_role) {
            //     case 'admin':
            //         header('Location: admin.php');
            //         break;
            //     case 'superuser':
            //         header('Location: superuser.php');
            //         break;
            //     case 'regular':
            //         header('Location: landing_page.php');
            //         break;
            //     default:
            //         header('Location: login.php');
            //         break;
            // }
//             exit();
    //     } else {
    //         echo '<script>alert("Invalid password. Please try again.");</script>';
    //     }
    // } else {
    //     echo '<script>alert("User not registered.");</script>';
    // }

//     $stmt->close();
// }else{
//     echo "not a post request";
// }

$conn->close();
?>

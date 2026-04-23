<?php
include("connection.php");

$email_error = "";
$pass_error = "";

if (isset($_POST['submit'])) {
    $email = "";
    $password = "";

    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    if ($email == "") {
        $email_error = "Enter email";
    }

    if ($password == "") {
        $pass_error = "Enter password";
    }

    if ($email_error != "" || $pass_error != "") {
        include("index.php");
        exit();
    }
    

    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM register WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            include("welcome.php");
            exit();
            // echo "Login success. Welcome " . $user['username'];
        } 
    
    } else {
        echo "User not found";
    }
    }
?>

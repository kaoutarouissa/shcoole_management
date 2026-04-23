<?php
include('connection.php');

$err = 0;

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

 $check_user="SELECT * FROM `register` WHERE username='$username'";
 $check_result=mysqli_query($conn,$check_user) ;
 $num_rows=mysqli_num_rows($check_result);

 $check_email="SELECT * FROM `register` WHERE email='$email'";
 $check_resultemail=mysqli_query($conn,$check_email);
 $email_rows=mysqli_num_rows($check_resultemail);

if($num_rows != 0){
    $user_error="already username exist";
    $err=1;
}

if($email_rows != 0){
    $email_error="email already exist";
    $err=1;
}


    if(empty($username)){
        $user_error = "Enter username";
        $err = 1;
    } elseif(strlen($username) < 6){
        $user_error = "Username must be at least 6 characters";
        $err = 1;
    }


    if(empty($email)){
        $email_error = "Enter email";
        $err = 1;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error = "Invalid email format";
        $err = 1;
    }

    
    if(empty($password)){
        $pass_error = "Enter password";
        $err = 1;
    } elseif(strlen($password) < 6){
        $pass_error = "Password must be at least 6 characters";
        $err = 1;
    } elseif($password !== $confirm_password){
        $pass_error = "Passwords do not match";
        $err = 1;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }


    if(($err == 0) && ($num_rows == 0)){
        $sql = "INSERT INTO register (username, email, password)
                VALUES ('$username', '$email', '$hashed_password')";

        mysqli_query($conn, $sql);
        header('Location: index.php');
        exit();
    } else {
        include('registerForm.php');
    }
}
?>
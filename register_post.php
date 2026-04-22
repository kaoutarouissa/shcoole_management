<?php
include ('connection.php');
if(isset($_POST['submit'])){
    $username=stripslashes( $_POST['name']);
    $email=stripslashes( $_POST['email']);
    $password=stripcslashes( $_POST['password']);
    $confirm_password=stripslashes($_POST['confirm_password']);


$username=htmlentities(mysqli_real_escape_string($conn,$_POST['name']));
$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
$password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
$confirm_password=htmlentities(mysqli_real_escape_string($conn,$_POST['confirm_password']));

if(empty($username)){
    $user_error='enter username';
    $err=1;
    }elseif(strlen($username)<6){
        $user_error='enter usernnam minm 6 letters <br>';
        $err=1;
        }elseif(filter_var($username,FILTER_VALIDATE_INT)){
            $user_error='enter  A  coorect validate username';
  $err=1;
  }


  
  if(empty($email)){
    $email_error='enter your email';
    $err=1;
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error='enter coorect valide email  <br>';
       $err=1;
       
       }




       if($password !== $confirm_password){
                    $pass_error='PASS WORD ISNT CONFIRMED <br>';

        } else {
       
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       }
         if(empty($password)){
    $pass_error='enter your password';
    $err=1;
    }elseif(strlen($password)<6){
        $pass_error='enter coorect valide passowrd min 6 letters <br>';
       $err=1;
       include('registerForm.php');
       
       }
       else{
        if($err =0){
            $sql="INSERT INTO register(username,email,password,id) values('$username','$email','$hashed_password',) " ;
            mysqli_query($conn,$sql);
            header('location:index.php');

        }else{
            include('registerForm.php');
        }
       }
       }
       ?>
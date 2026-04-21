<?php
$servername="localhost";
$username="root";
$password="";
$databs_name="schole_management";
$conn=mysqli_connect($servername, $username, $password, $databs_name, 3306);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}else{
echo"";
}
?>
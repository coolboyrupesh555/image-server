<?php
session_start();

$connection = mysqli_connect("localhost","root","","userimage");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from usermaster where username='$username'";
$userresult =mysqli_query($connection,$query);
while($rows = mysqli_fetch_array($userresult)){
    $userid = $rows[0];
}

$fetch = "select * from usermaster where username='$username' and password = '$password'";

$auth = mysqli_query($connection, $fetch);
$rows = mysqli_num_rows($auth);


if($rows == 1){
  echo "<script>alert('You Loggedin');</script>";
    $_SESSION['unique']=$username; 
     $_SESSION['userid']=$userid; 
    echo "<script>window.location.href='welcome.php';</script>";
    
}else{
    echo "<script>alert('Invalid Username And Password');</script>";
    echo "<script>window.location.href='../index.php';</script>";
}

?>

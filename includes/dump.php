<?php
session_start();
$connection = mysqli_connect("localhost","root","","userimage");
$uniqueid = $_SESSION['userid'];
$delete="delete from userdata where userid='$uniqueid'";
mysqli_query($connection,$delete);
header('Location: welcome.php');
?>
<?php
session_start();
    if(!isset($_SESSION['unique'])){
        header('Location: ../index.php');
    }
if(isset($_POST['upload'])){
    $image = $_FILES['img']['name'];
    $target="images/".basename($_FILES['img'] ['name']);
    $connection=mysqli_connect("localhost","root","","userimage");
    $username=$_SESSION['unique'];
    $userdata="select * from usermaster where username='$username'";
    $fetch = mysqli_query($connection,$userdata);
    $msg="";
   // $imagename=mysqli_real_escape_string($connection,$_POST['img']);
   // echo ($imagename);

while($rows = mysqli_fetch_array($fetch)){
    $userid = ($rows[0]);
}  
$insert = "insert into userdata(userid,imageurl)values('$userid','$image')";  
mysqli_query($connection,$insert);  
    
if(move_uploaded_file($_FILES['img']['tmp_name'],$target)){
    $msg = "Image uploaded successfully";
}else{
    $msg="Faild To Upload the Images";
    print_r($_FILES);

}
    echo ($msg);
	header('Location: welcome.php');
}
 
?>

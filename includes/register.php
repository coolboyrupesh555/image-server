<?php
$connection = mysqli_connect("localhost","root","","userimage");
$username = $_POST['usern'];
$password = $_POST['pass'];
$email = $_POST['email'];

$insert = "insert into usermaster(username,password, email)values('$username','$password','$email')";

$check = "select username from usermaster where username='$username' ";
$fetch = mysqli_query($connection, $check);

$rows =  mysqli_num_rows($fetch);
if($rows > 0){
     echo "
            <script>
                alert('Username Alredy Exits Try Again');
                 window.location.href='../index.php';
            </script>
        ";
}else{
    
    $result = mysqli_query($connection, $insert);
    if($result){
        echo "
            <script>
                alert('Please Login To Continue');
                 window.location.href='../index.php';
            </script>
        ";
        
    }else{
            echo "<script>
                alert('There Is Problem Try Again');
            </script>";
    }
    
}



?>

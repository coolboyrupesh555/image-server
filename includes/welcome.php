<?php session_start();

if(!isset($_SESSION['unique'])){
    header('Location: ../index.php');
}
    $username = $_SESSION['unique'];
    $connection = mysqli_connect("localhost","root","","userimage");
    $counter = "select count(*) from userdata where userid = (select userid from usermaster where username='$username')";
    $cout = mysqli_query($connection,$counter);
    while($counted = mysqli_fetch_array($cout)){
        $totalimage = $counted[0];
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>unique
    <meta charset="UTF-8">
    <title>UserGallery</title>
    <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="dump.php">DeleteAll</a></li>
        <li><a href="">Total:<?php echo($totalimage);?></a></li>
        <li style="float:right"><a class="active" href="../">Profile</a></li>
    </ul>
    <h1>Welcome
        <?php echo ($_SESSION['unique']);?> To PhotoGallery</h1>
    <center>
        <div class="fileupload">
            <form action="fileupload.php" method="post" enctype="multipart/form-data" >
                <input type="file" name="img">
                <input type="submit" name="upload" value="Upload Image" class="btn btn-primary">
            </form>
        </div>
    </center>

    <div class="gallery cf">
        <?php
    $connection = mysqli_connect("localhost","root","","userimage");
$username = $_SESSION['unique'];
$userdata="select * from usermaster where username='$username'";

$fetch = mysqli_query($connection,$userdata);

while($rows = mysqli_fetch_array($fetch)){
    $userid = ($rows[0]);
}
?>
            <?php
        $fetchimg = "select * from userdata where userid = '$userid'";
        $result = mysqli_query($connection,$fetchimg);
        $dir = 'images/';
        while($img = mysqli_fetch_array($result)){
           $imgurl = $img['imageurl'];
 ?>
                <div>
                    <img src=<?php echo ($dir.$imgurl); ?> />
                    <p style="text-align: center;"><b><?php echo $img['imageurl']; ?></b></p>
                </div>
                <?php } ?>
    </div>

</body>

</html>

<?php
session_start();
if(!$_SESSION['ticket']){
    header('location:login.php');
}
if($_SESSION['user_admin'] == 0){
    header('location:settings.php');
}
$userid = $_SESSION['userid'];
include('database.php');
$query = "select * from user_db where id='$userid'";
$result = $conn->query($query);
$datauser = $result->fetch_assoc();
$admin = $_SESSION['user_admin'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('deps.php') ?>
    <link rel="stylesheet" href="assets/css/main.css">
    <?php include('deps.php') ?>
    <title>Dashboard | Book Shop</title>
</head>
<body>
<?php
    //if(isset($admin == 1)){
        include('admin_panel.php')?>
    <?php //}else{ ?>
    <?php //};
//    include('footer.php') ?>
</body>
</html>

<?php
session_start();
include('database.php');

if (isset($_POST['Update'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $popularity = $_POST['popularity'];
    $description = $_POST['description'];
    $sid = $_SESSION['sid'];
    $allowed_type = array('png', 'jpeg', 'jpg');
    $pimage = $_FILES['update_image']['name'];
    $ext = pathinfo($pimage, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed_type)) {
        $random = rand(1, 1000000);
        $newpicname = $random."_book.".$ext;
        move_uploaded_file($_FILES['update_image']['tmp_name'], "assets/img/".$newpicname);
        echo $query = "UPDATE product_db SET Title='$title',
                Author='$author',
                Category='$category',
                Price='$price',
                Popularity='$popularity',
                Description='$description',
                Image = '$newpicname'
                WHERE id='$sid'";
        $conn->query($query);
//        header('location:add_product.php');
    } else {
        $_SESSION['product_invalid_file'] = 'ok';
//        header('location:dashboard.php');
    }
}
?>
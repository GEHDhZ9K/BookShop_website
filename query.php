<?php
include("database.php");
session_start();
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);
    $re_password = md5($_POST['re-password']);
    $mail = $_POST['mail'];
    $num = $_POST['number'];

    if($password==$re_password){
        $query = "INSERT INTO user_db(id, FirstName, LastName, UserName, Password, Mail, PhNumber, Admin)
                    VALUES(NULL, '$fname', '$lname', '$uname', '$password', '$mail', '$num', 0)";
        $conn->query($query);
        header("location:index.php");
    }
    else{
        echo "Wrong password";
    }
}

if(isset($_POST["login"])){
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user_db where username='$uname' and password='$password'";
    $result = $conn->query($query);
    $userdata = $result->fetch_assoc(); // fetches data from the database;
    $count = $result->num_rows;
    
    if($count==0){
        $_SESSION['invalid_login'] = "ok";
        header('location:login.php');
    }
    else{
        $_SESSION['ticket'] = "correct";
        $_SESSION['userid'] = $userdata['id'];
        $_SESSION['user_admin'] = $userdata['Admin'];
        header("location:index.php");
    }
}

function pimage($image){
    $pimage = $_POST[$image];
    $pimage = $_FILES['pimage']['name'];
    $ext = strtolower(pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION));
    $random = rand(1,100000);
    $newpicname = $random."_myproject.".$ext;

    if ($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="gif") {
        move_uploaded_file($_FILES['pimage']['tmp_name'], "uploads/" . $newpicname);
        $query = "INSERT INTO product(id, image) VALUES (NULL, '$newpicname')";
        $conn->query($query);
    }else{
        echo "Invalid File type";
    }
}

if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    header('location:index.php');
    exit;
}

if(isset($_GET['productID'])){
    $cart_id = $_GET['productID'];
    $query = "DELETE FROM user_cart WHERE cart_id='$cart_id'";
    $conn->query($query);
    header('location:cart.php');
}

if(isset($_GET['delete_product_id'])){
    $pid = $_GET['delete_product_id'];
    $query = "DELETE FROM product_db WHERE id = '$pid'";
    $conn->query($query);
    header('location:index.php');
}

if(isset($_GET['update_product_id'])){
    $_SESSION['pid'] = $_GET['update_product_id'];
    header('location:update_product.php');
}

if(isset($_POST['profile_update'])){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $uname = $_POST['username'];
    $phone = $_POST['phnumber'];
    $email = $_POST['email'];
    $uid = $_SESSION['userid'];
    $query = "UPDATE user_db SET FirstName='$fname', LastName='$lname', UserName='$uname', Mail='$email', PhNumber='$phone' WHERE id='$uid' ";
    $conn->query($query);
    header('location:settings.php');
}

if(isset($_POST['add_product'])){
    $pname = $_POST['product_name'];
    $pdesc = $_POST['product_description'];
    $pauthor = $_POST['product_author'];
    $pcategory = $_POST['product_category'];
    $ppopularity = $_POST['product_popularity'];
    $pprice = $_POST['product_price'];
    $pimage = $_FILES['p_add_image']['name'];
    $allowed_type = array('png', 'jpeg', 'jpg');
    $ext = pathinfo($_FILES['p_add_image']['name'], PATHINFO_EXTENSION);
    if (in_array($ext, $allowed_type)) {
        $random = rand(1, 1000000);
        $newpicname = $random."_book.".$ext;
        move_uploaded_file($_FILES['p_add_image']['tmp_name'], "assets/img/$newpicname");
        $query = "INSERT INTO product_db(id, Author, Title, Price, Description, Image, Category, Popularity, Added)
                    VALUES (NULL, '$pauthor', '$pname', '$pprice', '$pdesc', '$newpicname', '$pcategory','$ppopularity', NULL)";
        $conn->query($query);
        header('location:add_product.php');
    } else {
        $_SESSION['product_invalid_file'] = 'ok';
        header('location:add_product.php');
    }
}

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

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $uid = $_SESSION['userid'];
    $pid = $_SESSION['comment_pid'];
    if ($uid){
        $query = "INSERT INTO user_review(review_id, UserId, ProductId, Comment, Review_date)
                VALUES (NULL, '$uid', '$pid', '$comment', NULL)";
        $conn->query($query);
        header('location:product_page.php?id='.$pid);
    }else{
        header('location:login.php');
    }
}

if(isset($_GET['delete_review'])){
    $review_id = $_GET['delete_review'];
    $query = "DELETE FROM user_review WHERE id = '$review_id'";
    $conn->query($query);
    header('location:reviews.php');
}
?>
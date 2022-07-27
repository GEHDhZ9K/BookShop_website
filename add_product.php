<?php
session_start();
include('database.php');
if(!$_SESSION['ticket']){
    header('location:login.php');
}
if($_SESSION['user_admin'] == 0){
    header('location:settings.php');
}?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Product | Book Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/backend_main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('sidebar.php') ?>
<main class="main-wrap">
    <section class="content-main">
        <form action="query.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-9">
                    <div class="content-header">
                        <h2 class="content-title">Add New Book</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Basic Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Book title</label>
                                <input type="text" placeholder="Type here" class="form-control" name="product_name">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Book description</label>
                                <textarea placeholder="Type here" class="form-control" rows="4" name="product_description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Author</label>
                                        <input type="text" placeholder="Author" class="form-control" name="product_author">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Category</label>
                                        <input type="text" placeholder="Category" class="form-control" name="product_category">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Popularity</label>
                                        <div class="row gx-2">
                                            <input placeholder="1" type="text" class="form-control" name="product_popularity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Price</label>
                                        <input placeholder="NRs" type="text" class="form-control" name="product_price">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Currency</label>
                                    <select class="form-select">
                                        <option> NPR </option>
                                        <option> USD </option>
                                        <option> EUR </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Book Cover</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-upload">
                                <img src="assets/img/upload.svg" alt="">
                                <input class="form-control" type="file" name="p_add_image">
                            </div>
                        </div>
                        <?php if(isset($_SESSION['product_invalid_file'])){ ?>
                            <div class="card-footer">
                                <div class="form-label">
                                    <span class="alert-warning form-label">Enter a valid File</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mt-5">
                        <input type="submit" name="add_product" class="btn btn-md rounded font-sm hover-up">
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/backend_main.js" type="text/javascript"></script>
</body>
</html>
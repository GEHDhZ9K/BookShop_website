<?php
session_start();
include('database.php');
$uid = $_SESSION['userid'];
$qq = "SELECT * FROM user_db WHERE id = '$uid'";
$uresult = $conn->query($qq);
$udata = $uresult->fetch_assoc();
if ($udata['Admin'] != 1){
    header('location:index.php');
} else {
$pid = $_GET['update_product_id'];
$query = "SELECT * FROM product_db WHERE id = '$pid'";
$result = $conn -> query ($query);
$data = $result->fetch_assoc();
$_SESSION['sid'] = $data['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <?php include('deps.php') ?>
    <link href="assets/css/update_style.css" rel="stylesheet" type="text/css">
    <title>Update Form | Book Shop</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-6">
                    <div class="form h-100">
                        <h3>Update Item</h3>
                        <form action="query.php" class="mb-5" method="post" id="contactForm" name="contactForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo $data['Title'] ?>">
                                </div>
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Author</label>
                                    <input type="text" class="form-control" name="author" id="author"  placeholder="<?php echo $data['Author']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Category</label>
                                    <input type="text" class="form-control" name="category" id="category"  placeholder="<?php echo $data['Category'] ?>">
                                </div>
                                    <div class="col-md-3 form-group mb-5">
                                        <label for="" class="col-form-label">Price</label>
                                        <input type="text" class="form-control" name="price" id="price"  placeholder="<?php echo $data['Price'] ?>">
                                    </div>
                                    <div class="col-md-3 form-group mb-5">
                                        <label for="" class="col-form-label">Popularity</label>
                                        <input type="text" class="form-control" name="popularity" id="popularity"  placeholder="<?php echo $data['Popularity'] ?>">
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-5">
                                    <label for="" class="col-form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="<?php echo $data['Description'] ?>"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="" class="col-form-label">Submit Image</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-5">
                                    <input type="file" name="update_image" id="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" value="Update" name="Update" class="btn btn-primary rounded-0 py-2 px-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info h-100" style="background-image: url('assets/img/<?php echo $data['Image'] ?>'); background-size: contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>
<?php
session_start();
include('database.php');
if (!$_SESSION['ticket']) {
    header('location:login.php');
}

$uid = $_SESSION['user_admin'];
?>

<head>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body> 
<main class="main">
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square" style="background-color: #fff0cb"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                    </li>
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <?php
                        $qq = 'SELECT * FROM product_db';
                        $result = $conn->query($qq);

                        while($data = $result->fetch_assoc()){
                            ?>

                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="./product_page.php?id=<?php echo $data['id'] ?>" >
                                                <img class="default-img"src="assets/img/<?php echo $data['Image'] ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="./product_page.php?id=<?php echo $data['id'] ?>" ><?php echo $data['Author'] ?></a>
                                        </div>
                                        <h2><a href="./product_page.php" ><?php echo $data['Title'] ?></a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>NRs. <?php echo $data['Price'] ?> </span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="index.php?add_cart=<?php echo $data['id']?>"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        <?php if ($uid == 1){?>
                                        <div>
                                            <span class="Delete_product"><a href="query.php?delete_product_id=<?php echo $data['id'] ?>" style="text-decoration: none">Delete</a></span>
                                            <span class="Update_product"><a href="update_product.php?update_product_id=<?php echo $data['id'] ?>" style="text-decoration: none; padding-left:20px;">Update</a></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <?php
                        $qq = 'select * from product_db order by Popularity ASC';
                        $result = $conn->query($qq);

                        while($data = $result->fetch_assoc()){
                            ?>
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="./product_page.php<?php echo $data['id'] ?>" >
                                                <img class="default-img" src="assets/img/<?php echo $data['Image'] ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="./product_page.php<?php echo $data['id'] ?>" ><?php echo $data['Author'] ?> </a>
                                        </div>
                                        <h2><a href="./product_page.php" ><?php echo $data['Title'] ?></a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>NRs. <?php echo $data['Price'] ?> </span>
                                        </div>`
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="index.php?add_cart=<?php echo $data['id']?>" ><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        <?php if ($uid == 1){?>
                                            <div>
                                                <span class="Delete_product"><a href="query.php?delete_product_id=<?php echo $data['id'] ?>" style="text-decoration: none">Delete</a></span>
                                                <span class="Update_product"><a href="update_product.php?update_product_id=<?php echo $data['id'] ?>" style="text-decoration: none; padding-left:20px;">Update</a></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        <?php
                        $qq = 'select * from product_db order by Added DESC';
                        $result = $conn->query($qq);

                        while($data = $result->fetch_assoc()){
                            ?>
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="./product_page.php<?php echo $data['id'] ?>" >
                                                <img class="default-img" src="assets/img/<?php echo $data['Image'] ?>" alt="">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="./product_page.php<?php echo $data['id'] ?>" ><?php echo $data['Author'] ?> </a>
                                        </div>
                                        <h2><a href="./product_page.php" ><?php echo $data['Title'] ?></a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>NRs. <?php echo $data['Price'] ?> </span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="index.php?add_cart=<?php echo $data['id']?>" ><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        <?php if ($uid == 1){?>
                                            <div>
                                                <span class="Delete_product"><a href="query.php?delete_product_id=<?php echo $data['id'] ?>" style="text-decoration: none">Delete</a></span>
                                                <span class="Update_product"><a href="update_product.php?update_product_id=<?php echo $data['id'] ?>" style="text-decoration: none; padding-left:20px;">Update</a></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php
if (isset($_GET['add_cart'])) {
    $product_id = $_GET['add_cart'];
    $user_id = $_SESSION['userid'];
    echo $cart_q = "INSERT INTO user_cart(Cart_id, Product_id, User_id) VALUES(NULL, '$product_id', '$user_id')";
    $conn->query($cart_q);
}
?>
</body>
<?php //echo $_SESSION['userid']; ?>
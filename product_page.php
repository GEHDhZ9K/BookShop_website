<?php
session_start();
include('database.php');
$pid = $_GET['id'];
$_SESSION['comment_pid'] = $pid;
$query = "SELECT * FROM product_db WHERE id = '$pid'";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Product Page</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
    <?php include('deps.php'); ?>
</head>

<body>
<?php include('navbar.php') ?>
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
<!--                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>-->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="assets/img/<?php echo $data['Image']?>" alt="product image" style="max-width: 100%; height: auto">
                                        </figure>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail"><?php echo $data['Title'] ?></h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Author: <a href="#"><?php echo $data['Author']; ?></a></span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text"> NRs. <?php echo $data['Price']; ?></span></ins>
<!--                                            <ins><span class="old-price font-md ml-15">$200.00</span></ins>-->
<!--                                            <span class="save-price  font-md color3 ml-15">25% Off</span>-->
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <h2 class="section-title style-1 mb-30"><span class="">Synopsis</span></h2>
                                    <div class="short-desc mb-30">
                                        <p><?php echo $data['Description']; ?></p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
<!--                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>-->
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <ul class="list-filter size-filter font-small">
                                            <li class="active"><a href="#">Paperback</a></li>
                                            <li><a href="#">Ebook</a></li>
                                            <li><a href="#">Kindle</a></li>
                                            <li><a href="#">AudioBook</a></li>
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#"><?php echo $data['id'] ?></a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag"> <?php echo $data['Category']; ?> </a> </li>
                                        <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 m-auto entry-main-content">
                                <h3 class="section-title style-1 mb-30 mt-30">Reviews</h3>
                                <!--Comments-->
                                <div class="comments-area style-2">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                <?php
                                                $comment = "SELECT * FROM user_review R JOIN user_db U WHERE R.UserId = U.id AND R.ProductId = '$pid'";
                                                $comment_result = $conn->query($comment);
                                                while($comment_data = $comment_result->fetch_assoc()){
                                                ?>
                                                <div class="single-comment justify-content-between d-flex"> <!-- start -->
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
<!--                                                            <img src="assets/imgs/page/avatar-6.jpg" alt="">-->
                                                            <h6 class="mt-35"><a href="#"><?php echo $comment_data['FirstName'].' '.$comment_data['LastName']?></a></h6>
                                                            <p class="font-xxs">Since 20<?php $year = rand(10, 22); echo $year?></p>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width:90%">
                                                                </div>
                                                            </div>
                                                            <p><?php echo $comment_data['Comment'];?></p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="font-xs mr-30"><?php echo $comment_data['Review_date']; ?></p>
                                                                    <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end -->
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <h6>4.8 out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                            </div>
                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                            </div>
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->
<!--                                --><?php //if($_SESSION['userid']) {?>
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form" action="query.php" id="commentForm" method="post">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" style="height:200px" name="comment" id="comment" cols="30"  rows="90" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Submit Review" name="review" class="button button-contactForm" style="background-color: #f5ca4e; width:200px; float: right">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
<!--                                    --><?php //} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
<?php include('footer.php') ?>
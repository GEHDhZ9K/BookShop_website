<?php
session_start();
include('database.php');
include('sidebar.php');
if(!$_SESSION['ticket']){
    header('location:login.php');
}
if($_SESSION['user_admin'] == 0){
    header('location:settings.php');
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List | Book Shop</title>
</head>
<body>
    <main class="main-wrap">
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Products List</h2>
                    <p>List of Products in the shop</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <article class="itemlist">
                        <div class="row align-items-center">
                            <div class="col col-check flex-grow-0">
                                <div class="form-check">
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                <a class="itemside" href="#">
                                    <div class="left">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="info">
                                        <h6 class="mb-0">Title</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-4 col-price"><span>Price</span></div>
                            <div class="col-lg-2 col-sm-2 col-4 col-status">
                                <span>Status</span>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4 col-date">
                                <span>Date Added</span>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                                <h6 class="mb-0">Controls</h6>
                            </div>
                        </div>
                    </article>
                        <?php
                        $qq = 'SELECT * FROM product_db';
                        $result = $conn->query($qq);

                        while($data = $result->fetch_assoc()){
                            ?>
                            <article class="itemlist">
                                    <div class="row align-items-center">
                                        <div class="col col-check flex-grow-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                            <a class="itemside" href="./product_page.php?id=<?php echo $data['id'] ?>">
                                                <div class="left">
                                                    <img src="assets/img/<?php echo $data['Image']?>" class="img-sm img-thumbnail" alt="Item">
                                                </div>
                                                <div class="info">
                                                    <h6 class="mb-0"><?php echo $data['Title'] ?></h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-4 col-price"><span>NRS. <?php echo $data['Price'] ?></span></div>
                                        <div class="col-lg-2 col-sm-2 col-4 col-status">
                                            <span class="badge rounded-pill alert-success">Active</span>
                                        </div>
                                        <div class="col-lg-1 col-sm-2 col-4 col-date">
                                            <span><?php echo $data['Added'] ?></span>
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                                            <a href="update_product.php?update_product_id=<?php echo $data['id'] ?>" class="btn btn-sm font-sm rounded btn-brand">
                                                <i class="material-icons md-edit"></i> Edit
                                            </a>
                                            <a href="query.php?delete_product_id=<?php echo $data['id'] ?>" class="btn btn-sm font-sm btn-light rounded">
                                                <i class="material-icons md-delete_forever"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                            </article>
                        <?php } ?>
                </div>
            </div>
            <div class="pagination-area mt-30 mb-50">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">16</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </section>
    </main>
</body>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/backend_main.js" type="text/javascript"></script>
</html>
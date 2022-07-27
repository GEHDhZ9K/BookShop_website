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
    <title>Reviews | Book Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/backend_main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="screen-overlay"></div>
<?php include ('sidebar.php') ?>
<main class="main-wrap">
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Reviews</h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div>
                <input type="text" placeholder="Search by name" class="form-control bg-white">
            </div>
        </div>
        <div class="card mb-4">
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>#ID</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Review</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $qq = "SELECT * FROM user_review R JOIN user_db U ON R.UserId = U.id JOIN product_db P ON P.id = R.ProductId ORDER BY R.review_id ASC";
                        $review_result = $conn->query($qq);
                        while($review = $review_result->fetch_assoc()){
                            ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                </td>
                                <td><?php echo $review['review_id'] ?></td>
                                <td><b><?php echo $review['Title'] ?></b></td>
                                <td><?php echo $review['FirstName'].' '.$review['LastName'] ?></td>
                                <td><?php echo $review['Review_date']?></td>
                                <td><?php echo $review['Comment']?></td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">View detail</a>
                                            <a class="dropdown-item" href="#">Edit info</a>
                                            <a class="dropdown-item text-danger" href="query.php?delete_review=<?php echo $review['review_id'] ?>">Delete</a>
                                        </div>
                                    </div> <!-- dropdown //end -->
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- table-responsive//end -->
            </div>
            <!-- card-body end// -->
        </div>
        <div class="pagination-area mt-30 mb-50">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
                </ul>
            </nav>
        </div>
    </section> <!-- content-main end// -->
</main>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/backend_main.js" type="text/javascript"></script>
</body>

</html>
<?php
session_start();
include('database.php');
if (!$_SESSION['ticket']) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Cart | Book Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
<!--    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg">-->
    <!-- Template CSS -->
    <?php include('deps.php')?>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/main.js"></script>
    <script src="assets/misc_js/main.js"></script>
</head>

<body onload="SubTotal">
<?php include('navbar.php') ?>
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $qq = 'SELECT * FROM user_cart U JOIN product_db P ON U.Product_id = P.id';
                            $result = $conn->query($qq);

                            $i = 0;
                            while($data = $result->fetch_assoc()){
                                if ($data['User_id'] == $_SESSION['userid']){
                                ?>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/img/<?php echo $data['Image']?>" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="#"></a></h5>
                                        <a class="font-xs" style="color: #465b52;" href="#"><?php echo $data['Title']; echo "<br>"; echo $data['Author'] ?>
                                        </a>
                                    </td>
                                    <td class="price" data-title="Price"><span>NRs. <?php echo $data['Price']?> </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4 mt-10">
                                                    <span id="qty-val<?php echo $i?>" style="width: 50px">1</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <button href="#" class="qty-up" style="background: transparent; border: 0;" onclick="IncreaseNumber(<?php echo $i?>));"><i class="fi-rs-angle-small-up"></i></button>
                                                        <button href="#" class="qty-down" style="background: transparent; border: 0;" onclick="DecreaseNumber(<?php echo $i ?>)" ><i class="fi-rs-angle-small-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>NRs. <span id="subtotal<?php echo $i ?>"><?php echo $data['Price'] ?></span></span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="query.php?productID=<?php echo $data['Cart_id']?>" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            <?php }
                            $i+= 1;
                            }?>
                            <tr>
                                <td colspan="6" class="text-end">
                                    <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <form>
                            <button type="submit" class="mr-10 mb-sm-15 btn btn-warning text-white" onclick="SubTotal()"><i class="fi-rs-shuffle mr-10"></i>Update Cart</button>
                            <a class="btn btn-warning text-white" href="index.php"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </form>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading_s1 mb-3">
                                <h4>Calculate Shipping</h4>
                            </div>
                            <p class="mt-15 mb-30">Flat rate: <span class="font-xl text-brand fw-900">5%</span></p>
                            <form class="field_form shipping_calcrulator">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select">
                                            <select class="form-control select-active">
                                                <option value="">Choose a option...</option>
                                                <?php include('countries.php')?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="State / Country" name="name" type="text">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="PostCode / ZIP" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn  btn-sm"><i class="fi-rs-shuffle mr-10"></i>Update</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>Apply Coupon</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="Coupon" placeholder="Enter Your Coupon">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand" id="subtotal_final"> NRs. 0</span></td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand" id="total">NRs. 0</span></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</html>
<?php include('footer.php') ?>
<script>
    function IncreaseNumber(i) {
        let qty = document.getElementById(`qty-val${i}`).innerText * 1 + 1;
        document.getElementById(`qty-val${i}`).innerText = qty;
    }

    function DecreaseNumber(i) {
        let qty = document.getElementById(`qty-val${i}`).innerText * 1 - 1;
        document.getElementById(`qty-val${i}`).innerText = qty;
    }

    // function Total(i , j){
    //     let qty = document.getElementById(`qty-val${i}`).innerText * 1;
    //     document.getElementById(`qty-val${i}`).innerText = qty * j;
    // }
</script>
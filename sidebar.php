<?php
session_start();
?>
<link href="assets/css/backend_main.css" rel="stylesheet" type="text/css" >
<body>
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <a class="navbar-brand" href="./index.php"><i class="logo icon material-icons md-book me-2" style="color: black">BOOK SHOP</i>

            </a>
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        <?php if($_SESSION['user_admin'] == 1){?>
        <ul class="menu-aside">
            <li class="menu-item" id="dashboard">
                <a class="menu-link" href="dashboard.php"> <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item" id="product_page">
                <a class="menu-link" href="admin_product.php"><i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Products</span>
                </a>
            </li>
            <li class="menu-item" id="add_product">
                <a class="menu-link" href="add_product.php"> <i class="icon material-icons md-add_box"></i>
                    <span class="text">Add product</span>
                </a>
            </li>
            <li class="menu-item" id="transaction">
                <a class="menu-link" href="#"> <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">Transactions</span>
                </a>
            </li>
            <li class="menu-item" id="review">
                <a class="menu-link" href="reviews.php"> <i class="icon material-icons md-comment"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>
        </ul>
        <?php }?>
        <hr>
        <ul class="menu-aside">
            <li class="menu-item" id="settings">
                <a class="menu-link" href="settings.php"> <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li class="menu-item" id="starter_page">
                <a class="menu-link" href="#"> <i class="icon material-icons md-local_offer"></i>
                    <span class="text"> Starter page </span>
                </a>
            </li>
            <li class="menu-item" id="logout">
                <a class="menu-link" href="logout.php"> <i class="icon material-icons md-exit_to_app"></i>
                    <span class="text"> Log Out </span>
                </a>
            </li>
        </ul>
        <br>
        <br>
    </nav>
</aside>
</body>
<button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
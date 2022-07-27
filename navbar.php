<nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><i class="fa-solid fa-shop me-2"></i> <strong>BOOK SHOP</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
            <div class="input-group">
                <span class="border-warning input-group-text bg-warning text-white"><i
                            class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control border-warning" style="color:#7a7a7a;">
                <button class="btn btn-warning text-white">Search</button>
            </div>
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                <div class="input-group">
                    <span class="border-warning input-group-text bg-warning text-white">
                        <i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control border-warning" style="color:#7a7a7a">
                    <button class="btn btn-warning text-white">Search</button>
                </div>
            </div>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="#">Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="./cart.php"><i class="fa-solid fa-cart-shopping me-1"></i> Cart</a>
                </li>
                <li class="nav-item">
                    <div class="nav-item dropdown">

                    <a
                        class="btn btn-secondary dropdown-toggle nav-link mx-2 text-uppercase bg-transparent btn-link"
                        role="button"
                        id="dropdownMenuButton"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >
                        <i class="fa-solid fa-circle-user me-1" style="color: #000000"></i>
                        Account
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarNavDropdown">
                            <?php if(isset($_SESSION['ticket'])) { ?>
                                <li><a class="dropdown-item" href="./dashboard.php">My Account</a></li>
                                <li>
                                    <form action="query.php" method="post">
                                        <input type="submit" class="dropdown-item" value="Log Out" style="font-size: 16px" name="logout">
                                    </form>
                                </li>
                            <?php } else {?>
                                <li><a class="dropdown-item" href="./login.php">Login</a></li>
                                <li><a class="dropdown-item" href="./register.php">Register</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
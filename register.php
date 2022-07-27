<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="assets/css/register_style.css"/>
    <title>Register | Book Shop</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('assets/img/bg_register.jpg');"></div>
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 py-5">
                    <h3>Register</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                    <form action="query.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="e.g. John" name="fname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="e.g. Smith" name="lname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group first">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="uname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" placeholder="+000 000-000-0000" name="number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="e.g. john@your-domain.com"
                                           name="mail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group last mb-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password"
                                           name="password">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group last mb-3">
                                    <label>Re-type Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password"
                                           name="re-password">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex mb-5 mt-4 align-items-center">
                            <div class="d-flex align-items-center">
                                <label class="control mb-0"><span class="caption">Creating an account means you're okay with our <a
                                                href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                                    <input type="checkbox" required/>
                                    <div class="control__indicator"></div>
                                </label>
                            </div>
                        </div>

                        <input type="submit" value="Register" name="register" class="btn px-5 btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
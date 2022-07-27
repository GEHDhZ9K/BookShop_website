<?php
session_start();
if(!$_SESSION['ticket']){
    header('location:login.php');
}
include('database.php');
$uid = $_SESSION['userid'];
$qq = "SELECT * FROM user_db WHERE id='$uid'";
$result = $conn->query($qq);
$data = $result->fetch_assoc();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile | Book Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/backend_main.css" rel="stylesheet" >
    <?php include('deps.php'); ?>
</head>
<body>
<?php include('sidebar.php') ?>
<main class="main-wrap">
    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Profile settings</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row gx-5">
                    <aside class="col-lg-3 border-end">
                        <nav class="nav nav-pills flex-lg-column mb-4">
                            <a class="nav-link" aria-current="page" style="color: #6c757d" href="#">General User Settings</a>
                        </nav>
                    </aside>
                    <div class="col-lg-9">
                        <section class="content-body p-xl-4">
                            <form action="query.php" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row gx-3">
                                            <div class="col-6  mb-3">
                                                <label class="form-label">First name</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['FirstName'] ?>" name="first_name">
                                            </div>
                                            <div class="col-6  mb-3">
                                                <label class="form-label">Last name</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['LastName'] ?>" name="last_name">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">User Name</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['UserName'] ?>" name="username">
                                            </div>

                                            <div class="col-lg-6  mb-3">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control" type="tel" placeholder="<?php echo $data['PhNumber'] ?>" name="phnumber">
                                            </div>
                                            <div class="col-lg-12  mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" placeholder="<?php echo $data['Mail']?>" name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input class="btn btn-primary" type="submit" value="Save Changes" name="profile_update">
                            </form>
                            <hr class="my-5">
                            <div class="row" style="max-width:920px">
                                <div class="col-md">
                                    <article class="box mb-3 bg-light">
                                        <a class="btn float-end btn-light btn-sm rounded font-md" href="#">Change</a>
                                        <h6>Password</h6>
                                        <small class="text-muted d-block" style="width:70%">You can reset or change your password by clicking here</small>
                                    </article>
                                </div>
                                <div class="col-md">
                                    <article class="box mb-3 bg-light">
                                        <a class="btn float-end btn-light rounded btn-sm font-md" href="#">Deactivate</a>
                                        <h6>Remove account</h6>
                                        <small class="text-muted d-block" style="width:70%">Once you delete your account, there is no going back.</small>
                                    </article>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/backend_main.js" type="text/javascript"></script>
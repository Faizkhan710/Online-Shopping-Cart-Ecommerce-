<?php 
include("admin/include/config.php");
include("fe_include/title.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo-removebg-preview.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
					
                </div>
            </div>
            <div class="col-lg-6 text-lg-right">             
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                     <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                       <?php
						if(!isset($_SESSION["user_id"]))
							{
							echo "
							<button type='button' class='btn  btn-primary dropdown-toggle' data-toggle='dropdown'>My Account</button>
							<div class='dropdown-menu dropdown-menu-right'>
						<a class='dropdown-item' href='signin.php'>Sign in <i class='fa fa-sign-in' style='font-size:20px'></i></a>
						<a class='dropdown-item border-top' href='signup.php'>Sign up <i class='fa fa-user-plus' style='font-size:20px'></i></a>
							</div>";
							}							
							if(isset($_SESSION["user_id"]))
							{
							$id= $_SESSION["user_id"];
							$profile="select * from user_table where user_id=$id";
							$profilexec=mysqli_query($connect,$profile);
							if(mysqli_num_rows($profilexec))
							{$profileimg=mysqli_fetch_assoc($profilexec);
							echo "
<button type='button' class='btn  btn-primary dropdown-toggle' data-toggle='dropdown'><img src='img/profile/".$profileimg["user_image"]."' width='30px' height='30px' class='rounded-circle'> ".$profileimg["user_fn"]." ".$profileimg["user_ln"]."</button>
							<div class='dropdown-menu dropdown-menu-right'>
<a class='dropdown-item' href='profile.php'>profile <i class='fa fa-user' style='font-size:20px'></i></a>
<a class='dropdown-item border-top' href='logout.php'>Log Out <i class='fa fa-sign-out' style='font-size:20px'></i></a>";
							}}
							?>
                    </div>
                </div>
                </div>
            </div></div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <img src="img/ARTZILLA.png">
                </a>
            </div>
            <div class="col-lg-4 col-6 text-center">
                <h5 style="font-family: calabri">Special Discount For Schools, Educational Institutes & Offices <a href="contact.php" class="text-info">(Contact US)</a> now :</h5>
            </div>
            <div class="col-lg-4 col-6 text-right">
                 <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
						<?php
						if(!isset($_SESSION["user_id"]))
							{
							echo "
							<button type='button' class='btn  btn-primary dropdown-toggle' data-toggle='dropdown'>My Account</button>
							<div class='dropdown-menu dropdown-menu-right'>
						<a class='dropdown-item' href='signin.php'>Sign in <i class='fa fa-sign-in' style='font-size:20px'></i></a>
						<a class='dropdown-item border-top' href='signup.php'>Sign up <i class='fa fa-user-plus' style='font-size:20px'></i></a>
							</div>";
							}							
							if(isset($_SESSION["user_id"]))
							{
							$id= $_SESSION["user_id"];
							$profile="select * from user_table where user_id=$id";
							$profilexec=mysqli_query($connect,$profile);
							if(mysqli_num_rows($profilexec))
							{$profileimg=mysqli_fetch_assoc($profilexec);
							echo "
<button type='button' class='btn  btn-primary dropdown-toggle' data-toggle='dropdown'><img src='img/profile/".$profileimg["user_image"]."' width='30px' height='30px' class='rounded-circle'> ".$profileimg["user_fn"]." ".$profileimg["user_ln"]."</button>
							<div class='dropdown-menu dropdown-menu-right'>
<a class='dropdown-item' href='profile.php'>profile <i class='fa fa-user' style='font-size:20px'></i></a>
<a class='dropdown-item border-top' href='logout.php'>Log Out <i class='fa fa-sign-out' style='font-size:20px'></i></a></div>";
							}}
							?>                             							
                    </div>
                </div>
            </div>
			
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <!-- php -->
                        <?php
                        include("admin/include/config.php");
                        $query = "SELECT COUNT(category.c_id) c_id,c_name,c_image,cid_fk FROM category 
              INNER JOIN product ON category.c_id = product.cid_fk GROUP BY category.c_id;";
                        $result = mysqli_query($connect, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
<a href="shop.php?cid=<?php echo $row["cid_fk"]?>" class="nav-item nav-link"><?php echo $row["c_name"]?> (<?php echo $row["c_id"]?>)</a>

                        <?php
                            }
                        }

                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
							<a href="fav.php" class="nav-item nav-link">Favourite</a>
                            <!--<a href="detail.html" class="nav-item nav-link">Shop Detail</a>-->
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="orderdetail.php" class="dropdown-item">Order Detail</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="fav.php" class="btn px-0">
                                <i class="fas fa-heart text-primary" style="font-size: 25px;"></i>
<!--<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>-->
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary" style="font-size: 25px;"></i>
<!--  <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>-->
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
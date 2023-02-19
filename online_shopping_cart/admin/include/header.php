<!-- php start -->
<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location:index.php");
}
include("include/config.php");
?>
<!-- php end -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/logo-removebg-preview.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
<!--
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
-->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary" style="font-family: algerian"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <i class="fa fa-user" aria-hidden="true" style="font-size: 50px;color: white"></i>
                        <div class="bg-success rounded-circle border border-2 position-absolute end-0 bottom-0 p-1" style="border-color: lightgreen"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0" style="font-family: algerian">Admin</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2" aria-hidden="true"></i>Category</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Addcategory.php" class="dropdown-item text-white">Add Category</a>
                            <a href="showcategory.php" class="dropdown-item text-white">Show Category</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><i class="fas fa-boxes me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Addproduct.php" class="dropdown-item text-white">Add Product</a>
                            <a href="showproduct.php" class="dropdown-item text-white">Show Product</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><i class="fas fa-image me-2"></i>Banner</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addbanner.php" class="dropdown-item text-white">Add Banner</a>
                            <a href="showbanner.php" class="dropdown-item text-white">Show Banner</a>
                        </div>
                    </div>
					<div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><i class="fas fa-shipping-fast me-2"></i>Orders</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="todayorder.php" class="dropdown-item text-white">Today Orders</a>
                            <a href="monthorder.php" class="dropdown-item text-white">This Month Order History</a>
							<a href="orderhistory.php" class="dropdown-item text-white">Orders History</a>
                        </div>
                    </div>
            <a href="contact.php" class="nav-link text-white"><i class="far fa-comment me-2"></i>Contact Massages</a>
            <a href="logout.php" class="nav-link text-white"><i class="fas fa-sign-out-alt me-2"></i>Log Out</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex text-white">Message</span>
                        </a>
                      <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
						  <?php
						  $navmessage="select * from contact_message order by msg_id DESC limit 3";
							$navmessageexec=mysqli_query($connect,$navmessage);
							if(mysqli_num_rows($navmessageexec)>0)
							{while($msg=mysqli_fetch_assoc($navmessageexec)){
						  ?>
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0"><?php echo $msg["msg_name"]?></h6>
                                        <small><?php echo $msg["msg_subject"]?></small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
						  <?php }}else{echo "<h6 class='text-primary text-center mt-3'>No Message</h6>";}?>
                            <a href="contact.php" class="dropdown-item text-center">See all message</a>
                        </div>  
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex text-white">New User</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
							<?php 
							$user="select * from user_table order by user_id DESC limit 5";
							$userexe=mysqli_query($connect,$user);
							if(mysqli_num_rows($userexe)>0)
							{
								while($usertable=mysqli_fetch_assoc($userexe))
								{
							?>
                            <a class="dropdown-item">
 <h6 class="fw-normal mb-0"><img src="<?php echo "../img/profile/".$usertable["user_image"]?>" width="40px" height="40px" class="rounded-circle"><span style="margin-left: 10px"><?php echo $usertable["user_fn"]." ".$usertable["user_ln"]?></span></h6>
                            </a>
                            <hr class="dropdown-divider">
							<?php }}?>
<!--                            <a href="#" class="dropdown-item text-center">See all notifications</a>-->
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
<?php
session_start();
include("admin/include/config.php");
$emailerr=$passerr="";
$email=$pass="";
if($_SERVER['REQUEST_METHOD']=="POST")
{	
//	===================Email================================
if(empty($_POST["email"])){$emailerr="Email is Required";}
else{$email= test_input($_POST["email"]);}
//	===================password================================
if(empty($_POST["password"])){$passerr="password is Required";}
else{$pass= test_input($_POST["password"]);}	
}
function test_input($data){$data = trim($data);$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}


if(isset($_GET["cart"]))
{
	$loginmsg=$_SESSION["log"];
}
if(isset($_GET["orderdetail"]))
{
	$loginmsg=$_SESSION["log"];
}
if(isset($_GET["favorite"]))
{
	$loginmsg=$_SESSION["log"];
}

	if(isset($_POST["login"]))
{
	$q="SELECT * FROM user_table where user_email='".$_POST["email"]."' AND user_password='".$_POST["password"]."'";
	$exec=mysqli_query($connect,$q);
	if(mysqli_num_rows($exec))
	{
		while($user=mysqli_fetch_assoc($exec))
		{
				$_SESSION["user_id"]=$user["user_id"];
				header("Location:index.php?id={$user['user_id']}");
		}
	}		
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login </title>
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
<style>
.span1{
	font-size: 80px;
	color: #FFD333;
	text-shadow: 3px 3px #3D464D;
	}
.span2{
	font-size: 80px;
	color: #3D464D;
	text-shadow: 3px 3px #FFD333;
	}
.a1 {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #3D464D;
  font-size: 18px;
  font-weight: 900;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 2px
}

 .a1:hover {
  background: #FFD333;
  text-decoration: none;
  color: #FFFFFF;
  border-radius: 5px;
  box-shadow: 0 0 5px #FFD333,
              0 0 25px #FFD333,
              0 0 50px #FFD333,
              0 0 100px #FFD333;
}

 .a1 .span3 {
  position: absolute;
  display: block;
}

 .a1 .span3:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, transparent, #FFD333);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.a1 .span3:nth-child(2) {
  top: -100%;
  right: 0;
  width: 5px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #FFD333);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.a1 .span3:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 5px;
  background: linear-gradient(270deg, transparent, #3D464D);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.a1 .span3:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 5px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #3D464D);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}	
</style>
</head>

<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <!-- Checkout Start -->
    <div class="container-fluid mt-5">
		<div class="row px-xl-5"><div class="col-lg-2"></div>
            <div class="col-lg-8">
				<h1 class="text-center"><span class="span1">Arts</span><span class="span2">Zilla</span></h1>
            </div><div class="col-lg-2"></div>          
        </div>
        <div class="row px-xl-5"><div class="col-lg-4"></div>
            <div class="col-lg-4">
				<h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Log in</span></h5>
				<h5 class="text-center text-danger"><?php echo @$loginmsg?></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email" name="email">
							<p class="text-danger"><?php echo $emailerr?></p>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Enter Password" name="password">
							<p class="text-danger"><?php echo $passerr?></p>
                        </div>
						<div class="col-md-12 form-group"><button style="border: none" class="mt-3 a1" type="submit" name="login">
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>Login</button></div>
						
						<div class="col-md-12 form-group">
							<p class="text-danger"><?php echo @$massage?></p>
                            <label>Don't have an account Please <span><a href="signup.php">Sign up</a></span></label>
                        </div>
                    </div>
                </div>
            </div> <div class="col-lg-4"></div>          
        </div>
    </div>
    <!-- Checkout End -->
</form>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="lib/easing/easing.min.js"></script>
 <script src="lib/owlcarousel/owl.carousel.min.js"></script>

 <!-- Contact Javascript File -->
 <script src="mail/jqBootstrapValidation.min.js"></script>
 <script src="mail/contact.js"></script>

 <!-- Template Javascript -->
 <script src="js/scripts.js"></script>
 </body>

 </html>
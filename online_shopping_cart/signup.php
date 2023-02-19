<?php
include("admin/include/config.php");
if(isset($_POST["signup"]))
{
	$filename=$_FILES["profile_image"]["name"];
	$temp=$_FILES["profile_image"]["tmp_name"];
	if(empty($_FILES["profile_image"]["name"]))
	{
	$query="INSERT INTO user_table
	(user_fn,user_ln,user_email,user_password,user_phone,user_add1,user_add2,user_country,user_city,user_state,user_zipcode,user_image) VALUES ('".$_POST["fn"]."','".$_POST["ln"]."','".$_POST["email"]."','".$_POST["Password"]."','".$_POST["phone"]."','".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["country"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["profile_hide"]."')";
	$execute=mysqli_query($connect,$query);
	}
	if(!empty($_FILES["profile_image"]["name"]))
	{
		if(move_uploaded_file($temp,"img/profile/".$filename))
		{
	$query="INSERT INTO user_table
	(user_fn,user_ln,user_email,user_password,user_phone,user_add1,user_add2,user_country,user_city,user_state,user_zipcode,user_image VALUES ('".$_POST["fn"]."','".$_POST["ln"]."','".$_POST["email"]."','".$_POST["Password"]."','".$_POST["phone"]."','".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["country"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$filename."')";
	$execute=mysqli_query($connect,$query);	
		}	
	}	
	if($execute)
	{
		header("Location:signin.php");
	}
	else
	{
		$massage=mysqli_error($execute);
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIGN UP</title>
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
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
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

<form method="post" enctype="multipart/form-data">
    <!-- Checkout Start -->
    <div class="container-fluid mt-5">
		<div class="row px-xl-5"><div class="col-lg-2"></div>
            <div class="col-lg-8">
				<h1 class="text-center"><span class="span1">Arts</span><span class="span2">Zilla</span></h1>
            </div><div class="col-lg-2"></div>          
        </div>
        <div class="row px-xl-5"><div class="col-lg-2"></div>
            <div class="col-lg-8">
				<h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Sign up</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="Enter First name" name="fn">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Enter Last name" name="ln">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="Enter Email" name="email">
                        </div>
						 <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input class="form-control" type="text" placeholder="Enter Password" name="Password">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="Enter Phone nunber" name="phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="Enter Address" name="address1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2 (Optional)</label>
                            <input class="form-control" type="text" placeholder="Enter address (optional)" name="address2">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country">
                                <option selected value="Pakistan">Pakistan</option>
                                <option value="India">India</option>
                                <option value="China">China</option>
                                <option value="Srilanka">Srilanka</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Canada">Canada</option>
								<option value="Australia">Australia</option>
								<option value="England">England</option>
								<option value="United State">United States</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="Enter City name" name="city">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="Enter state name" name="state">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="Enter Zipcode" name="zip">
                        </div>
						<div class="col-md-6 form-group">
						<label>Select Image (Optional)</label>
                            <input class="form-control" type="file" name="profile_image">
							<input type="hidden" value="profile.png" name="profile_hide">
						</div>
						<div class="col-md-6 form-group"><button class="mt-3 a1" type="submit" style="border: none" name="signup">
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>Sign up</button></div>
						<div class="col-md-6 form-group mt-3">
                            <label>Already have an account ? <span><a href="signin.php">Sign in</a></span></label>
							<?php echo @$massage?>
                        </div>
                    </div>
                </div>
            </div> <div class="col-lg-2"></div>          
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
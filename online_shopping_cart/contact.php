<?php
session_start();
include("fe_include/header.php");
include("admin/include/config.php");
$namerr=$emailerr=$subjecterr=$massagerr="";
$name=$email=$subject=$message="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
//=======================NAME================================
if(empty($_POST["name"])){$namerr="Name is Required";}
else{$name=test_input($_POST["name"]);}
//=======================EMAIL================================
if(empty($_POST["email"])){$emailerr="email is Required";}
else{$email=test_input($_POST["email"]);}
//=======================SUBJECT================================
if(empty($_POST["subject"])){$subjecterr="subject is Required";}
else{$subject=test_input($_POST["subject"]);}
//=======================MESSAGE================================
if(empty($_POST["message"])){$massagerr="message is Required";}
else{$message=test_input($_POST["message"]);}	
}
function test_input($data){$data = trim($data);$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}
if(isset($_POST["send"]))
{
	$q="insert into contact_message (msg_name,msg_email,msg_subject,msg_message) values 
	('".$_POST["name"]."','".$_POST["email"]."','".$_POST["subject"]."','".$_POST["message"]."')";
	$execute=mysqli_query($connect,$q);
	if($execute){$message="Message Send";}
	else{$message="Message Not Send !";}
}
?>

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
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
					<div class="control-group">
                            <p class=""></p>
                        </div>
                    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <div class="control-group">
          <input type="text" class="form-control" placeholder="Your Name" name="name"/>
                            <p class="help-block text-danger"><?php echo $namerr?></p>
                        </div>
                        <div class="control-group">
          <input type="email" class="form-control" placeholder="Your Email" name="email"/>
                            <p class="help-block text-danger"><?php echo $emailerr?></p>
                        </div>
                        <div class="control-group">
          <input type="text" class="form-control" placeholder="Subject" name="subject"/>
                            <p class="help-block text-danger"><?php echo $subjecterr?></p>
                        </div>
                        <div class="control-group">
          <textarea class="form-control" rows="8" placeholder="Message" name="message"></textarea>
                            <p class="help-block text-danger"><?php echo $massagerr?></p>
                        </div>
                        <div>
                            <button style="border: none" class="mt-3 a1" type="submit" name="send">
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>Send Message</button>
                        </div>
						<div class="control-group">
                            <p class="help-block text-danger"><?php echo @$message?></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?php include("fe_include/footer.php") ?>
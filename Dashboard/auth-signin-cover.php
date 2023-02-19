<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Sign In Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-white">

        <div class="auth-page d-flex align-items-center min-vh-100">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                            <div class="d-flex flex-column h-100 py-5 px-4">
                                <div class="text-center text-muted mb-2">
                                    <div class="pb-3">
                                        <a href="index.html">
                                            <span class="logo-lg">
                                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Dashboard</span>
                                            </span>
                                        </a>
                                        <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">User Experience & Interface Design Strategy Saas Solution</p>
                                    </div>
                                </div>
        
                                <div class="my-auto">
                                    <div class="p-3 text-center">
                                        <img src="assets/images/auth-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
        
                                <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Dashboard <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Admin</a></p>
                                </div>
                            </div>
                        
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
    
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                            <div class="bg-overlay-gradient"></div>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center g-0 align-items-center w-100">
                                <div class="col-xl-4 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="px-3 py-3">
                                                <div class="text-center">
                                                    <h5 class="mb-0">Welcome Back !</h5>
                                                    <p class="text-muted mt-2">Sign in to Dashboard</p>
                                                </div>




                                                
  <?php
  require('connect.php');

  session_start();

  // When form submitted, check and create user session.

  if (isset($_POST['username']))
   {
      $username = stripslashes($_REQUEST['username']);    // removes backslashes
      $username = mysqli_real_escape_string($conn, $username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      // Check user is exist in the database
      $query    = "SELECT * FROM `buser` WHERE username='$username'
                   AND password='" . md5($password) . "'";
      $result = mysqli_query($conn, $query);
      $rows = mysqli_num_rows($result);


      if ($rows == 1) {
          $_SESSION['username'] = $username;
          // Redirect to user dashboard page
          header("Location: http:layout-vertical-dark.php");
      } else {
          echo "<div class='form'>
                <h3>Incorrect Username/password.</h3><br/>
                <p class='link'>Click here to <a href='auth-signin-cover.php'>Login</a> again.</p>
                </div>";
      }
  } else {
?>

                                                <form class="mt-4 pt-2" method="post" name="login">
                                                    <div class="form-floating form-floating-custom mb-3">
                                                        <input name="username" type="text" class="form-control" id="input-username" placeholder="Enter User Name">
                                                        <label for="input-username">Username</label>
                                                        <div class="form-floating-icon">
                                                            <i class="uil uil-users-alt"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                        <input name="password" type="password" class="form-control" id="password-input" placeholder="Enter Password">
                                                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                        </button>
                                                        <label for="password-input">Password</label>
                                                        <div class="form-floating-icon">
                                                            <i class="uil uil-padlock"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-primary font-size-16 py-1">
                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                        <div class="float-end">
                                                            <a href="auth-resetpassword-basic.html" class="text-muted text-decoration-underline font-size-14">Forgot your password?</a>
                                                        </div>
                                                        <label class="form-check-label font-size-14" for="remember-check">
                                                            Remember me
                                                        </label>
                                                    </div>
                
                                                    <div class="mt-3">
                                                        <button name="submit" class="btn btn-primary w-100" type="submit">Log In</button>
                                                    </div>
            
                                                    <div class="mt-4 text-center">
                                                        <div class="signin-other-title">
                                                            <h5 class="font-size-15 mb-4 text-muted fw-medium">- Or you can join with Google</h5>
                                                        </div>
            
                                                        <div class="d-flex gap-2">
                                                           <!--  <button type="button" class="btn btn-soft-primary waves-effect waves-light w-100">
                                                                <i class="bx bxl-facebook font-size-16 align-middle"></i> 
                                                            </button>
                                                            <button type="button" class="btn btn-soft-info waves-effect waves-light w-100">
                                                                <i class="bx bxl-linkedin font-size-16 align-middle"></i> 
                                                            </button> -->
                                                            <button type="button" class="btn btn-soft-danger waves-effect waves-light w-100">
                                                                <i class="bx bxl-google font-size-16 align-middle"></i> 
                                                            </button>
                                                        </div>
                                                    </div>
            
                                                  <!--   <div class="mt-4 pt-3 text-center">
                                                        <p class="text-muted mb-0">Don't have an account ? <a href="auth-signup-cover.html" class="fw-semibold text-decoration-underline"> Signup Now </a> </p>
                                                    </div> -->
                
                                                </form><!-- end form -->
                                                <?php
    }
?>
</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>
        <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <script src="assets/js/pages/pass-addon.init.js"></script>

    </body>
</html>

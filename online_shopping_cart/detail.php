<?php
session_start();
include("fe_include/header.php");
include("admin/include/config.php");
if(isset($_GET["did"]))
{
	$did=$_GET["did"];

?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

<?php
	$q="select * from product where p_id=$did";
	$exec=mysqli_query($connect,$q);
	if(mysqli_num_rows($exec)>0)
	{
		$product=mysqli_fetch_assoc($exec);
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

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
	<form method="post" action="cart.php">
	<input type="hidden" value="<?php echo $product["p_name"]?>" name="pname">
	<input type="hidden" value="<?php echo $product["p_id"]?>" name="pid">
	<input type="hidden" value="<?php echo $product["p_image"]?>" name="pimage">
	<input type="hidden" value="<?php echo number_format($product["p_price"],2)*85/100 ?> " name="pprice">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div  class="carousel slide" >
                    <div class=" bg-light">
                        <div class="carousel-item active">
       <img class="w-100 h-100" src="<?php echo "admin/Images/".$product["p_image"]?>" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $product["p_name"]?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">$<?php echo number_format($product["p_price"],2)*85/100 ?> 
						<del style="font-size: 17px">$<?php echo number_format($product["p_price"],2)?></del></h3>			
                    <p class="mb-4"><?php echo $product["p_des"]?></p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus" type="button" onClick="dec()">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
  <input type="text" class="form-control bg-secondary border-0 text-center" value="1" name="pqty" min="1" max="50">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" type="button" onClick="inc()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>						
                    </div>
					<div class="d-flex mb-3">
                        <div class="text-primary mr-2">
							<button style="border: none" class="mt-3 a1" type="submit" name="cart">
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>Add To Cart</button>
                        </div>
                        </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
			
        </div></form>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?php echo $product["p_des"]?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
<?php ?>

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
<script>
function inc() {
  let pqty = document.querySelector('[name="pqty"]');
  pqty.value = parseInt(pqty.value) + 1;
}

function dec() {
  let pqty = document.querySelector('[name="pqty"]');
	if (parseInt(pqty.value) > 1) {
	  pqty.value = parseInt(pqty.value) - 1;
  }
}
</script>
<?php 
}
include("fe_include/footer.php") ?>
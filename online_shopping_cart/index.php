<?php
session_start();
include("fe_include/header.php");
include("admin/include/config.php");
?>
<!-- main content start -->

<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                    <li data-target="#header-carousel" data-slide-to="3"></li>
                    <li data-target="#header-carousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $query = "select * from banner";
                    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $check = '';
                            if ($i == 0) {
                                $check = "active";
                            }

                    ?>
                            <div class="carousel-item <?php echo $check ?>" style="height: 430px;">
                                <img class="position-absolute w-100 h-100" src="<?php echo "admin/Images/" . $row["b_image"] ?>" style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown" style="font-weight:700 ;"><?php echo $row["b_name"] ?>
                                        </h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?php echo $row["b_des"] ?></p>
                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="shop.php">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/banner-9.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="shop.php" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/banner-8.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="shop.php" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-center">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;height: 100px">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0 text-center">Free Shipping on above $200</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-center">07-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-center">24/7 Support</h5>
            </div>
        </div>
    </div>
	
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php
        //----------------------------------------- product count
        // $q = "select c.c_name,count(c.c_id) from category as c INNER JOIN product as p 
        // on c.c_id = p.cid_fk
        // GROUP by c.c_name";
        $q = "SELECT COUNT(category.c_id) c_id,c_name,c_image,cid_fk FROM category 
              INNER JOIN product ON category.c_id = product.cid_fk GROUP BY category.c_id;";
        $res = mysqli_query($connect, $q) or die(mysqli_error($connect));
        if (mysqli_num_rows($res) > 0) {
            while ($r = mysqli_fetch_assoc($res)) {


        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="shop.php?cid=<?php echo $r["cid_fk"]?>">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img style="width: 160px;" src="<?php echo "admin/Images/" . $r["c_image"] ?>" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6><?php echo $r["c_name"] ?></h6>
                                <small class="text-body"><?php echo $r["c_id"]?> Product</small>
                            </div>
                        </div>
                    </a>
                </div>

        <?php

            }
        } ?>
    </div>
</div>
<!-- Categories End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
            Products</span></h2>
    <div class="row px-xl-5">
        <?php 
		
        $query = "select * from product order by rand() limit 8";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
		
		
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden ">
                            <img class="img-fluid" style="height: 400px; width: 100%" src="<?php echo "admin/Images/".$row["p_image"] ?>" alt="item">
                            <div class="product-action">
         <a class="btn btn-outline-dark btn-square" href="Fav.php?fid=<?php echo $row["p_id"]?>"><i class="far fa-heart"></i></a>
         <a class="btn btn-outline-dark btn-square" href="detail.php?did=<?php echo $row["p_id"]?>"><i class="fa fa-search"></i></a>
		                        
                                
                            </div>
                        </div>
                        <div class="text-center py-4">
      <a class="h6 text-decoration-none text-truncate" href="detail.php?did=<?php echo $row["p_id"]?>"><?php echo $row["p_name"] ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$<?php echo number_format($row["p_price"],2) * 85/100?></h5>
                                <h6 class="text-muted ml-2"><del>$<?php echo number_format($row["p_price"],2)?></del></h6>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }

        ?>
    </div>
</div>
<!-- Products End -->


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="img/banner-9.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="shop.php" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="img/banner-8.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="shop.php" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
 <div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent
            Products</span></h2>
    <div class="row px-xl-5">
		<?php
		$recent="SELECT p_id,p_name,p_price,p_image FROM product ORDER BY p_id DESC limit 8";
		$exec=mysqli_query($connect,$recent);
		while($rproduct=mysqli_fetch_assoc($exec))
		{
		?>
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid"  style="height: 400px; width: 100%" src="<?php echo 'admin/Images/'.$rproduct["p_image"]?>" alt="">
                    <div class="product-action">
         <a class="btn btn-outline-dark btn-square" href="Fav.php?fid=<?php echo $rproduct["p_id"]?>"><i class="far fa-heart"></i></a>
         <a class="btn btn-outline-dark btn-square" href="detail.php?did=<?php echo $rproduct["p_id"]?>"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
 <a class="h6 text-decoration-none text-truncate" href="detail.php?did=<?php echo $rproduct["p_id"]?>"><?php echo $rproduct["p_name"]?></a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>$<?php echo number_format($rproduct["p_price"],2)*85/100 ?></h5>
                        <h6 class="text-muted ml-2"><del>$<?php echo number_format($rproduct["p_price"],2)?></del></h6>
                    </div>
                </div>
            </div>
        </div>
		<?php }?>
    </div>
</div> 
<!-- Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->
<!-- main content end -->
<?php include("fe_include/footer.php") ?>
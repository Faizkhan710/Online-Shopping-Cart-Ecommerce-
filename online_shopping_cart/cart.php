<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
	header("location:signin.php?cart");
	$_SESSION["log"]="Please Login to Add into Cart";
}
if(isset($_SESSION["user_id"]))
{
	$id= $_SESSION["user_id"];
}
include("fe_include/header.php");
include("admin/include/config.php");
?>
<style>
@media (hover: hover) {
  #creditcard {
    /*  set start position */
    transform: translateY(110px);
    transition: transform 0.1s ease-in-out;
    /*  set transition for mouse enter & exit */
  }

  #money {
    /*  set start position */
    transform: translateY(180px);
    transition: transform 0.1s ease-in-out;
    /*  set transition for mouse enter & exit */
  }

  button:hover #creditcard {
    transform: translateY(0px);
    transition: transform 0.2s ease-in-out;
    /*  overide transition for mouse enter */
  }

  button:hover #money {
    transform: translateY(0px);
    transition: transform 0.3s ease-in-out;
    /*  overide transition for mouse enter */
  }
}

@keyframes bounce {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-0.25rem);
  }
  100% {
    transform: translateY(0);
  }
}

.button1:hover .button__text span {
  transform: translateY(-0.25rem);
  transition: transform .2s ease-in-out;
}

/* styling */
.button1 {
  border: none;
  outline: none;
  background-color: purple;
  padding: 1rem 90px 1rem 2rem;
  position: relative;
  border-radius: 8px;
  letter-spacing: 0.7px;
  background-color: #FFD333;
  color: #000000;
  font-size: 21px;
  font-family: "Lato", sans-serif;
  cursor: pointer;
  box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
}

.button1:active {
  transform: translateY(1px);
}

.button__svg1 {
  position: absolute;
  overflow: visible;
  bottom: 6px;
  right: 0.2rem;
  height: 140%;
}

</style>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<?php
			if(isset($_POST["cart"]))
			{
				if(!isset($_SESSION["Cart"]))
				{
					$_SESSION["Cart"] = array();
				}
							
			 	$pro_id = $_POST["pid"];
				$pro_name = $_POST["pname"];
				$pro_price= $_POST["pprice"];
				$pro_image= $_POST["pimage"];
				$pro_quantity= $_POST["pqty"];
				//----------------------------------- quantity work--------
				$count = count($_SESSION["Cart"]) ;
				$IsExist = false;
				if($count>0)
				{
					for($x=0;$x<$count;$x++)
					{
						if($_SESSION["Cart"][$x]["ID"] == $pro_id )
						{
							$_SESSION["Cart"][$x]["Quantity"] = $_SESSION["Cart"][$x]["Quantity"]+$pro_quantity;
							$IsExist = true;
						}
					}
					
				}
				//----------------------
				
				
				if(!$IsExist)
				{
					array_push($_SESSION["Cart"],array("ID"=>$pro_id,
														"Name"=>$pro_name,
														"Price"=>$pro_price,
														"Image"=>$pro_image,
														"Quantity"=>$pro_quantity,));
				}
				ob_end_flush();
			}
?>

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
							<th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
						<?php
						if(isset($_SESSION["Cart"]))
					{
						$sub = 0;
						$shipping = 10;
						$count = count($_SESSION["Cart"]) ;
						for($i=0 ; $i<$count ; $i++)
						{
						?>
                        <tr>
                            <td class="align-middle"><img src="<?php echo "admin/Images/".$_SESSION["Cart"][$i]["Image"]?>" alt="" style="width: 50px;"></td>
							<td class="align-middle"><?php echo $_SESSION["Cart"][$i]["Name"]?></td>
                            <td class="align-middle">$<?php echo $_SESSION["Cart"][$i]["Price"]?></td>
                            <td class="align-middle"><?php echo $_SESSION["Cart"][$i]["Quantity"]?></td>
                            <td class="align-middle">$<?php echo number_format((float)$_SESSION["Cart"][$i]["Price"],2) * number_format((float)$_SESSION["Cart"][$i]["Quantity"],2);?></td>
                            <td class="align-middle">
								<a class="btn btn-sm btn-danger" href="removecart.php?index=<?php echo $i?>"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
						<?php 
           $sub+=number_format((float)$_SESSION["Cart"][$i]["Price"],2) * number_format((float)$_SESSION["Cart"][$i]["Quantity"],2);
							
							} }
						else
						{
							echo "<tr><td colspan='6'><a href='shop.php'><h1>Cart is Empty</h1></a></td></tr>";
						}
						?>
                    </tbody>
                </table>
            </div>	
            <div class="col-lg-4">
				
				<!--===============================Coupon======================================-->
                <form class="mb-30" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code" name="coupon">
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="couponbtn">Apply Coupon</button>
                        </div>
                    </div>
					<div class="input-group">
						<div class="input-group-append">
							<p class="text-danger text-center"><?php echo @$massage?></p>
                        </div>
                    </div>
                </form>
				
			<!--	========================================Total================================================-->
				<form method="post" action="cheackout.php">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$<?php echo @$sub?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$<?php echo @$shipping?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
						<div class="d-flex justify-content-between mt-2">
                            <h5>Coupon</h5>
							<input type="hidden" value="<?php echo $cp?>" name="cp">
							<p><?php echo "No coupon Applied"?></p>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
							<input type="hidden" value="<?php echo @$subtotal?>" name="subtotal">
                            <h5>$<?php echo @$sub+@$shipping?></h5>
                        </div>
<button class="button1 btn-block my-3 py-3 font-weight-bold mt-4" name="checkout" type="submit" style="font-family: algerian">
  <span class="button__text">
    <span>P</span><span>r</span>o</span><span>c</span><span>e</span><span>e</span><span>d</span><span> </span><span>T</span><span>o</span>
	<span>C</span><span>h</span><span>e</span><span>c</span><span>k</span><span>o</span><span>u</span><span>t</span>							
  </span>
  <svg class="button__svg1" role="presentational" viewBox="0 0 600 600">
    <defs>
      <clipPath id="myClip">
        <rect x="0" y="0" width="100%" height="50%" />
      </clipPath>
    </defs>
    <g clip-path="url(#myClip)">
      <g id="money">
        <path d="M441.9,116.54h-162c-4.66,0-8.49,4.34-8.62,9.83l.85,278.17,178.37,2V126.37C450.38,120.89,446.56,116.52,441.9,116.54Z" fill="#699e64" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
        <path d="M424.73,165.49c-10-2.53-17.38-12-17.68-24H316.44c-.09,11.58-7,21.53-16.62,23.94-3.24.92-5.54,4.29-5.62,8.21V376.54H430.1V173.71C430.15,169.83,427.93,166.43,424.73,165.49Z" fill="#699e64" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      </g>
      <g id="creditcard">
        <path d="M372.12,181.59H210.9c-4.64,0-8.45,4.34-8.58,9.83l.85,278.17,177.49,2V191.42C380.55,185.94,376.75,181.57,372.12,181.59Z" fill="#a76fe2" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
        <path d="M347.55,261.85H332.22c-3.73,0-6.76-3.58-6.76-8v-35.2c0-4.42,3-8,6.76-8h15.33c3.73,0,6.76,3.58,6.76,8v35.2C354.31,258.27,351.28,261.85,347.55,261.85Z" fill="#ffdc67" />
        <path d="M249.73,183.76h28.85v274.8H249.73Z" fill="#323c44" />
      </g>
    </g>
    <g id="wallet">
      <path d="M478,288.23h-337A28.93,28.93,0,0,0,112,317.14V546.2a29,29,0,0,0,28.94,28.95H478a29,29,0,0,0,28.95-28.94h0v-229A29,29,0,0,0,478,288.23Z" fill="#a4bdc1" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      <path d="M512.83,382.71H416.71a28.93,28.93,0,0,0-28.95,28.94h0V467.8a29,29,0,0,0,28.95,28.95h96.12a19.31,19.31,0,0,0,19.3-19.3V402a19.3,19.3,0,0,0-19.3-19.3Z" fill="#a4bdc1" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      <path d="M451.46,435.79v7.88a14.48,14.48,0,1,1-29,0v-7.9a14.48,14.48,0,0,1,29,0Z" fill="#a4bdc1" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      <path d="M147.87,541.93V320.84c-.05-13.2,8.25-21.51,21.62-24.27a42.71,42.71,0,0,1,7.14-1.32l-29.36-.63a67.77,67.77,0,0,0-9.13.45c-13.37,2.75-20.32,12.57-20.27,25.77l.38,221.24c-1.57,15.44,8.15,27.08,25.34,26.1l33-.19c-15.9,0-28.78-10.58-28.76-25.93Z" fill="#7b8f91" />
      <path d="M148.16,343.22a6,6,0,0,0-6,6v92a6,6,0,0,0,12,0v-92A6,6,0,0,0,148.16,343.22Z" fill="#323c44" />
    </g>

  </svg>
</button>
<!--                        <button class="btn btn-block btn-primary  " >Proceed To Checkout</button>-->
                    </div>
                </div>
					</form>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php include("fe_include/footer.php") ?>
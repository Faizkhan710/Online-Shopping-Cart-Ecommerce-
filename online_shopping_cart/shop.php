<?php 
session_start();
include("fe_include/header.php");
include("admin/include/config.php");
if(isset($_GET["cid"]))
 {
if(isset($_POST["search"]))
{
$limit=6;
if (isset($_GET['pageid'])) 
{$page= $_GET['pageid'];}                 
else{$page=1;}
$offset=($page - 1) * $limit;	
$q="select * from product where p_price>='".$_POST["min"]."' AND p_price<='".$_POST["max"]."' AND p_name LIKE '%".$_POST["name"]."%' LIMIT {$offset} ,{$limit}";
$exex=mysqli_query($connect,$q);
$heading="<h2 style='font-family:algerian' class='text-center'>No Product Found :)</h2>";
$q1="select * from product where p_price>='".$_POST["min"]."' AND p_price<='".$_POST["max"]."' AND p_name LIKE '%".$_POST["name"]."%'";	
}
else
{
$limit=6;
if (isset($_GET['pageid'])) 
{$page= $_GET['pageid'];}                 
else{$page=1;}
$offset=($page - 1) * $limit;	
$cid=$_GET["cid"];
$q="select * from product where cid_fk=$cid LIMIT {$offset} ,{$limit}";
$exex=mysqli_query($connect,$q);
$heading="<h2>Coming Soon :)</h2>";
$q1="select * from product where cid_fk=$cid";	
}
}

elseif(isset($_GET["pid"]))
 {
if(isset($_POST["search"]))
{
$limit=6;
if (isset($_GET['pageid'])) 
{$page= $_GET['pageid'];}                 
else{$page=1;}
$offset=($page - 1) * $limit;	
$q="select * from product where p_price>='".$_POST["min"]."' AND p_price<='".$_POST["max"]."' AND p_name LIKE '%".$_POST["name"]."%' LIMIT {$offset} ,{$limit}";
$exex=mysqli_query($connect,$q);
$heading="<h2 style='font-family:algerian' class='text-center'>No Product Found :)</h2>";
$q1="select * from product where p_price>='".$_POST["min"]."' AND p_price<='".$_POST["max"]."' AND p_name LIKE '%".$_POST["name"]."%'";	
}
else
{
$limit=6;
if (isset($_GET['pageid'])) 
{$page= $_GET['pageid'];}                 
else{$page=1;}
$offset=($page - 1) * $limit;	
$pid=$_GET["pid"];
$q="select * from product where p_id=$pid LIMIT {$offset} ,{$limit}";
$exex=mysqli_query($connect,$q);
$heading="<h2>Coming Soon :)</h2>";
$q1="select * from product where p_id=$pid";	
}
}

 else
{
if(isset($_POST["search"]))
{
$limit=6;
if (isset($_GET['pageid'])) 
{$page= $_GET['pageid'];}                 
else{$page=1;}
$offset=($page - 1) * $limit;	
$q="select * from product where p_price>='".$_POST["min"]."' AND p_price<='".$_POST["max"]."' AND p_name LIKE '%".$_POST["name"]."%' LIMIT {$offset} ,{$limit}";
$exex=mysqli_query($connect,$q);
$heading="<h2 style='font-family:algerian' class='text-center'>No Product Found :)</h2>";
$q1="select * from product where p_price>='".$_POST["min"]."' AND p_price<='".$_POST["max"]."' AND p_name LIKE '%".$_POST["name"]."%'";	
}
else
{
$limit=6;
if (isset($_GET['pageid'])) 
{$page= $_GET['pageid'];}                 
else{$page=1;}
$offset=($page - 1) * $limit;	
$q="select * from product order by rand() LIMIT {$offset} ,{$limit}";
$exex=mysqli_query($connect,$q);
$heading="<h2>Coming Soon :)</h2>";
$q1="select * from product order by rand()";
}	 
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
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Name and price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form method="post">
						<div class="d-flex align-items-center justify-content-between mb-3">
        <input type="text" placeholder="Enter Product Name" class="w-100 text-center" style="margin: 0px 10px 0px 10px" name="name"/>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
        <input type="number" placeholder="Min Price" class="w-100 text-center" style="margin: 0px 10px 0px 10px" min="0" max="1000" name="min"/>
		<input type="number" placeholder="Max Price" class="w-100 text-center" style="margin: 0px 10px 0px 10px" min="0" max="1000" name="max"/>
                        </div>
						<div class="d-flex align-items-center justify-content-between mb-3">
						<button style="border: none" class="mt-3 a1 btn btn-block" type="submit" name="search">
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>
                        <span class="span3"></span>SEARCH</button>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Product</button>
                                    <div class="dropdown-menu dropdown-menu-right">
										<?php 
										$q2="select * from product order by rand() limit 8";
										$exex1=mysqli_query($connect,$q2);
										if(mysqli_num_rows($exex1)>0)
										{
											while($product1=mysqli_fetch_assoc($exex1))
											{
										?>
               <a class="dropdown-item" href="shop.php?pid=<?php echo $product1["p_id"]?>"><?php echo $product1["p_name"]?></a>
										<?php
										}}?>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php					    
	                      if(mysqli_num_rows($exex)>0)
						  {
						while($product=mysqli_fetch_assoc($exex))	  
						{
					?>
						<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4 card">
                            <div class="product-img position-relative overflow-hidden">
             <img class="img-fluid" style="height: 400px; width: 100%" src="<?php echo "admin/Images/".$product["p_image"]?>" alt="">
                                <div class="product-action">
         <a class="btn btn-outline-dark btn-square" href="Fav.php?fid=<?php echo $product["p_id"]?>"><i class="far fa-heart"></i></a>
         <a class="btn btn-outline-dark btn-square" href="detail.php?did=<?php echo $product["p_id"]?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4 content">
 <a class="h6 text-decoration-none text-truncate" href="detail.php?did=<?php echo $product["p_id"]?>"><?php echo $product["p_name"]?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$<?php echo number_format($product["p_price"],2) * 85/100?></h5>
									<h6 class="text-muted ml-2"><del>$<?php echo number_format($product["p_price"],2)?></del></h6>
                                </div>
								
                            </div>
                        </div>
                    </div>
					<?php } }
					else
					{
						echo @$heading;
					}
					
					
					?>
                    <div class="col-12">
                       
                        <?php 
                        $result=mysqli_query($connect,$q1);
                        if (mysqli_num_rows($result)>0) {
                            

                            $total=mysqli_num_rows($result);
                            
                            $total_page=ceil( $total/$limit);

                        echo '<ul class="pagination  justify-content-center">';

                        if ($page>1) {
                            echo '<li class="btn btn-outline-dark"><a href="shop.php?pageid='.($page - 1 ).'">Prev</a></li>';
                            
                        }
                        


                          for ($i=1; $i <=$total_page ; $i++) { 
                             
                             if ($i==$page) {
                                 $active="active";
                             }
                             else{
                                $active="";
                             }

                             echo '<li class="btn btn-outline-dark '.$active.'" style="margin:3px;"><a href="shop.php?pageid='.$i.'">'.$i.'</a></li>';
                         }

                         if ($total_page>$page) {
                            echo '<li class="btn btn-outline-dark" ><a href="shop.php?pageid='.($page + 1 ).'">Next</a></li>';
                        }
                        

                            echo '</ul>';
                       }

                         ?>
                         
                            
                            
                            
                          
                    </div>
			
			
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
<?php 

include("fe_include/footer.php");?>
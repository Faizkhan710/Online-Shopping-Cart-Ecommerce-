<?php 
include("admin/include/config.php");
session_start();
if(!isset($_SESSION["user_id"]))
{
    header("location:signin.php?favorite");
    $_SESSION["log"]="Please Login to Add into favorite";
}
      

if(isset($_SESSION["user_id"])){
$uid= $_SESSION["user_id"];
if(isset($_GET["fid"]))
{
	$f_id=$_GET["fid"];
	$fav="insert into favorite (p_id,u_id) values ('".$f_id."','".$uid."')";
	$execute=mysqli_query($connect,$fav);
}
}
include("fe_include/header.php");

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
.wrapper{
  position: relative;
  max-width: 1130px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.wrapper .cart-nav{
  position: absolute;
  right: 0;
  top: -35%;
  width: 130px;
  background: #fff;
  padding: 13px 15px;
  border-radius: 3px;
  display: flex;
  cursor: pointer;
  justify-content: space-evenly;
  box-shadow: 3px 3px 8px 0px rgba(0,0,0,0.15);
}
.cart-nav .icon{
  color: white;
}
.cart-nav .icon i{
  font-size: 20px;
}
.cart-nav .icon span{
  font-weight: 500;
}
.cart-nav .item-count{
  font-size: 15px;
  height: 23px;
  width: 23px;
  color: #ff7979;
  background: #ffcccc;
  text-align: center;
  line-height: 22px;
  border: 1px solid #ffb3b3;
  border-radius: 50%;
}
.wrapper .card{
  position: relative;
  background: #fff;
  border-radius: 3px;
  width: calc(33% - 13px);
  overflow: hidden;
  box-shadow: 4px 4px 10px 0px rgba(0,0,0,0.15);
}
.wrapper .card img{
  width: 100%;
  border-radius: 3px;
  transition: all 0.3s ease;
}
.card:hover img{
  transform: scale(1.1);
}
.wrapper .card .content{
  position: absolute;
  width: 100%;
  bottom: -50%;
  background: #fff;
  padding: 10px 20px 22px 20px;
  box-shadow: 0px -3px 10px 0px rgba(0,0,0,0.15);
  transition: all 0.3s ease;
}
.wrapper .card:hover .content{
  bottom: 0;
}
.card .content .row,
.content .buttons{
  display: flex;
  justify-content: space-between;
}
.content .row .details span{
  font-size: 22px;
  font-weight: 500;
}
.content .row .details p{
  color: #333;
  font-size: 17px;
  font-weight: 400;
}
.content .row .price{
  color: #ff7979;
  font-size: 25px;
  font-weight: 600;
}
.content .buttons{
  margin-top: 20px;
}
.content .buttons button{
  width: 100%;
  padding: 9px 0;
  outline: none;
  cursor: pointer;
  font-size: 17px;
  font-weight: 500;
  border-radius: 3px;
  border: 2px solid #ff7979;
  text-transform: uppercase;
  transition: all 0.3s ease;
}
.buttons button:first-child{
  color: #ff7979;
  margin-right: 10px;
  background: #fff;
}
.button1:first-child:hover{
  color: #fff;
  background: #ff7979;
}
.buttons button:last-child{
  color: #fff;
  margin-left: 10px;
  background: #ff7979;
}
.button1:last-child:hover{
  background: #ff6666;
  border-color: #ff6666;
}     
     </style>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
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
            
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3">
<!--
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
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
-->
                    
                    <?php                                                                          
                        $limit=3;
                          if (isset($_GET['pageid'])) 
                          {$page= $_GET['pageid'];}                 
                          else{ $page=1;}
                          $offset=($page - 1) * $limit;
                          $q="select distinct f.p_id,f.u_id,p.p_id,p.p_name,p.p_price,p.p_image from favorite as f INNER JOIN product as p ON f.p_id=p.p_id INNER JOIN user_table as u on f.u_id=$uid LIMIT {$offset} ,{$limit}";
                          $exex=mysqli_query($connect,$q);      
                          if(mysqli_num_rows($exex)>0)
                          {
                        while($product=mysqli_fetch_assoc($exex))     
                        {

                    ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4 card">
                            <div class="product-img position-relative overflow-hidden">
             <img class="img-fluid" style="height: 400px; width: 100%" src="<?php echo "admin/Images/".$product["p_image"]?>" alt="" >
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="" name="favbtn"><i class="far fa-heart"></i></a>


                                    <!--<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>-->
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4 content">
 <a class="h6 text-decoration-none text-truncate" href="detail.php?did=<?php echo $product["p_id"]?>"><?php echo $product["p_name"]?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$<?php echo number_format($product["p_price"],2) * 85/100?></h5>
                                    <h6 class="text-muted ml-2"><del>$<?php echo number_format($product["p_price"],2) ?></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1 "></small>
                                    <small>(99)</small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php 

                } }
                    
                    
                    ?>
                    <div class="col-12">
                       
                        <?php 
                        $q="select distinct f.p_id,f.u_id,p.p_id,p.p_name,p.p_price,p.p_image from favorite as f INNER JOIN product as p ON f.p_id=p.p_id INNER JOIN user_table as u on f.u_id=$uid";
                        $result=mysqli_query($connect,$q);
                        if (mysqli_num_rows($result)>0) {
                            

                            $total=mysqli_num_rows($result);
                            
                            $total_page=ceil( $total/$limit);

                        echo '<ul class="pagination  justify-content-center">';

                        if ($page>1) {
                            echo '<li class="btn btn-outline-dark"><a href="fav.php?pageid='.($page - 1 ).'">Prev</a></li>';
                            
                        }
                        


                          for ($i=1; $i <=$total_page ; $i++) { 
                             
                             if ($i==$page) {
                                 $active="active";
                             }
                             else{
                                $active="";
                             }

                             echo '<li class="btn btn-outline-dark '.$active.'" style="margin:3px;"><a href="fav.php?pageid='.$i.'">'.$i.'</a></li>';
                         }

                         if ($total_page>$page) {
                            echo '<li class="btn btn-outline-dark" ><a href="fav.php?pageid='.($page + 1 ).'">Next</a></li>';
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



<script>
let count = 0;
//if add to cart btn clicked
$('.cart-btn').on('click', function (){
  let cart = $('.cart-nav');
  // find the img of that card which button is clicked by user
  let imgtodrag = $(this).parent('.buttons').parent('.content').parent('.card').find("img").eq(0);
  if (imgtodrag) {
    // duplicate the img
    var imgclone = imgtodrag.clone().offset({
      top: imgtodrag.offset().top,
      left: imgtodrag.offset().left
    }).css({
      'opacity': '0.8',
      'position': 'absolute',
      'height': '150px',
      'width': '150px',
      'z-index': '100'
    }).appendTo($('body')).animate({
      'top': cart.offset().top + 20,
      'left': cart.offset().left + 30,
      'width': 75,
      'height': 75
    }, 1000, 'easeInOutExpo');

    setTimeout(function(){
      count++;
      $(".cart-nav .item-count").text(count);
    }, 1500);

    imgclone.animate({
      'width': 0,
      'height': 0
    }, function(){
      $(this).detach()
    });
  }
});   
     </script>
<?php 

include("fe_include/footer.php");?>
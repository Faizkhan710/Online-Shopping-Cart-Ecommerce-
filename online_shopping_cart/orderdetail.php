<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
	header("location:signin.php?orderdetail");
	$_SESSION["log"]="Please Login to See Order Detail";
}
if(isset($_SESSION["user_id"]))
{
	$id= $_SESSION["user_id"];
}
include("fe_include/header.php");
include("admin/include/config.php");

if(isset($_POST["canclebtn"]))
{
	$cancle="update order_table set order_status='".$_POST["status"]."',reason='".$_POST["reason"]."',detail='".$_POST["detail"]."'
	,delivered_date='".$_POST["date"]."'where order_id='".$_POST["id"]."'";
	$cancleexec=mysqli_query($connect,$cancle);
}

	
?>


<div class="container">
<div class="row nav nav-tabs bg-light"><div class="col-md-2"></div>
<div class="col-md-2 mt-2 mb-2"><li class="active btn btn-primary btn-block"><a data-toggle="tab" href="#home" class="text-dark">All</a></li></div>
<div class="col-md-2 mt-2 mb-2"><li class="btn btn-primary btn-block"><a data-toggle="tab" href="#menu1" class="text-dark">Delivered Order</a></li></div>
<div class="col-md-2 mt-2 mb-2"><li class="btn btn-primary btn-block"><a data-toggle="tab" href="#menu2" class="text-dark">Cancelled Order</a></li></div>
<div class="col-md-2 mt-2 mb-2"><li class="btn btn-primary btn-block"><a data-toggle="tab" href="#menu3" class="text-dark">Return</a></li></div> 
<div class="col-md-2"></div>
</div>
  <div class="tab-content">
    <div id="home" class="tab-pane active">
         <div class="container-fluid mt-3 tab-pane active" role="tabpanel" id="All">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
				<?php
$q="SELECT od.order_id,od.product_id,od.order_quantity,od.order_date,od.order_inv_num,od.order_status,od.orderid_fk,o.userid_fk,p.p_name,p.p_price,p.p_code,p.p_number,p.p_image,od.delivered_date FROM order_table AS od INNER JOIN order_manager as o ON od.orderid_fk=o.om_id INNER JOIN product as p ON od.product_id=p.p_id WHERE o.userid_fk=$id ORDER BY order_id DESC";
$execute=mysqli_query($connect,$q);
				if(mysqli_num_rows($execute)>0)
				{
					while($order=mysqli_fetch_assoc($execute))
					{
$cancledate=date("Y-m-d");
if($order["order_status"]=="processing")
{
	$status='<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Cancle
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="post">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Cancle Reason</label>
    <select class="form-control" id="exampleFormControlSelect1" name="reason">
      <option value="Delivery time is to long">Delivery time is to long</option>
      <option value="Duplicate Order">Duplicate Order</option>
      <option value="Sourcing payment issue">Sourcing payment issue</option>
      <option value="Change of mind">Change of mind</option>
      <option value="Decided for alternative product">Decided for alternative product</option>
	  <option value="Fees Shipping Cost">Fees Shipping Cost</option>
		<option value="Other">Other</option>
    </select>
  </div>
  <input type="hidden" value="Cancelled" name="status">
  <input type="hidden" value="'.$order["order_id"].'" name="id">
  <input type="hidden" value="'.$cancledate.'" name="date">
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Cancelation Detail</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"></textarea>
  </div>
  <div class="form-group">
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="canclebtn">Cancle</button>
      </div>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>';
}
						
elseif($order["order_status"]=="Delivered")
{
	$date=date('Y-m-d', strtotime($order["delivered_date"]. ' + 2 day'));
	if($date<=date('Y-m-d'))
	{
		$status="<b>Delivered</b>";
	}	
	else
	{
		$status='<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Return
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="post">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Return Reason</label>
    <select class="form-control" id="exampleFormControlSelect1" name="reason">
      <option value="Damaged due to poor packaging">Damaged due to poor packaging</option>
      <option value="Arrived too late">Arrived too late</option>
      <option value="Missing parts or accessories">Missing parts or accessories</option>
      <option value="Different from what was ordered">Different from what was ordered</option>
      <option value="Defective,Does not work properly">Defective,Does not work properly</option>
	  <option value="Not satisfied with the quality">Not satisfied with the quality</option>
		<option value="Other">Other</option>
    </select>
  </div>
  <input type="hidden" value="Returned" name="status">
  <input type="hidden" value="'.$cancledate.'" name="date">
  <input type="hidden" value="'.$order["order_id"].'" name="id">
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Return Detail</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"></textarea>
  </div>
  <div class="form-group">
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="canclebtn">Return</button>
      </div>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>';
	}
}
elseif($order["order_status"]=="Cancelled")
{
	$status="<b>Cancelled</b>";
}
elseif($order["order_status"]=="Returned")
{
	$status="<b>Returned</b>";
}
				?>
                <div class="row bg-light">
<div class="col-md-10 mt-2">Order-number :  <?php echo $order["p_code"]."-".$order["p_number"]."-".$order["order_inv_num"]?></div>
<div class="col-md-2 mt-2"><?php echo $order["order_status"]?></div>
<div class="col-md-12 border-bottom">Order Date : <?php echo $order["order_date"]?></div>					
					<div class="col-md-1 mt-4 my-5"></div>
					<div class="col-md-2 mt-2 my-4"><img src="<?php echo "admin/Images/",$order["p_image"]?>" style="width: 100px;height: 100px"></div>
					<div class="col-md-2 mt-4 my-5"><?php echo $order["p_name"]?>(<?php echo $order["order_quantity"]?>)</div>
					<div class="col-md-2 mt-4 my-5">$<?php echo number_format($order["p_price"] * $order["order_quantity"],2)?></div>
					<div class="col-md-2 mt-4 my-5"><?php echo "Tracking-id ".$order["order_inv_num"]?></div>
					<div class="col-md-2 mt-4 my-5"><?php echo $status?></div>

				</div><br/>
				<?php 
					
					}}else{echo "No Order yet";}?>
            </div>	
        </div>
    </div>
    </div>
    <div id="menu1" class="tab-pane fade">
    <div class="container-fluid mt-3 tab-pane active" role="tabpanel" id="All">
        <div class="row px-xl-5"><div class="col-lg-1"></div>
            <div class="col-lg-10 table-responsive mb-5">
				<?php
$q="SELECT od.order_id,od.product_id,od.order_quantity,od.order_date,od.order_inv_num,od.order_status,od.orderid_fk,o.userid_fk,p.p_name,p.p_price,p.p_code,p.p_number,p.p_image FROM order_table AS od INNER JOIN order_manager as o ON od.orderid_fk=o.om_id INNER JOIN product as p ON od.product_id=p.p_id WHERE o.userid_fk=$id AND od.order_status='Delivered' ORDER BY order_id DESC";
$execute=mysqli_query($connect,$q);
				if(mysqli_num_rows($execute)>0)
				{
					while($order=mysqli_fetch_assoc($execute))
					{						
				?>
                <div class="row bg-light">
<div class="col-md-10 mt-2">Order-number :  <?php echo $order["p_code"]."-".$order["p_number"]."-".$order["order_inv_num"]?></div>
<div class="col-md-2 mt-2"><?php echo $order["order_status"]?></div>
<div class="col-md-12 border-bottom">Order Date : <?php echo $order["order_date"]?></div>					
					<div class="col-md-1 mt-4 my-5"></div>
					<div class="col-md-2 mt-2 my-4"><img src="<?php echo "admin/Images/",$order["p_image"]?>" style="width: 100px;height: 100px"></div>
					<div class="col-md-2 mt-4 my-5"><?php echo $order["p_name"]?>(<?php echo $order["order_quantity"]?>)</div>
					<div class="col-md-2 mt-4 my-5">$<?php echo number_format($order["p_price"] * $order["order_quantity"],2)?></div>
					<div class="col-md-2 mt-4 my-5"><?php echo "Tracking-id ".$order["order_inv_num"]?></div>
					<div class="col-md-2 mt-4 my-5"><b><?php echo $order["order_status"]?></b></div>

				</div><br/>
				<?php 
					
					}}else{echo "<h2 class='text-center'>No Order Delivered</h2>";}?>
            </div>	
            <div class="col-lg-1"></div>
        </div>
    </div>
    </div>
    <div id="menu2" class="tab-pane fade">
    <div class="container-fluid mt-3 tab-pane active" role="tabpanel" id="All">
        <div class="row px-xl-5"><div class="col-lg-1"></div>
            <div class="col-lg-10 table-responsive mb-5">
				<?php
$q="SELECT od.order_id,od.product_id,od.order_quantity,od.delivered_date,od.order_inv_num,od.order_status,od.orderid_fk,o.userid_fk,p.p_code,p.p_number,p.p_image,od.delivered_date,od.reason,od.detail FROM order_table AS od INNER JOIN order_manager as o ON od.orderid_fk=o.om_id INNER JOIN product as p ON od.product_id=p.p_id WHERE o.userid_fk=$id AND od.order_status='cancelled' ORDER BY order_id DESC";
$execute=mysqli_query($connect,$q);
				if(mysqli_num_rows($execute)>0)
				{
					while($order=mysqli_fetch_assoc($execute))
					{						
				?>
                <div class="row bg-light">
<div class="col-md-10 mt-2">Order-number :  <?php echo $order["p_code"]."-".$order["p_number"]."-".$order["order_inv_num"]?></div>
<div class="col-md-2 mt-2"><b><?php echo $order["order_status"]?></b></div>
<div class="col-md-12 border-bottom">Cancle Date : <?php echo $order["delivered_date"]?></div>					
					<div class="col-md-1 mt-4 my-5"></div>
					<div class="col-md-2 mt-2 my-4"><img src="<?php echo "admin/Images/",$order["p_image"]?>" style="width: 100px;height: 100px"></div>
					<div class="col-md-2 mt-2 my-4"><b><?php echo $order["reason"]?></b></div>
					<div class="col-md-6 mt-2 my-4"><?php echo $order["detail"] ?></div>
					

				</div><br/>
				<?php 
					
					}}else{echo "<h2 class='text-center'>No Order Cancelled</h2>";}?>
            </div>	
            <div class="col-lg-1"></div>
        </div>
    </div>
    </div>
    <div id="menu3" class="tab-pane fade">
    <div class="container-fluid mt-3 tab-pane active" role="tabpanel" id="All">
        <div class="row px-xl-5"><div class="col-lg-1"></div>
            <div class="col-lg-10 table-responsive mb-5">
				<?php
$q="SELECT od.order_id,od.product_id,od.order_quantity,od.delivered_date,od.order_inv_num,od.order_status,od.orderid_fk,o.userid_fk,p.p_code,p.p_number,p.p_image,od.delivered_date,od.reason,od.detail FROM order_table AS od INNER JOIN order_manager as o ON od.orderid_fk=o.om_id INNER JOIN product as p ON od.product_id=p.p_id WHERE o.userid_fk=$id AND od.order_status='Returned' ORDER BY order_id DESC";
$execute=mysqli_query($connect,$q);
				if(mysqli_num_rows($execute)>0)
				{
					while($order=mysqli_fetch_assoc($execute))
					{						
				?>
                <div class="row bg-light">
<div class="col-md-10 mt-2">Order-number :  <?php echo $order["p_code"]."-".$order["p_number"]."-".$order["order_inv_num"]?></div>
<div class="col-md-2 mt-2"><b><?php echo $order["order_status"]?></b></div>
<div class="col-md-12 border-bottom">Return Date : <?php echo $order["delivered_date"]?></div>					
					<div class="col-md-1 mt-4 my-5"></div>
					<div class="col-md-2 mt-2 my-4"><img src="<?php echo "admin/Images/",$order["p_image"]?>" style="width: 100px;height: 100px"></div>
					<div class="col-md-2 mt-2 my-4"><b><?php echo $order["reason"]?></b></div>
					<div class="col-md-6 mt-2 my-4"><?php echo $order["detail"]?></div>
					

				</div><br/>
				<?php 
					
					}}else{echo "<h2 class='text-center'>No Order Returned</h2>";}?>
            </div>	
            <div class="col-lg-1"></div>
        </div>
    </div>
    </div>
  </div>
</div>



<?php include("fe_include/footer.php") ?>
<?php include("include/header.php");
include("include/config.php");

//============================================Today Order Record====================================================================
if(isset($_GET["today"]))
{
	if(isset($_POST["search"]))
{
$h="Today Recent Order";
$inv=$_POST["inv"];
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as o INNER JOIN order_table as od ON o.om_id=od.orderid_fk WHERE od.order_inv_num = $inv ";
$execute=mysqli_query($connect,$query);
		
$todaysale="SELECT COUNT(order_id) FROM order_table WHERE order_date>=CURRENT_DATE";
$exectodaysale=mysqli_query($connect,$todaysale);
$totalorder="Today Total Order";	
	
$todaysale1="SELECT SUM(`order_price`) FROM `order_table` WHERE order_date>=CURRENT_DATE";
$exectodaysale1=mysqli_query($connect,$todaysale1);
$totalorder1="Today Total Sale Amount";	
	
$todaysale2="SELECT COUNT(order_id) FROM order_table WHERE order_date>=CURRENT_DATE AND order_status='On Way'";
$exectodaysale2=mysqli_query($connect,$todaysale2);
$totalorder2="Today Remaining Order";	
	
$todaysale3="SELECT COUNT(order_id) FROM order_table WHERE order_date>=CURRENT_DATE AND order_status='Delivered'";
$exectodaysale3=mysqli_query($connect,$todaysale3);
$totalorder3="Today Completed Order";		
}
else
{
$h="Today Recent Order";
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as 
o INNER JOIN order_table as od ON o.om_id=od.orderid_fk WHERE od.order_date>=CURRENT_DATE order by order_id DESC";
$execute=mysqli_query($connect,$query);
	
$todaysale="SELECT COUNT(order_id) FROM order_table WHERE order_date>=CURRENT_DATE";
$exectodaysale=mysqli_query($connect,$todaysale);
$totalorder="Today Total Order";	
	
$todaysale1="SELECT SUM(`order_price`) FROM `order_table` WHERE order_date>=CURRENT_DATE";
$exectodaysale1=mysqli_query($connect,$todaysale1);
$totalorder1="Today Total Sale Amount";	
	
$todaysale2="SELECT COUNT(order_id) FROM order_table WHERE order_date>=CURRENT_DATE AND order_status='On Way'";
$exectodaysale2=mysqli_query($connect,$todaysale2);
$totalorder2="Today Remaining Order";	
	
$todaysale3="SELECT COUNT(order_id) FROM order_table WHERE order_date>=CURRENT_DATE AND order_status='Delivered'";
$exectodaysale3=mysqli_query($connect,$todaysale3);
$totalorder3="Today Completed Order";	
}
}
//============================================month Order Record====================================================================
if(isset($_GET["month"]))
{
	if(isset($_POST["search"]))
{
$h="This Month Order";
$inv=$_POST["inv"];
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as o INNER JOIN order_table as od ON o.om_id=od.orderid_fk WHERE od.order_inv_num = $inv ";
$execute=mysqli_query($connect,$query);
		
$todaysale="SELECT COUNT(order_id) FROM order_table WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale=mysqli_query($connect,$todaysale);
$totalorder="This Month Order";	
	
$todaysale1="SELECT SUM(`order_price`) FROM `order_table` WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale1=mysqli_query($connect,$todaysale1);
$totalorder1="This Month Sale Amount";	
	
$todaysale2="SELECT COUNT(order_id) FROM order_table WHERE MONTH(order_date)=MONTH(now()) AND order_status='On Way'";
$exectodaysale2=mysqli_query($connect,$todaysale2);
$totalorder2="Month Remaining Order";	
	
$todaysale3="SELECT COUNT(order_id) FROM order_table WHERE MONTH(order_date)=MONTH(now()) AND order_status='Delivered'";
$exectodaysale3=mysqli_query($connect,$todaysale3);
$totalorder3="Month Completed Order";		
}
else
{
$h="This Month Order";
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as 
o INNER JOIN order_table as od ON o.om_id=od.orderid_fk WHERE MONTH(order_date)=MONTH(now()) order by order_id DESC";
$execute=mysqli_query($connect,$query);
	
$todaysale="SELECT COUNT(order_id) FROM order_table WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale=mysqli_query($connect,$todaysale);
$totalorder="This Month Order";	
	
$todaysale1="SELECT SUM(`order_price`) FROM `order_table` WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale1=mysqli_query($connect,$todaysale1);
$totalorder1="This Month Sale Amount";	
	
$todaysale2="SELECT COUNT(order_id) FROM order_table WHERE MONTH(order_date)=MONTH(now()) AND order_status='On Way'";
$exectodaysale2=mysqli_query($connect,$todaysale2);
$totalorder2="Month Remaining Order";	
	
$todaysale3="SELECT COUNT(order_id) FROM order_table WHERE MONTH(order_date)=MONTH(now()) AND order_status='Delivered'";
$exectodaysale3=mysqli_query($connect,$todaysale3);
$totalorder3="Month Completed Order";	
}
}
//============================================history Order Record====================================================================
if(isset($_GET["history"]))
{
if(isset($_POST["search"]))
{
$h="Orders History";
$inv=$_POST["inv"];
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as o INNER JOIN order_table as od ON o.om_id=od.orderid_fk WHERE od.order_inv_num = $inv ";
$execute=mysqli_query($connect,$query);
	
$todaysale="SELECT COUNT(order_id) FROM order_table WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale=mysqli_query($connect,$todaysale);
$totalorder="This Year Order";	
	
$todaysale1="SELECT SUM(`order_price`) FROM `order_table` WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale1=mysqli_query($connect,$todaysale1);
$totalorder1="This Year Sale Amount";	
	
$todaysale2="SELECT COUNT(order_id) FROM order_table WHERE order_status='On Way'";
$exectodaysale2=mysqli_query($connect,$todaysale2);
$totalorder2="Year Remaining Order";	
	
$todaysale3="SELECT COUNT(order_id) FROM order_table WHERE order_status='Delivered'";
$exectodaysale3=mysqli_query($connect,$todaysale3);
$totalorder3="Year Completed Order";	
}
else
{
$h="Orders History";
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as 
o INNER JOIN order_table as od ON o.om_id=od.orderid_fk order by order_id DESC";
$execute=mysqli_query($connect,$query);
	
$todaysale="SELECT COUNT(order_id) FROM order_table WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale=mysqli_query($connect,$todaysale);
$totalorder="This Year Order";	
	
$todaysale1="SELECT SUM(`order_price`) FROM `order_table` WHERE order_status='Delivered' OR order_status='On Way'";
$exectodaysale1=mysqli_query($connect,$todaysale1);
$totalorder1="This Year Sale Amount";	
	
$todaysale2="SELECT COUNT(order_id) FROM order_table WHERE order_status='On Way'";
$exectodaysale2=mysqli_query($connect,$todaysale2);
$totalorder2="Year Remaining Order";	
	
$todaysale3="SELECT COUNT(order_id) FROM order_table WHERE order_status='Delivered'";
$exectodaysale3=mysqli_query($connect,$todaysale3);
$totalorder3="Year Completed Order";	
}
}

?>

<div class="container-fluid pt-4 px-4 text-white">
                <div class="row g-4">										
                    <?php					
					if($exectodaysale){$sale=mysqli_fetch_assoc($exectodaysale);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2" ><?php echo $totalorder ?></p>
                                <h6 class="mb-0 text-center"><?php echo $sale["COUNT(order_id)"] ?></h6>
                            </div>
                        </div>
                    </div>
					<?php
					
					if($exectodaysale1){$sale1=mysqli_fetch_assoc($exectodaysale1);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2" ><?php echo $totalorder1 ?></p>
                                <h6 class="mb-0 text-center">$<?php echo number_format($sale1["SUM(`order_price`)"],2) ?></h6>
                            </div>
                        </div>
                    </div>
					 <?php
					
					if($exectodaysale2){$sale2=mysqli_fetch_assoc($exectodaysale2);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2" ><?php echo $totalorder2 ?></p>
                                <h6 class="mb-0 text-center"><?php echo $sale2["COUNT(order_id)"] ?></h6>
                            </div>
                        </div>
                    </div>					
					 <?php
					
					if($exectodaysale3){$sale3=mysqli_fetch_assoc($exectodaysale3);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2" ><?php echo $totalorder3 ?></p>
                                <h6 class="mb-0 text-center"><?php echo $sale3["COUNT(order_id)"] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row"><div class="col-md-4"></div><div class="col-md-3">
                <form class="d-none d-md-flex ms-6" method="post">
                    <input class="form-control bg-dark border-0" type="text" placeholder="Enter invoice No." name="inv">
					<button class="btn btn-sm btn-primary" name="search" type="submit">Seacrh</button>
                </form></div><div class="col-md-3 mt-1"></div>
                    </div>
                </div>
            </div>

 									 <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"><?php echo $h?></h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white" >
                            <thead>
                                <tr id="div2">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php


								if(mysqli_num_rows($execute)>0)
								{
									while($order=mysqli_fetch_assoc($execute))
									{
if($order["order_status"]=="Cancelled")
{
	$orderbtn="<p>Cancelled</p>";
}
elseif($order["order_status"]=="On Way")
{
	$orderbtn="<p>On Way</p>";
}
elseif($order["order_status"]=="Delivered")
{
	$orderbtn="<p>Delivered</p>";
}
								?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $order["order_date"]?></td>
                                    <td>INV-<?php echo $order["order_inv_num"]?></td>
                                    <td><?php echo $order["om_fn"]?> <?php echo $order["om_ln"]?></td>
                                    <td>$<?php echo $order["order_price"] * $order["order_quantity"]?></td>
                                    <td><?php echo $order["om_pay_mode"]?></td>
                                    <td><?php echo $orderbtn?></td>
                                </tr>
								<?php } }
								else{
									echo "<tr><td colspan='7'><h3 class='text-center text-primary'>No Order Today</h3></td></tr>";
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


           

           

<?php 
mysqli_close($connect);
include("include/footer.php")?>
<?php include("include/header.php");
include("include/config.php");
?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4 text-white">
                <div class="row g-4">
					<?php
					$todaysale="SELECT SUM(`p_price`) FROM `order_table` as od INNER JOIN product as p ON od.product_id=p.p_id WHERE order_date>=CURRENT_DATE";
					$exectodaysale=mysqli_query($connect,$todaysale);
					if($exectodaysale){$sale=mysqli_fetch_assoc($exectodaysale);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2" >Today Sale</p>
                                <h6 class="mb-0">$<?php echo number_format($sale["SUM(`p_price`)"],2) ?></h6>
                            </div>
                        </div>
                    </div>
					<?php
					$todaysale2="SELECT SUM(`p_price`) FROM `order_table` as od INNER JOIN product as p ON od.product_id=p.p_id WHERE order_date>=CURRENT_DATE";
					$exectodaysale2=mysqli_query($connect,$todaysale2);
					if($exectodaysale2){$sale2=mysqli_fetch_assoc($exectodaysale2);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$<?php echo number_format($sale2["SUM(`p_price`)"],2)*20/100?></h6>
                            </div>
                        </div>
                    </div>
					<?php
					$todaysale1="SELECT SUM(`p_price`) FROM `order_table` as od INNER JOIN product as p ON od.product_id=p.p_id";
					$exectodaysale1=mysqli_query($connect,$todaysale1);
					if($exectodaysale1){$sale1=mysqli_fetch_assoc($exectodaysale1);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$<?php echo number_format($sale1["SUM(`p_price`)"],2) ?></h6>
                            </div>
                        </div>
                    </div>					
					<?php
					$todaysale3="SELECT SUM(`p_price`) FROM `order_table` as od INNER JOIN product as p ON od.product_id=p.p_id";
					$exectodaysale3=mysqli_query($connect,$todaysale3);
					if($exectodaysale3){$sale3=mysqli_fetch_assoc($exectodaysale3);}
					?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$<?php echo number_format($sale3["SUM(`p_price`)"],2)*20/100?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6 ">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
             <a class="mb-0" href="todayorder.php">Today Recent Order</a><!--<a class="mb-0" href="orders.php?today">Today Recent Order</a>-->
                       <a href="monthorder.php">Show All</a><!--<a href="orders.php?month">Show All</a>-->
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
$query="SELECT o.om_fn,o.om_ln,o.om_pay_mode,od.order_quantity,p.p_price,od.order_inv_num,od.order_date,od.order_id,od.order_status FROM order_manager as o INNER JOIN order_table as od ON o.om_id=od.orderid_fk INNER JOIN product as p ON p.p_id=od.product_id WHERE od.order_date>=CURRENT_DATE order by order_id DESC limit 8";
								$execute=mysqli_query($connect,$query);
								if(mysqli_num_rows($execute)>0)
								{
									while($order=mysqli_fetch_assoc($execute))
									{
if($order["order_status"]=="processing")
{
	$status="processing";
}
elseif($order["order_status"]=="Delivered")
{
	$status="Delivered";
}
elseif($order["order_status"]=="Cancelled")
{
	$status="Cancelled";
}
elseif($order["order_status"]=="Returned")
{
	$status="Returned";
}										
								?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $order["order_date"]?></td>
                                    <td>INV-<?php echo $order["order_inv_num"]?></td>
                                    <td><?php echo $order["om_fn"]?> <?php echo $order["om_ln"]?></td>
                                    <td>$<?php echo $order["p_price"] * $order["order_quantity"]?></td>
                                    <td><?php echo $order["om_pay_mode"]?></td>
                                    <td><?php echo $status?></td>
                                </tr>
								<?php } }else{echo "<tr><td colspan='7'><h3 class='text-primary text-center'>No Order Today</h3></td></tr>";}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4 text-white" id="div3">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="contact.php">Show All</a>
                            </div>
							<?php
							$message="select * from contact_message order by msg_id DESC limit 4";
							$messageexec=mysqli_query($connect,$message);
							if(mysqli_num_rows($messageexec)>0)
							{while($msg=mysqli_fetch_assoc($messageexec)){
							?>	
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?php echo $msg["msg_name"]?></h6>
<!--                                        <small>15 minutes ago</small>-->
                                    </div>
                                    <span><?php echo $msg["msg_subject"]?></span>
                                </div>
                            </div>
							<?php }}else{echo "<h3 class='text-primary text-center mt-5'>No Message</h3>";}?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-dark border-0" type="text" placeholder="Enter task">
                                <button type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox" checked>
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><del>Short task goes here...</del></span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->

<?php 
mysqli_close($connect);
include("include/footer.php")?>
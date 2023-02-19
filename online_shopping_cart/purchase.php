<?php
include("admin/include/config.php");
session_start();
if(isset($_POST["placeorder"]))
{
	$query="insert into order_manager (om_fn,om_ln,om_email,om_phone,om_add1,om_add2,om_country,om_city,om_state,om_zipcode,om_pay_mode
	,userid_fk) values
('".$_POST["fn"]."','".$_POST["ln"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address1"]."','".$_POST["address2"]."',
'".$_POST["country"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["cod"]."','".$_POST["userid"]."')";
	
	if(mysqli_query($connect,$query))
	{
		$Order_id=mysqli_insert_id($connect);
        $query1="insert into order_table (orderid_fk,product_id,order_quantity,order_status,order_inv_num) values 
		(?,?,?,?,?)";
		$stmt=mysqli_prepare($connect,$query1);
		if($stmt)
		{
mysqli_stmt_bind_param($stmt,"iiisi",$Order_id,$product_id,$order_quantity,$order_status,$order_inv_num);
			$count=count($_SESSION["Cart"]);
			$order_status="processing";
			$order_inv_num=rand(10000000,99999999);			
			for($i=0;$i<$count;$i++)
			{
				$order_quantity=$_SESSION["Cart"][$i]["Quantity"];
				$product_id=$_SESSION["Cart"][$i]["ID"];
				mysqli_stmt_execute($stmt);
			}
			unset($_SESSION["Cart"]);
			echo "<script>window.location='cart.php'</script>";
		}
		else
		{
			echo "<script>alert('".mysqli_error($connect)."')</script>";
		}
	}
	else
		{
			echo "<script>alert('".mysqli_error($connect)."')</script>";
		}
}
?>
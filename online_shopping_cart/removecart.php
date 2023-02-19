<?php
session_start();
if(isset($_REQUEST["index"]))
{
	if(isset($_SESSION["Cart"]))
	{
		unset($_SESSION["Cart"][$_REQUEST["index"]]);
		sort($_SESSION["Cart"]);
		echo "<script>window.location='cart.php'</script>";
	}
}
?>
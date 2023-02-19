<?php  
$page=basename($_SERVER['PHP_SELF']);

switch ($page) {
	case 'shop.php':
	if (isset($_GET['cid'])) {
		$id=$_GET['cid'];
		$q="select * from category where c_id=$id";
		$result=mysqli_query($connect,$q);
		$page_title=mysqli_fetch_assoc($result);
		$title=$page_title["c_name"];
	}else{
		$title="shop";
	}
		
		break;


		case 'category.php':
	if (isset($_GET['cid'])) {
		$id=$_GET['cid'];
		$q="select * from category where c_id=$id";
		$result=mysqli_query($connect,$q);
		$page_title=mysqli_fetch_assoc($result);
		$title=$page_title["c_name"];
	}else{
		$title=" ";
	}
		
		break;

			case 'detail.php':
	if (isset($_GET['did'])) {
		$id=$_GET['did'];
		$q="select * from product where p_id=$id";
		$result=mysqli_query($connect,$q);
		$page_title=mysqli_fetch_assoc($result);
		$title=$page_title["p_name"];
	}else{
		$title=" ";
	}
		
		break;

			case 'cart.php':
	
		$title="Shopping Cart ";

		
		break;

			case 'checkout.php':
	
		$title="Checkout Details";
	
		break;

			case 'profile.php':
	
		$title="User Profile";
	
		
		break;

			case 'editprofile.php':
	
		$title="Update Profile";
	
		
		break;

			case 'signin.php':
	
		$title="Login";
	
		
		break;


			case 'singup.php':
	
		$title="Registeration Form";
	
		
		break;




			case 'contact.php':
	
		$title="Contact us";
	
		
		break;


			case 'orderdetail.php':
	
		$title="Order Details";
	
		
		break;


			case 'fav.php':
	
		$title="Favourite Product";
	
		
		break;


	default:
		$title="Online_shopping_cart";
		break;
}

?>
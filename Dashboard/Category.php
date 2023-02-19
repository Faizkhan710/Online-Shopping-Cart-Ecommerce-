<?php

include('connect.php');

$id=$_GET['Service_Id'];

$query="Select from product_add1 where `Service_Id`='$id'";

$result=mysqli_query($conn, $query);

if($result)


{
    echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
}
?>
<?php

include('connect.php');

$id=$_GET['Id'];

$query="DELETE from product_add1 where `Id`='$id'";

$result=mysqli_query($conn, $query);

if($result)

{
    header('location:product_view.php');
}

else

{
    echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
}
?>
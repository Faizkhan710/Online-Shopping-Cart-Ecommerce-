<?php

include('connect.php');

$id=$_GET['id'];

$query="Select * from `category` where `Service_Id`='$id'";

$result=mysqli_query($conn, $query);

if($result)


{
    echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
}
?>
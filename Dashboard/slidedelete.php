<?php

include('connect.php');

$id=$_GET['id'];

$query="DELETE from images where `id`='$id'";

$result=mysqli_query($conn, $query);

if($result)

{
    header('location:SlideView.php');
}

else

{
    echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";
}
?>
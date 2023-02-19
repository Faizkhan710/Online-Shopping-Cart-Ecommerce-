<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<?php

include('connect.php');

$query="SELECT * FROM `images`";
$result=mysqli_query($conn,$query);

if(!$result)
{
echo "<script>alert('Error: ".mysqli_error($conn)."');</script>";

}
?><br><br>
<a href="projects-overview.php" class="btn btn-success">Add Slide Images</a>
<br><br>

<table class="table table-bordered">
<tr>
<th>Slide Id </th> 
<th>Upload Date</th>

<th>Action</th>

</tr>


<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['created']; ?></td>


<td>
    
<a href="slidedelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete Slide Image</a></td>

</tr>

<?php } 
?>
</table>

</body>
</html>
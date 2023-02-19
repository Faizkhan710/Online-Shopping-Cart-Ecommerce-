<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    
<?php
include('connect.php');

                if(isset($_POST['search'])){
                    ?> 
                    <table class="table table-bodered table-striped" style="width: 500px;">
                    <thead>
                        <tr>
                            <th>Product Name </th>
                            <th>Price</th>
                        </tr>
                     </thead>

                     <tbody>
                    
                    <?php
                    $keyword= $_POST['keyword'];
                    $query = mysqli_query($conn, "SELECT * FROM 'product_add' WHERE 'Name' LIKE '%$keyword%' or 'Price' LIKE '%$keyword%' ") or die (mysqli_error($conn)); 
                    $count =mysqli_num_rows($query);

                    if($count > 0) {
                        while ($fetch = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $fetch['Name']?></td>
                                <td><?php echo $fetch['Price']?></td>
                            </tr>
                            <?php 
                        }
                    } else {
                        echo "<tr><td colspan='2' class='text-danger'><center>No Result found!</center></td></tr>";
                        
                    }


                
        
               
                ?>
                </tbody>
                </table>
                <?php
                } else {
                    ?>
                    <table class="table table-bodered table-striped" style="width:500px;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $query =mysqli_query($conn,"SELECT * FROM 'product_add' ORDER BY 'Name' ASC ") or die(mysqli_error($conn));
                    while ($fetch =mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $fetch['Name']?>  </td>
                            <td><?php echo $fetch['Price']?>  </td>

                        </tr>
                        <?php
                    }
                    ?>
                    <tbody>
                </table>
                <?php
                }
                ?>

                
</body>
</html>

    
              
                
                
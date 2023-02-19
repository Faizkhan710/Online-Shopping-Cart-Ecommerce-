<?php include("include/header.php");
include("include/config.php");
$query="select p.p_id,p.p_name,p.p_price,p.p_des,p.p_quantity,p.p_image,c.c_name from product as p inner join category as c ON c.c_id=p.cid_fk";
$execute=mysqli_query($connect,$query);
if(mysqli_num_rows($execute)>0)
{
	

?>

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table text-white" id="div8">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Description</th>
											<th scope="col">Category</th>
                                            <th scope="col">Image</th>
											<th scope="col">Action</th>
                                        </tr>
                                    </thead>
									<?php
									while($product=mysqli_fetch_assoc($execute))
									{
									?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $product["p_id"]?></th>
                                            <td><?php echo $product["p_name"]?></td>
                                            <td><?php echo $product["p_price"]?></td>
                                            <td><?php echo $product["p_quantity"]?></td>
                                            <td><?php echo $product["p_des"]?></td>
											<td><?php echo $product["c_name"]?></td>
                                            <td><img src="<?php echo "Images/".$product["p_image"]?>" width="100px" height="100px"></td>
											<td>
					  <a  class="btn btn-outline-primary m-2" name="deleteproduct"> Delete </a>
                     <a class="btn btn-outline-warning m-2" href="editproduct.php?eid=<?php echo $product["p_id"]?>">Update</a>			
											</td>
                                        </tr>
                                    </tbody>
									<?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


<?php
}
else
{
	echo "<h1 class='text-center' style='margin:200px 0px 200px 0px'>No Record Found</h1>";
}
include("include/footer.php")?>
<?php 
include("include/header.php");
include("include/config.php");
$query="select * from category";
$execute=mysqli_query($connect,$query);
if(mysqli_num_rows($execute)>0)
{

?>

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table text-white" id="div5">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Image</th>
											<th scope="col">Action</th>
                                        </tr>
                                    </thead>
									<?php
									while($category=mysqli_fetch_assoc($execute))
									{
									?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $category["c_id"]?></th>
                                            <td><?php echo $category["c_name"]?></td>
                                            <td><img src="<?php echo "Images/".$category["c_image"]?>" width="100px" height="100px"></td>
											<td>
			<a type="submit" class="btn btn-outline-primary m-2" href="editcategory.php?eid=<?php echo $category["c_id"]?>">Update</a>
                                            </td></tr>
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
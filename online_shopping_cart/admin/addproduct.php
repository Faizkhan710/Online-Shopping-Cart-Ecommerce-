<?php 
include("include/header.php");
include("include/config.php");
if(isset($_POST["addproduct"]))
{
	
	$filename=$_FILES["p_image"]["name"];
	$temp=$_FILES["p_image"]["tmp_name"];
	if(move_uploaded_file($temp,"Images/".$filename))
	{
	$query="insert into product (p_name,p_price,p_des,p_quantity,p_code,p_number,p_image,cid_fk) 
	value('".$_POST["p_name"]."','".$_POST["p_price"]."','".$_POST["p_des"]."','".$_POST["p_quantity"]."','".$_POST["p_code"]."'
	,'".$_POST["p_number"]."','".$filename."','".$_POST["cid_fk"]."')";
	$execute=mysqli_query($connect,$query);
	if($execute)
	{
		$massage="Record Inserted";
	}
		else
		{
			$massage="Record Not Inserted";
		}
	}
}
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4 text-white" id="div6">
                <div class="row g-4" >
                    <div class="col-sm-12 col-xl-12">
						<form method="post" enctype="multipart/form-data">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Product</h6>
                            <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="Product Name" name="p_name">
                                <label for="floatingInput">Enter Product Name</label>
                            </div>
                            <div class="form-floating mb-3">
           <input type="text" class="form-control" id="floatingPassword" placeholder="Product Price" name="p_price">
                                <label for="floatingPassword">Enter Product Price</label>
                            </div>
							<div class="form-floating mb-3">
           <input type="number" class="form-control" id="floatingPassword" placeholder="Product Quantity" name="p_quantity">
                                <label for="floatingPassword">Enter Product Quantity</label>
                            </div>
							<div class="form-floating mb-3">
    <textarea class="form-control" placeholder="Product Description" id="floatingTextarea" style="height: 150px;" name="p_des"></textarea>
                                <label for="floatingTextarea">Enter Product Description</label>
                            </div>
						<div class="form-floating mb-3">
							<?php 
							$rand1=rand(10,99);$rand2=rand(10000,99999);
							?>
   <input type="hidden" class="form-control" id="floatingPassword" name="p_code" value="<?php echo $rand1?>">
   <input type="hidden" class="form-control" id="floatingPassword" name="p_number" value="<?php echo $rand2?>">
                        </div>	
							<div class="form-floating mb-3">
                                <select class="form-select text-white" id="div7" aria-label="Floating label select example" name="cid_fk">
									<option selected>Select Category</option>
									<?php
									$exec=mysqli_query($connect,"select * from category");
									while($category=mysqli_fetch_assoc($exec))
									{
									?>
                                    
                                    <option value="<?php echo $category["c_id"]?>"><?php echo $category["c_name"]?></option>
									<?php }?>
                                </select>
                                <label for="floatingSelect">Category</label>
                            </div>
							<div class="form-floating">
							 <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="p_image">
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                 <button type="submit" class="btn btn-outline-primary m-2" name="addproduct">Add Product</button>
                                <a class="btn btn-outline-warning m-2" href="showproduct.php">Show Product</a>
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                <p class="text-warning"><?php echo @$massage?></p>
                            </div>
							</div>    
                        </div></form>
                    </div>
                </div>
            </div>
            <!-- Form End -->


<?php include("include/footer.php")?>
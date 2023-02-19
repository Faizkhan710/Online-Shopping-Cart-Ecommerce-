<?php 
include("include/header.php");
include("include/config.php");
if(isset($_POST["addcategory"]))
{
	$filename=$_FILES["cat_image"]["name"];
	$temp=$_FILES["cat_image"]["tmp_name"];
	if(move_uploaded_file($temp,"Images/".$filename))
	{
		$query="insert into category (c_name,c_image) value('".$_POST["cat_name"]."','".$filename."')";
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
            <div class="container-fluid pt-4 px-4 text-white" id="div4">
                <div class="row g-4" >
                    <div class="col-sm-12 col-xl-12">
						<form method="post" enctype="multipart/form-data">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Category</h6>
                            <div class="form-floating mb-3">
                             <input type="text" class="form-control" id="floatingInput" placeholder="Enter Category Name" name="cat_name">
                                <label for="floatingInput">Enter Category Name</label>
                            </div>
							<div class="form-floating">
							 <div class="mb-3">
                                <label for="formFile" class="form-label">Category Image</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="cat_image">
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary m-2" name="addcategory">Add Category</button>
                                <a class="btn btn-outline-warning m-2" href="showcategory.php">Show Category</a>
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
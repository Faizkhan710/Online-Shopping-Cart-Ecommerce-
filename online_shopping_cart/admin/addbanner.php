<?php 
include("include/header.php");
include("include/config.php");
if(isset($_POST["addbanner"]))
{
	$filename=$_FILES["b_image"]["name"];
	$temp=$_FILES["b_image"]["tmp_name"];
	if(move_uploaded_file($temp,"Images/".$filename))
	{
		$query="insert into banner (b_name,b_des,b_image) 
		value('".$_POST["b_name"]."','".$_POST["b_description"]."','".$filename."')";
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
            <div class="container-fluid pt-4 px-4 text-white" id="div9">
                <div class="row g-4" >
                    <div class="col-sm-12 col-xl-12">
						<form method="post" enctype="multipart/form-data">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Banner</h6>
                            <div class="form-floating mb-3">
                             <input type="text" class="form-control" id="floatingInput" placeholder="Banner Name" name="b_name">
                                <label for="floatingInput">Banner Name</label>
                            </div>
							<div class="form-floating mb-3">
 <textarea class="form-control" placeholder="Banner Description" id="floatingTextarea" style="height: 150px;" name="b_description"></textarea>
                                <label for="floatingTextarea">Banner Description</label>
                            </div>
							<div class="form-floating">
							 <div class="mb-3">
                                <label for="formFile" class="form-label">Banner Image</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="b_image">
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary m-2" name="addbanner">Add Banner</button>
                                <a class="btn btn-outline-warning m-2" href="showbanner.php">Show Banner</a>
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
<?php 
include("include/header.php");
include("include/config.php");
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
if(isset($_POST["updatecategory"]))
{
	$filename=$_FILES["cat_image"]["name"];
	$temp=$_FILES["cat_image"]["tmp_name"];
	if(empty($_FILES["cat_image"]["name"]))
	{
		$q="update category set c_name='".$_POST["cat_name"]."',c_image='".$_POST["hidebox"]."' where c_id=$eid";
		$execute=mysqli_query($connect,$q);
		if($execute){$massage = "Record Inserted";}
		else{$massage = "Record Not Inserted";}
	}
	if(!empty($_FILES["cat_image"]["name"]))
	{
		if(move_uploaded_file($temp,"Images/".$filename))
		{
		$q="update category set c_name='".$_POST["cat_name"]."',c_image='".$filename."' where c_id=$eid";
		$execute=mysqli_query($connect,$q);
		if($execute){$massage = "Record Inserted";}
		else{$massage = "Record Not Inserted";}
		}
	}
}


?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
				<?php
	$query="select * from category where c_id=$eid";
	$exec=mysqli_query($connect,$query);
	while($category=mysqli_fetch_assoc($exec))
	{
							?>
                <div class="row g-4" >
                    <div class="col-sm-12 col-xl-6">
						<form method="post" enctype="multipart/form-data">
							
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Category</h6>
                            <div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Category Name" name="cat_name" value="<?php echo $category["c_name"]?>">
                                <label for="floatingInput">Category Name</label>
                            </div>
							<div class="form-floating">
							 <div class="mb-3">
                                <label for="formFile" class="form-label">Category Image</label>
  <input class="form-control bg-dark" type="file" id="formFile" name="cat_image" onchange="preview_image(event)">
			<input class="form-control bg-dark" type="hidden" id="formFile" value="<?php echo $category["c_image"]?>" name="hidebox">
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary m-2" name="updatecategory">Update Category</button>
                                <a class="btn btn-outline-warning m-2" href="showcategory.php">Show Category</a>
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                <p class="text-warning"><?php echo @$massage?></p>
                            </div>
							</div>
                        </div>
						
						</form>
                    </div>
					
			 <div class="col-sm-12 col-xl-6">
                       <div class="bg-secondary rounded h-100 p-4">
							<div class="form-floating">
							 <div class="mb-3">
								<h3 class="form-label text-center">Category Image</h3>
						<center><img id='output_image' src="<?php echo "Images/".$category["c_image"]?>" class="w-75 h-75"/></center>
                            </div>
							</div>
                        </div>
             </div>		
					
                </div><?php }?>
            </div>
            <!-- Form End -->
<script>
function preview_image(event){

    document.getElementById('output_image').style.display='block';
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
};
</script>

<?php
}
include("include/footer.php")?>
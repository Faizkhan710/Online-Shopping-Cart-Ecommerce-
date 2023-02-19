<?php 
include("include/header.php");
include("include/config.php");
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	if(isset($_POST["Updateproduct"]))
	{
		$filename=$_FILES["p_image"]["name"];
		$temp=$_FILES["p_image"]["tmp_name"];
		if(empty($_FILES["p_image"]["name"]))
		{
			$update="update product set 
p_name='".$_POST["p_name"]."',p_price='".$_POST["p_price"]."',p_quantity='".$_POST["p_quantity"]."',p_des='".$_POST["p_des"]."',p_image='".$_POST["hidebox"]."',cid_fk='".$_POST["cid_fk"]."' where p_id=$eid";
			$execute=mysqli_query($connect,$update);
			if($execute){$massage="Record Inserted";}
			else{$massage="Record Not Inserted";}
		}
		if(!empty($_FILES["p_image"]["name"]))
		{
			if(move_uploaded_file($temp,"Images/".$filename)){
			$update="update product set 
p_name='".$_POST["p_name"]."',p_price='".$_POST["p_price"]."',p_quantity='".$_POST["p_quantity"]."',p_des='".$_POST["p_des"]."',p_image='".$filename."',cid_fk='".$_POST["cid_fk"]."' where p_id=$eid";
			$execute=mysqli_query($connect,$update);
			if($execute){$massage="Record Inserted";}
			else{$massage="Record Not Inserted";}
		}}
	}
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
				<?php
					$query="select * from product where p_id=$eid";
					$exec=mysqli_query($connect,$query);
	while($product=mysqli_fetch_assoc($exec)){
					?>
                <div class="row g-4" >
                    <div class="col-sm-12 col-xl-6">
						<form method="post" enctype="multipart/form-data">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Product</h6>
                            <div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Product Name" name="p_name" value="<?php echo $product["p_name"]?>">
                                <label for="floatingInput">Product Name</label>
                            </div>
                            <div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingPassword" placeholder="Product Price" name="p_price" value="<?php echo $product["p_price"]?>">
                                <label for="floatingPassword">Product Price</label>
                            </div>
							<div class="form-floating mb-3">
<input type="number" class="form-control" id="floatingPassword" placeholder="Product Quantity" name="p_quantity" value="<?php echo $product["p_quantity"]?>">
                                <label for="floatingPassword">Product Quantity</label>
                            </div>
							<div class="form-floating mb-3">
<input class="form-control" placeholder="Product Description" id="floatingTextarea" style="height: 50px;" name="p_des" value="<?php echo $product["p_des"]?>"/>
                                <label for="floatingTextarea">Product Description</label>
                            </div>
							<div class="form-floating mb-3">
								
					<?php
					$q="select * from category";			
					$ex=mysqli_query($connect,$q);
		echo "<select class='form-select' id='floatingSelect' aria-label='Floating label select example' name='cid_fk'>";
		while($row=mysqli_fetch_assoc($ex))
		{
			if($row["c_id"]==$product["cid_fk"])
			{
				echo "<option selected value='{$row['c_id']}'>{$row['c_name']}</option>";
			}
			else
			{
				echo "<option value='{$row['c_id']}'>{$row['c_name']}</option>";
			}
		}
		echo "</select>";
					?>			
                                <label for="floatingSelect">Category</label>
                            </div>
							<div class="form-floating">
							 <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="p_image" onchange="preview_image(event)">
			<input class="form-control bg-dark" type="hidden" id="formFile" name="hidebox" value="<?php echo $product["p_image"]?>">
                            </div>
							</div>
							<div class="form-floating">
							 <div class="mb-3">
                                 <button type="submit" class="btn btn-outline-primary m-2" name="Updateproduct">Update Product</button>
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
					
					
					<div class="col-sm-12 col-xl-6">
                       <div class="bg-secondary rounded h-100 p-4">
							<div class="form-floating">
							 <div class="mb-3">
								<h3 class="form-label text-center">Category Image</h3>
						<center><img id='output_image' src="<?php echo "Images/".$product["p_image"]?>" class="w-75 h-75"/></center>
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
include("include/footer.php")
?>
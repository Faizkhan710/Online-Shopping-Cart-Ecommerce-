<?php
 session_start();
if(!isset($_SESSION["user_id"]))
{
    header("location:signin.php?cart");
    $_SESSION["log"]="Please Login to Add into Cart";
}
      

if(isset($_SESSION["user_id"])){
$uid= $_SESSION["user_id"];

}

 include("fe_include/header.php");
 include("admin/include/config.php");

 $q="select * from user_table where user_id=$uid";
 $result=mysqli_query($connect,$q);
while ($row=mysqli_fetch_assoc($result)) {
?>



			<div class="container"> <div class="content-wrapper pb-0">
           <!--  <div class="col-lg-6">
              <input type="hidden" name="">

            </div> -->
   <div class="col-lg-12 grid-margin" > <div class="card"> <div class="card-body"> 
<center><img src="<?php echo "img/profile/".$row["user_image"]?>" width="200px" height="200px" class="rounded-circle"><br/> 
<a href="editprofile.php?proid=<?php echo $row["user_id"]?>" style="font-size:20px ;">Edit Profile<i class="mdi mdi-border-color"></i></a></center>
                    	
                    

                    <br><br>


                    
 
 <form class="form-sample"> <div class="row"> <div class="col-md-6"> <div
 class="form-group row"> <label class="col-sm-3 col-form-label"
 style="font-weight: 500;">First Name</label> <div class="col-sm-9"> <input
 type="text" readonly  class="form-control" value="<?php echo $row
 ["user_fn"] ?>" style="background-color:#fff; " /> </div> </div> </div> <div
 class="col-md-6"> <div class="form-group row"> <label class="col-sm-3
 col-form-label" style="font-weight: 500;">Last Name</label> <div
 class="col-sm-9"> <input type="text" class="form-control" readonly
 value="<?php echo $row["user_ln"] ?>" style="background-color:#fff; " />
 </div> </div> </div> </div> <div class="row"> <div class="col-md-6"> <div
 class="form-group row"> <label class="col-sm-3
 col-form-label"style="font-weight: 500;">Email</label> <div
 class="col-sm-9"> <input type="text" class="form-control" readonly
 value="<?php echo $row["user_email"] ?>" style="background-color:#fff; " />
 </div> </div> </div> <div class="col-md-6"> <div class="form-group row">
 <label class="col-sm-3 col-form-label" style="font-weight:
 500;">Password</label> <div class="col-sm-9"> <input type="text"
 class="form-control"  readonly readonly value="<?php echo $row
 ["user_password"] ?>" style="background-color:#fff; " /> </div> </div>
 </div> </div>

                      <div class="row"> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight:
                      500;">Mobile</label> <div class="col-sm-9"> <input
                      type="text" class="form-control"  readonly value="<?php
                      echo $row
                      ["user_phone"] ?>" style="background-color:#fff; " />
                      </div> </div> </div> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight: 500;">Zip
                      Code</label> <div class="col-sm-9"> <input type="text"
                      class="form-control"  readonly value="<?php echo $row
                      ["user_zipcode"] ?>" style="background-color:#fff; " />
                      </div> </div> </div> </div>

                      <div class="row"> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight: 500;">Address
                      1</label> <div class="col-sm-9"> <input type="text"
                      class="form-control" readonly  value="<?php echo $row
                      ["user_add1"] ?>" style="background-color:#fff; " />
                      </div> </div> </div> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight: 500;">Address
                      2</label> <div class="col-sm-9"> <input type="text"
                      class="form-control" readonly  value="<?php echo $row
                      ["user_add2"] ?>" style="background-color:#fff; " />
                      </div> </div> </div> </div>

                      <div class="row"> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight:
                      500;">Country</label> <div class="col-sm-9"> <input
                      type="text" class="form-control"  readonly value="<?php
                      echo $row
                      ["user_country"] ?>" style="background-color:#fff; " />
                      </div> </div> </div> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight: 500;">City</label>
                      <div class="col-sm-9"> <input type="text"
                      class="form-control" readonly value="<?php echo $row
                      ["user_city"] ?>" style="background-color:#fff; " />
                      </div> </div> </div> </div>

                      <div class="row"> <div class="col-md-6"> <div
                      class="form-group row"> <label class="col-sm-3
                      col-form-label" style="font-weight: 500;">State</label>
                      <div class="col-sm-9"> <input type="text"
                      class="form-control" readonly value="<?php echo $row
                      ["user_state"] ?>" style="background-color:#fff; " />
                      </div> </div> </div>
                       
                       

                      </div>

    </form>



                  </div> </div> </div>

           
         
          </div> </div>
        <!-- main-panel ends -->
<?php 
}

 ?>

<?php include("fe_include/footer.php") ?>
			
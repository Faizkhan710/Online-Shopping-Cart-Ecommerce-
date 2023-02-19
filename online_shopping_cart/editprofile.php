<?php 
 session_start();
if(!isset($_SESSION["user_id"]))
{
    header("location:signin.php");
}
      

if(isset($_SESSION["user_id"])){
$uid= $_SESSION["user_id"];

}
include("fe_include/header.php");
 include("admin/include/config.php");

if (isset($_GET['proid'])) {
if (isset($_POST['up_btn'])) {

$id=$_GET['proid'];
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$email=$_POST['uemail'];
$pass=$_POST['upass'];
$mobile=$_POST['umob'];
$add1=$_POST['uadd1'];
$add2=$_POST['uadd2'];
$zip=$_POST['uzip'];
$coun=$_POST['ucountry'];
$city=$_POST['ucity'];
$state=$_POST['ustate'];
$profile_hide=$_POST['profile_hide'];
$filename=$_FILES["profile_image"]["name"];
$temp=$_FILES["profile_image"]["tmp_name"];	
	
if(empty($_FILES["profile_image"]["name"]))
{
$query="update user_table set user_fn='".$fn."',user_ln='".$ln."', user_email='".$email."', user_password='".$pass."', user_phone='".$mobile."', user_add1='".$add1."', user_add2='".$add2."', user_zipcode='".$zip."', user_country='".$coun."', user_city='".$city."', user_state='".$state."' , user_image='".$profile_hide."'where user_id='".$id."' " ;
$exc=mysqli_query($connect,$query);
}
if(!empty($_FILES["profile_image"]["name"]))
{
if(move_uploaded_file($temp,"img/profile/".$filename))
{}
$query="update user_table set user_fn='".$fn."',user_ln='".$ln."', user_email='".$email."', user_password='".$pass."', user_phone='".$mobile."', user_add1='".$add1."', user_add2='".$add2."', user_zipcode='".$zip."', user_country='".$coun."', user_city='".$city."', user_state='".$state."' , user_image='".$filename."'where user_id='".$id."' " ;
$exc=mysqli_query($connect,$query);
}

}
	}


$q="select * from user_table where user_id= $uid";
$result=mysqli_query($connect,$q);

	
	while ($row=mysqli_fetch_assoc($result)) {
?>



			<div class="container">
          <div class="content-wrapper pb-0">
            
             <div class="col-12 grid-margin" >
                <div class="card">
                  <div class="card-body">
          <center><img src="<?php echo "img/profile/".$row["user_image"]?>" width="200px" height="200px" class="rounded-circle"></center>
                    <br><br>

 <form class="form-sample" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"  style="font-weight: 500;">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row["user_fn"] ?>" name="fname"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"  value="<?php echo $row["user_ln"] ?>"name="lname"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Email</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="uemail" value="<?php echo $row["user_email"] ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Password</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="upass" value="<?php echo $row["user_password"] ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Mobile</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="umob" value="<?php echo $row["user_phone"] ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;" >Zip Code</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="uzip" value="<?php echo $row["user_zipcode"] ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Address 1</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="uadd1" value="<?php echo $row["user_add1"] ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Address 2</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="uadd2" value="<?php echo $row["user_add2"] ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Country</label>
                            <div class="col-sm-9">
                            	<select class="form-control" name="ucountry">
                                <option selected   value="<?php echo $row["user_country"] ?>"><?php echo $row["user_country"] ?></option>
                                <option value="India">India</option>
                                <option value="China">China</option>
                                <option value="Srilanka">Srilanka</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Canada">Canada</option>
								<option value="Australia">Australia</option>
								<option value="England">England</option>
								<option value="United State">United States</option>
                            </select>
                             
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ucity" value="<?php echo $row["user_city"] ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">State</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ustate" value="<?php echo $row["user_state"] ?>"/>
                            </div>
                          </div>
                        </div>
						  
					<div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-weight: 500;">Select Image</label>
                            <div class="col-sm-9">
                            <input class="form-control" type="file" name="profile_image">
							<input type="hidden" value="<?php echo $row["user_image"]?>" name="profile_hide">
                            </div>
                          </div>
                        </div></div>	  
                     <div class="row">  
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                              <button class="btn btn-outline-primary m-2" type="submit" name="up_btn">Update<i class="mdi mdi-border-color"></i></button>	

                              <a class="btn btn-outline-info m-2" href="profile.php" >Profile<i class="mdi mdi-account"></i></a>

                            </div>
                          </div>
                        </div>

                      </div>


                    </form>




                  </div>
                </div>
              </div>

           
         
          </div>
        </div>
        <?php 
}

 ?>
        <!-- main-panel ends -->

<?php include("fe_include/footer.php") ?>
      

			
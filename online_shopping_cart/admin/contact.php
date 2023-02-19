<?php include("include/header.php");
include("include/config.php");
?>

<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
              <h6 class="mb-0">Messages</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white" >
                            <thead>
                                <tr id="div2">
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Massage</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
							$message="select * from contact_message";
							$messageexec=mysqli_query($connect,$message);
							if(mysqli_num_rows($messageexec)>0)
							{while($msg=mysqli_fetch_assoc($messageexec)){
							?>
                                <tr>
                                    <td><?php echo $msg["msg_name"]?></td>
                                    <td><?php echo $msg["msg_email"]?></td>
                                    <td><?php echo $msg["msg_subject"]?></td>
                                    <td><?php echo $msg["msg_message"]?></td>
                                </tr>
						<?php }}else{echo "<tr><td class='mt-5' colspan='4'><h3 class='text-primary text-center'>No Message</h3></td></tr>";}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php 
mysqli_close($connect);
include("include/footer.php")?>
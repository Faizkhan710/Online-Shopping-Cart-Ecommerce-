<?php 
include("include/header.php");
include("../admin/include/config.php");
if(isset($_GET["did"]))
{
	$id=$_GET["did"];
$q="SELECT o.om_id,o.om_fn,o.om_ln,o.om_phone,o.om_add1,o.om_add2,o.om_pay_mode,od.order_price,od.order_quantity,od.order_inv_num,od.order_date,od.op_code,od.op_number,od.order_id,od.order_name,od.order_price,od.order_quantity,od.order_status FROM order_manager as o INNER JOIN order_table as od ON o.om_id=od.orderid_fk WHERE o.om_id=$id";
$execute=mysqli_query($connect,$q);	
}
if($execute)
{
	$detail=mysqli_fetch_assoc($execute);
}
?>
<style>
.span1{
	font-size: 80px;
	color: #FFD333;
	text-shadow: 3px 3px #3D464D;
	}
.span2{
	font-size: 80px;
	color: #3D464D;
	text-shadow: 3px 3px #FFD333;
	}
</style>


<div class="container-fluid pt-4 px-4"><div class="row"><div class="col-md-2"></div><div class="col-md-8" style="display: inline">
	<div class="row"><div class="col-md-3"></div><div class="col-md-6">
	<p style="color:#FFFFFF;float: left" class="mt-3">Print and Download Invoice as PDF</p>
	<button type="button" class="btn btn-outline-warning m-2" onclick="printDiv('pdf','Title')" style="float:left">Print Invoice</button>
	</div><div class="col-md-3"></div></div>	
	</div><div class="col-md-2"></div></div>
                <div class="row g-4"><div class="col-sm-12 col-xl-2"></div>
                    <div class="col-sm-12 col-xl-8" id="pdf">
                        <div class=" rounded h-100 p-4" style="background-color: #FFFFFF">
                            <h3 class="mb-2 text-center border-bottom" style="color:#000000">Order Detail</h3>
							<div class=" border-bottom">
			<h6 class="mb-2 text-center" style="color:#000000">Order Number : <?php echo $detail["op_code"]."-".$detail["op_number"]."-".$detail["order_inv_num"]?></h6>
							</div>

							<div class="row">
							<div class="col-md-6" style="border-right: 2px solid black">
                                <div class="testimonial-item">                                  
                               <div class="row mt-5"><div class="col-lg-2"></div>
                              <div class="col-lg-8">
				             <h1 class="text-center"><span class="span1">Arts</span><span class="span2">Zilla</span></h1>
                             </div><div class="col-lg-2"></div>          
                               </div>
                                </div>
							</div>
							<div class="col-md-6 ">
                                <div class="testimonial-item">                                  
                            <h5 class="mb-1 border-bottom" style="color:#000000">Name : <?php echo $detail["om_fn"]." ".$detail["om_ln"]?></h5>
									<h5 class="mb-1 border-bottom" style="color:#000000">Phone No. : <?php echo $detail["om_phone"]?></h5>
									<h5 class="mb-1 border-bottom" style="color:#000000">Address 1 : <?php echo $detail["om_add1"]?></h5>
									<h5 class="mb-1 border-bottom" style="color:#000000">Address 2 : <?php echo $detail["om_add2"]?></h5>
									<h5 class="mb-1 border-bottom" style="color:#000000">Date : <?php echo $detail["order_date"]?></h5>
									<h5 class="mb-1" style="color:#000000">Payment : <?php echo $detail["om_pay_mode"]?></h5>
                                </div>
							</div>
                        </div>
                        <div class="border-top border-bottom">
	<h6 class="mb-2 text-center  mt-3" style="color:#000000">Invoice Number : <?php echo $detail["order_inv_num"]?></h6>
						</div>
	
						
							
                        <div class="rounded h-100" style="color:#FFFFFF">
                            <table class="table" style="color:#000000">
                                <thead>
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $detail["order_name"]?></td>
                                        <td><?php echo $detail["order_quantity"]?></td>
                                        <td>$<?php echo number_format($detail["order_price"],2)?></td>
                                    </tr>
									<tr>
                                        <td colspan="2"><h6 style="color:#000000">Total</h6></td>
                  <td><h6 style="color:#000000">$<?php echo number_format($detail["order_price"] * $detail["order_quantity"],2) ?></h6></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>	
						
						</div>
                    </div><div class="col-sm-12 col-xl-2"></div>
                </div>
            </div>

<script>
var doc = new jsPDF();

 function saveDiv(divId, title) {
 doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
 doc.save('div.pdf');
}

function printDiv(divId,
  title) {

  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}
</script>

<?php include("include/footer.php");?>
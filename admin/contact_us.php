<?php  
	include 'includes/header.php';

	if(isset($_GET['page_id'])){
		$page_id=$_GET['page_id'];
	}
	$org_id=$_SESSION["id"];
	
?>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- DataTales Example -->
			<div class="row ">
				<div class="col-sm-12 col-md-8 col-lg-8 ">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
						  <h6 class="m-0 font-weight-bold text-primary">Contact Us <?php if(isset($msg)){echo $msg ;}?></h6>
						 
						</div>
						<div class="card-body">
							<?php
								$sql = "SELECT * FROM `pag_dtl01` where PAD_PACD=$page_id and PAD_ORCD=$org_id";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								if(isset($_GET['status'])){
									if($_GET['status']==200){
							?>	
							<div class="c-msg">
							<div class="alert alert-success myMessage">
							  	<strong>Success!</strong> Indicates a successful or positive action.
							</div>	
							</div>
								<?php } } ?>
								<form method="post" action="contact_us_a.php" enctype="multipart/form-data">
									<div class="row pb-0" >
										<div class="col col-md-12 form-group">
    										<!--<label for="formGroupExampleInput">Page Title</label>-->
											<input type="text" class="form-control form-control-sm" name="title" value="<?php echo isset($row)? $row['PAD_TITL']:'';?>" placeholder="Enter Title Here">
										</div>
									</div>
									<div class="row pb-0" >
										<div class="col col-md-12 form-group">
    										<!--<label for="formGroupExampleInput">Googlemap Api Key</label>-->
											<input type="text" class="form-control form-control-sm" name="go_api" value="<?php echo isset($row)? $row['PAD_API']:'';?>" placeholder="Enter Googlemap Api Key">
										</div>
									</div>
									<div class="row pb-0">
									    <div class="col col-md-6 form-group">
									    <!--<label for="formGroupExampleInput">Address 1</label>-->
									      <input type="text" class="form-control form-control-sm" placeholder="Enter Address Line1 Here" name="addr1" value="<?php echo isset($row)? $row['PAD_ADSO']:'';?>">
									    </div>
									    <div class="col">
									    	<!--<label for="formGroupExampleInput">Address 2</label>-->
									      <input type="text" class="form-control form-control-sm" placeholder="Enter Address2 Here" name="addr2" value="<?php echo isset($row)? $row['PAD_ADST']:'';?>">
									    </div>
									</div>
									<div class="row pb-0">
									    <div class="col col-md-6 form-group">
									    	<!--<label for="formGroupExampleInput">Email-Id</label>-->
									      <input type="email" class="form-control form-control-sm" placeholder="Enter Email-id  Here" name="email" value="<?php echo isset($row)? $row['PAD_MAIL']:'';?>">
									    </div>
									    <div class="col col-md-6 form-group">
									    	<!--<label for="formGroupExampleInput">Phone No.</label>-->
									      <input type="tel" class="form-control form-control-sm" placeholder="Enter Phone No Here" name="phone" onblur="checkNumber(this)" id="txt_contact_no" value="<?php echo isset($row)? $row['PAD_PHN']:'';?>">
									      <p id="pherror" style="color:red;"></p>
									    </div>
									</div>
									<div class="row " style="padding-top: 15px;margin-bottom:-30px;margin-top: -34px;">
										<div class=" col" align="center">
											<input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo isset($row)?$row['PAD_PACD']:'';?>">
											<input type="hidden" class="form-control form-control-sm" value="<?php echo $_GET['page_id'];?>" name="page_id">

											<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" >
											<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
										</div>
										
									</div>
								</form>	
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 ">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
						   <h6 class="m-0 font-weight-bold text-primary">Contact Us Map</h6>
						 </div>
						 <div class="card-body">
							<div class="form-group col-md-12 custom-file" >
								<div id="googleMap" style="width:100%;height:200px;"></div>
							</div>
						</div>
					</div>	
						 
				</div>
			</div>
			
		</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
	  <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

function checkNumber(check){   
        var a = document.getElementById("txt_contact_no").value;
        //var x=check.which;
        //var x = a.charCode;
        var x = a.keyCode;
        if(!(a >= 48 || a <= 57)){
            text ="enter only numbers";
            document.getElementById("pherror").innerHTML=text;
            return false;
        }       
        else if(a=="" || a==null){
            text ="field is blank";
             document.getElementById("pherror").innerHTML=text;
            return false;
        }else if(a.length <= 9){
        	text ="Phone no should not be below 10 characters";
        	 document.getElementById("pherror").innerHTML=text;
            return false;
            
        }else
         document.getElementById("pherror").innerHTML="";
// if no is more then the value 
        /*else if (a.length <= 9)
        {
            alert("enter minimum 10 characters");
            return false;
        }*/
        //alert("done");
        return true; 
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<?php  include 'includes/footer.php';?>
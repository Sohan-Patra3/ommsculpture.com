<?php  
	include 'includes/header.php';
	// include '../includes/database.php';
	if(isset($_GET['page_id'])){
		$page_id=$_GET['page_id'];
	}
	$org_id=$_SESSION['id'];
	
?>
<style>
.btn-light {
    color: #3a3b45;
    background-color: #dbdde2;
    border-color: #f8f9fc;
	font-size: 19px;
    font-weight: 600;
    text-align: left;
}
.btn-primary {
	font-size: 19px;
    font-weight: 600;
}
</style>
<!--<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script>-->
<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- DataTales Example -->
			<div class="row ">
				<div class="col-sm-12 col-md-8 col-lg-12 ">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
						  <h6 class="m-0 font-weight-bold text-primary">Menu Setting</h6>
						 
						</div>
						<div class="card-body">
							<?php
								$sql = "SELECT * FROM `pag_mst01` where PAM_PACD=14";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								$sql1 = "SELECT * FROM `pag_mst01` where PAM_PACD=9";
								$result1 = mysqli_query($conn, $sql1);
								$row1 = mysqli_fetch_assoc($result1);
								if(isset($_GET['status'])){
									if($_GET['status']==200){
							?>	
							<div class="c-msg">
							<div class="alert alert-success myMessage">
							  	<strong>Success!</strong> Menu Updated successful.
							</div>	
							</div>
								<?php } } ?>
								<form method="post" action="menu_setting_a.php" enctype="multipart/form-data">
									
									<div class="row pb-1">
									    <div class="col col-md-4 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Service</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="service"  value="<?=$row['PAM_PANM'];?>" style="padding: 0px;" required>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Sub Service</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="sub_service"  value="<?=$row1['PAM_PANM'];?>" style="padding: 0px;" required>
												</div>
											</div>
									    </div>
									   
									</div>
									
									
									
									
									
									<div class="row " style="padding-top: 15px;margin-bottom:-30px;margin-top: -34px;">
										<div class=" col" align="center">
											<input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo isset($row)? $row['id']:'Add';?>">
											<input type="hidden" class="form-control form-control-sm" name="pageid" value="<?php echo $page_id ;?>">
											<input type="submit" name="submit"  value="Update" class="btn btn-info btn-sm" >
											<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
										</div>
										
									</div>
								</form>	
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
	  <script type="text/javascript">
	  	function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#blah').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
    
		$("#imgInp").change(function(){
			readURL(this);
		});
		
	 
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
   <script>
    CKEDITOR.replace('editor1', {
      extraPlugins: 'uicolor'
    });
  </script>
<?php  include 'includes/footer.php';?>
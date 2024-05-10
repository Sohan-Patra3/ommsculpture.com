<?php  
	include 'includes/header.php';
	// include '../includes/database.php';
	if(isset($_GET['page_id'])){
		$page_id=$_GET['page_id'];
	}
	 $org_id=$_SESSION['id'];
	
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
						  <h6 class="m-0 font-weight-bold text-primary">Privacy policy</h6>
						 
						</div>
						<div class="card-body">
							<?php
								$sql = "SELECT * FROM `pag_dtl01` where PAD_PACD=$page_id and PAD_ORCD=$org_id";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
							?>				
								<form method="post" action="privacy_policy_a.php" enctype="multipart/form-data">
									<div class="form-group col-md-12">
										<div class="col-md-12 ">
											<?php
												if(isset($_GET['status'])){
													if($_GET['status'] ==200){
											?>	
											<div class="c-msg">
												<div class="alert alert-success myMessage">
													<strong>Success!</strong>Privacy policy  Added Successfully !.
												</div>	
											</div>
										  <?php }	}
										  if(isset($_GET['status'])){
													if($_GET['status'] ==201){
											?>	
										  <div class="c-msg">
												<div class="alert alert-warning myMessage">
													<strong>Success!</strong>Privacy policy Updated Successfully !.
												</div>	
											</div>
										  <?php }}?>
										</div>
									</div>
									<div class="form-group col-md-12">
										
										<div class="col-md-12 ">
											<!-- <label for="title">Title</label> -->
											<input type="text" class="form-control form-control-sm" name="title" value="<?php echo isset($row)? $row['PAD_TITL']:'';?>" placeholder="Enter Title Here"style="padding-bottom: 10px;">
											
										</div>
									</div>
									<div class="form-group col-md-12">
										<div class="col-12">
											<textarea class="form-control form-control-sm" style="height:400px !important;" name="data"><?php echo isset($row)? $row['PAD_DESC']:'';?></textarea>
										</div>
									</div>
									<div class="form-group col-md-12" style=" margin-bottom:-10px">
										<div class=" col-md-12" align="center">
											<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" >
											<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
										</div>
										
									</div>
						
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-4 ">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							 <h6 class="m-0 font-weight-bold text-primary">Privacy policy Image</h6>
						 </div>
						<div class="card-body">
							<div class="form-group col-md-12">
								<div class="col-md-12 ">
									<input type="file" id="imgInp" name="photo" class="form-control form-control-sm" value="">
								
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="col-md-12 ">
									<div class="form-group col-md-12 custom-file" >
										<img src="uploadimage/<?php echo isset($row)?$row['PAD_IMG']:'';?>" height="50px" width="70px" id="blah" style="padding-top: 10px;">
												
										<input type="hidden" class="form-control" name="oldimg" value="<?php echo isset($row)?$row['PAD_IMG']:'';?>">
										<input type="hidden" class="form-control" name="id" value="<?php echo isset($row)?$row['PAD_PACD']:'';?>">
										<input type="hidden" class="form-control" value="<?php echo $_GET['page_id'];?>" name="page_id">
										
										<!-- <p align="center" style="margin-top: 20px;"><button type="submit" class="btn btn-success" name="submit"><?php echo isset($row)?"update":"submit";?></button></p> -->
									</div>
								</div>
							</div>
							
						</div>
					</div>	
					</form>		 
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
	  </script>
  <script>tinymce.init({ selector:'textarea' });</script>
<?php  include 'includes/footer.php';?>
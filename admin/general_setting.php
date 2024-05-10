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
						  <h6 class="m-0 font-weight-bold text-primary">General Setting</h6>
						 
						</div>
						<div class="card-body">
							<?php
								$sql = "SELECT * FROM `general_setting` where page_id=$page_id and org_id=$org_id";
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
								<form method="post" action="general_setting_a.php" enctype="multipart/form-data">
									<div class="row pb-3">
										<div class="col-3">
											<button  class="btn btn-primary" style="width: 385px;">Background Color</button>
										</div>
										<div class="col-3">
											<button  class="btn btn-primary" style="width: 385px;">Font Size</button>
										</div>
										<div class="col-3">
											<button  class="btn btn-primary" style="width: 385px;">Font Familly</button>
										</div>
										<div class="col-3">
											<button  class="btn btn-primary" style="width: 385px;">Color</button>
										</div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Top Bar</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="top_bar_bgcolor"  value="<?php echo isset($row)? $row['topbar_bgcolor']:'#139e81';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Top Bar</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="top_bar_fontsize" placeholder="Font Size( 15px )"  value="<?php echo isset($row)? $row['topbar_fontsize']:'14px';?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Top Bar</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="top_bar_fontfamily" placeholder="Font Familly"  value="<?php echo isset($row)? $row['topbar_fontfamily']:"'Open Sans', sans-serif";?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Top Bar</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="top_bar_color"  value="<?php echo isset($row)? $row['topbar_color']:'#FFFFFF';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Bar</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="menu_bar_bgcolor"  value="<?php echo isset($row)? $row['menubar_bgcolor']:'#ffffff';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Bar</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="menu_bar_fontsize" placeholder="Font Size ( 15px )"  value="<?php echo isset($row)? $row['menubar_fontsize']:'14px';?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Bar</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="menu_bar_fontfamily" placeholder="Font Familly"  value="<?php echo isset($row)? $row['menubar_fontfamily']:"'Open Sans', sans-serif";?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Bar</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="menu_bar_color"  value="<?php echo isset($row)? $row['menubar_color']:'#646464';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Footer</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="footer_bgcolor"  value="<?php echo isset($row)? $row['footer_bgcolor']:'#1a1c1d';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Footer</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="footer_fontsize" placeholder="Font Size ( 15px )" value="<?php echo isset($row)? $row['footer_fontsize']:'14px';?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Footer</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="footer_fontfamily" placeholder="Font Familly " value="<?php echo isset($row)? $row['footer_fontfamily']:"'Open Sans', sans-serif";?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Footer </label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="footer_color"  value="<?php echo isset($row)? $row['footer_color']:'#ffffff';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Admin Menu </label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="admin_menu_bgcolor"  value="<?php echo isset($row)? $row['adminmenu_bgcolor']:'#4e73df';?>" style="padding: 0px;" >
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Title</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="menu_title_fontsize" placeholder="Font Size ( 15px )"  value="<?php echo isset($row)? $row['menutitle_fontsize']:'20px';?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Title</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="menu_title_fontfamily" placeholder="Font Familly" value="<?php echo isset($row)? $row['menutitle_fontfamily']:"'Roboto', sans-serif";?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Menu Title </label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="menu_title_color"  value="<?php echo isset($row)? $row['menutitle_color']:'#222222';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Admin Header</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="admin_header"  value="<?php echo isset($row)? $row['adminheader_bgcolor']:'#ffffff';?>" style="padding: 0px;" >
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Title</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="page_title_fontsize" placeholder="Font Size ( 15px )"  value="<?php echo isset($row)? $row['pagetitle_fontsize']:'24px';?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Title</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="page_title_fontfamily" placeholder="Font Familly"  value="<?php echo isset($row)? $row['pagetitle_fontfamily']:"'Roboto', sans-serif";?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Title </label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="page_title_color"  value="<?php echo isset($row)? $row['pagetitle_color']:'#139e81';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Admin Menu Color</label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="admin_menu_color"  value="<?php echo isset($row)? $row['adminmenu_color']:'#ffffff';?>" style="padding: 0px;" >
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<!--<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Content</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="page_content_fontsize" placeholder="Font Size ( 15px )" value="<?php echo isset($row)? $row['pagecontent_fontsize']:'14px';?>">
												</div>
											</div>-->
									    </div>
										<div class="col col-md-3 form-group">
									    	<!--<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Content</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="page_content_fontfamily" placeholder="Font Familly"  value="<?php echo isset($row)? $row['pagecontent_fontfamily']:"'Open Sans', sans-serif";?>">
												</div>
											</div>-->
									    </div>
										<div class="col col-md-3 form-group">
											<!--<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Content </label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="page_content_color"  value="<?php echo isset($row)? $row['pagecontent_color']:'#646464';?>" style="padding: 0px;">
												</div>
											</div>-->
									    </div>
									</div>
									<div class="row pb-1">
									    <div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Logo Height</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="logo_height"  placeholder="Logo Height ( 15px )" value="<?php echo isset($row)? $row['logo_height']:'80px';?>" style="padding: 0px;" >
												</div>
											</div>
									    </div>
									    <div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Logo Width</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="logo_width" placeholder="Logo Width ( 15px )" value="<?php echo isset($row)? $row['logo_width']:'140px';?>">
												</div>
											</div>
									    </div>
										<!--<div class="col col-md-3 form-group">
									    	<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Content</label>
												<div class="col-sm-6">
												  <input type="text" class="form-control" name="page_content_fontfamily" placeholder="Font Familly"  value="<?php echo isset($row)? $row['pagecontent_fontfamily']:"'Open Sans', sans-serif";?>">
												</div>
											</div>
									    </div>
										<div class="col col-md-3 form-group">
											<div class="form-group row">
												<label for="inputText" class="col-sm-4 col-form-label">Page Content </label>
												<div class="col-sm-6">
												  <input type="color" class="form-control" name="page_content_color"  value="<?php echo isset($row)? $row['pagecontent_color']:'#646464';?>" style="padding: 0px;">
												</div>
											</div>
									    </div>-->
									</div>
									
									<div class="row " style="padding-top: 15px;margin-bottom:-30px;margin-top: -34px;">
										<div class=" col" align="center">
											<input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo isset($row)? $row['id']:'Add';?>">
											<input type="hidden" class="form-control form-control-sm" name="pageid" value="<?php echo $page_id ;?>">
											<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" >
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
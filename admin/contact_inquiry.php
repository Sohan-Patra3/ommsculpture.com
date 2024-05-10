<?php  
	include 'includes/header.php';
	$sql ="SELECT * FROM `contact` ORDER BY id desc";
	$query =mysqli_query($conn,$sql);
	$row =mysqli_fetch_assoc($query);
	$mode ="Edit";

?>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
        <!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- DataTales Example -->
			<div class="row ">
				<div class="col-sm-12 col-md-12 col-lg-12 ">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Inquire Details </h6>
						</div>
						<div class="card-body">
							<?php	if(isset($_GET['status'])){
								if($_GET['status'] ==203){
							?>
								<div class="c-msg">
							<div class="alert alert-danger myMessage">
								<strong>Success!</strong> Data Deleted successfully !.
							</div>	
							</div>
							<?php }}?>	
							<?php	if(isset($_GET['status'])){
									if($_GET['status'] ==300){
							?>	
								<div class="c-msg">
							<div class="alert alert-warning myMessage">
								<strong>Success!</strong> Error occured ! try again.
							</div>	
							</div>
							<?php }}?>	
							<div class="table-responsive ">	
								<!-- On rows -->
								<table class="table table-bordered table-sm" id="example" width="100%" cellspacing="0">
								  <thead class="myTable">
								    <tr>
								      <th >Sl No</th>
								      <th>Date</th>
								      <th>Name</th>
								      <th >Phone</th>
								      <th >Email</th>
								      <th >Subject</th>
								      <th >Message</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php
								  	$sl =1;
										$sql = "SELECT * FROM `contact` ORDER BY id DESC";
										$result = mysqli_query($conn, $sql);
										while($row = mysqli_fetch_assoc($result)){
									?>
								    <tr>
								      <th nowrap><?php echo $sl ;?></th>
								      <td nowrap><?php echo date("d-m-Y", strtotime($row['date_time'])); ?></td>
								      <td nowrap><?php echo $row['name'] ;?></td>
									  <td nowrap><?php echo $row['phone'] ;?></td>
									  <td nowrap><?php echo $row['email'] ;?></td>
									  <td nowrap><?php echo $row['subject'] ;?></td>
									  <td nowrap><?php echo $row['message'] ;?></td>
								      
								    </tr>
								   <?php $sl++; }?>
								  </tbody>
								</table>
							</div>
						</div>
					</div>	
				</div>
				<!--<div class="col-sm-12 col-md-4 col-lg-4 ">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
						  <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($editid)? $mode:'Add';?>	Image category</h6>
						 
						</div>
						<div class="card-body">
							<?php
								if(isset($_GET['editid'])){
									$editId =$_GET['editid'];
									$sql = "SELECT * FROM `cat_mst01` where CAM_CACD=$editId";
								}
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								
							?>	
							<form method="post" action="image_category_a.php" enctype="multipart/form-data">
									<div class="form-group col-md-12">
										<div class="col-md-12 ">
										<?php
												if(isset($_GET['status'])){
													if($_GET['status'] ==200){
											?>	
											<div class="c-msg">
												<div class="alert alert-success myMessage">
													<strong>Success!</strong> Image category Added Successfully !.
												</div>	
											</div>
										  <?php }	}
										  if(isset($_GET['status'])){
													if($_GET['status'] ==201){
											?>	
										  <div class="c-msg">
												<div class="alert alert-warning myMessage">
													<strong>Success!</strong> Image category Updated Successfully !.
												</div>	
											</div>
										  <?php }}?>
										</div>
									</div>
									<div class="form-group col-md-12">
										<div class="col-md-12 ">
    										<!--<label for="formGroupExampleInput">Category Title</label>-->
											<!--<input type="text" class="form-control form-control-sm" name="title" value="<?php echo isset($editId)? $row['CAM_CANM']:'';?>" placeholder="Enter Category Title Here"style="padding-bottom: 10px;">
										</div>
									</div>
									<div class="row" style="padding-top: 1px;margin-bottom:-30px">
										<div class=" col" align="center">
											<input type="hidden" class="form-control" name="id" value="<?php echo isset($editId)?$row['CAM_CACD']:'';?>">
											<input type="hidden" class="form-control" value="<?php echo isset($editId)?$row['CAM_ORCD']:'';?>" name="page_id"> 
											<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" >
											<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
										</div>
										
									</div>
							</form>	
									
						</div>
					</div>
				</div>-->
			</div>
		</div>
        <!-- /.container-fluid -->
    </div>
      <!-- End of Main Content -->
      
      <script type="text/javascript">

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Print all (not just selected)',
                exportOptions: {
                    modifier: {
                        selected: null,
                        page: 'current',
						columns: ':visible',
                    }
                }
            }
        ],
        select: true
    } );

</script>
<script>
	function delit(i){
		var c =confirm("Are you sure want to deldete ?");
		if(c ==true)
			window.location="<?php echo $_SERVER['PHP_SELF'];?>?delitid="+i;
		else
			window.location="<?php echo $_SERVER['PHP_SELF'];?>"
	}

</script>


  <script>tinymce.init({ selector:'textarea' });</script>
<?php  include 'includes/footer.php';?>
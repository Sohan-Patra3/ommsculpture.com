<?php  
include 'includes/header.php';
$org_id=$_SESSION["id"];
$page_id=$_GET['page_id'];
if(isset($_GET['editid'])){
	$editid =$_GET['editid'];
	$sql ="SELECT * FROM pag_dtl01 WHERE PAD_PGCD =$editid";
	$query =mysqli_query($conn,$sql);
	$erow =mysqli_fetch_assoc($query);
	$mode ="Edit";
}
?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="row ">
		<div class="col-sm-12 col-md-8 col-lg-8 ">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Latest News Lists </h6>
				</div>
				<div class="card-body ">
				<?php	if(isset($_GET['status'])){
							if($_GET['status'] ==203){
					?>	
					<div class="c-msg">
						<div class="alert alert-danger myMessage">
							<strong>Success!</strong> News Deleted successfully !.
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
						<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
							<thead class="myTable">
								<tr>
									<th>Sl No</th>
									<th>News Headline</th>
									<th>News Link</th>
									<th>News Files</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$sl =1;
								$sql = "SELECT * FROM `pag_dtl01` WHERE PAD_PACD=$page_id and PAD_ORCD=$org_id and PAD_CANC=0 ORDER BY PAD_PGCD DESC";
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result)){
							?>
								<tr align="">
									<th scope="row"><?php echo $sl ;?></th>
									<td><?php echo $row['PAD_TITL'] ;?></td>
									<td><?php if($row['PAD_DESC'] == ""){ echo "Not Avaliable";}else{ echo $row['PAD_DESC'];} ;?></td>
									<td>
									<a href="uploadimage/<?php echo $row['PAD_IMG'] ?>" target="_blank">view file</a>
									</td>
									<td>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>?editid=<?php echo $row['PAD_PGCD'];?>&page_id=<?php echo $page_id ;?>"><i class="fa fa-edit"></i></a> 
										<a href="noticeboard_a.php?delitid=<?php echo $row['PAD_PGCD'];?>" onclick="return confirm('Are you sure to remove <?php echo $row['PAD_TITL']." ?" ;?>');"><i class="fa fa-trash text-warning"></i></a> 
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-sm-12 col-md-4 col-lg-4 ">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary"><?php echo isset($editid)? $mode:'Add';?>		Latest News</h6>
				</div>
				<div class="card-body">
								
					<form method="post" action="latestnews_a.php" enctype="multipart/form-data">
					<div class="form-group col-md-12">
						<div class="col-md-12 ">
							<?php
							if(isset($_GET['status'])){
								if($_GET['status'] ==200){
							?>	
							<div class="c-msg">
							<div class="alert alert-success myMessage">
								<strong>Success!</strong> News Added Successfully !.
							</div>
							</div>							
							<?php } } ?>	
							<?php	if(isset($_GET['status'])){
									if($_GET['status'] ==201){
							?>	
							<div class="c-msg">
							<div class="alert alert-warning myMessage">
								<strong>Success!</strong> News Updated Successfully !.
							</div>	
							</div>
							<?php }}?>
						</div>
					</div>
						<div class="form-group col-md-12">
							<div class="col-md-12 ">
								<!-- <label for="title">Title</label> -->
								<input type="text" class="form-control form-control-sm" name="title" value="<?php echo isset($editid)? $erow['PAD_TITL']:'';?>" placeholder="Enter Notice Name Here" required>
							</div>
						</div>
						<div class="form-group col-md-12 pt-2" >
							<div class="col-md-12 ">
								<input type="text" class="form-control form-control-sm" name="link" value="<?php echo isset($editid)? $erow['PAD_DESC']:'';?>" placeholder="Enter External Link">
							</div>
						</div>
						<div class="form-group col-md-12 custom-file pt-2" >
							<div class="col-md-12 ">
								<input type="file" id="imgInp" name="photo" class="form-control form-control-sm" value="">
								<small>File format(jpg,png,jpeg,pdf,excel,docs)</small>
									
								<!--<img src="uploadimage/<?php echo isset($editid)?$erow['PAD_IMG']:'';?>" alt="Files Image" height="100" width="100%" id="blah" style="padding-top: 10px; ">-->
									
								<input type="hidden" class="form-control" name="oldimg" value="<?php echo isset($editid)?$erow['PAD_IMG']:'';?>">
								<input type="hidden" class="form-control" name="id" value="<?php echo isset($editid)?$erow['PAD_PGCD']:'';?>">
								<input type="hidden" class="form-control" value="<?php echo $_GET['page_id'];?>" name="page_id">
							</div>
							<!-- <p align="center" style="margin-top: 20px;"><button type="submit" class="btn btn-success" name="submit"><?php echo isset($row)?"update":"submit";?></button></p> -->
						</div>
						<div class="form-group col-md-12 " style="padding-top: 15px; margin-bottom:-10px">
							<div class=" col-md-12" align="center">
								<input type="submit" name="submit"  value="<?php echo isset($editid)?"Update":"Publish";?>" class="btn btn-info btn-sm">
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

		/*function delit(i){
			var c =confirm("Are you sure want to remove ?");
			if(c ==true){
				window.location.href="services_delete.php?delitId="+i;
			}else{
				window.location="<?php echo $_SERVER['PHP_SELF'];?>";
			}
		}*/

$(document).on("click","#remove",function() {

	$.ajax({
		url:"services_delete.php",
		type:"POST",
		cache:false,
		data:{
			type:1,
			id:$(this).attr("data-id")
		},
		success: function(dataResult){
			
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				alert("Success");
				location.reload();
			}
		}
	});
});

</script>
<script>tinymce.init({ selector:'textarea' });</script>
<?php  include 'includes/footer.php';?>

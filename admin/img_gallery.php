<?php  
	include 'includes/header.php';
	
	if(isset($_GET['page_id']))
	{
		$page_id=$_GET['page_id'];
	}
	
	$org_id=$_SESSION["id"];
?>

	<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- DataTales Example -->
		<div class="row ">
			<div class="col-sm-12 col-md-8 col-lg-8 ">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary" >Image Gallery Preview</h6>
					</div>
					<div class="row pb-0">
						<div class="col-lg-12 pl-4 pr-4 pt-2 ">
							<?php
							$sql = "SELECT * FROM `cat_mst01`";
							$result = mysqli_query($conn, $sql);
							if(isset($_GET['status']))
							{
								if($_GET['status']==203)
								{
									?>
									<div class="c-msg">
										<div class="alert alert-danger myMessage">
											<strong>Success!</strong> Image Deleted Successfully !.
										</div>	
									</div>
									<?php 
								} 
							} 
							?>
						</div>
					</div>
						
					<div class="form-group col-md-12 custom-file" >
						<?php 
						$sql = "SELECT DISTINCT g.GAD_CACD,c.CAM_CANM FROM `gal_dtl01` as g, `cat_mst01` as c WHERE g.GAD_CACD=c.CAM_CACD and g.GAD_ORCD=$org_id";
						$result = mysqli_query($conn, $sql);
						while($row =mysqli_fetch_assoc($result))
						{
							$cat_id= $row['GAD_CACD'];
							
							$sql = "SELECT * FROM `gal_dtl01` WHERE `GAD_ORCD`=$org_id AND GAD_CACD = $cat_id";
							$result1 = mysqli_query($conn, $sql);
							$count_img=mysqli_num_rows($result1);
										
							$sql = "SELECT GAD_GACD, GAD_IMG FROM `gal_dtl01` WHERE `GAD_ORCD`=$org_id AND GAD_CACD = $cat_id";
							echo '<div class="col-md-12 custom-file mt-2 bg-light" style="padding-left: 17px;padding-top: 5px;" ><span class="label label-primary myLabel">'.$row['CAM_CANM'].'</span></div>'; 
							$result2 =mysqli_query($conn, $sql);
							while($r =mysqli_fetch_array($result2))
							{ 									
								?>
								<div class="col-md-1 thumbnail pb-3" style="float:left;" >
									<a  href="delete.php?imgId=<?php echo $r['GAD_GACD'];?>"   class="remove close text-danger">×</a>
									<img src="uploadimage/<?php echo $org_id;?>/<?php echo $r['GAD_IMG'];?>" alt="categories" class="img-fluid" style="height:70px;width:93px;">									
									<div style="clear:both;"></div>									
								</div>
								<?php 
							} 
						} ?>
					</div>					 
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 ">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Add Image Gallery</h6>					 
					</div>
					<div class="card-body">
						<?php
						$sql = "SELECT * FROM `cat_mst01`";
						$result = mysqli_query($conn, $sql);
						?>	
						<form method="post" action="img_gallery_a.php" enctype="multipart/form-data">
							<div class="form-group col-md-12">
								<div class="col-md-12 ">
									<?php
									if(isset($_GET['status']))
									{
										if($_GET['status'] ==200)
										{
											?>	
											<div class="c-msg">
												<div class="alert alert-success myMessage">
													<strong>Success!</strong> Image Added Successfully !.
												</div>	
											</div>
											<?php 
										}
									} 
									?>
								</div>
							</div>
							<div class="form-group col-md-12 " >
								<div class="col-md-12 ">
									 <label for="sel1">Select Image Category:</label>
									  <select class="form-control form-control-sm" id="sel1" name="img_cat">
										<option value="">Select Category</option>
										<?php while($row = mysqli_fetch_assoc($result)):?>
										<option value="<?php echo $row['CAM_CACD'];?>"><?php echo $row['CAM_CANM'];?></option>
										<?php endwhile ;?>
									  </select>
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="col-md-12 ">
									<label for="formGroupExampleInput">Choose Image</label>
									<input type="file" id="selectedFile" style="display: none;" />
									<input type="button" value="Browse..."  id="show_modal"/>
									<br>
									<!--<input type="file" id="gallery-photo-add" id="show_modal"  name="image[]" class="form-control form-control-sm" value="" multiple>-->
									<small class="text-danger">Image height Width (500 X 750) px. Image Size (400) kb.Image format(jpg,png) </small>
								</div>								
							</div>
							<div class="form-group col-md-12">
								<div class="col-md-12" >
									<div class="gallery"></div>
								</div>
							</div>
							<div class="form-group col-md-12"  style="padding-top: 1px;margin-bottom:-10px">
								<div class="col-md-12" align="center">
									<input type="hidden" class="form-control"  id="id" name="id" value="<?php echo isset($row)?$row['PAD_PACD']:'';?>">
									<input type="hidden" class="form-control" id="page_id" name="page_id" value="<?php echo isset($_GET['page_id']) ? $_GET['page_id'] : ''; ?>">
									<!--<input type="hidden" class="form-control"  id="page_id" value="<?php echo $_GET['page_id'];?>" name="page_id">-->
									<!--<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" >
									<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" > -->
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
	
<!--  Modal -->
 <div class="modal" id="cropView" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document" >
		<div class="modal-content">
			<div class="card-header bg-info" >
				<h5 class="modal-title text-white">Crop Image
					<button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h5>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3" style="padding:1%;">
							<strong>Select image to crop:</strong>
							<form method="post">
								<input type="file" id="image" name="image">
								<input type="hidden" id="product_code" value="">
								<button class="btn btn-success btn-upload-image" style="margin-top:2%;" id="btn-upload-image" type="button">Publish</button>
							</form>							
						</div>
						<div class="col-md-9 text-center">
							<div id="crop-select"></div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Main Content -->

<style type="text/css">
	.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}a.label:focus,a.label:hover{color:#fff;text-decoration:none;cursor:pointer}.label:empty{display:none}.btn .label{position:relative;top:-1px}.label-default{background-color:#777}.label-default[href]:focus,.label-default[href]:hover{background-color:#5e5e5e}.label-primary{background-color:#337ab7}
	.label-success{background-color:#5cb85c}
	.label-info{background-color:#5bc0de}
</style>

<script>
	$(function() 
	{
		// Multiple images preview in browser
		var imagesPreview = function(input, placeToInsertImagePreview) 
		{
			if (input.files) 
			{
				var filesAmount = input.files.length;
				for (i = 0; i < filesAmount; i++) 
				{
					var reader = new FileReader();
					reader.onload = function(event) 
					{
						$($.parseHTML('<img height="100" width="100" style="padding:10px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
					}
					reader.readAsDataURL(input.files[i]);
				}
			}
		};

		$('#gallery-photo-add').on('change', function() 
		{
			imagesPreview(this, 'div.gallery');
		});
	});

  	$(document).on("click","#remove",function() 
	{
    	var img_gallery_id = $(this).attr("data-id");		
		$.ajax(
		{
			url: "img_gallery_delete.php",
			type: "POST",
			cache: false,
			data:
			{
				type:1,
				id: img_gallery_id
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200)
				{
					alert("Success");
					location.reload();
				}
			}
		});
	});
</script>

<script>
	$(document).ready(function()
	{
		$(document).on("click", "#show_modal", function() 
		{
			var id=$(this).attr("data-id");
			$("#image").val('');
			$('#cropView').modal('show'); 
		});
	});

	var globalFileName; //global file name of uploaded file
	var globalFileType; //global file type of uploaded file
	//var url;
	
	$(function () 
	{
		// Initialise CropSelect
		$('#crop-select').CropSelectJs();

		// Handle file select change
		$('#image').on('change', function() 
		{
			if (this.files && this.files[0]) 
			{
				var reader = new FileReader();
				reader.onload = function (e) 
				{
					$('#crop-select').CropSelectJs('setImageSrc', e.target.result);
				};
				reader.readAsDataURL(this.files[0]);
				globalFileName = this.files[0].name;
				globalFileType = this.files[0].type;
			}
		});
		
		$("#btn-upload-image").on('click', function()
		{
			var cat=$('#sel1 option:selected').val();
			var id=$('#id').val();
			var page_id=$('#page_id').val();
			if(cat =='')
			{
				alert('Select Image Category');
				$("#sel1").focus();
				$("#sel1").css('border-color','red');
				$('#cropView').modal('hide'); 
				return false;
			}
			else
			{
				//note promise not supported in IE, so to support IE, don't define a separate method, and send ajax postback in canvas.toBlob(callback)
				getCroppedImageBlob().then(function(blob)
				{
					//console.log(blob);
					//send blob to server
					var formData = new FormData();
					formData.append('file', blob, globalFileName );
					formData.append("img_cat", cat);
					formData.append("page_id", page_id);
					formData.append("id", id);
							
				   //sending data to the server
					$.ajax(
					{
						type: "POST",
						url: "ajax_crop_image.php",
						data: formData,
						dataType: "json",
						contentType: false,
						processData: false,
						success: function (response) 
						{
							//var response = JSON.parse(response);
							var pageid=response.page_id;
							var status=response.status;
							if(status == 200)
							{
								$('.c-msg').show();
							}
							else if(status == 201)
							{
								$('.u-msg').show();
							}
							else if(status == 300)
							{
								$('.e-msg').show();
							}
							const url="img_gallery.php?status="+status;
							console.log(url);
							window.location.href=url;
						},
						error: function (jqXHR, reason, ex) 
						{
							console.log(jqXHR.responseText);
						}
					});
				});
			}
		});
	});

	function getCroppedImageBlob()
	{
		//create an image with displayed width and height, from img.crop-image image tag
		var displayedImage = document.createElement('img');
		var cropImage = document.querySelector('.crop-image');
		displayedImage.src = cropImage.src;
		displayedImage.width = cropImage.width;
		displayedImage.height = cropImage.height;
		
		//create a canvas to be referrenced next contains displayedImage
		var displayedCanvas = document.createElement('canvas');
		displayedCanvas.style.display = "none";
		displayedCanvas.width = cropImage.width;
		displayedCanvas.height = cropImage.height;
		displayedCanvas.getContext('2d').drawImage(displayedImage, 0, 0, cropImage.width, cropImage.height);

		//create a canvas that takes cropped image data
		var canvas = document.createElement('canvas');
		canvas.style.display = "none";
		
		//div.crop-selection.animated div tag displays the crop selection
		var cropSelectionAnimated = document.querySelector('.crop-selection.animated');
		var width = parseFloat(cropSelectionAnimated.style.width.replace(/[^-\d|.\\]/g, ''));
		var height = parseFloat(cropSelectionAnimated.style.height.replace(/[^-\d|.\\]/g, ''));
		var x = parseFloat(cropSelectionAnimated.style.left.replace(/[^-\d|.\\]/g, ''));
		var y = parseFloat(cropSelectionAnimated.style.top.replace(/[^-\d|.\\]/g, ''));
		
		canvas.width = width;
		canvas.height = height;
		canvas.getContext("2d").drawImage(displayedCanvas, x, y, width, height, 0, 0, width, height);

		//croppedImg is a display of cropped image for test
		//$("#croppedImg").attr('src', canvas.toDataURL("image/jpg"));

		return new Promise(function(resolve) 
		{
			//toBlob polyfill
			if (!HTMLCanvasElement.prototype.toBlob) 
			{
				Object.defineProperty(HTMLCanvasElement.prototype, 'toBlob', 
				{
					value: function (callback, type, quality) 
					{
						var dataURL = this.toDataURL(type, quality).split(',')[1];
						setTimeout(function () 
						{
							var binStr = atob(dataURL),
							len = binStr.length,
							arr = new Uint8Array(len);
							for (var i = 0; i < len; i++) 
							{
								arr[i] = binStr.charCodeAt(i);
							}
							callback(new Blob([arr], { type: type || 'image/png' }));
						});
					}
				});
			}

			canvas.toBlob(function(blob)
			{
				blob.name = globalFileName;
				resolve(blob);
			}, globalFileType);
		});
	}
</script>

<?php  
	include 'includes/footer.php';
?>
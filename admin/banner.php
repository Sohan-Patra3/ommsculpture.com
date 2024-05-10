<?php
include 'includes/header.php';
if(isset($_GET['page_id']))
{
	$page_id=$_GET['page_id'];
}
$org_id=$_SESSION["id"];
if(isset($_GET['editid']))
{
	$editid=$_GET['editid'];
	$sql ="SELECT * FROM banner_mst WHERE BAM_BACD =$editid";
	$query =mysqli_query($conn,$sql);
	$erow =mysqli_fetch_assoc($query);
}
?>
<style type="text/css">
/*#jcrop img{
	width: 100%;
  	max-width: 400px;
  	height: auto;
}*/

</style>
<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script> -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Banner</h6>

                </div>
                <div class="card-body">
                    <?php
						$sql = "SELECT * FROM `cat_mst01`";
						$result = mysqli_query($conn, $sql);
					?>
                    <form method="post" action="banner_a.php" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <div class="col-md-12 ">

                                <div class="c-msg" style="display: none">
                                    <div class="alert alert-success myMessage">
                                        <strong>Success!</strong>Banner Image Added Successfully !.
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group col-md-12 ">
                            <div class="col-md-12 ">
                                <label for="sel1">Display Order&nbsp;:</label>
                                <input type="number" class="form-control form-control-sm" id="dip_order"
                                    name="dip_order" value="<?php echo isset($editid)?$erow['BAM_ORD']:'';?>" required
                                    min="1" />
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12 ">

                                <label for="formGroupExampleInput">Choose Image</label>
                                <input type="file" id="file-input" required />
                                <br>
                                <small class="text-danger">Image height Width (1440 X 570) px. Image Size (400) kb.Image format(jpg,png,jpeg)</small>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <div id="crop-select" style="width: 1439px;"></div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <div class="gallery" style="width: 1439px;"></div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="padding-top: 1px;margin-bottom:-10px">
                            <div class="col-md-12" align="center">
                                <input type="hidden" name="pageid" id="page_id" value="<?php echo $page_id;?>" />
                                <input type="hidden" name="id" id="id"
                                    value="<?php echo isset($editid)?$erow['BAM_BACD']:'';?>" />
                                <input type="hidden" name="oldimg" id="oldimg"
                                    value="<?php echo isset($editid)?$erow['BAM_IMG']:'';?>" />
                                <input type="hidden" name="type" value="<?php echo isset($editid)?2:1;?>" id="type">
                                <!-- <?php if(isset($editid)){?>
								<input type="submit" name="submit"  value="<?php echo isset($editid)?"Update":"Add";?>" class="btn btn-info btn-sm" onclick="upload()" >
								<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
								<?php }else{?>
									<input type="submit" name="submit"  value="<?php echo isset($editid)?"Update":"Add";?>" class="btn btn-info btn-sm" onclick="upload()" >
									<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
								<?php } ?> -->

                                <input type="button" name="submit" value="<?php echo isset($editid)?"Update":"Add";?>"
                                    class="btn btn-info btn-sm" id="btnSave">
                                <input type="reset" name="reset" value="Reset" class="btn btn-danger btn-sm">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>






        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="row ">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Banner Images </h6>
                        </div>
                        <div class="card-body ">
                            <?php	if(isset($_GET['status'])){
							if($_GET['status'] ==203){
					?>
                            <div class="c-msg">
                                <div class="alert alert-danger myMessage">
                                    <strong>Success!</strong> Banner Image Deleted successfully !.
                                </div>
                            </div>
                            <?php }}?>

                            <div class="e-msg" style="display: none">
                                <div class="alert alert-warning myMessage">
                                    <strong>Success!</strong> Error occured ! try again.
                                </div>
                            </div>

                            <div class="u-msg" style="display: none">
                                <div class="alert alert-warning myMessage">
                                    <strong>Success!</strong>Banner Image Updated Successfully !.
                                </div>
                            </div>

                            <div class="table-responsive ">
                                <!-- On rows -->
                                <table class="table table-bordered table-sm" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead class="myTable">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Order No</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
								$sl =1;
								$sql = "SELECT * FROM `banner_mst` WHERE BAM_ORCD=$org_id AND BAM_CANC=0 ORDER BY BAM_BACD DESC";
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result)){
							?>
                                        <tr align="">
                                            <th scope="row"><?php echo $sl ;?></th>
                                            <td><?php echo $row['BAM_ORD'] ;?></td>
                                            <td>
                                                <img src="uploadimage/banner/<?php echo $row['BAM_IMG'] ?>"
                                                    style="height:50px; width:80px"><a
                                                    href="uploadimage/banner/<?php echo $row['BAM_IMG'] ?>"
                                                    target="_blank">view
                                                    file</a>
                                            </td>
                                            <td>
                                                <a
                                                    href="<?php echo $_SERVER['PHP_SELF'];?>?editid=<?php echo $row['BAM_BACD'];?>&page_id=<?php echo $page_id ;?>"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="banner_a.php?delitid=<?php echo $row['BAM_BACD'];?>"
                                                    onclick="return confirm('Are you sure to remove ?');"><i
                                                        class="fa fa-trash text-warning"></i></a>
                                            </td>
                                        </tr>
                                        <?php $sl++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mx-auto">

        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!-- End of Main Content -->


<style type="text/css">
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em
}

a.label:focus,
a.label:hover {
    color: #fff;
    text-decoration: none;
    cursor: pointer
}

.label:empty {
    display: none
}

.btn .label {
    position: relative;
    top: -1px
}

.label-default {
    background-color: #777
}

.label-default[href]:focus,
.label-default[href]:hover {
    background-color: #5e5e5e
}

.label-primary {
    background-color: #337ab7
}

.label-success {
    background-color: #5cb85c
}

.label-info {
    background-color: #5bc0de
}
</style>

<script>
var globalFileName; //global file name of uploaded file
var globalFileType; //global file type of uploaded file
//var url;
$(function() {

    // Initialise CropSelect
    $('#crop-select').CropSelectJs();

    // Handle file select change
    $('#file-input').on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#crop-select').CropSelectJs('setImageSrc', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
            globalFileName = this.files[0].name;
            globalFileType = this.files[0].type;
        }
    });
    $("#btnSave").on('click', function() {
        var dip_order = $('#dip_order').val();
        var pageid = $('#page_id').val();
        var id = $('#id').val();
        var oldimg = $('#oldimg').val();
        //note promise not supported in IE, so to support IE, don't define a separate method, and send ajax postback in canvas.toBlob(callback)
        getCroppedImageBlob().then(function(blob) {
            //console.log(blob);
            //send blob to server
            var formData = new FormData();
            formData.append('file', blob, globalFileName);
            formData.append("dip_order", dip_order);
            formData.append("pageid", pageid);
            formData.append("id", id);
            formData.append("oldimg", oldimg);
            //sending data to the server
            $.ajax({
                type: "POST",
                url: "banner_action.php",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    //var response = JSON.parse(dataResult);
                    var pageid = response.page_id;
                    var status = response.status;
                    if (status == 200) {
                        $('.c-msg').show();
                    } else if (status == 201) {
                        $('.u-msg').show();
                    } else if (status == 300) {
                        $('.e-msg').show();
                    }
                    const url = "banner.php?status=" + status + "&page_id=" +
                        pageid;
                    window.location.href = url;

                    //console.log(response);
                },
                error: function(jqXHR, reason, ex) {
                    console.log(jqXHR.responseText);
                }
            });

        });


    });
});

function getCroppedImageBlob() {

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

    return new Promise(function(resolve) {

        //toBlob polyfill
        if (!HTMLCanvasElement.prototype.toBlob) {
            Object.defineProperty(HTMLCanvasElement.prototype, 'toBlob', {
                value: function(callback, type, quality) {
                    var dataURL = this.toDataURL(type, quality).split(',')[1];
                    setTimeout(function() {
                        var binStr = atob(dataURL),
                            len = binStr.length,
                            arr = new Uint8Array(len);
                        for (var i = 0; i < len; i++) {
                            arr[i] = binStr.charCodeAt(i);
                        }
                        callback(new Blob([arr], {
                            type: type || 'image/png'
                        }));
                    });
                }
            });
        }


        canvas.toBlob(function(blob) {
            blob.name = globalFileName;
            resolve(blob);
        }, globalFileType);

    });

}

/*
$(function(){
	// Multiple images preview in browser
	var imagesPreview = function(input, placeToInsertImagePreview){
		if (input.files){
			var filesAmount = input.files.length;
			for (i = 0; i < filesAmount; i++){
				var reader = new FileReader();
				reader.onload = function(event){
					$($.parseHTML('<img height="100" width="100" style="padding:10px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
				}
				reader.readAsDataURL(input.files[i]);
			}
		}
	};

	$('#gallery-photo-add').on('change', function(){
		imagesPreview(this, 'div.gallery');
	});

});

$(document).on("click","#remove",function(){
	var img_gallery_id = $(this).attr("data-id");
	$.ajax({
		url: "img_gallery_delete.php",
		type: "POST",
		cache: false,
		data:{
			type:1,
			id: img_gallery_id
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
*/
</script>


<?php  include 'includes/footer.php';?>
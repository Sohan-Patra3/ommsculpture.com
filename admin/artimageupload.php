<?php  
	error_reporting(0);
	
	include 'includes/header.php';
	
	$org_id=$_SESSION["id"];
	$page_id=$_GET['page_id'];
	
	if(isset($_GET['editid']))
	{
		$editid =$_GET['editid'];
		$sql ="SELECT * FROM gal_dtl01 WHERE GAD_GACD =$editid";
		$query =mysqli_query($conn,$sql);
		$row =mysqli_fetch_assoc($query);
		$cacd=$row['GAD_CACD'];
		$mode ="Edit";
	}
?>

<!--<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=8n49ayx4h4vqjcfzu18975x8dd4wnocpvzlz1e4qs5s5tw8g"></script>-->
<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row ">
        <div class="col-sm-12 col-md-8 col-lg-8 ">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($editid)? $mode:'Add';?> Art Image
                    </h6>
                </div>
                <div class="card-body">
                    <form method="post" action="artimageupload_a.php" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <div class="col-md-12 ">
                                <?php
										if(isset($_GET['editid']))
										{
											$editid =$_GET['editid'];
											$sql = "SELECT * FROM `gal_dtl01` where GAD_GACD=$editid and GAD_ORCD=$org_id";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
										}									
										if(isset($_GET['status']))
										{
											if($_GET['status'] ==200)
											{
												?>
                                <div class="c-msg">
                                    <div class="alert alert-success myMessage">
                                        <strong>Success!</strong> Art Image Added Successfully !.
                                    </div>
                                </div>
                                <?php 
											}	
										}
										if(isset($_GET['status']))
										{
											if($_GET['status'] ==201)
											{
												?>
                                <div class="c-msg">
                                    <div class="alert alert-warning myMessage">
                                        <strong>Success!</strong> Art Image Updated Successfully !.
                                    </div>
                                </div>
                                <?php 
											}
										}
										?>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-4 ">
                                    <select class="form-control" name="category_id" required id="category_id"
                                        onChange="getsubcategory(this.value,<?php echo $editid ?>);">
                                        <option value="">Select Art Category</option>
                                        <?php
												$sql1 = "SELECT * FROM `category_mst` where orcd=$org_id and status=1";
												$result1 = mysqli_query($conn, $sql1);
												while($row1 = mysqli_fetch_assoc($result1))
												{
													?>
                                        <option value="<?=$row1['category_id'];?>"
                                            <?php if($row1['category_id']==$row['GAD_CACD']){ echo "selected";}?>>
                                            <?=$row1['name'];?></option>
                                        <?php
												}
												?>
                                    </select>
                                </div>

                                <div class="col-sm-4 ">
                                    <select class="form-control" name="subcat_id" required id="subcat_id">
                                        <option value="">Select Art Sub Category</option>
                                        <?php
												$sql2 ="SELECT PAD_PGCD,PAD_TITL FROM pag_dtl01 WHERE PAD_CACD=$cacd AND PAD_STAT=1 ORDER BY PAD_TITL ASC ";
												$result2 = mysqli_query($conn, $sql2);
												while($row2 = mysqli_fetch_assoc($result2))
												{
													?>
                                        <option value="<?=$row2['PAD_PGCD'];?>"
                                            <?php if($row2['PAD_PGCD']==$row['GAD_SBCACD']){ echo "selected";}?>>
                                            <?=$row2['PAD_TITL'];?></option>
                                        <?php
												}
												?>
                                    </select>
                                </div>

                                <div class="col-sm-4 ">
                                    <select class="form-control" name="imgtype" required id="imgtype">
                                        <option value="">Select Image Type</option>
                                        <?php
												$sql1 = "SELECT IMT_ID,IMT_NAME FROM `IMG_TYP` ORDER BY IMT_ID";
												$result1 = mysqli_query($conn, $sql1);
												while($row1 = mysqli_fetch_assoc($result1))
												{
													?>
                                        <option value="<?=$row1['IMT_ID'];?>"
                                            <?php if($row1['IMT_ID']==$row['GAD_IMGTP']){ echo "selected";}?>>
                                            <?=$row1['IMT_NAME'];?></option>
                                        <?php
												}
												?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-md-12 ">
                                <!-- <label for="title">Title</label> -->
                                <input type="text" class="form-control form-control-sm " name="title" id="title"
                                    value="<?php echo isset($editid)? $row['GAD_TITL']:'';?>"
                                    placeholder="Enter Image Title Name Here" required>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-12">
                                <textarea id="editor1" class="form-control form-control-sm"
                                    style="height:250px !important;"
                                    name="data"><?php echo isset($editid)? $row['GAD_DESC']:'';?></textarea>
                            </div>
                        </div>
                        <?php 
								if(isset($editid))
								{
									?>
                        <div class="form-group col-md-12 ex-class" style="  margin-bottom:-10px">
                            <div class=" col-md-12 btn-add" align="center">
                                <input type="submit" name="submit"
                                    value="<?php echo isset($editid)?"Update":"Publish";?>" class="btn btn-info btn-sm">
                                <input type="reset" name="reset" value="Reset" class="btn btn-danger btn-sm">
                            </div>
                        </div>
                        <?php 
								} 
								?>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 ">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($editid)? $mode:'Add';?> Art Image
                        For Upload</h6>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <div class="col-md-12 ">
                            <!--<input type="file" id="imgInp" name="photo" class="form-control form-control-sm"  value="">-->
                            <label for="formGroupExampleInput">Choose Image</label>
                            <input type="file" id="selectedFile" style="display: none;" />
                            <input type="button" value="Browse..." id="show_modal" />
                            <br>
                            <small>File format(jpg,png,jpeg)</small>
                            <input type="hidden" class="form-control" name="oldimg" id="oldimg"
                                value="<?php echo isset($editid)?$row['GAD_IMG']:'';?>">
                            <input type="hidden" class="form-control" name="id" id="id"
                                value="<?php echo isset($editid)?$row['GAD_GACD']:'';?>">
                            <input type="hidden" class="form-control" value="<?php echo $_GET['page_id'];?>"
                                name="page_id" id="page_id">
                            <input type="hidden" name="type" value="<?php echo isset($editid)?2:1;?>" id="type">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-12 ">
                            <div class="form-group col-md-12 custom-file"
                                style="display:<?php echo isset($editid)?"block":"none";?>;">
                                <img src="uploadimage/<?php echo isset($editid)?$row['GAD_IMG']:'';?>"
                                    alt="Service Image" height="50px" width="70px" id="blah"
                                    style="padding-top: 10px; padding-bottom:10px">
                                <!-- <p align="center" style="margin-top: 20px;"><button type="submit" class="btn btn-success" name="submit"><?php echo isset($row)?"update":"submit";?></button></p> -->
                            </div>
                        </div>
                    </div>
                    <?php 
							if(isset($editid))
							{
								?>
                    <!--<div class="form-group col-md-12 ex-class" style="<?php echo isset($editid)?"margin-top:60px;":""?>  margin-bottom:-10px">
									<div class=" col-md-12 btn-add" align="center">
										<input type="submit" name="submit"  value="<?php echo isset($editid)?"Update":"Publish";?>" class="btn btn-info btn-sm" >
										<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
									</div>								
								</div>-->
                    <?php 
							} 
							?>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Art Image list </h6>
                </div>
                <div class="card-body">
                    <?php if(isset($_GET['status']))
							{
								if($_GET['status'] ==203)
								{
									?>
                    <div class="c-msg">
                        <div class="alert alert-danger myMessage">
                            <strong>Success!</strong> Art Image Deleted successfully !.
                        </div>
                    </div>
                    <?php 
								}
							}
							?>
                    <div class="table-responsive ">
                        <!-- On rows -->
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="myTable">
                                <tr align="">
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Art Category</th>
                                    <th scope="col">Art Sub Category</th>
                                    <th scope="col">Title</th>
                                    <!--<th scope="col" width="60%">Service Description</th>-->
                                    <th scope="col">Art Image</th>
                                    <th scope="col">Image Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
										$sl =1;
										$sql = "SELECT GAD_GACD,GAD_PGCD,GAD_ORCD,GAD_CACD,GAD_SBCACD,GAD_TITL,GAD_DESC,GAD_IMG,GAD_IMGTP,GAD_STAT,GAD_CANC,
										category_id,orcd,name,image,description,status,
										CASE WHEN GAD_IMGTP=1 THEN 'Sitting' WHEN GAD_IMGTP=2 THEN 'Standing' 
										WHEN GAD_IMGTP=3 THEN 'Sleeping' END IMGTYPE,PAD_TITL
										FROM `gal_dtl01` as p,category_mst as c,pag_dtl01 g
										WHERE p.GAD_PGCD=$page_id and p.GAD_ORCD=$org_id and p.GAD_CANC=0 
										and c.category_id=p.GAD_CACD and g.PAD_PGCD=p.GAD_SBCACD";
										$result = mysqli_query($conn, $sql);
										while($row = mysqli_fetch_assoc($result))
										{
											?>
                                <tr align="">
                                    <th><?php echo $sl ;?></th>
                                    <td><?php echo $row['name'] ;?></td>
                                    <td><?php echo $row['PAD_TITL'] ;?></td>
                                    <td><?php echo $row['GAD_TITL'] ;?></td>
                                    <!--<td><?php echo $row['GAD_DESC'] ;?></td>-->
                                    <td><img src="uploadimage/<?php echo $row['GAD_IMG'];?>" alt="Service Image"
                                            height="50" width="100"></td>
                                    <td><?php echo $row['IMGTYPE'] ;?></td>
                                    <td>
                                        <a
                                            href="<?php echo $_SERVER['PHP_SELF'];?>?editid=<?php echo $row['GAD_GACD'];?>&page_id=<?php echo $page_id ;?>"><i
                                                class="fa fa-edit"></i></a>|
                                        <i class="fa fa-trash text-warning" id="remove"
                                            data-id="<?php echo $row['GAD_GACD'];?>"
                                            data-title="<?php echo $row['GAD_TITL'];?>"></i>
                                        <!-- <a href="" onclick="delit(<?php echo $row['GAD_GACD'];?>)"><i class="fa fa-trash"></i></a> -->
                                    </td>
                                </tr>
                                <?php 
											$sl++; 
										} 
										?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!--  Modal -->
<div class="modal" id="cropView" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-header bg-info">
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
                                <button class="btn btn-success btn-upload-image" style="margin-top:2%;"
                                    id="btn-upload-image" type="button">Publish</button>
                            </form>
                        </div>
                        <div class="col-md-8 text-center">
                            <div id="crop-select"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(".custom-file").css("display", "block");
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function() {
    readURL(this);
});

/*
function delit(i)
{
	var c =confirm("Are you sure want to remove ?");
	if(c ==true)
	{
		window.location.href="artimageupload_delete.php?delitId="+i;
	}
	else
	{
		window.location="<?php echo $_SERVER['PHP_SELF'];?>";
	}
}
*/

$(document).on("click", "#remove", function() {
    var title = $(this).attr("data-title"); //alert(window.location.href="artimageupload.php?page_id=9");
    var approve = confirm("Are you Sure to Remove " + title + "?");
    if (approve == true) {
        $.ajax({
            url: "artimageupload_delete.php",
            type: "POST",
            cache: false,
            data: {
                type: 1,
                id: $(this).attr("data-id")
            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    //$(".dmsg").show();
                    //location.reload();
                    window.location.href = "artimageupload.php?page_id=5&status=203"
                }
            }
        });
    }
});

function getsubcategory(val, editid) {
    //alert(editid);
    $.ajax({
        type: "POST",
        url: "ajax_get_subcategory.php",
        data: {
            val: val,
            editid: editid,
        },
        success: function(data) {
            //alert(data);
            $("#subcat_id").html(data);
        }
    });
}
</script>

<script>
CKEDITOR.replace('editor1', {
    extraPlugins: 'uicolor,justify,font,colorbutton',
    uiColor: '#9AB8F3',
    height: 300,
    entity_encoding: "raw"
});
</script>

<script>
$(document).ready(function() {
    $(document).on("click", "#show_modal", function() {
        var id = $(this).attr("data-id");
        $("#image").val('');
        $('#cropView').modal('show');
    });
});


var globalFileName; //global file name of uploaded file
var globalFileType; //global file type of uploaded file
//var url;
$(function() {
    // Initialise CropSelect
    $('#crop-select').CropSelectJs();

    // Handle file select change
    $('#image').on('change', function() {
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

    $("#btn-upload-image").on('click', function() {
        var category_id = $('#category_id option:selected').val();
        var subcat_id = $('#subcat_id option:selected').val();
        var imgtype = $('#imgtype option:selected').val();
        var title = $('#title').val();
        var data = CKEDITOR.instances['editor1'].getData();
        var page_id = $('#page_id').val();
        var type = $('#type').val();

        if (type == 2) {
            var id = $('#id').val();
            var oldimg = $('#oldimg').val();
        }

        if (title == '') {
            alert('Enter Title');
            $("#title").focus();
            $("#title").css('border-color', 'red');
            $('#cropView').modal('hide');
            return false;
        } else if (data == undefined || data == '') {
            alert('Enter Description Name');
            $("#editor1").focus();
            $("#editor1").css('border-color', 'red');
            $('#cropView').modal('hide');
            return false;
        } else {
            //note promise not supported in IE, so to support IE, don't define a separate method, and send ajax postback in canvas.toBlob(callback)
            getCroppedImageBlob().then(function(blob) {
                //console.log(blob);
                //send blob to server
                var formData = new FormData();
                formData.append("category_id", category_id);
                formData.append("subcat_id", subcat_id);
                formData.append("imgtype", imgtype);
                formData.append("title", title);
                formData.append("data", data);
                formData.append('file', blob, globalFileName);
                formData.append("page_id", page_id);
                formData.append("type", type);
                formData.append("id", id);
                formData.append("oldimg", oldimg);
                //sending data to the server
                $.ajax({
                    type: "POST",
                    url: "ajax_crop_image_artimageupload.php",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        //var response = JSON.parse(response);
                        var pageid = response.page_id;
                        var status = response.status;
                        console.log(response);

                        if (status == 200) {
                            $('.c-msg').show();
                        } else if (status == 201) {
                            $('.u-msg').show();
                        } else if (status == 300) {
                            $('.e-msg').show();
                        }
                        const url = "artimageupload.php?status=" + status +
                            "&page_id=" + pageid;
                        window.location.href = url;
                    },
                    error: function(jqXHR, reason, ex) {
                        console.log(jqXHR.responseText);
                    }
                });
            });
        }
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
</script>

<?php  
		include 'includes/footer.php';
	?>
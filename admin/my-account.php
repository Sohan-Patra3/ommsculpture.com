<?php 
	include 'includes/header.php';
	
	if(isset($_SESSION["id"]))
	{
		$org_id=$_SESSION["id"];
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<style type="text/css">
	#ac_c
	{
		background-color: #007bff;
		color:#fff;
	}
	.important
	{
		background-color: #fff;
		color:#4e73df;
		text-decoration:none;
	}
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row ">
		<!--<h1 class="h3 mb-2 text-gray-800">Account Settings</h1>-->
		<div class="col-sm-12 col-md-8 col-lg-8 ">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Change Admin Data</h6>
				</div>
				<div class="card-body col-lg-12">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item ac_c" >
							<a class="nav-link active Psw_chn "  data-toggle="tab" href="#home">Edit Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link Psw_chn" id="ac_b#"data-toggle="tab" href="#menu1">Password Change</a>
						</li>
						<li class="nav-item">
							<a class="nav-link Account_setting" data-toggle="tab" href="#Social">Social Account</a>
						</li> 
					</ul>
					<div class="row ">
						<!-- Tab panes -->
						<div class="col-sm-12 col-md-12 col-lg-12 ">
							<div class="tab-content ">
								<div id="home" class="container tab-pane active col-md-"><br>
									<form method="post" action="my_account_a.php" enctype="multipart/form-data">
										<div class="form-group col-md-12 " >
											<div class="col-md-12 ">
												<?php
												$sql = "SELECT * FROM `org_mst01` where ORM_ORCD =1";
												$result = mysqli_query($conn, $sql);
												$row = mysqli_fetch_assoc($result);
												if(isset($_GET['status']))
												{
													if($_GET['status'] ==200)
													{
														?>	
														<div class="c-msg">
															<div class="alert alert-warning myMessage">
																<strong>Success!</strong> Profile Data Updated Successfully !.
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
												<label for="formGroupExampleInput">Organigation Name</label>
												<input type="text" class="form-control form-control-sm" name="org_name" value="<?php echo isset($row)? $row['ORM_NAME']:'';?>" style="padding-bottom: 10px;">
											</div>
											<div class="col-md-12">
												<label for="formGroupExampleInput">Organigation Domain Name</label>
												<input type="text" class="form-control form-control-sm" name="org_domain" value="<?php echo isset($row)? $row['ORM_DMNM']:'';?>" style="padding-bottom: 10px;">
											</div>
										</div>
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<label for="formGroupExampleInput">Admin Name</label>
												<input type="text" class="form-control form-control-sm" name="admin_name" value="<?php echo isset($row)? $row['ORM_CPNM']:'';?>" style="padding-bottom: 10px;">
											</div>
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">Admin Email-Id</label>
												<input type="email" class="form-control form-control-sm" placeholder="Enter Email-id  Here" name="admin_email" value="<?php echo isset($row)? $row['ORM_MAIL']:'';?>">
											</div>
											<div class="col-md-12">
												<label for="formGroupExampleInput">Admin Phone No.</label>
												<input type="tel" class="form-control form-control-sm" placeholder="Enter Phone No Here" name="admin_phone" onblur="checkNumber(this)" id="txt_contact_no" value="<?php echo isset($row)? $row['ORM_CONO']:'';?>">
												<p id="pherror" style="color:red;"></p>
											</div>
										</div>										
										<input type="hidden" name="type" value="1">
										<div class="form-group col-md-12" style="margin-bottom:-10px">
											<div class="col-md-12" align="center">
												<input type="hidden" class="form-control form-control-sm" name="id" value="<?php echo isset($row)? $row['ORM_ORCD']:'';?>">
												<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" >
												<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
											</div>										
										</div>								
									</form>	
								</div>
								
								<div id="menu1" class="container tab-pane fade"><br>
									<form method="post" action="my_account_a.php" enctype="multipart/form-data">
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<?php
												$sql = "SELECT * FROM `org_mst01` where ORM_ORCD =1";
												$result = mysqli_query($conn, $sql);
												$row = mysqli_fetch_assoc($result);
												if(isset($_GET['status']))
												{
													if($_GET['status'] ==200)
													{
														?>	
														<div class="c-msg">
															<div class="alert alert-warning myMessage">
																<strong>Success!</strong> Password Changed Successfully !.
															</div>
														</div>
														<?php 
													} 
												}
												?>	
											</div>
										</div>
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<label for="formGroupExampleInput">Admin Name</label>
												<input type="text" class="form-control form-control-sm" name="admin_name" value="<?php echo isset($row)? $row['ORM_CPNM']:'';?>" style="padding-bottom: 10px;" readonly>
											</div>
										</div>
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<label for="formGroupExampleInput">Old Password</label>
												<input type="text" class="form-control form-control-sm" name="admin_psw" id="old_pass" value="<?php echo isset($row)? $row['ORM_PASS']:'';?>" style="padding-bottom: 10px;" onblur="checkOLDPassword()" placeholder="Enter Old Password Here">
											</div>
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">New Password</label>
												<input type="text" class="form-control form-control-sm" placeholder="Enter New Password Here" name="new_psw" value="" id="new_psw">
											</div>										
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">Confirm New Password</label>
												<input type="text" class="form-control form-control-sm" placeholder="Enter Confirm New Password Here" name="cnf_psw" onblur="checkPassword()" id="cnf_psw" value="">											 
											</div>
										</div>										
										<input type="hidden" name="type" value="2">
										<div class="form-group col-md-12 mb-n5" >
											<div class=" col-md-12" align="center">
												<input type="hidden" class="form-control form-control-sm" name="id" id="id" value="<?php echo isset($row)? $row['ORM_ORCD']:'';?>">												 
												<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" id="submit">
												<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
											</div>											
										</div>											
									</form>	
									<p id="message" style="color:red;"></p>
								</div>
								
								<div id="Social" class="container tab-pane fade"><br>
									<form method="post" action="my_account_a.php" enctype="multipart/form-data">
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<?php
												$sql = "SELECT * FROM `org_mst01` where ORM_ORCD =1";
												$result = mysqli_query($conn, $sql);
												$row = mysqli_fetch_assoc($result);
												if(isset($_GET['status']))
												{
													if($_GET['status'] ==200)
													{
														?>	
														<div class="c-msg">
															<div class="alert alert-warning myMessage">
																<strong>Success!</strong> Password Changed Successfully !.
															</div>
														</div>
														<?php 
													} 
												}
												?>	
											</div>
										</div>
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<label for="formGroupExampleInput">Facebook </label>
												<input type="text" class="form-control form-control-sm" name="facebook" id="facebook" value="<?php echo isset($row)? $row['ORM_FB']:'';?>" style="padding-bottom: 10px;" placeholder="Enter Facebook Id Here" >
											</div>
										</div>
										<div class="form-group col-md-12 " >
											<div class="col-md-12">
												<label for="formGroupExampleInput">Twitter </label>
												<input type="text" class="form-control form-control-sm" name="twitter" id="twitter" value="<?php echo isset($row)? $row['ORM_TW']:'';?>" style="padding-bottom: 10px;"  placeholder="Enter Twitter Id Here">
											</div>
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">Youtube</label>
												<input type="text" class="form-control form-control-sm" placeholder="Enter Youtube Link Here" name="youtube" value="<?php echo isset($row)? $row['ORM_YT']:'';?>" id="youtube">
											</div>
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">Pinterest</label>
												<input type="text" class="form-control form-control-sm" placeholder="Enter Pinterest Id Here" name="pinterest" id="pinterest" value="<?php echo isset($row)? $row['ORM_PT']:'';?>">											 
											</div>
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">Linkedin</label>
												<input type="text" class="form-control form-control-sm" placeholder="Enter Linkedin Id Here" name="linkedin" value="<?php echo isset($row)? $row['ORM_LI']:'';?>" id="linkedin">
											</div>
										</div>
										<div class="form-group col-md-12">
											<div class="col-md-12">
												<label for="formGroupExampleInput">Google Play</label>
												<input type="text" class="form-control form-control-sm" placeholder="Enter Google Play Link Here" name="google_play"  id="google_play" value="<?php echo isset($row)? $row['ORM_GP']:'';?>">											 
											</div>
										</div>										
										<input type="hidden" name="type" value="3">
										<div class="form-group col-md-12 mb-n5" >
											<div class=" col-md-12" align="center">
												<input type="hidden" class="form-control form-control-sm" name="id" id="id" value="<?php echo isset($row)? $row['ORM_ORCD']:'';?>">												 
												<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" id="social-submit">
												<input type="reset" name="reset"  value="Reset" class="btn btn-danger btn-sm" >
											</div>											
										</div>											
									</form>	
									<p id="message" style="color:red;"></p>
								</div> 
								<!-- </div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-12 col-md-4 col-lg-4 ">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Logo Image</h6>
				</div>
				<div class="card-body">
					<form method="post" action="logo_image_a.php" enctype="multipart/form-data">
						<div class="row" style="padding-bottom:0px">
							<div class="col-md-12">
								<?php
								$sql = "SELECT * FROM `org_mst01` where ORM_ORCD =1";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								if(isset($_GET['status']))
								{
									if($_GET['status'] ==202)
									{
										?>	
										<div class="c-msg">
											<div class="alert alert-warning myMessage">
												<strong>Success!</strong> Logo Image Changed Successfully !.
											</div>	
										</div>
										<?php 
									} 
								}
								?>	
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">					
								<input type="file" id="imgInp" name="photo" class="form-control form-control-sm" accept="image/*" value="">
							</div>
							<div class="col-md-2">
								<input type="hidden" class="form-control" id="logo_id" name="logo_id" value="<?php echo isset($row)? $row['ORM_ORCD']:'';?>">
								<input type="hidden" class="form-control" value="<?php echo isset($row)?$row['ORM_LOGO']:'';?>" id="old_logo_img" name="old_logo_img">
								<input type="hidden" value="1" name="logo" />										
								<input type="submit" name="submit"  value="Publish" class="btn btn-info btn-sm" id="logo-submit" >
							</div>
						</div>
					</form>
					<div align="center">					
						<img src="uploadimage/<?php echo isset($row)?$row['ORM_LOGO']:'';?>" height="70" width="90" id="blah" style="padding-top: 0px;">
					</div>
				</div>
			</div>	
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Admin Image</h6>
				</div>
				<div class="card-body">
					<form method="post" action="logo_image_a.php" enctype="multipart/form-data">
						<div class="row" style="padding-bottom:0px">
							<div class="col-md-12">
								<?php
								$sql = "SELECT * FROM `org_mst01` where ORM_ORCD =1";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								if(isset($_GET['status']))
								{
									if($_GET['status'] ==204)
									{
										?>	
										<div class="c-msg">
											<div class="alert alert-warning myMessage">
												<strong>Success!</strong> Admin Image Changed Successfully !.
											</div>	
										</div>
										<?php 
									} 
								}
								?>	
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">					
								<input type="file" id="imgInp1" name="admin_photo" class="form-control form-control-sm" accept="image/*" value="">
							</div>
							<div class="col-md-2">
								<input type="hidden" class="form-control" name="id" value="<?php echo isset($row)? $row['ORM_ORCD']:'';?>">
								<input type="hidden" class="form-control" value="<?php echo isset($row)?$row['ORM_PROF']:'';?>" name="old_admin_img">								
								<input type="hidden" value="2" name="admin" />					
								<input type="submit" name="update"  value="Publish" class="btn btn-info btn-sm" >
							</div>
						</div>
					</form>
					<div align="center">					
						<img src="uploadimage/<?php echo isset($row)?$row['ORM_PROF']:'';?>" height="70" width="90" id="blah1" style="padding-top: 0px;">
					</div>
				</div>
			</div>					 
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<script type="text/javascript">
	function readURL(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();			
			reader.onload = function (e) 
			{
				$('#blah').attr('src', e.target.result);
			}			
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function()
	{
		readURL(this);
	});

	function readURLM(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();			
			reader.onload = function (e) 
			{
				$('#blah1').attr('src', e.target.result);
			}			
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp1").change(function()
	{
		readURLM(this);
	});

	function checkOLDPassword()
	{		
		var oldpsw =$("#old_pass").val();
		var id =$("#id").val();
		$.ajax(
		{
			type:"POST",
			url:'logo_image_a.php',
			data:
			{
				type:1,
				postpsw:oldpsw,
				postid:id
			},
			success:function(data)
			{ 
				if(data ==1)
				{
					$("#message").html("Password Matched ! ");
					$("#submit").attr("disabled","disabled");
				}
				else
				{
					$("#message").html(" ");
					$("#submit").removeAttr("disabled");
					location.reload();
				}
			}
		});
	}

	function checkPassword()
	{
		var id =$("#id").val();
		var newpass =$("#new_psw").val();
		var cnfpass =$("#cnf_psw").val();

		if(newpass == cnfpass)
		{
			$("#message").html("Password Matched ! ");
			$("#submit").removeAttr("disabled");
			
			$.ajax(
			{
				type:"POST",
				url:'logo_image_a.php',
				data:
				{
					type:2,
					postCNFpsw:cnfpass,
					postid:id
				},
				success:function(data)
				{ 
					alert(data);
					location.reload();
				}
			});
		}
		else
		{
			$("#message").html("Password Not Matched ! ");
			$("#submit").attr("disabled","disabled");

		}
	}

	$(document).on("click","#social-submit", function()
	{
		var facebook =$("#facebook").val();
		var twitter =$("#twitter").val();
		var youtube =$("#youtube").val();
		var pinterest =$("#pinterest").val();
		var linkedin =$("#linkedin").val();
		var google_play =$("#google_play").val();
		var id =$("#id").val();
		//alert(facebook);
		
		$.ajax(
		{
			url:"logo_image_a.php",
			type:"POST",
			cache:false,
			//enctype: "multipart/form-data",
			//processData: false,
			data:
			{
				type:5,
				facebook:facebook,
				twitter:twitter,
				youtube:youtube,
				pinterest:pinterest,
				linkedin:linkedin,
				postid:id,
				google_play:google_play
			},
			success:function(dataResult)
			{
				alert(dataResult);
				location.reload();
			}
		});
	});
</script>
<?php  include 'includes/footer.php';?>
<?php  include 'includes/header.php';
  $page_id=$_GET['id'];
   $org_id=$_SESSION["id"];
  $sql = "SELECT * FROM `pag_dtl01` where PAD_PACD=$page_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  // echo '<pre>';
  // print_r($row);die();
?>
<!-- Begin Page Content -->
        <div class="container-fluid">
			<!-- Page Heading -->
			  <div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800"><?php echo $row['PAD_TITL']; ?></h1><span><a href="vision_mission.php?page_id=<?php echo $row['PAD_PACD']; ?>"><button type="button">Back</button></a></span>
				<!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
			  </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <img src="uploadimage/<?php echo $row['PAD_IMG'] ;?>" height="350" width="1240" id="blah">
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <div><?php echo $row['PAD_DESC'];?></div>
                  </div>
                </div>
              </div>
           
          </div>

          <!-- Content Row -->

          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php  //include 'includes/footer.php';?>
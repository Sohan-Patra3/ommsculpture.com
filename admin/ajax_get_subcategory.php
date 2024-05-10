<?php
	session_start();
	include '../includes/database.php';
	
    $val = $_REQUEST['val'];
	$editid = $_REQUEST['editid'];
	
    $sql1 ="SELECT * FROM gal_dtl01 WHERE GAD_GACD=$editid";
    $query1 =mysqli_query($conn,$sql1);
    $row1 =mysqli_fetch_assoc($query1);
		
	$sql ="SELECT PAD_PGCD,PAD_TITL FROM pag_dtl01 WHERE PAD_CACD=$val AND PAD_STAT=1
	ORDER BY PAD_TITL ASC ";
    $query=mysqli_query($conn,$sql);
?>
<option value="">Select Art Sub Category</option>
<?php
    while($row=mysqli_fetch_array($query))
    {
		?>
		<option value="<?=$row['PAD_PGCD'];?>" <?php if($row['PAD_PGCD']==$row1['GAD_SBCACD']){ echo "selected";}?>><?=$row['PAD_TITL'];?></option>
		<?php
    }
?>
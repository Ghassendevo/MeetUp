<?php 
include("./connect.php");

$liked_by = $_POST['liked_by'];
$liked_to = $_POST['liked_to'];

$delete = mysqli_query($con,"DELETE FROM likes WHERE liked_by='$liked_by' AND liked_to='$liked_to'") or die(mysqli_error($con));
$sle = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$liked_to'") or die(mysqli_error($con));
$cc = mysqli_num_rows($sle);
if($cc>0){
;?>
		<div style="margin-top: 5px;">
					<i class="far fa-heart " style="color: #8b8d90;cursor:pointer;"></i> <p style="display: inline-block;color: #8b8d90;font-size: 16px;font-weight: 400;"><?php echo $cc;?></p>
				</div>
		<?php
	}
;?>
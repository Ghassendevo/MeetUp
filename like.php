<?php 
include('./connect.php');
$liked_to = $_POST['liked_to'];
$liked_by = $_POST['liked_by'];

//check if user is already liked the profile.

$check  = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$liked_to' AND liked_by='$liked_by'");
$ci = mysqli_num_rows($check);
if($ci==0){
	$insert = mysqli_query($con,"INSERT INTO likes(liked_by, liked_to, noti) VALUES('$liked_by', '$liked_to', 'no')") or die(mysqli_error($con));
	// get new counts.
	$sle = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$liked_to'") or die(mysqli_error($con));
	$cc = mysqli_num_rows($sle);
	if($cc>0){
		;?>
		<div style="margin-top: 5px;">
				<i class="far fa-heart " style="color: #8b8d90;cursor:pointer;"></i> <p style="display: inline-block;color: #8b8d90;font-size: 16px;font-weight: 400;"><?php echo $cc;?></p>
				</div>
		<?php
	}
}


;?>
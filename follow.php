<?php
include('./connect.php');
$follow_to = $_POST['follow_to'];
$follow_by = $_POST['follow_by'];

$s = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$follow_to' AND follow_by='$follow_by'");
if(mysqli_num_rows($s)==0){
	$in = mysqli_query($con,"INSERT INTO followers (follow_to,follow_by,noti) VALUES('$follow_to','$follow_by','no')");
}
;?>
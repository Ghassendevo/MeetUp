<?php 
include("./connect.php");
$user_id = $_POST['user_id'];
$se = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$user_id' AND noti='' ORDER BY id") or die(mysqli_error($con));
$count = mysqli_num_rows($se);
if($count==0){
	$counte = '1';
	echo $counte;
}else{
	$see = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$user_id' AND noti='' ORDER BY id") or die(mysqli_error($con));
$counte = mysqli_num_rows($se);
$v = $counte+1;
echo $v;

}


;?>
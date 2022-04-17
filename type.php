<?php 
include('./connect.php');
$id = $_POST['id'];
$type = $_POST['type'];
if($type=="show"){
	$up = mysqli_query($con,"UPDATE users SET visibility='yes' WHERE id='$id'") or die(mysqli_error($con));
}else{
	$up = mysqli_query($con,"UPDATE users SET visibility='no' WHERE id='$id'") or die(mysqli_error($con));

}
;?>

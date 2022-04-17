<?php 
include('./connect.php');
$id = $_POST['id'];

$insert = mysqli_query($con,"UPDATE likes SET noti='false' WHERE liked_to='$id' AND noti=''") or die(mysqli_error($con));

;?>
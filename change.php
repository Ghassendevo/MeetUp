<?php 
include("./connect.php");

$id = $_POST['id'];

$to = mysqli_query($con,"UPDATE likes SET noti='no' WHERE liked_to='$id'");

$by = mysqli_query($con,"UPDATE messages SET noti='no' WHERE user_to='$id'");

;?>

<?php
include('./connect.php');
$id = $_POST['user_id'];
$delete = mysqli_query($con,"DELETE FROM images WHERE user_id='$id'") or die(mysqli_error($con));
 ;?>
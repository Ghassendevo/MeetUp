<?php
include("./connect.php");
$id = $_POST['id'];
$user_id = $_POST['user_id'];

$delete = mysqli_query($con,"DELETE  FROM images WHERE id='$id' AND user_id='$user_id'") or die(mysqli_error($con));


;?>
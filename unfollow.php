<?php
include('./connect.php');
$follow_to = $_POST['follow_to'];
$follow_by = $_POST['follow_by'];

$in = mysqli_query($con,"DELETE FROM followers WHERE follow_to='$follow_to' AND follow_by='$follow_by'");
;?>
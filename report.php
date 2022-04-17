<?php 
include('./connect.php');
$report_by = $_POST['report_by'];
$report_to = $_POST['report_to'];
$type = $_POST['type'];

$in = mysqli_query($con,"INSERT INTO reports (report_by,report_to,type) VALUES('$report_by','$report_to','$type')") or die(mysqli_error($con));
;?>
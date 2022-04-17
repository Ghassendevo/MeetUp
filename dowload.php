<?php 
include("./connect.php");
$id = $_GET['u'];
$explode = explode('.', $id);
$user_id = $explode[1];
$id = $explode[0];
$s = mysqli_query($con,"SELECT * FROM images WHERE id='$id' AND user_id='$user_id'") or die(mysqli_error($con));
$run = mysqli_fetch_array($s);
$path = $run['image'];
$path = ".".$path."";
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($path));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($path));
readfile($path);






;?>
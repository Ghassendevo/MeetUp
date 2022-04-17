<?php 
include('./connect.php');

$by = $_POST['by'];
$to = $_POST['to'];

$up = mysqli_query($con,"DELETE  FROM block WHERE block_by='$by' AND block_to='$to'") or die(mysqli_error($con));

;?>
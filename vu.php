<?php 
include('./connect.php');
$user_from = $_POST['user_from'];
$user_to = $_POST['user_to'];

$d = mysqli_query($con,"UPDATE messages SET read='yes' WHERE id='$id'");


;?>
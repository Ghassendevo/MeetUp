<?php 

include("./connect.php");
$id = $_POST['id'];
$user = $_POST['user'];
$message = $_POST['message'];

$in = mysqli_query($con,"INSERT INTO messages(user_by, user_to, message, reade) VALUES('$user', '$id', '$message', 'no')") or die(mysqli_error($con));
;?>
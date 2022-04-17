<?php 
include('./connect.php');

$id = $_POST['message'];

$d = mysqli_query($con,"DELETE FROM messages WHERE id='$id'");

;?>
<?php 
include('./connect.php');
$id = $_POST['message'];
$hide = mysqli_query($con,"UPDATE messages SET hide='yes' WHERE id='$id'");

;?>
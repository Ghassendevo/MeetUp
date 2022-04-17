<?php

include('./connect.php');
$user_from = $_POST['user_from'];
$user_to = $_POST['user_to'];

$e = mysqli_query($con,"SELECT * FROM messages WHERE user_by='$user_to' AND user_to='$user_from' AND reade='no'") or die(mysqli_error($con));

$count = mysqli_num_rows($e);
if($count>0){
	echo $count;
}


 ;?>
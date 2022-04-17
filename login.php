<?php
include("./connect.php");
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	//check
	$check = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysqli_error($con));
	$count = mysqli_num_rows($check);
	if($count==1){
		//login
		
		$in = mysqli_query($con,"UPDATE users SET status='online' WHERE username='$username'") or die(mysqli_error($con));
		session_start();
		$_SESSION['login_user'] = $username;
		header("location:home.php");
	}else{
		//back
		header("location:crush.php?u=".$username."");
			}
}
 ;?>
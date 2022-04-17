<?php 
include('./connect.php');
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$location = $_POST['location'];
$job = $_POST['job'];
$age = $_POST['age'];
$email = $_POST['email'];
$number = $_POST['number'];
$education = $_POST['education'];
$relation = $_POST['relation'];
$link = $_POST['link'];
$id = $_POST['id'];

$check  = mysqli_query($con,"SELECT * FROM about WHERE user_id='$id'") or die(mysqli_error($con));
if(mysqli_num_rows($check)==0){
	$update  = mysqli_query($con,"INSERT INTO about(user_id, firstname, lastname, location, job, age, email, number, education, relation, link) VALUES ('$id','$firstname','$lastname','$location','$job','$age','$email','$number','$education','$relation','$link')") or die(mysqli_error($con));
}else{
	$de = mysqli_query($con,"DELETE FROM about WHERE user_id='$id'");
	$update  = mysqli_query($con,"INSERT INTO about(user_id, firstname, lastname, location, job, age, email, number, education, relation, link) VALUES ('$id','$firstname','$lastname','$location','$job','$age','$email','$number','$education','$relation','$link')");
}


;?>
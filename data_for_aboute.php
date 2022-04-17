<?php 
include('./connect.php');
$id = $_POST['id'];
$check=  mysqli_query($con,"SELECT * FROM about WHERE user_id='$id'");
	$f = mysqli_num_rows($check);
$checke=  mysqli_query($con,"SELECT * FROM users WHERE id='$id'");

	$get = mysqli_fetch_array($checke);
	$firstname = ucfirst($get['firstname']);
	$lastname = ucfirst($get['lastname']);
	$oo = mysqli_query($con,"SELECT * FROM about WHERE user_id='$id'") or die(mysqli_error($con));
	$ji = mysqli_fetch_array($oo);
	if($ji['link']==''){
		$link ='Empty';
	}else{
		$link =$ji['link'];
	}

	if($ji['email']==''){
		$email ='Empty';
	}else{
		$email =$ji['email'];
	}

	if($ji['job']==''){
		$job ='Empty';
	}else{
		$job =$ji['job'];
	}

	if($ji['age']==''){
		$age ='Empty';
	}else{
		$age =$ji['age'];
	}


	if($ji['location']==''){
		$location ='Empty';
	}else{
		$location =$ji['location'];
	}

	if($ji['number']==''){
		$number ='Empty';
	}else{
		$number =$ji['number'];
	}

	if($ji['education']==''){
		$education ='Empty';
	}else{
		$education =$ji['education'];
	}

	if($ji['relation']==''){
		$relation ='Empty';
	}else{
		$relation =$ji['relation'];
	}


	;?>
	<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;border-bottom: 1px solid #e5e5e5;">
	<h3 style="font-weight: 400;">ABOUT</h3>

	</div>
	<div style="display: flex;justify-content: space-between;text-align: center;width: 90%;margin: auto;margin-top: 10px;">
		<div style="width: 40%;text-align: center;">
			<div class="a_hover"  >
				<h6 style="color: black;text-align: center; font-weight: bold;">NAME</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $firstname;?><?php echo " $lastname";?></h6>
			</div><br>
			<div class="a_hover">
				<h6 style="color: black;text-align: center; font-weight: bold;">LOCATION</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $location;?></h6>
			</div><br>
			<div class="a_hover">
				<h6 style="color: black;text-align: center; font-weight: bold;">AGE</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;text-align: left;"><?php echo $age;?></h6>
			</div><br>
			<div class="a_hover" >
				<h6 style="color: black;text-align: center; font-weight: bold;">E-MAIL</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $email;?></h6>
			</div><br>
			<div class="a_hover">
				<h6 style="color: black;text-align: center; font-weight: bold;">JOB</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $job;?></h6>
			</div>
		</div>
		<div style="width: 40%;text-align: center;">
			<div class="a_hover" >
				<h6 style="color: black;text-align: center; font-weight: bold;">PHONE</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $number;?></h6>
			</div><br>
			<div class="a_hover" >
				<h6 style="color: black;text-align: center; font-weight: bold;">EDUCATION</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $education;?></h6>
			</div><br>
			<div class="a_hover" >
				<h6 style="color: black;text-align: center; font-weight: bold;">RELATION</h6>
				<h6 style="color: black;text-align: center; font-weight: 400;"><?php echo $relation;?></h6>
			</div><br>
			<div class="a_hover" >
				<h6 style="color: black;text-align: center; font-weight: bold;">LINK</h6>
				<a href="" style="color: black;text-align: center; font-weight: 400;text-decoration: underline;"><?php echo $link;?></a>
			</div><br>
		</div>
	</div>
	
	<?php

;?>
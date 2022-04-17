<?php
include("./connect.php");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$select = mysqli_query($con,"SELECT * FROM users WHERE username='$username'") or die(mysqli_error($con));
$count = mysqli_num_rows($select);
if($count ==1){
	;?>
		<i style="color: red;">Userame is already taken, try another</i>
	<script>
		$('.data').fadeIn();
		setTimeout(function(){
					$('.data').fadeOut();

				},4000)
	</script>
	
	<?php

}else{
	$insert = mysqli_query($con,"INSERT INTO users(firstname, lastname, username, age, gender, password, status) VALUES('$firstname', '$lastname', '$username', '$age', '$gender', '$password', 'offline')") or die(mysqli_error($con));

;?>
	<script>
		$('.ppo').animate({
		width:'toggle'
		});
		$('.show').animate({
			width:'toggle'
			});
		$('.f_username').val('<?php echo $username;?>');
	</script>
<?php
}

 ;?>
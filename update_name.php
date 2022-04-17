<?php 
include('./connect.php');
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$fe = ucfirst($firstname);
$le = ucfirst($lastname);
//
$s = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$f = mysqli_fetch_array($s);
if($f['password']!==$password){
	;?>
	<script>
		$('#change_password').css('border','1px solid red');
		$('#change_password').css('color','red');
		$('#change_password').val('Incorrect password');
		$('#change_password').on('click',function(){
			$('#change_password').css('border','1px solid #e2e3ea');
			$('#change_password').css('color','black');
			$('#change_password').val('');


		});


	</script>
	<?php
}else{
	$s = mysqli_query($con,"UPDATE users SET firstname='$firstname' WHERE id='$id'") or die(mysqli_error($con));
	$s = mysqli_query($con,"UPDATE users SET lastname='$lastname' WHERE id='$id'") or die(mysqli_error($con));
	;?>
	<script>
		var
			firstname = '<?php echo $fe ;?>',
			lastname = '<?php echo $le ;?>';
		$('#op').html(firstname+' '+lastname);
		$('#ope').html(firstname+' '+lastname);

		$('.ch_name').css('display','none');
		$('.ty').css('display','none');
		$('.oshit').fadeIn();
		$('.alll').fadeIn();

	</script>
	<?php
}

;?>
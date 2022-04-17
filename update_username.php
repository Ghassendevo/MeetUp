<?php 
include('./connect.php');
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

//
$s = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$f = mysqli_fetch_array($s);
if($f['password']!==$password){
;?>
	<script>
		$('#change_passworde').css('border','1px solid red');
		$('#change_passworde').css('color','red');
		$('#change_passworde').val('Incorrect password');
		$('#change_passworde').on('click',function(){
			$('#change_passworde').css('border','1px solid #e2e3ea');
			$('#change_passworde').css('color','black');
			$('#change_passworde').val('');


		});
	</script>
<?php
}else{
	$s = mysqli_query($con,"UPDATE users SET username='$username' WHERE id='$id'") or die(mysqli_error($con));
	;?>
	<script>
		$('.ch_username').css('display','none');
		$('.ty').css('display','none');
		$('.oshit').fadeIn();
		$('.alll').fadeIn();

	</script>
	<?php
}

;?>

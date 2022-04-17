<?php 
include('./connect.php');
$id = $_POST['id'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
//
$s = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$f = mysqli_fetch_array($s);

if($f['password']!==$old_password){
;?>
	<script>
		$('#change_usernamee').css('border','1px solid red');
		$('#change_usernamee').css('color','red');
		$('#change_usernamee').val('Incorrect password');
		$('#change_usernamee').on('click',function(){
			$('#change_usernamee').css('border','1px solid #e2e3ea');
			$('#change_usernamee').css('color','black');
			$('#change_usernamee').val('');


		});
	</script>
<?php
}else{
	$s = mysqli_query($con,"UPDATE users SET password='$new_password' WHERE id='$id'") or die(mysqli_error($con));
	;?>
	<script>
		$('.ch_password').css('display','none');
		$('.ty').css('display','none');
		$('.oshit').fadeIn();
		$('.alll').fadeIn();

	</script>
	<?php
}

;?>

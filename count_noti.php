<?php 
include("./connect.php");
$id = $_POST['id'];

$select_l = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$id' AND noti='no'");
$select_m = mysqli_query($con,"SELECT * FROM messages WHERE user_to='$id' AND noti='no'");
$l = mysqli_num_rows($select_l);
$m = mysqli_num_rows($select_m);
$all = $l + $m;
if($all>0){
	;?>
	<script>
		$(".sfee").css("display","inline-block");
	</script>
	<?php
	echo $all;
}else{
	;?>
	<script>
		$(".sfee").css("display","none");
	</script>
	<?php
}

;?>
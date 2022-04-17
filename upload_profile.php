<?php 
include("./connect.php");
$id = $_POST['id'];
$file = $_FILES['file']['tmp_name'];
$size = filesize($file);
$a = getimagesize($file);
$image_type = $a[2];
if(!in_array($image_type, array(IMAGETYPE_GIF,IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP ))){
	;?>
	<script>
		alert("Only image file allowed");
	</script>
	<?php
}elseif ($size>3000000){
	;?>
	<script>
		alert("Your image must be less then 3MB")
	</script>
	<?php
}else{
	;?>
	<script>
		$(".all").fadeOut();
	</script>
	<?php
	//upload file.
	$select = mysqli_query($con,"SELECT * FROM users WHERE id='$id'") or die(mysqli_error($con));
	$ff = mysqli_fetch_array($select);
	$pname = rand(1000,10000)."-".$_FILES["file"]["name"];
	$tname = $_FILES["file"]["tmp_name"];
	$profile_pic_name = @$_FILES['file']['name'];
	$file_basename = substr($profile_pic_name, 0, strripos($profile_pic_name, '.'));
	$file_ext = substr($profile_pic_name, strripos($profile_pic_name, '.'));
	$filename = strtotime(date('Y-m-d H:i:s')) . $file_ext;
	$username = $ff['username'];
	$photos = "./profile_pic/$username/$filename";
	
	if(file_exists("./profile_pic/$username")){
		$update = mysqli_query($con,"UPDATE users SET pic='$photos' WHERE id='$id'") or die(mysqli_error($con));
		move_uploaded_file($_FILES["file"]["tmp_name"], "./profile_pic/$username/".$filename);
	}else{
		mkdir("./profile_pic/$username");
		$update = mysqli_query($con,"UPDATE users SET pic='$photos' WHERE id='$id'") or die(mysqli_error($con));
		move_uploaded_file($_FILES["file"]["tmp_name"], "./profile_pic/$username/".$filename);
	}
	
	$g = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
	$l = mysqli_fetch_array($g);
	$pic_l = $l['pic'];
	;?>
	<script>
		$('#only_name').prepend('<img src="<?php echo $pic_l ;?>" style="height: 40px;width: 40px;border-radius: 50%;display: inline-block;margin-left: 5px;">');
		$('.when').css('display','none');
		$('#ppp').html('<img src="<?php echo $pic_l ;?>" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%;border:2px solid #1697ea;cursor: pointer;">');
		$('.bit').html('<img src="<?php echo $pic_l ;?>" class="iim">');
		$('#ov').html('<img src="<?php echo $pic_l ;?>" style="width: 57px;height: 57px;border-radius: 50%;margin-left: 15px;display: inline-block;">')

	</script>
	<?php
	

}


			


;?>
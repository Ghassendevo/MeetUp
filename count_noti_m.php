<?php 
include("./connect.php");
$id = $_POST['id'];

$select = mysqli_query($con,"SELECT * FROM messages WHERE user_to='$id' AND noti='no'") or die(mysqli_error($con));
$count = mysqli_num_rows($select);
if($count>0){
;?>
  
	<span class="jojou" style="display: inline-block;float: right;background-color: red;border-radius: 50%;width: 20px;height: 20px;color:white;font-weight: 400;"><?php echo $count;?></span>
	<?php	
}

;?>
<?php 
include("./connect.php");
$id = $_POST['id'];
$user = $_POST['user'];
$id = $id[0];
$msg_arry = array($id);
$s = mysqli_query($con,"SELECT * FROM messages WHERE user_by='$id' AND user_to='$user' OR user_by='$user' AND user_to='$id' ORDER BY id ASC") or die(mysqli_error($con));
if(mysqli_num_rows($s)>0){
	 $sel = mysqli_query($con,"SELECT  * FROM users WHERE id='$id'") or die(mysqli_error($con));
 $d = mysqli_fetch_array($sel);
 $pic = $d['pic'];
while ($f = mysqli_fetch_array($s)) {
	$id = $f['id'];
	$by = $f['user_by'];
	$to = $f['user_to'];
	$hide = $f['hide'];
 $m = $f['message'];


	if($by !== $user){
		if($hide!=='yes'){
		;?>
		<div class="left_u<?php echo $id;?>"  style="text-align: left;z-index: 1;">
			<img class="rez<?php echo $id;?>" src="<?php echo $pic;?>" style="width: 30px;height: 30px;border-radius: 50%;display: inline-block;">
		<div class="mme<?php echo $id;?>" style="z-index: 1; width: max-content;max-width: 50%; margin-right: auto;margin-left: 0;margin-left: 5px;background-color: #f0f2f5;border-radius: 20px;border-bottom-right-radius: 0px;margin-top: 10px;text-align: left;padding-left: 20px;padding-right:20px;padding-top: 10px; padding-bottom: 1px; height: auto;word-wrap: break-word;margin-bottom: 5px;display: inline-block;">
			<p style="color: black;margin-top: 5px;font-weight: 400; z-index: 1;"><?php echo $m ;?></p>
		</div>
		<i class="far fa-trash-alt trashe<?php echo $id ;?>"  style="color: red;display: inline-block;vertical-align: center;cursor: pointer;display: none;"></i>
	</div>
	<script>
		$(".left_u<?php echo $id;?>").mouseover(function(){
				$(".trashe<?php echo $id;?>").css('display','inline-block');
				$(".trashe<?php echo $id;?>").on('click',function(){
					var message = '<?php echo  $id;?>',
					id = '<?php echo $id;?>';
					$.ajax({
						type:'POST',
						url:'hide_m.php',
						data:{
							id:id,
							message:message,
						},success:function(){
							$(".mme<?php echo $id;?>").css("display","none");
							$(".trashe<?php echo $id ;?>").css('display','none');
							$(".rez<?php echo $id ;?>").css('display','none');
						}
					})
				})
			})
		$(".left_u<?php echo $id;?>").mouseleave(function(){

				$(".trashe<?php echo $id;?>").css('display','none');
			})
	</script>
		<?php
		}
	}else{
		;?>
	<div class="right_u<?php echo $id;?>" style="text-align: right;">
		<i class="far fa-trash-alt trash<?php echo $id ;?>"  style="color: red;display: inline-block;vertical-align: center;cursor: pointer;display: none;"></i>
		<div class="mm<?php echo $id;?>" style="width: max-content;max-width: 50%; margin-right: 0;margin-left: auto;margin-right: 5px;background-color: #1697ea;border-radius: 20px;border-bottom-right-radius: 0px;margin-top: 10px;text-align: left;padding-left: 20px;padding-right:20px;padding-top: 10px; padding-bottom: 1px; height: auto;word-wrap: break-word;margin-bottom: 5px;display: inline-block;">
			<p style="color: white;margin-top: 5px;font-weight: 400;"><?php echo $m ;?></p>
		</div>
		
	</div>
		<script>
			
			$(".right_u<?php echo $id;?>").mouseover(function(){
			
				$(".trash<?php echo $id;?>").css('display','inline-block');
				$(".trash<?php echo $id;?>").on('click',function(){
					var message = '<?php echo  $id;?>';
					$.ajax({
						type:'POST',
						url:'delet_m.php',
						data:{
							message:message,
						},success:function(){
							$(".mm<?php echo $id;?>").css("display","none");
							$(".trash<?php echo $id ;?>").css('display','none');
						}
					})
				})
			})
			
			$(".right_u<?php echo $id;?>").mouseleave(function(){

				$(".trash<?php echo $id;?>").css('display','none');
			})
		</script>

		<?php
	}
}}else{
	;?>
	<div  class="no" style="width: 60%;margin-left: auto;margin-right: auto;text-align: center;">
	<img src="./img/icon.png" style="width: 100%;height: 200px;">
	<h5 style="font-weight: 600;">New conversation</h5>
	<div>
	<?php
}

;?>




<?php
include("./connect.php");
$id = $_POST['id'];

$d = mysqli_query($con,"SELECT * FROM messages WHERE user_to='$id' or user_by='$id' ORDER BY id ASC");
$up = mysqli_query($con,"UPDATE messages SET noti='' WHERE user_to='$id'");
$ce = mysqli_num_rows($d);
if($ce<0){
;?>
	<div style="line-height: 0.2;">
	<div style="width: 200px;margin-left: auto;margin-right: auto;">
		<img src="./img/noti.png" style="width: 100%;height: 150px;">
	</div>
	<p style="text-align: center;color: black;font-weight: 400;font-family: verdana">No notifications</p>
</div>
	<?php
}else{

	echo "<div>";
$msg_arry = array($id);
while ($f = mysqli_fetch_array($d)) {
	
$user_from = $f['user_by'];
					$user_to = $f['user_to'];
					$msg_body = $f['message'];
					if($user_from == $id) {
						$users_id = $user_from;
					}else if($user_to == $id) {
						$users_id = $user_from;
					}
					if(in_array($users_id, $msg_arry)) {
						
					}else{
						$msg_arry[] = $users_id;
						$noti = $f['noti'];
if($noti=='no'){
	$liked_by_id = $f['user_by'];
	$message = $f['message'];
	

	$SELECT = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by_id'");
	$get = mysqli_fetch_array($SELECT);
	$liked_by_n = ucfirst($get['firstname']);
	$liked_by_t = ucfirst($get['lastname']);
	$liked_by_pic = $get['pic'];
	;?>
	<div class="tr">
	<div style="margin-bottom: 10px;margin-left: 10px;">
	<img src="<?php echo $liked_by_pic;?>" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;">
	<div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;">
		<p style="color: #1697ea;font-family: sans-serif;"><?php echo "".$liked_by_n." ".$liked_by_t."";?></p>
		<div style="max-width: 230px;overflow: hidden; text-overflow: ellipsis !important;white-space: nowrap;"><p style="color: black;font-weight: 400;margin-top: 5px;"><?php echo $message;?></p></div>
	</div>	
	<div style="display: inline-block;float: right;margin-right: 5px;width: 10px;height: 10px;background-color:red;border-radius: 50%; vertical-align: top;"><span style="visibility: hidden;">d</span></div>
	</div>
</div>
	<?php
	
}else{
	$liked_by_id = $f['user_by'];
	
$message = $f['message'];
	$SELECT = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by_id'");
	$get = mysqli_fetch_array($SELECT);
	$liked_by_n = ucfirst($get['firstname']);
	$liked_by_t = ucfirst($get['lastname']);
	$liked_by_pic = $get['pic'];
	$id = $get['id'];

	$s = mysqli_query($con,"SELECT * FROM messages WHERE user_to='$id'");
	$f = mysqli_fetch_array($s);
	$time = $f['time'];
	$time_e = $f['time'];

	$time_c = date('Y-m-d h:i:s a', time());
	
	;?>
	<script>
		var date1 = new Date("<?php echo $time_e;?>");
var date2 = new Date("<?php echo $time_c;?>");

var diff = date2.getTime() - date1.getTime();

var msec = diff;
var hh = Math.floor(msec / 1000 / 60 / 60);
msec -= hh * 1000 * 60 * 60;
var mm = Math.floor(msec / 1000 / 60);
msec -= mm * 1000 * 60;
var ss = Math.floor(msec / 1000);
msec -= ss * 1000;

if(hh>23){
	var s = hh/24;
	var f = s.toString().split(".")[0];
	//alert(f+" days");
}else{
	//alert(  mm+" min" );
}
	</script>
	<div class="tre">
	<div style="margin-bottom: 10px;margin-left: 10px;" class="l<?php echo $id;?>">
	<img src="<?php echo $liked_by_pic;?>" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;">
	<div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;">
		<p style="color: black;font-family: sans-serif;"><?php echo "".$liked_by_n." ".$liked_by_t."";?></p>
		<div style="max-width: 230px;overflow: hidden; text-overflow: ellipsis !important;white-space: nowrap;"><p style="color: gray;margin-top: 5px;"><?php echo $message;?></p></div>
	</div>	
	</div>
</div>
<script>
	$(".l<?php echo $id;?>").on('click',function(){
		$('.nnt').css('display','none');
		var
			user_id = '<?php echo $id;?>',
			user = '<?php echo $id;?>';
			$.ajax({
									type:'POST',
									url:'chat.php',
									data:{
										user_id:user_id,
										user:user,
										
									},success:function(data){

										$(".dd").html(data);
										conn.close();
									},error:function(){
										alert('errro');
									}
								})

	})
</script>
	<?php
	
}
}
	echo "</div>";
					}


}
 ;?>
<?php 
include('./connect.php');
$s_id = $_POST['s_id'];
$id = $_POST['id'];
$val = $_POST['val'];
$go = mysqli_query($con,"SELECT * FROM users WHERE id='$s_id'");
$g = mysqli_fetch_array($go);
$_firstname = ucfirst($g['firstname']);
$_lastname = ucfirst($g['lastname']);
$_pic = $g['pic'];
$se = mysqli_query($con,"SELECT * FROM users WHERE firstname LIKE '%".$val."%' OR lastname LIKE '%".$val."%' ORDER BY id DESC") or die(mysqli_error($con));
if(mysqli_num_rows($se)>0){
	while ($f= mysqli_fetch_array($se)) {
		$ide = $f['id'];
		$st = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$id' AND follow_by='$ide'");
		if(mysqli_num_rows($st)>0){
			$data = '';
			while ($fe = mysqli_fetch_array($st)) {
				$by = $fe['follow_by'];
				$get_users = mysqli_query($con,"SELECT * FROM users WHERE id='$by'");
				$uu = mysqli_fetch_array($get_users);
				$fir = ucfirst($uu['firstname']);
				$las = ucfirst($uu['lastname']);
				$users = $uu['id'];
				$pic = $uu['pic'];
				$then = mysqli_query($con,"SELECT * FROM followers WHERE follow_by='$s_id' AND follow_to='$users'");
					if(mysqli_num_rows($then)==1){
						$un = '<button id="t_following'.$users.'" class="t_following" style="display: block;">
							<p style="margin-top: 1.5px;font-weight: 400;">Following</p>
						</button>
						<button id="t_follow'.$users.'" class="t_follow" style="display: none;">
							<p style="margin-top: 1.5px;font-weight: bold;">Follow</p>
							</button>
						';
					}else{
						$un = '<button id="t_follow'.$users.'" class="t_follow" style="display: flex;">
							<p style="margin-top: 1.5px;font-weight: bold;">Follow</p>
							</button>
							<button id="t_following'.$users.'"" class="t_following" style="display: none;">
							<p style="margin-top: 1.5px;font-weight: 400;">Following</p>
							</button>
							';
					}
					if($by==$s_id){
						;?>
						<script>
							$('#t_follow<?php echo $users;?>').css('display','none');
							$('#t_following<?php echo $users;?>').css('display','none');
						</script>
						<?php
					}
				;?>
				<div style="" class="users_se">
					<div id="users<?php echo $users;?>" style="width: 80%;margin-top: 7px;">
						<div style="display: flex;width: 80%; ">
							<img src="<?php echo $pic;?>" style="width: 50px;height: 50px;border-radius: 50%;">
							<div style="margin-left: 12px;">
								<p style="font-weight: 400;"><?php echo $fir;?> <?php echo $las;?></p>
								<p style="margin-top: -20px;color: gray;">jelma</p>
							</div>
						</div>
					</div>
					<div style="width: 30%;margin-top: 15px;">
						<?php echo $un;?>
					</div>
				</div>
				<script>
					$('#t_follow<?php echo $users;?>').on('click',function(){

							$(this).css('display','none');
							$('.profile_options').css('display','none');
							$('#t_following<?php echo $users;?>').css('display','flex');
							
							var 
								follow_by = '<?php echo $s_id;?>',
								follow_to = '<?php echo $users;?>';
							$.ajax({
								type:'POST',
								url:'follow.php',
								data:{
									follow_by:follow_by,
									follow_to:follow_to,
								},success:function(data){
								}
							})
							//set notification by websocket API.
						conn.onopen = function(e) {

					    console.log("Connection established!");
					    
					};
					conn.onerror = function(e) {
					    console.log("error");
					};
							conn.onmessage = function(e){

							}
								var 
									by = '<?php echo $s_id;?>',
									to = '<?php echo $users;?>',
									firstname = '<?php echo $_firstname;?>',
									lastname = '<?php echo $_lastname;?>',
									pic = '<?php echo $_pic;?>';
									data = {
										"type":"follow",
										"by":by,
										"to":to,
										"firstname":firstname,
										"lastname":lastname,
										"pic":pic,
										}
									conn.send(JSON.stringify(data));
					})
						$('#t_following<?php echo $users;?>').on('click',function(){
						$(this).css('display','none');
						$('#t_follow<?php echo $users;?>').css('display','flex');
						var 
							follow_by = '<?php echo $s_id;?>',
							follow_to = '<?php echo $users;?>';
						$.ajax({
							type:'POST',
							url:'unfollow.php',
							data:{
								follow_by:follow_by,
								follow_to:follow_to,
							},
						})
					})

					$('#users<?php echo $users;?>').on('click',function(){
						var id = '<?php echo $users;?>';
						$.ajax({
							type:'POST',
							url:'profile.php',
							data:{
								id:id,
							},beforeSend:function(){
								$(".spi").css("display","block");
							},success:function(data){
								$(".spi").css("display","none");
								$(".ale").css("display","block");
								$(".ale").html(data);
							}
						})	
					})
				</script>
				<?php
				
			}
		}else{
			$data = '<p style="color: #8b8d90;text-align: center;">No followers</p>';
		}
	}
	echo $data;
	
}else{
	;?>
	<p style="color: #8b8d90;text-align: center;">No followers</p>
	<?php
}

;?>
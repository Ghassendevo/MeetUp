<?php 
include('./connect.php');
$s_id = $_POST['s_id'];
$id = $_POST['id'];

$go = mysqli_query($con,"SELECT * FROM users WHERE id='$s_id'");
$g = mysqli_fetch_array($go);
$_firstname = ucfirst($g['firstname']);
$_lastname = ucfirst($g['lastname']);
$_pic = $g['pic'];
$s = mysqli_query($con,"SELECT * FROM followers WHERE follow_by='$id' ") or die(mysqli_error($con));
if(mysqli_num_rows($s)==0){
	;?>
	<p style="color: #8b8d90;text-align: center;">No following</p>
	<?php
}else{
	//follwers
	;?>
	<div style="background-color: #f0f2f5;width: 100%;border-radius: 10px;height: 37px;">
		<div style="display: flex;justify-content: space-between;margin-left: 10px;">
			<i class="fas fa-search" style="color: #8f959c;margin-top: 7px;"></i><input type="text" class="fo_search" placeholder="Search following..." name="" onkeyup="search()"><i class="fas fa-times te" style="color: black;margin-top: 7px;margin-right: 5px;cursor: pointer;visibility: hidden;"></i>
		</div>
		<div class="data_search" style=" width: 100%;margin: auto;margin-top: 15px;height: 55vh;overflow: hidden;overflow-y: auto;">
				<?php 
				while ($f = mysqli_fetch_array($s)) {
					$follow_to = $f['follow_to'];
					$se = mysqli_query($con,"SELECT * FROM users WHERE id='$follow_to'") or die(mysqli_error($con));
					$get = mysqli_fetch_array($se);
					$fir = ucfirst($get['firstname']);
					$las = ucfirst($get['lastname']);
					$pic = $get['pic'];
					$users = $get['id'];
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
					if($follow_to==$s_id){
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
				;?>
		</div>
	</div>
	<?php
}
;?>
<script>
	function search(){
		var  g  = setInterval(count,0);
		function count(){
			var ine = $('.fo_search').val();
			if(ine==''){
				$('.te').css('visibility','hidden');
				clearInterval(count);
			}else{
				$('.te').css('visibility','visible');
			}
		}
		
$('.te').css('visibility','visible');
var
	s_id='<?php echo $s_id;?>',
	id = '<?php echo $id;?>',
	val = $('.fo_search').val();
	
		$.ajax({
		type:'POST',
		url:'followerss_search.php',
		data:{
			s_id:s_id,
			id:id,
			val:val,
		},beforeSend:function(){
			$('.data_search').html('<div style="text-align: center;margin-top: 10px;" class="newe_spi"><div class="lds-roller"><div></div><div></div><div></div></div></div>');
		},success:function(data){
			$('.data_search').html(data);
		}
	})
	}



	$('.te').on('click',function(){
		$(this).css('visibility','hidden');
		$('.fo_search').val('');
		var 
		s_id='<?php echo $s_id;?>',
		id= '<?php echo $id;?>';
		$.ajax({
		type:'POST',
		url:'followers.php',
		data:{
			s_id:s_id,
			id:id,
		},beforeSend:function(){
			$('.foll_data').html('<div style="text-align: center;margin-top: 10px;" class="new_spi"><div class="lds-roller"><div></div><div></div><div></div></div></div>');
		},success:function(d){
			$('.foll_data').html(d);
		}
	})
	})
</script>
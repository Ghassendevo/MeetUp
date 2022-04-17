
<?php 
include("./connect.php");

ob_start();
session_start();
if (!isset($_SESSION['login_user'])) {
	header('location: findurcrush.php');
}
else {
	$user = $_SESSION['login_user'];
}

//update online time
$update = mysqli_query($con,"UPDATE users SET status='online' WHERE username='$user'") or die(mysqli_error($con));
//get user informations.
$select = mysqli_query($con,"SELECT * FROM users WHERE username='$user'") or die(mysqli_error($con));
$ff = mysqli_fetch_array($select);
$user_firstname = ucfirst($ff['firstname']);
$user_lastname = ucfirst($ff['lastname']);
$user_pic = $ff['pic'];
$user_status = $ff['status'];
$user_first = $ff['first'];
$user_id = $ff['id'];
;?>
<div class="html"></div>

<div style="position: absolute;left: -90%;visibility: hidden;">
	<input id="base" type="text" name="">
</div>
<?php 
	$tag = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$user_id' AND noti='no'");
 	$t =mysqli_num_rows($tag);
 	$tage = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$user_id' AND noti='no'");
 	$e = mysqli_num_rows($tage);

 if($t+$e!==0){
 	if($t==0){
 		$te='';
 	}else{
 		$te=$t;
 	}
 	if($e==0){
 		$ee='';
 	}else{
 		$ee=$e;
 	}
 	;?>
 	<script>
 		var one = '<?php echo $te;?>',
 			two = '<?php echo $ee;?>';
 		if(one==''){
 			 var all = +two+one;
 		}
 		if(two==''){
 			var all  = +one+two;
 		}
 		$('.sfee').css('display','inline-block');
 		$('.sfee').html(all);
 		$('#base').val(all);
 	</script>
 	<?php
 }
	;?>
<?php
if($user_pic==''){
	;?>
	<div class="all" style="">
		<div class="first">
			<h3 style="text-align: center;font-weight: 400;font-family: sans-serif;color: black;margin-top: 5px;">UPLOAD PIC</h3>
			<hr>
			<input type="file"  name="file" id="file" class="file" style="display: none;">
			<label for="file"><div class="upload"><i class="fas fa-cloud-upload-alt" style="font-size: 40px;margin-top: 50px;"></i><i class="fas fa-check"  style="font-size: 40px;margin-top: 50px;color: green;display: none;"></i></div></label>
			<button class="start" >start</button>
		</div>
	</div>
	<script>

		ss= true;
		setInterval(function(){
			var
				file = $(".file").val();
			if(file!==''){
				$('.start').css("background-color","#1697ea");
				$(".fa-check").fadeIn();
				$(".fa-cloud-upload-alt").css("display","none");
			var ss = true;
			}else{
				$('.start').css("background-color","#f0f0f0");
				var ss = false;
			}
		})
		if(ss==true){
				$(".start").on('click',function(){
					var ff = document.getElementById('file').files[0];
			if(ff.size<3000000){
			var file_data = $('.file').prop('files')[0];
			var id = '<?php echo $user_id ;?>';
			var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('id', id);
						$.ajax({
				type:'POST',
				url:"upload_profile.php",
				contentType: false,
				processData: false,
				data:form_data,
				success:function(data){
					alert(data)
					$(".html").append(data);
					
					
				}

			})
		}else{
			
		}
		})
		}
	</script>
	<?php
}

;?>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- MDB icon -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
   <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
 <link rel="stylesheet" href="../package/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<div class="lefte">
<div style="position: fixed;">
	<div class="name" id="only_name" onclick="pro()">
		<img class="when" src="<?php echo $user_pic ;?>" style="height: 40px;width: 40px;border-radius: 50%;display: inline-block;margin-left: 5px;">
		<p style="display: inline-block;font-weight: 400;font-family: Segoe UI;margin-left: 10px;margin-bottom: -20px;"><?php echo "".$user_lastname." ".$user_firstname."" ;?></p>
	</div>
	<script>
		function pro(){
			$(".ale").css("display","none");
			var id = '<?php echo $user_id;?>';
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
		}


	</script>
	<div class="name" style="margin-left: 20px;">
		<i class="fas fa-users-cog" style="color: #1697ea;font-size: 25px;margin-left: 10px;"></i><p style="display: inline-block;font-weight: 400;font-family: Segoe UI;margin-left: 10px;margin-bottom: -20px;">Contact with Ghassen</p>
	</div>
	<div class="name" style="margin-left: 20px;">
		<i class="fas fa-bug" style="font-size: 25px;color: red;margin-left: 10px;"></i></i><p style="display: inline-block;font-weight: 400;font-family: Segoe UI;margin-left: 10px;margin-bottom: -20px;">Report for bugs</p>
	</div>
	<hr style="color: #dcdfe3;margin-left: 20px;">
	<h5 style="color:#65676b;font-weight: 400;font-family: Segoe UI;">Profile views</h5>
	<div class="name" style="margin-left: 20px;">
<i class="far fa-eye" style="font-size: 25px; color: gray;margin-left: 10px;"></i><p style="display: inline-block;font-weight: 400;font-family: verdana;margin-left: 10px;margin-bottom: -20px;">10 user viewed your profile</p>
	</div>
	<hr style="color: #dcdfe3;margin-left: 20px;">
	<div class="rec" id="up">
		<span style="margin-left: 5px;color:#65676b;font-weight: 400;font-family: arial;font-size: 18px;">Recent</span><div class="angle"><i class="fas fa-angle-up up" style="color: #808080;margin-top: 5px;font-size: 20px;"></i><i class="fas fa-angle-down down" style="color: #808080;margin-top: 5px;font-size: 20px;display: none;"></i></div>
	</div>
	<div class="rec" id="down" style="display: none;">
		<span style="margin-left: 5px;color:#65676b;font-weight: 400;font-family: arial;font-size: 18px;">Recent</span><div class="angle"><i class="fas fa-angle-up up" style="color: #808080;margin-top: 5px;font-size: 20px;"></i><i class="fas fa-angle-down down" style="color: #808080;margin-top: 5px;font-size: 20px;display: none;"></i></div>
	</div>
	<div class="re" style="margin-left: 20px;max-height: 50px;border-left: 1px solid #dcdfe3;padding-left: 10px;margin-top: 10px;">
		No recent 
	</div>
</div>
</div>

<div class="centere">
		<div class="gender" >
			<div style="width: 95%;margin: auto;display: flex;margin-top: 15px;">
				<div  onclick="set_post()"><img src="<?php echo $user_pic;?>" style="width: 40px;height: 40px;cursor: pointer; border-radius: 50%;"></div>
				<div class="posting" ><p style="color: gray;margin-top: 5px;margin-left: 10px;font-family: Segoe UI;"  onclick="set_post()">Show the world your future</p>
				<div class="vend vend_both" onclick="select()"><i class="fas fa-venus-mars" style="color: white;font-size: 20px;margin-top: 10px;"></i></div>
			<div class="vend vend_male" onclick="select()" style="display: none;"><i class="fas fa-male" style="color: white;font-size: 25px;margin-top: 9px;"></i></div>
			<div class="vend vend_female" onclick="select()" style="display: none;"><i class="fas fa-female" style="color: white;font-size: 25px;margin-top: 9px;"></i></div>	
				</div>
			</div>
</div>
<script>
	function set_post(){
		$('#add_post').css('display','block');
		$('.audience').css('display','none');
		$('.postinge').css('display','block');
		start = setInterval(count,0);
		function count(){
			var text = $('#area').val();
			if(text!==''){
				$('#bu').removeClass('bef_b');
				$('#bu').addClass('aft_b');

			}else{
				$('#bu').removeClass('aft_b');
				$('#bu').addClass('bef_b');
			}
		}
	}
	$('.fermer').on('click',function(){
		$('#add_post').css('display','none');
		$('#ii_po').css('height','400px');
		$('.post_images').css('display','none');
		$('#area').val('');
		clearInterval(start);
	})
</script>
<div class="takes">
			<div class="non male" onclick="male()">
				<div style="width: 35px; height: 35px;margin-left: 10px;margin-top: 10px; border-radius: 50%;text-align: center;background-color: #1697ea;display: inline-block;"><i class="fas fa-male" style="color: white;font-size: 25px;margin-top: 5px;"></i>	</div>
				<p style="display: inline-block;font-size: 17px;font-weight: 400;">Male</p>
				<i class="fas fa-angle-right right_male" style="display: inline-block;float: right;vertical-align: bottom;margin-top: 15px;margin-right: 5px;font-size: 20px;color: #808080;"></i>
			</div>
			<div class="non female" onclick="female()">
				<div style="width: 35px; height: 35px;margin-left: 10px;margin-top: 10px; border-radius: 50%;text-align: center;background-color: #1697ea;display: inline-block;"><i class="fas fa-female" style="color: white;font-size: 25px;margin-top: 5px;"></i>	</div>
				<p style="display: inline-block;font-size: 17px;">Female</p>
				<i class="fas fa-angle-right right_female" style="display: inline-block;float: right;vertical-align: bottom;margin-top: 15px;margin-right: 5px;font-size: 20px;color: #808080;"></i>
			</div>
			<div class="non both" style="background-color: #f0f2f5;cursor: default;" onclick="both()">
				<div style="width: 35px; height: 35px;margin-left: 10px;margin-top: 10px; border-radius: 50%;text-align: center;background-color: #1697ea;display: inline-block;"><i class="fas fa-venus-mars" style="color: white;font-size: 20px;margin-top: 9px;"></i>	</div>
				<p style="display: inline-block;font-size: 17px;">Both</p>
				<i class="fas fa-angle-right right_both" style="display: inline-block;float: right;vertical-align: bottom;margin-top: 15px;margin-right: 5px;font-size: 20px;color: #808080;display: none;"></i>
			</div>
		</div>
		<div class="all_data" style="margin-bottom: 80px;">
			<?php 
include("./connect.php");
$data = mysqli_query($con,"SELECT * FROM posts ORDER BY id DESC") or die(mysqli_error($con));
while ($fetch = mysqli_fetch_array($data)) {
	$posted_by=$fetch['posted_by'];
	$post_id= $fetch['id'];
	$share = $fetch['share'];
	if($share=='yes'){
		$share_id = $fetch['share_id'];
	}
	if($fetch['type']=='text'){
		$post_text = $fetch['texte'];
	}else{
		$post_text = '';
	}
	 if($fetch['type']=='image'){
		$post_img ='<img src="'.$post_img.'" style="width: 100%;height: auto;margin-top: 5px;cursor: pointer;">';
	}else{
		$post_img ='';
	}
	if($fetch['type']=='video'){
		$post_video = $fetch['video'];
	}else{
		$post_video = '';
	}
	$analyse = mysqli_query($con,"SELECT * FROM users WHERE id='$posted_by'") or die(mysqli_error($con));
	while ($ana= mysqli_fetch_array($analyse)) {
		
	
	$firstname = ucfirst($ana['firstname']);
	$lastname = ucfirst($ana['lastname']);

	$pic = $ana['pic'];
	$id = $ana['id'];
	$to_id = $ana['id'];
	//count likes.
	$likes = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$id'") or die(mysqli_error($con));
	$count_likes = mysqli_num_rows($likes);
	if($count_likes>0){
		$ce = '<div style="margin-top: 5px;">
					<i class="far fa-heart " style="color: #8b8d90;cursor:pointer;"></i> <p style="display: inline-block;color: #8b8d90;font-size: 16px;font-weight: 400;">'.$count_likes.'</p>
				</div>';
	}else{
		$ce='';
	}
	//check if the user is already like the profile.
	$ch = mysqli_query($con,"SELECT * FROM likes WHERE liked_by='$user_id' AND liked_to='$id'") or die(mysqli_error($con));
	$get = mysqli_num_rows($ch);
	if($get>0){
		$like = '<i class="fas fa-heart dislike'.$id.'" style="color:red;font-size:30px;cursor:pointer;"></i><i class="far fa-heart like'.$id.'" style="color:gray;cursor:pointer; font-size:30px;display:none;"></i>';
	}else{
		$like = '<i class="far fa-heart like'.$id.'" style="color:gray;cursor:pointer; font-size:30px;"></i><i class="fas fa-heart dislike'.$id.'" style="color:red;font-size:30px;display:none;cursor:pointer;"></i>';
	}
}
	;?>

	<div id="user_p<?php echo $post_id;?>" class="user_p" >
		
		<div id="hover_div<?php echo $post_id;?>" style="display: none; position: absolute;background-color: white;border-radius: 10px;left: 2%;width: 25%;height: 150px;-webkit-box-shadow: 0px 0px 25px -2px rgba(156,151,156,1);-moz-box-shadow: 0px 0px 25px -2px rgba(156,151,156,1)box-shadow: 0px 0px 25px -2px rgba(156,151,156,1);">
			<div style="width: 95%;margin: auto;margin-top: 10px;display: flex;">
				<img src="<?php echo $pic;?>" style="width: 60px;height: 60px;border-radius: 50%;cursor: pointer;">
				<div style="margin-left: 10px;">
					<h4 class="h4_hov" style=""><?php echo "".$firstname." ".$lastname."";?></h4>
					<div style="display: flex;"><i class="fas fa-map-marker-alt" style="color: gray;font-size: 25px;"></i> <p style="font-weight: 400;margin-left: 10px;font-size: 18px;">From</p>, <strong style="font-weight: bold;font-size: 18px;margin-left: 5px;"> Jelma</strong></div>
				</div>
			</div>
			<div style="width: 95%;margin: auto;margin-top: 5px;display: flex;justify-content: space-around;">
				<?php
				if($id!==$user_id){
				$s= mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$id' AND follow_by='$user_id'");
				if(mysqli_num_rows($s)>0){
					$but = '<button id="hov_following'.$id.'" class="hov_following">Following</button>
						<button class="hov_follow" id="hov_follow'.$id.'" style="display:none;">Follow</button>
					';
					}else{
						$but = '<button id="hov_following'.$id.'" style="display:none;" class="hov_following">Following</button>
						<button class="hov_follow" id="hov_follow'.$id.'">Follow</button>
					';
					}
					echo $but;
					;?>
					<button id="hov_mess<?php echo $id;?>" class="hov_mess">
							<i class="far fa-comment-dots" style="color: black!important;margin-top: 1px;font-size: 20px;"></i>
					</button>
					<?php
					}
				 ;?>
				<script>
					$('#hov_following<?php echo $id;?>').on('click',function(){
						$(this).css('display','none');
						$('#hov_follow<?php echo $id;?>').css('display','block');

						var 
							follow_by = '<?php echo $user_id;?>',
							follow_to = '<?php echo $id;?>';
						$.ajax({
							type:'POST',
							url:'unfollow.php',
							data:{
								follow_by:follow_by,
								follow_to:follow_to,
							},
						})
					})
					$('#hov_follow<?php echo $id;?>').on('click',function(){
						$(this).css('display','none');
						$('#hov_following<?php echo $id;?>').css('display','block');


						conn.onopen = function(e) {

					    //console.log("Connection established!");
					    
					};
					conn.onerror = function(e) {
					   // console.log("error");
					};
					var 
				by = '<?php echo $user_id;?>',
				to = '<?php echo $id;?>',
				firstname = '<?php echo $firstname;?>',
				lastname = '<?php echo $lastname;?>',
				pic = '<?php echo $pic;?>';
				data = {
					"type":"follow",
					"by":by,
					"to":to,
					"firstname":firstname,
					"lastname":lastname,
					"pic":pic,
					}
				conn.send(JSON.stringify(data));

						var 
						follow_by = '<?php echo $user_id;?>',
						follow_to = '<?php echo $id;?>';
						$.ajax({
						type:'POST',
						url:'follow.php',
						data:{
							follow_by:follow_by,
							follow_to:follow_to,
						},success:function(data){
						}
					})
					})
				</script>
			</div>
		</div>
		<div class="" style="width: 95%;margin: auto;margin-top: 10px;display: flex;justify-content: space-between;">
			<div style="display: flex;">
				<img src="<?php echo $pic;?>" style="width: 43px;height: 43px;border-radius: 50%;cursor: pointer;">
				<span style="margin-top: 25px;margin-left: -10px; background-color: white;width: 12px;height: 12px;border-radius: 50%;border:2px solid green;"><p style="visibility: hidden;">d</p></span>
				<div style="margin-left: 5px;margin-top: -2px;">
					<strong id="str<?php echo $post_id;?>" class="str"><span> <?php echo  ''.$firstname.' '.$lastname.'';?></span></strong>
					<div style="display: flex;">
						<span style="color: gray;display: block;font-size: 14px;font-weight: 400;margin-top: -2px;">16m</span>
						<p style="color: gray;margin-top: -10px;font-weight: ;margin-left: 3px;">.</p>
						<i class="fas fa-globe-africa" style="font-size: 13px;margin-left: 3px;margin-top: 3px;"></i>
					</div>
				</div>
			</div>
			<script>
				 var id = '<?php echo $id;?>',
				 	user_id = '<?php echo $user_id;?>';
				 if(id!==user_id){
						$('#str<?php echo $post_id;?>').mouseover(function(){
							$('#hover_div<?php echo $post_id;?>').css('display','block');
							
						})
						$('#str<?php echo $post_id;?>').mouseout(function(){
							setTimeout(function(){
								$('#hover_div<?php echo $post_id;?>').css('display','none');
							},2000)
						})
				}

			</script>
			<div style="margin-top: 10px;">
				<div class="in_hi" style="">
					<div style="width: 4px;height: 4px;margin-top: 15px; border-radius: 50%;background-color: gray;margin-right: 3px;margin-left: 7px;"><p style="visibility: hidden;">d</p></div>
				<div style="width: 4px;height: 4px;margin-top: 15px;border-radius: 50%;background-color: gray;margin-right: 3px;"><p style="visibility: hidden;">d</p></div>
				<div style="width: 4px;height: 4px;margin-top: 15px;border-radius: 50%;background-color: gray;"><p style="visibility: hidden;">d</p></div>
				</div>

			</div>
		</div>
		<div class="for_text<?php echo $id;?>" style="width: 95%;margin: auto;font-weight: 400;max-height:auto;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
			   <?php echo $post_text;?>
			   <div style="width: 95%;margin: auto;">
			   	<?php 
			   	if($share=='yes'){
			   		$get_share_post = mysqli_query($con,"SELECT * FROM posts WHERE id='$share_id'") or die(mysqli_error($con));
			   		$ana = mysqli_fetch_array($get_share_post);
			   		$share_posted_by = $ana['posted_by'];
			   		$share_audience = $ana['audience'];
			   		$share_type = $ana['type'];
			   		$share_text = $ana['texte'];
			   		//get user info****************************
			   		$go = mysqli_query($con,"SELECT * FROM users WHERE id='$share_posted_by'");
			   		$anaa = mysqli_fetch_array($go);
			   		$share_firstname= ucfirst($anaa['firstname']);
			   		$share_lastname= ucfirst($anaa['lastname']);
			   		$share_pic= $anaa['pic'];
			   		
			   		;?>
			   		<div class="show_show" style="border:1px solid #ebebeb;border-radius: 10px;">
				<div style="margin-top: 10px;width: 95%;display: flex;justify-content: space-between;margin: auto;">
							<div style="display: flex;margin-top: 10px;">
						<img src="<?php echo $share_pic;?>" style="width: 43px;height: 43px;border-radius: 50%;cursor: pointer;">
						<span style="margin-top: 25px;margin-left: -10px; background-color: white;width: 12px;height: 12px;border-radius: 50%;border:2px solid green;"><p style="visibility: hidden;">d</p></span>
						<div style="margin-left: 5px;margin-top: -2px;">
							<strong id="str<?php echo $id;?>" class="str"><span> <?php echo  ''.$share_firstname.' '.$share_lastname.'';?></span></strong>
							<div style="display: flex;">
								<span style="color: gray;display: block;font-size: 14px;font-weight: 400;margin-top: -2px;">16m</span>
								<p style="color: gray;margin-top: -10px;font-weight: ;margin-left: 3px;">.</p>
								<i class="fas fa-globe-africa" style="font-size: 13px;margin-left: 3px;margin-top: 3px;"></i>
							</div>
						</div>
					</div>
					<script>
				 var id = '<?php echo $id;?>',
				 	user_id = '<?php echo $user_id;?>';
				 if(id!==user_id){
						$('#str<?php echo $id;?>').mouseover(function(){
							$('#hover_div<?php echo $id;?>').css('display','block');
							
						})
						$('#str<?php echo $id;?>').mouseout(function(){
							setTimeout(function(){
								$('#hover_div<?php echo $id;?>').css('display','none');
							},2000)
						})
				}

			</script>

				<div style="margin-top: 10px;">
				<div class="in_hi" style="">
					<div style="width: 4px;height: 4px;margin-top: 15px; border-radius: 50%;background-color: gray;margin-right: 3px;margin-left: 7px;"><p style="visibility: hidden;">d</p></div>
				<div style="width: 4px;height: 4px;margin-top: 15px;border-radius: 50%;background-color: gray;margin-right: 3px;"><p style="visibility: hidden;">d</p></div>
				<div style="width: 4px;height: 4px;margin-top: 15px;border-radius: 50%;background-color: gray;"><p style="visibility: hidden;">d</p></div>
				</div>
			</div>
		</div>
				<div class="for_texte<?php echo $post_id;?>" style="width: 95%;margin: auto;font-weight: 400;max-height:auto;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
			  <?php echo $share_text;?>
		</div>
		<div class="for_prob<?php echo $post_id;?>" style="width: 95%;margin: auto;"><p style="display: none;" id="see_more" class="see_moree<?php echo $post_id;?>">See More</p><p style="display: none;" id="see_less" class="see_lesse<?php echo $post_id;?>">See Less</p></div>
		<div class="for_pim"><?php echo $post_img ;?><?php echo $post_video ;?></div>
		<br>
			</div>
				
			



			   		<?php
			   	}
			   	;?>
			   </div>
		</div>
		<div class="for_prob<?php echo $post_id;?>" style="width: 95%;margin: auto;"><p style="display: none;" id="see_more" class="see_more<?php echo $post_id;?>">See More</p><p style="display: none;" id="see_less" class="see_less<?php echo $post_id;?>">See Less</p></div>
		<div class="for_pim"><?php echo $post_img;?><?php echo $post_video;?></div>
		<div style="width: 95%;margin: auto;margin-top: 5px;display: flex;">
			<img src="./img/heart.png" style="width: 17px;height: 17px;cursor: pointer;"><p style="" class="likes_p">773</p><p style="font-weight: 600;color: gray;margin-top: -10px;margin-left: 3px;">.</p>
			<p class="c_cmnt" style="">22 commenters</p>
		</div>
		<hr style="width: 95%;margin: auto;margin-top: -10px;">
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<div style="width: 70%;display: flex;justify-content: space-between;">
				<div class="like_post" id="like_post<?php echo $post_id;?>">
				
					<div style="width: 80%;display: flex;margin: auto;">
						<i class="far fa-heart" style="color: gray;margin-top: 1.5px;font-size: 23px;text-align: center;"></i>
					<p style="color: #666666; font-weight: 400;font-size: 16px;margin-left: 7px;text-align: center;">React</p>
					</div>
				</div>
			<div class="cmnt_post" id="cmnt_post<?php echo $post_id;?>">
				<div style="width: 80%;display: flex;margin: auto;">
					<i class="far fa-comment-dots" style="color: gray;margin-top: 1.5px;font-size: 23px;text-align: center;"></i>
				<p style="color: #666666; font-weight: 400;font-size: 16px;margin-left: 7px;text-align: center;">Comment</p>
				</div>
			</div>
			<div id="share<?php echo $post_id;?>" class="share_post">
				<div style="width: 80%;display: flex;margin: auto;">
					<i class="fas fa-share" style="color: gray;margin-top: 1.5px;font-size: 23px;text-align: center;"></i>
				<p style="color: #666666; font-weight: 400;font-size: 16px;margin-left: 7px;text-align: center;">Share</p>
				</div>
			</div>
			</div>
		</div>
		
	</div>
<script>
	$('#share<?php echo $post_id;?>').on('click',function(){
		$('#share_post_div').css('display','block');
		var
			user_id = '<?php echo $user_id;?>',
			id = '<?php echo $id;?>',
			post_id='<?php echo $post_id;?>';
		$.ajax({
			type:'POST',
			url:'share_post.php',
			data:{
				user_id:user_id,
				id:id,
				post_id:post_id,
			},beforeSend:function(){
			$('#i_po').html('<div class="po_center"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
			},success:function(d){
				$('#i_po').html(d);
			}
		})
		
	})
</script>
<script>
	var element = document.querySelector('.for_text<?php echo $post_id;?>');
	var font = element.offsetHeight;
	if(font==72){
		$('.see_more<?php echo $post_id;?>').css('display','block');
	}
	$('.see_more<?php echo $post_id;?>').on('click',function(){
		$('.for_text<?php echo $post_id;?>').css('-webkit-line-clamp','1000')
		$(this).css('display','none');
		$('.see_less<?php echo $post_id;?>').css('display','block');
	})
	$('.see_less<?php echo $post_id;?>').on('click',function(){
		$('.for_text<?php echo $post_id;?>').css('-webkit-line-clamp','3')
		$(this).css('display','none');
		$('.see_more<?php echo $post_id;?>').css('display','block');
	})

</script>

<script>


	$("#like_post<?php echo $post_id ;?>").on('click',function(){
		var 
			liked_to = '<?php echo $post_id;?>',
			liked_by = '<?php echo $user_id;?>',
			firstname = '<?php echo $user_firstname;?>',
			lastname = '<?php echo $user_lastname;?>',
			pic = '<?php echo $user_pic ;?>';
			alert(liked_to);
				data = {
				"type":"like",
				"by":liked_by,
				"to":liked_to,
				"firstname":firstname,
				"lastname":lastname,
				"pic":pic,
			}
				conn.send(JSON.stringify(data));

		$.ajax({
			type:'POST',
			url:'like.php',
			data:{
				liked_to:liked_to,
				liked_by:liked_by,
			},
			success:function(data){
				$('.count<?php echo $id;?>').html(data);
			}
		})
	})
	$(".dislike<?php echo $post_id ;?>").on('click',function(){
		$(this).css('display','none');
		$(".like<?php echo $post_id;?>").css("display","block");
		var 
			liked_to = '<?php echo $id;?>',
			liked_by = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'dislike.php',
			data:{
				liked_to:liked_to,
				liked_by:liked_by,
			},
			success:function(data){
				$(".count<?php echo $id;?>").html(data);
			}
		})
	})
	$(".add<?php echo $post_id ;?>").on('click',function(){
		$(this).css("display","none");
		$(".remove<?php echo $id ;?>").css("display","inline-block");
	})
	$(".remove<?php echo $post_id ;?>").on('click',function(){
		$(this).css("display","none");
		$(".add<?php echo $id ;?>").css("display","inline-block");
	})


	conn.onopen = function(e) {
    console.log("Connection established!");
    
};
conn.onerror = function(e) {
    console.log("error");
};
 var  array = [];
	conn.onmessage = function(e){
		   var data = JSON.parse(e.data);
		   var user_id = '<?php echo $user_id ;?>';

		   array.push(data.by);
		  	function checkAdult(age) {
			  return age >= data.by;
			}
			function myFunction() {
				  n = array.every(checkAdult);
				}
			if(data.type=="follow"){
				if(data.to==user_id){
					var fol  = '<div class="tr"><div style="margin-bottom: 10px;margin-left: 10px;"><img src="'+data.pic+'" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;"><div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;"><p style="color: #1697ea;font-family: sans-serif;">'+data.firstname +' '+ data.lastname+'</p><p style="color: gray;">Start following you.</p></div></div><div style="display: inline-block;float: right;margin-right: 5px;"><span style="width: 10px;height: 10px;background-color:#1697ea;border-radius: 50%; "></span></div></div></div>';
					$('.no_noti').css('display','none');
		   			$('.for_noti').prepend(fol);
		   			var base = $('#base').val();
		   			$('.sfee').css('display','inline-block');
		   			if(base==''){
		   			$('.sfee').html(1);
		   			$('#base').val(1);
		   			}else{
		   				var dots = +base+1;
		   				$('#base').val(dots);
		   				$('.sfee').html(dots);
		   			}
				}
			}
		   if(data.type=="like"){
		   	if(data.to==user_id){
		   		var pr ='<div class="tr"><div style="margin-bottom: 10px;margin-left: 10px;"><img src="'+data.pic+'" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;"><div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;"><p style="color: #1697ea;font-family: sans-serif;">'+data.firstname +' '+ data.lastname+'</p><p style="color: gray;">gave to your profile a like</p></div></div><div style="display: inline-block;float: right;margin-right: 5px;"><span style="width: 10px;height: 10px;background-color:#1697ea;border-radius: 50%; "></span></div></div></div>';
				$('.no_noti').css('display','none');
		   		$('.for_noti').prepend(pr);
		   		var base = $('#base').val();
		   			$('.sfee').css('display','inline-block');
		   			if(base==''){
		   			$('.sfee').html(1);
		   			$('#base').val(1);
		   			}else{
		   				var dots = +base+1;
		   				$('#base').val(dots);
		   				$('.sfee').html(dots);
		   			}

		   	}
  			 }

	}
</script>
	
	<?php

}
;?>
		
		</div>

</div>
	<div class="spinner-grow text-primary spie" role="status" style="position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;width: 100px;height: 100px;display: none;">
  <span class="sr-only">Loading...</span>
</div>

<div class="righte">
	<div style="position: fixed;height: 82vh;
	width: 25%;margin-top: 30px;">
		<div class="my">
			<p style="font-family: verdana;margin-top: 5px;margin-left: 5px;">YOUR PROFILE</p>
			<hr style="background-color: #1697ea;border-radius: 10px; width: 18%;margin-left: 10px;margin-top: -6px; float: left;height: 2px;">
			<div class="pp_ii" style="text-align: left;float: left;width: 100%;line-height: 0.5">
				<div id="ov" style="display: inline-block;"><img src="<?php echo $user_pic ;?>" style="width: 57px;height: 57px;border-radius: 50%;margin-left: 15px;display: inline-block;"></div>
				<div style="display: inline-block;vertical-align: top;margin-left: 5px;">
					<p style="font-family: verdana;color:#1697ea; ">My Profile</p>
					<i class="far fa-comment-alt" style="display: inline-block;color: #8b8d90;"></i> <p style="display: inline-block;color: #8b8d90; ">Messages</p>
					<p style="display: inline-block;background-color: #f0f2f5;color:#8b8d90;padding-top: 5px;padding-left: 5px;padding-right: 5px;padding-bottom: 5px; ">5</p>
					<div>
						<i class="far fa-bell" style="display: inline-block;color: #8b8d90;"></i> <p style="display: inline-block;color: #8b8d90; ">Notifications</p> <p style="display: inline-block;background-color: #f0f2f5;color:#8b8d90;padding-top: 5px;padding-left: 5px;padding-right: 5px;padding-bottom: 5px; ">2</p>
					</div>
				</div>
				
			</div>
			<div style="width: 100%;text-align: center;">
					<div class="likess" >Likes</div><div class="views">Views</div>
			</div>
			<div style="text-align: center;margin-top: 15px;" class="info_take">
				<i class="far fa-heart " style="color: #8b8d90;cursor:pointer;display: inline-block;"></i> <p style="display: inline-block;color: black;font-size: 20px;font-weight: 400;">885</p>
				<div style="overflow: hidden;height: 45px;text-align: center;margin-left: 5px;">
					<?php 
					$take = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$user_id'") or die(mysqli_error($con));
					while ($gg = mysqli_fetch_array($take)) {
						$liked_by_id = $gg['liked_by'];
						$uu = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by_id'") or die(mysqli_error($con));
						$ger  = mysqli_fetch_array($uu);
						$liked_by_pic = $ger['pic'];
						$nn = $ger['id'];
						$arr = array($liked_by_id);
						
						if($nn==8){
							break;
						}
						;?>
					<img id="ii<?php echo $liked_by_id ;?>" src="<?php echo $liked_by_pic ;?>" style="width: 45px;height: 45px;border-radius: 50%;margin-left: -15px;border: 2px solid white;">
						<?php
					}

					;?>
				</div>
			</div>
			<div style="text-align: center;margin-top: 15px;display: none;" class="info_takes">
		<i class="fas fa-eye " style="color: #8b8d90;cursor:pointer;display: inline-block;"></i> <p style="display: inline-block;color: black;font-size: 20px;font-weight: 400;">885</p>
				<div style="overflow: hidden;height: 45px;text-align: center;margin-left: 5px;">
					<?php 
					$take = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$user_id'") or die(mysqli_error($con));
					while ($gg = mysqli_fetch_array($take)) {
						$liked_by_id = $gg['liked_by'];
						$uu = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by_id'") or die(mysqli_error($con));
						$ger  = mysqli_fetch_array($uu);
						$liked_by_pic = $ger['pic'];
						$nn = $ger['id'];
						$arr = array($liked_by_id);
						
						if($nn==8){
							break;
						}
						;?>
					<img id="ii<?php echo $liked_by_id ;?>" src="<?php echo $liked_by_pic ;?>" style="width: 45px;height: 45px;border-radius: 50%;margin-left: -15px;border: 2px solid white;">
						<?php
					}

					;?>
				</div>
			</div>
		</div>
		<div class="people">
			<p style="font-family: verdana;margin-top: 5px;margin-left: 5px;">PEOPLE YOU MAY KNOW</p>
			<hr style="background-color: #1697ea;border-radius: 10px; width: 18%;margin-left: 10px;margin-top: -6px; float: left;height: 2px;">
			<div class="swiper-container">
			    <div class="swiper-wrapper">
			    	<?php 
			    	$get = mysqli_query($con,"SELECT * FROM users") or die(mysqli_error($con));
			    	while ($jj = mysqli_fetch_array($get)) {
			    		$pp_pic = $jj['pic'];
			    		$pp_firstname = ucfirst($jj['firstname']);
			    		$pp_lastname = ucfirst($jj['lastname']);
			    		;?>
			    		 <div class="swiper-slide">
			    		 	<div style="margin-left: auto;margin-right: auto;width: 45px;"><img src="<?php echo $pp_pic ;?>" style="width: 60px;height: 60px;border-radius: 50%;display: block;"></div>
			    		 	<p style="font-family: verdana;display: block;margin-left: 10px;"><?php echo "".$pp_firstname." ".$pp_lastname." " ;?></p>
			    		 	<i class="far fa-heart " style="color: #8b8d90;cursor:pointer;"></i> <p style="display: inline-block;color: #8b8d90;font-size: 16px;font-weight: 400;">885</p>
			    		 	<i class="fas fa-eye " style="color: #8b8d90;cursor:pointer;"></i> <p style="display: inline-block;color: #8b8d90;font-size: 16px;font-weight: 400;">885</p>
			    		 </div>
			    		<?php
			    	}
			    	;?>
			     
			     
			    </div>
			    <!-- Add Arrows -->
			    <div class="swiper-button-next"></div>
			    <div class="swiper-button-prev"></div>
			    <!-- Add Pagination -->
			    <div class="swiper-pagination"></div>
			  </div>
		</div>
	</div>


		
</div>
<div class="rec_m" style="display: none;">
	<?php 


$user = $user_id;
$se  = mysqli_query($con,"SELECT * FROM messages WHERE user_to='$user' OR user_by='$user' ORDER BY id ASC") or die(mysqli_error($con));
$msg_arry = array($user);
echo "<div style='position:fixed;'>";
while ($get_msg = mysqli_fetch_array($se)) {
					$id = $get_msg['id'];
					$user_from = $get_msg['user_by'];
					$user_to = $get_msg['user_to'];
					$msg_body = $get_msg['message'];
					if($user_from == $user) {
						$users_id = $user_to;
					}else if($user_to == $user) {
						$users_id = $user_from;
					}
					if(in_array($users_id, $msg_arry)) {
						
					}else{
						$msg_arry[] = $users_id;
						$get_user_info = mysqli_query($con,"SELECT * FROM users WHERE id='$user_from'");
						$get_info = mysqli_fetch_assoc($get_user_info);
						$profile_picuser_from_db= $get_info['pic'];
						$msg_by_fname = $get_info['firstname'];
						$user_to_id = $get_info['id'];
					
						//
						$get_userto_info = mysqli_query($con,"SELECT * FROM users WHERE id='$user_to'");
						$userto_info = mysqli_fetch_assoc($get_userto_info);
						$profile_picuser_to_db= $userto_info['pic'];
						$msg_to_fname = $userto_info['firstname'];
						if($user_from!==$user){
						;?>
						<div class="op<?php echo $id;?> op">
						<img src="<?php echo $profile_picuser_from_db;?>" style="width: 40px;cursor: pointer; height: 40px;border-radius: 50%;display: inline-block;"><span class="sf" style="display: inline-block;vertical-align: top;background-color: red;color: white;border-radius: 50%;padding-left: 2px;padding-right: 2px; margin-left: -10px;font-size: 13px;font-weight: 600;"></span>
						</div>
						<script>
							
							$(".op<?php echo $id;?>").on('click',function(){
			
							var
								user_id = '<?php echo $user_from ;?>',
								user='<?php echo $user_to;?>',
								id = '<?php echo $id;?>';
								$.ajax({
									type:'POST',
									url:'chat.php',
									data:{
										user_id:user_id,
										user:user,
										
									},success:function(data){

										$(".f_m").html(data);
										conn.close();
									},error:function(){
										alert('errro');
									}
								})
								
								})
						</script>
						<?php
					}else{
						;?>
						<div class="op<?php echo $id;?> op">
						<img src="<?php echo $profile_picuser_to_db;?>" style="width: 40px;cursor: pointer; height: 40px;border-radius: 50%;display: inline-block;"><span class="sf" style="display: inline-block;vertical-align: top;background-color: red;color: white;border-radius: 50%;padding-left: 2px;padding-right: 2px; margin-left: -10px;font-size: 13px;font-weight: 600;"></span>
						</div>
						<script>
							
							$(".op<?php echo $id;?>").on('click',function(){
							
							var
								user_id = '<?php echo $user_from ;?>',
								user='<?php echo $user_to;?>';

								$.ajax({
									type:'POST',
									url:'chat.php',
									data:{
										user_id:user,
										user:user_id,
									},success:function(data){
										$(".f_m").html(data);
									},error:function(){
										alert('errro');
									}
								})
								})
						</script>
						<?php
					}
					}
}
echo "</div>";
;?>
</div>

<div class="r_r" >
	<div class="r_e" style="overflow: hidden;">
		<?php 
		$sl = mysqli_query($con,"SELECT * FROM users ORDER BY id") or die(mysqli_error($con));
		while ($kk = mysqli_fetch_array($sl)) {
			$k_pic = $kk['pic'];
			$k_id = $kk['id'];
			if($k_id!==$user_id){
			;?>
			<div style="width: 50px;margin-left: auto;margin-right: auto;">
			<img id="lo<?php echo $k_id;?>" src="<?php echo $k_pic;?>" style="width: 50px;height: 50px;border-radius:50%;display: inline-block;margin-top: 10px;cursor: pointer;">
			
			</div>
			<script>
				$("#lo<?php echo $k_id;?>").on('click',function(){
					var
						user_id = '<?php echo $k_id ;?>',
						user='<?php echo $user_id;?>';

					$.ajax({
						type:'POST',
						url:'chat.php',
						cache:false,
						data:{
							user_id:user_id,
							user:user,
						},success:function(data){
							$(".f_m").html(data);
						},error:function(){
							alert('errro');
						}
					})
				})
			</script>
			<?php
			}
		}

		;?>

		<div style="position: absolute;bottom: 0;background-color: #1697ea;width: 100%;height: 50px;justify-content: center;text-align: center;cursor: pointer;"><i class="far fa-comment-dots" style="color: white;font-size: 30px;margin-top: 10px;"></i></div>
	</div>
</div>

<div class="dd" style="position: absolute;">
	
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      centeredSlides: true,
      spaceBetween: 30,
     
      navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
    });
  </script>
<script>
	$(".fa-times").on("click",function(){
		$(".chatting").css("display","none");
	})
	$(".fa-chevron-down").on('click',function(){
		$(".chatting").css("height","30px");
		$(".chatting").css("bottom","60px;");
		$(this).css("display","none");
		$(".fa-chevron-up").css("display","inline-block");
		$(".lob").css("display","none");
		$(".foo").css("display","none");
	})
		$(".fa-chevron-up").on('click',function(){
		$(this).css("display","none");
		$(".fa-chevron-down").css("display","inline-block");
		$(".chatting").css("height","300px");
		$(".lob").css("display","block");
		$(".foo").css("display","block");
		
	})
	$("#up").on('click',function(){
		$(".up").css("display","none");
		$(".down").css("display","block");
		$(".re").slideUp();
		$(this).css("display","none");
		$("#down").css("display","block");

	})
	$("#down").on('click',function(){
		$(".up").css("display","block");
		$(".down").css("display","none");
		$(".re").slideDown();
		$(this).css("display","none");
		$("#up").css("display","block");

	})
	function select(){
		$(".takes").toggle();
	}
	function male(){
		$(".vend_male").css("display","inline-block");
		$(".vend_female").css("display","none");
		$(".vend_both").css("display","none");
		//
		$(".both").css('background-color','white');
		$(".right_both").css('display','inline-block');
		$(".both").css("cursor","pointer")
		$(".male").css("background-color","#f0f2f5");
		$(".right_male").css('display','none');
		//
		$(".female").css('background-color','white');
		$(".right_female").css('display','inline-block');
		$(".female").css("cursor","pointer")
		$(".male").css("background-color","#f0f2f5");
		$(".right_male").css('display','none');
		//
		$(".takes").slideUp();
		var id = '<?php echo $user_id ;?>';
		
		$.ajax({
			type:'POST',
			url:'male_data.php',
			data:{
				id:id,
			},
			beforeSend:function(){
				$(".spie").css("display","block");
				$(".all_data").css("display","none");
			},
			success:function(data){
				$(".all_data").css("display","block");
				$(".all_data").html(data);
				$(".spie").css("display","none");
			},
			error:function(error){
				alert(error)
			}
		})

	}
	function both(){
		$(".vend_both").css("display","inline-block");
		$(".vend_female").css("display","none");
		$(".vend_male").css("display","none");
		//
		$(".male").css('background-color','white');
		$(".right_male").css('display','inline-block');
		$(".male").css("cursor","pointer")
		$(".both").css("background-color","#f0f2f5");
		$(".right_both").css('display','none');
		//
		$(".female").css('background-color','white');
		$(".right_female").css('display','inline-block');
		$(".female").css("cursor","pointer")
		$(".both").css("background-color","#f0f2f5");
		$(".right_both").css('display','none');
		//
		$(".takes").slideUp();
		//get data of both gender.
		var id = '<?php echo $user_id ;?>';
		
		$.ajax({
			type:'POST',
			url:'both_data.php',
			data:{
				id:id,
			},
			beforeSend:function(){
				$(".spie").css("display","block");
				$(".all_data").css("display","none");
			},
			success:function(data){
				$(".all_data").css("display","block");
				$(".all_data").html(data);
				$(".spie").css("display","none");
			},
			error:function(error){
				alert(error)
			}
		})

	}
	function female(){
		$(".vend_female").css("display","inline-block");
		$(".vend_male").css("display","none");
		$(".vend_both").css("display","none");
		//
		$(".both").css('background-color','white');
		$(".right_both").css('display','inline-block');
		$(".both").css("cursor","pointer")
		$(".female").css("background-color","#f0f2f5");
		$(".right_female").css('display','none');
		//
		$(".male").css('background-color','white');
		$(".right_male").css('display','inline-block');
		$(".male").css("cursor","pointer")
		$(".female").css("background-color","#f0f2f5");
		$(".right_female").css('display','none');
		//
		$(".takes").slideUp();
		var id = '<?php echo $user_id ;?>';
		
		$.ajax({
			type:'POST',
			url:'female_data.php',
			data:{
				id:id,
			},
			beforeSend:function(){
				$(".spie").css("display","block");
				$(".all_data").css("display","none");
			},
			success:function(data){
				$(".all_data").css("display","block");
				$(".all_data").html(data);
				$(".spie").css("display","none");
			},
			error:function(error){
				alert(error)
			}
		})

	}

	$('.views').on('click',function(){
		$(this).css('background-color','#1697ea');
		$(this).css('color','white');
		$(".likess").css('background-color','#f0f2f5');
		$(".likess").css('color','#8b8d90');
		$('.info_take').toggle("slide:right");
		$('.info_takes').toggle("slide:left");
		
	})
	$('.likess').on('click',function(){
		$(this).css('background-color','#1697ea');
		$(this).css('color','white');
		$(".views").css('background-color','#f0f2f5');
		$(".views").css('color','#8b8d90');
		$('.info_take').toggle("slide:left");
		$('.info_takes').toggle("slide:right");

	})
</script>


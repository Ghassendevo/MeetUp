<?php 
include('./connect.php');
$user_id = $_POST['user_id'];
$id = $_POST['id'];
$post_id = $_POST['post_id'];
$s = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'");
$f = mysqli_fetch_array($s);
$user_firstname = ucfirst($f['firstname']);
$user_lastname = ucfirst($f['lastname']);
$user_pic = ucfirst($f['pic']);
//
$w =  mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$fe = mysqli_fetch_array($w);
$firstname = ucfirst($fe['firstname']);
$lastname = ucfirst($fe['lastname']);
$pic = ucfirst($fe['pic']);
	
	$run = mysqli_query($con,"SELECT * FROM posts WHERE id='$post_id'") or die(mysqli_error($con));
	$fetch = mysqli_fetch_array($run);
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

;?>

<script>
	$('.fermer').on('click',function(){

		$('#share_post_div').css('display','none');
	})
</script>
<input type="text" id="audience_typee" name="" value="public" style="position: absolute;visibility: hidden;left: -90%;">
<div style="display:none; ;" class="audiencee">
	<script>
		$('#i_po').css('height','400px');
	</script>
	<div style="width: 90%;margin: auto;text-align: center;margin-top: 10px;">
		<h4 style="display: inline-block;font-family: Segoe UI;font-weight: 400;">Who can see your post ?</h4><div class="fermer"><i class="fas fa-times" style="color: #757b82!important;margin-top: 5px;font-size: 23px;"></i></div>
			<hr style="margin-top: 5px;">
		<p style="text-align: left;color: gray;">Your post will be visible in the news feed, on your profile and in search results.</p>
	</div>
	<div class="aud_select" id="s_publice">
		<div style="width: 90%;display: flex;justify-content: space-between;margin: auto;">
			<div style="display: flex;margin-top: 15px;">
				<i class="fas fa-globe-africa" style="font-size: 25px;"></i>
				<div style="margin-left: 10px;margin-top: -5px;">
				<p style="display: block;color: black;font-weight: 600;">Public</p>
				<p style="display: block; margin-top: -20px;">Every users</p>
				</div>
			</div>
			<div id="i_publice" class="cho" style="margin-top: 15px;"><div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div></div>
		</div>
	</div>
	<div class="aud_select" id="s_followerse">
		<div style="width: 90%;display: flex;justify-content: space-between;margin: auto;">
			<div style="display: flex;margin-top: 15px;">
				<i class="fas fa-user-friends" style="font-size: 21px;color: #65676b;"></i>
				<div style="margin-left: 10px;margin-top: -5px;">
				<p style="display: block;color: black;font-weight: 600;">Followers</p>
				<p style="display: block; margin-top: -20px;">Users who follwing you</p>
				</div>
			</div>
			<div id="i_followerse" class="cho" style="margin-top: 15px;"><div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div></div>
		</div>
	</div>
	<div class="aud_select" id="s_mee">
		<div style="width: 90%;display: flex;justify-content: space-between;margin: auto;">
			<div style="display: flex;margin-top: 15px;">
				<i class="fas fa-user-lock" style="font-size: 25px;color:#65676b; "></i>
				<div style="margin-left: 10px;margin-top: -5px;">
				<p style="display: block;color: black;font-weight: 600;">Only me</p>
				<p style="display: block; margin-top: -20px;">No users can see your post</p>
				</div>
			</div>
			<div  id="i_mee" class="cho" style="margin-top: 15px;"><div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div></div>
		</div>
	</div>
	<div style="width: 90%;margin: auto;">
		<div style="display: flex;justify-content: space-between;width: 50%;margin: auto;margin-right: 0;margin-top: 10px;">
			<button onclick="precedente()" class="precedent">Precedent</button>
			<button onclick="change_aude()" id="aud_changee" class="s_bef">Save change</button>
		</div>
	</div>
	<script>
		function precedente(){
			$('.audiencee').css('display','none');
			$('.postingee').css('display','block');
		}
		function change_aude(){
			var type = $('#audience_typee').val();
			if(type=='public'){
				$('.mondee').html('<div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-globe-africa" style="font-size: 13px;margin-top: 4px;color:black;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Public</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div>');
			}else if(type=='followers'){
				$('.mondee').html('<div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-user-friends" style="font-size: 13px;margin-top: 4px;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Followers</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div>');
			}else if(type=='me'){
				$('.mondee').html('<div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-user-lock" style="font-size: 13px;margin-top: 4px;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Only me</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div>');
			}
			$('.audiencee').css('display','none');
			$('.postingee').css('display','block');
		}
		$('#s_publice').on('click',function(){
			$('#i_publice').html('<div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_followerse').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_mee').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#audience_typee').val('public');
			$('#aud_changee').removeClass('s_bef');
			$('#aud_changee').addClass('s_aft');

		})
		$('#s_followerse').on('click',function(){
			$('#i_followerse').html('<div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_publice').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_mee').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#audience_typee').val('followers');
			$('#aud_changee').removeClass('s_bef');
			$('#aud_changee').addClass('s_aft');
		})
		$('#s_mee').on('click',function(){
			$('#i_mee').html('<div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_publice').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_followerse').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#audience_typee').val('me');
			$('#aud_changee').removeClass('s_bef');
			$('#aud_changee').addClass('s_aft');
		})
	</script>
</div>
<div class="postingee">
		<div style="width: 90%;margin: auto;text-align: center;margin-top: 10px;">
			<h3 style="display: inline-block;font-family: Segoe UI;font-weight: 400;">Share Post</h3><div class="fermer"><i class="fas fa-times" style="color: #757b82!important;margin-top: 5px;font-size: 23px;"></i></div>
			<hr style="margin-top: 5px;">
		</div>
		<div style="width: 90%;margin: auto;margin-top: 10px;">
			<div style="width: 100%;display: flex;">
				<div style="cursor: pointer;"><img src="<?php echo $user_pic;?>" style="width: 45px;height: 45px;border-radius: 50%;"></div><div style="margin-left: 5px;max-width: 50%;">
					<p style="font-weight: 400;font-family: Segoe UI;font-size: 18px;"><?php echo "".$user_firstname." ".$user_lastname."";?></p>
					<div class="mondee"><div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-lock" style="font-size: 13px;margin-top: 4px;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Only me</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div></div>
				</div>

			</div>
			<script>
				$('.mondee').on('click',function(){
					$('.postingee').css('display','none');
					$('.audiencee').css('display','block');
				})
			</script>
			<div style="height: 200px;overflow: hidden;overflow-y: scroll;">
			<textarea id="areae" style="width: 100%;margin-top: 15px;border: none;resize: none;" rows="2" placeholder="What you wanna talk about, <?php echo $user_firstname;?> ?"></textarea>
			<div class="show_show" style="border:1px solid #ebebeb;border-radius: 10px;">
				<div style="margin-top: 10px;width: 95%;display: flex;justify-content: space-between;margin: auto;">
							<div style="display: flex;margin-top: 10px;">
						<img src="<?php echo $pic;?>" style="width: 43px;height: 43px;border-radius: 50%;cursor: pointer;">
						<span style="margin-top: 25px;margin-left: -10px; background-color: white;width: 12px;height: 12px;border-radius: 50%;border:2px solid green;"><p style="visibility: hidden;">d</p></span>
						<div style="margin-left: 5px;margin-top: -2px;">
							<strong id="str<?php echo $id;?>" class="str"><span> <?php echo  ''.$firstname.' '.$lastname.'';?></span></strong>
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
			  <?php echo $post_text;?>
		</div>
		<div class="for_prob<?php echo $post_id;?>" style="width: 95%;margin: auto;"><p style="display: none;" id="see_more" class="see_moree<?php echo $post_id;?>">See More</p><p style="display: none;" id="see_less" class="see_lesse<?php echo $post_id;?>">See Less</p></div>
		<div class="for_pim"><?php echo $post_img ;?><?php echo $post_video ;?></div>
		<br>
			</div>
				</div>
			</div>
			<div style="margin-top: 10px;display: flex;justify-content: space-between;position: absolute;bottom: 20px;width: 90%;">
				<div style="display: flex;">
					<div style="display: flex;justify-content: space-between;">
						<div class="po_ho"><i class="far fa-image" style="font-size: 25px;color: #43b35e;margin-top: 7px;"></i></div>
						<div class="po_ho"><i class="fab fa-youtube" style="font-size: 25px;color: red;margin-top: 7px;"></i></div>
						<div class="po_ho"><i class="fas fa-user-tag" style="font-size: 23px;color: #1877f2;margin-top: 7px;"></i></div>
						<div class="po_ho"><i class="fas fa-ellipsis-h" style="font-size: 23px;color: gray; margin-top: 7px;"></i></div>
					</div>
					<div style="border-left: 1px solid #d7d7d7;height: 35px;margin-top: 5px; width: 1px;"><p style="visibility: hidden;">d</p></div>
				</div>
				<div style="width: 100%;margin-top: 5px;margin-left: 10px;"><button id="bue" class="aft_b">Share</button></div>
			</div>
		</div>
</div>
</div>
</div>
<script>
	$('#bue').on('click',function(){
		var
			text= $('#areae').val(),
			posted_by = '<?php echo $user_id;?>',
			share_id = '<?php echo $post_id;?>',
			id = '<?php echo $id;?>',
			audience = $('#audience_typee').val();

		$.ajax({
			type:'POST',
			url:'save_share.php',
			data:{
				text:text,
				posted_by:posted_by,
				share_id:share_id,
				id:id,
				audience:audience, 
			},beforeSend:function(){
				$('#bue').html('<div class="spinner-border" style="width: 30px; height: 30px;" role="status"><span class="visually-hidden" style="visibility:hidden;">Loading...</span></div>');
			},success:function(e){
				$('#bue').html('Share');
				$('#share_post_div').css('display','none');
				$('.all_data').prepend(e);
			},error:function(){
				alert('error');
			}
		})

	});
</script>
<script>
	var element = document.querySelector('.for_texte<?php echo $post_id;?>');
	var font = element.offsetHeight;
	if(font==72){
		$('.see_moree<?php echo $post_id;?>').css('display','block');
	}
	$('.see_moree<?php echo $post_id;?>').on('click',function(){
		$('.for_texte<?php echo $post_id;?>').css('-webkit-line-clamp','1000')
		$(this).css('display','none');
		$('.see_lesse<?php echo $post_id;?>').css('display','block');
	})
	$('.see_lesse<?php echo $post_id;?>').on('click',function(){
		$('.for_texte<?php echo $post_id;?>').css('-webkit-line-clamp','3')
		$(this).css('display','none');
		$('.see_moree<?php echo $post_id;?>').css('display','block');
	})

</script>

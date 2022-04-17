<?php 
include('./connect.php');
$id = $_POST['id'];
$texte = $_POST['text'];
$audience = $_POST['audience'];
$type='text';
	$send = mysqli_query($con,"INSERT INTO posts (posted_by,audience,type,texte) VALUES('$id','$audience','$type','$texte')") or die(mysqli_error($con));

if($audience=='public'){
	$aud = '<i class="fas fa-globe-africa" style="font-size: 13px;margin-left: 3px;margin-top: 3px;"></i>';
}else if($audience=='followers'){
	$aud = '<i class="fas fa-user-friends" style="font-size: 13px;margin-left: 3px;margin-top: 3px;color:#65676b;"></i>';
}else{
	$aud = '<i class="fas fa-user-lock" style="font-size: 13px;margin-left: 3px;margin-top: 3px;color:#65676b;"></i>';
}
$f = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$get = mysqli_fetch_array($f);
$firstname = ucfirst($get['firstname']);
$lastname = ucfirst($get['lastname']);
$pic = $get['pic'];
$id = $get['id'];

$select = mysqli_query($con,"SELECT * FROM posts WHERE posted_by='$id' AND texte='$texte'") or die(mysqli_error($con));
$f = mysqli_fetch_array($select);
$post_id = $f['id'];

;?>
<div id="user_p<?php echo $id;?>" class="user_p" >
		
		<div id="hover_div<?php echo $id;?>" style="display: none; position: absolute;background-color: white;border-radius: 10px;left: 2%;width: 25%;height: 150px;-webkit-box-shadow: 0px 0px 25px -2px rgba(156,151,156,1);-moz-box-shadow: 0px 0px 25px -2px rgba(156,151,156,1)box-shadow: 0px 0px 25px -2px rgba(156,151,156,1);">
			<div style="width: 95%;margin: auto;margin-top: 10px;display: flex;">
				<img src="<?php echo $pic;?>" style="width: 60px;height: 60px;border-radius: 50%;cursor: pointer;">
				<div style="margin-left: 10px;">
					<h4 class="h4_hov" style=""><?php echo "".$firstname." ".$lastname."";?></h4>
					<div style="display: flex;"><i class="fas fa-map-marker-alt" style="color: gray;font-size: 25px;"></i> <p style="font-weight: 400;margin-left: 10px;font-size: 18px;">From</p>, <strong style="font-weight: bold;font-size: 18px;margin-left: 5px;"> Jelma</strong></div>
				</div>
			</div>
			<div style="width: 95%;margin: auto;margin-top: 5px;display: flex;justify-content: space-around;">
				
				
			</div>
		</div>
		<div class="" style="width: 95%;margin: auto;margin-top: 10px;display: flex;justify-content: space-between;">
			<div style="display: flex;">
				<img src="<?php echo $pic;?>" style="width: 43px;height: 43px;border-radius: 50%;cursor: pointer;">
				<span style="margin-top: 25px;margin-left: -10px; background-color: white;width: 12px;height: 12px;border-radius: 50%;border:2px solid green;"><p style="visibility: hidden;">d</p></span>
				<div style="margin-left: 5px;margin-top: -2px;">
					<strong id="str<?php echo $id;?>" class="str"><span> <?php echo  ''.$firstname.' '.$lastname.'';?></span></strong>
					<div style="display: flex;">
						<span style="color: gray;display: block;font-size: 14px;font-weight: 400;margin-top: -2px;">16m</span>
						<p style="color: gray;margin-top: -10px;font-weight: ;margin-left: 3px;">.</p>
						<?php echo $aud;?>
					</div>
				</div>
			</div>
			
			<div style="margin-top: 10px;">
				<div class="in_hi" style="">
					<div style="width: 4px;height: 4px;margin-top: 15px; border-radius: 50%;background-color: gray;margin-right: 3px;margin-left: 7px;"><p style="visibility: hidden;">d</p></div>
				<div style="width: 4px;height: 4px;margin-top: 15px;border-radius: 50%;background-color: gray;margin-right: 3px;"><p style="visibility: hidden;">d</p></div>
				<div style="width: 4px;height: 4px;margin-top: 15px;border-radius: 50%;background-color: gray;"><p style="visibility: hidden;">d</p></div>
				</div>

			</div>
		</div>
		<div id="for_text<?php echo $post_id;?>" class="content_min">
			    <?php echo  $texte;?>
		</div>
		<div class="for_prob<?php echo $id;?>" style="width: 95%;margin: auto;"><p style="display: none;" id="see_more" class="see_more<?php echo $post_id;?>">See More</p><p style="display: none;" id="see_less" class="see_less<?php echo $post_id;?>">See Less</p></div>
		<div class="for_pim"><?php ;?></div>
		<div style="width: 95%;margin: auto;margin-top: 5px;display: flex;">
			<img src="./img/heart.png" style="width: 17px;height: 17px;cursor: pointer;"><p style="" class="likes_p">773</p><p style="font-weight: 600;color: gray;margin-top: -10px;margin-left: 3px;">.</p>
			<p class="c_cmnt" style="">22 commneters</p>
		</div>
		<hr style="width: 95%;margin: auto;margin-top: -10px;">
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<div style="width: 70%;display: flex;justify-content: space-between;">
				<div class="like_post">
					<div style="width: 80%;display: flex;margin: auto;">
						<i class="far fa-heart" style="color: gray;margin-top: 1.5px;font-size: 23px;text-align: center;"></i>
					<p style="color: #666666; font-weight: 400;font-size: 16px;margin-left: 7px;text-align: center;">React</p>
					</div>
				</div>
			<div class="cmnt_post">
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
			user_id = '<?php echo $id;?>',
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
	var element = document.querySelector('#for_text<?php echo $post_id;?>');
	var font = element.offsetHeight;
	if(font==72){
		$('.see_more<?php echo $post_id;?>').css('display','block');
	}
	$('.see_more<?php echo $post_id;?>').on('click',function(){
		$('#for_text<?php echo $post_id;?>').removeClass('content_min');
		$('#for_text<?php echo $post_id;?>').addClass('content_max');
		$(this).css('display','none');
		$('.see_less<?php echo $post_id;?>').css('display','block');
	})
	$('.see_less<?php echo $post_id;?>').on('click',function(){
		$('#for_text<?php echo $post_id;?>').removeClass('content_max');
		$('#for_text<?php echo $post_id;?>').addClass('content_min');
		$(this).css('display','none');
		$('.see_more<?php echo $post_id;?>').css('display','block');
	})

</script>
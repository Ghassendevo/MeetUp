<?php 
include('./connect.php');
$texte = $_POST['text'];
$posted_by = $_POST['posted_by'];
$share_id = $_POST['share_id'];
$audience = $_POST['audience'];
$type='text';
$idi = $_POST['id'];
$send = mysqli_query($con,"INSERT INTO posts (posted_by,audience,type,share,share_id,texte) VALUES('$posted_by','$audience','$type','yes','$share_id','$texte')") or die(mysqli_error($con));
if($audience=='public'){
	$aud = '<i class="fas fa-globe-africa" style="font-size: 13px;margin-left: 3px;margin-top: 3px;"></i>';
}else if($audience=='followers'){
	$aud = '<i class="fas fa-user-friends" style="font-size: 13px;margin-left: 3px;margin-top: 3px;color:#65676b;"></i>';
}else{
	$aud = '<i class="fas fa-user-lock" style="font-size: 13px;margin-left: 3px;margin-top: 3px;color:#65676b;"></i>';
}
//Who shared the Pub.
 $selecte = mysqli_query($con,"SELECT * FROM users WHERE id='$posted_by'") or die(mysqli_error($con));
 $fetch = mysqli_fetch_array($selecte);
 $firstname = ucfirst($fetch['firstname']);
 $lastname = ucfirst($fetch['lastname']);
 $pic = $fetch['pic'];
 $id = $fetch['id'];

 //The owner of pub.
 $run = mysqli_query($con,"SELECT * FROM users WHERE id='$idi'") or die(mysqli_error($con));
 $ana = mysqli_fetch_array($run);
 $firstnamee = ucfirst($ana['firstname']);
 $lastnamee = ucfirst($ana['lastname']);
 $pice = $ana['pic'];
 $ide = $ana['id'];
 //get post data
 $SELECT = mysqli_query($con,"SELECT * FROM posts WHERE id='$share_id'") or die(mysqli_error($con));
 $F = mysqli_fetch_array($SELECT);
 $text = $F['texte'];
 $aude = $F['audience'];
 $d = mysqli_query($con,"SELECT * FROM posts WHERE share_id='$share_id' AND  id!='$idi'") or die(mysqli_error($con));
$dd = mysqli_fetch_array($d);
$post_id = $dd['id'];


 

;?>
<div id="user_p<?php echo $post_id;?>" class="user_p" >
		
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

		<div id="for_textee<?php echo $post_id;?>" class="content_min">
			    <?php echo  $texte;?>
		</div>

		<div class="for_prob<?php echo $id;?>" style="width: 95%;margin: auto;"><p style="display:none;" id="see_more" class="see_moreee<?php echo $post_id;?>">See More</p><p style="display: none;" id="see_less" class="see_lessee<?php echo $post_id;?>">See Less</p></div>
		<div style="width: 95%;margin: auto;">
			<div class="show_show" style="border:1px solid #ebebeb;border-radius: 10px;">
						<div style="margin-top: 10px;width: 95%;display: flex;justify-content: space-between;margin: auto;">
							<div style="display: flex;margin-top: 10px;">
						<img src="<?php echo $pice;?>" style="width: 43px;height: 43px;border-radius: 50%;cursor: pointer;">
						<span style="margin-top: 25px;margin-left: -10px; background-color: white;width: 12px;height: 12px;border-radius: 50%;border:2px solid green;"><p style="visibility: hidden;">d</p></span>
						<div style="margin-left: 5px;margin-top: -2px;">
							<strong id="str<?php echo $id;?>" class="str"><span> <?php echo  ''.$firstnamee.' '.$lastnamee.'';?></span></strong>
							<div style="display: flex;">
								<span style="color: gray;display: block;font-size: 14px;font-weight: 400;margin-top: -2px;">16m</span>
								<p style="color: gray;margin-top: -10px;font-weight: ;margin-left: 3px;">.</p>
								<i class="fas fa-globe-africa" style="font-size: 13px;margin-left: 3px;margin-top: 3px;"></i>
							</div>
						</div>
						<div class="for_texte<?php echo $post_id;?>" style="width: 95%;margin: auto;font-weight: 400;max-height:auto;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
			  <?php echo $text;?>
		</div>
		<div class="for_prob<?php echo $post_id;?>" style="width: 95%;margin: auto;"><p style="display: none;" id="see_more" class="see_moree<?php echo $post_id;?>">See More</p><p style="display: none;" id="see_less" class="see_lesse<?php echo $post_id;?>">See Less</p></div>
		<div class="for_pim"><?php echo $post_img ;?><?php echo $post_video ;?></div>
			</div>
		</div>
	</div>
		</div>
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
			<div id="sharee<?php echo $post_id;?>" class="share_post">
				<div style="width: 80%;display: flex;margin: auto;">
					<i class="fas fa-share" style="color: gray;margin-top: 1.5px;font-size: 23px;text-align: center;"></i>
				<p style="color: #666666; font-weight: 400;font-size: 16px;margin-left: 7px;text-align: center;">Share</p>
				</div>
			</div>
			</div>
		</div>
		
	</div>
	<script>
	$('#sharee<?php echo $post_id;?>').on('click',function(){
		$('#share_post_div').css('display','block');
		var
			user_id = '<?php echo $id;?>',
			id = '<?php echo $id;?>';
		$.ajax({
			type:'POST',
			url:'share_post.php',
			data:{
				user_id:user_id,
				id:id,
			},beforeSend:function(){
			$('#i_po').html('<div class="po_center"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
			},success:function(d){
				$('#i_po').html(d);
			}
		})
		
	})

	var elemente = document.querySelector('#for_textee<?php echo $post_id;?>');
	var fonte = elemente.offsetHeight;
	if(fonte==72){
		$('.see_moreee<?php echo $post_id;?>').css('display','block');
	}
	$('.see_moreee<?php echo $post_id;?>').on('click',function(){
		$('#for_textee<?php echo $post_id;?>').removeClass('content_min');
		$('#for_textee<?php echo $post_id;?>').addClass('content_max');
		$(this).css('display','none');
		$('.see_lessee<?php echo $post_id;?>').css('display','block');
	})
	$('.see_lessee<?php echo $post_id;?>').on('click',function(){
		$('#for_textee<?php echo $post_id;?>').removeClass('content_max');
		$('#for_textee<?php echo $post_id;?>').addClass('content_min');
		$(this).css('display','none');
		$('.see_moreee<?php echo $post_id;?>').css('display','block');
	})



</script>

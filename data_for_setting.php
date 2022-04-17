<?php
include('./connect.php');
$id = $_POST['id'];
;?>
<div style="width: 90%;margin: auto;border-bottom: 1px solid #e5e5e5;">
	<div  style="display: flex;">
			<h3 style="font-weight: 400;">SETTING</h3>
			<div class="ty" style="margin-left:10px;margin-top:5px;display: flex;justify-content: space-between;"></div>
	</div>
</div>
<br>
<div style="width: 90%;margin: auto;" class="oshit">
	<div style="width: 50%;display: flex;justify-content: space-between;">
		<p style="color: #6d737b;">Manage your info, privacy, and security to make MeetUp work better for you.</p>
		<img src="./img/se.jpg" style="width: 50px;height: 50px;">
	</div>
</div>
<div class="visibility" style="display: none;width: 90%;margin: auto;">
	<i class="fas fa-arrow-left" id="back" style="font-size: 25px;cursor: pointer;"></i>
	<div style="border:1px solid #e5e5e5;border-radius: 5px;" >
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<h6 style="font-weight: 400;font-family: verdana;">Profile visibility</h6>
			<p style="color: #6d737b;">Manage your profile visibility, choose if your profile will be visibe<br> for other users or not.</p>
			<div style="display: flex;justify-content: space-between;" id="vis" class="pope">
					<div style="display: flex;justify-content: space-between;line-height: 1;">
					<i class="fas fa-globe-africa" style="color: #7c797e!important;font-size:27px;"></i><div>
					<div style="margin-left: 10px;">
						<h6 style="margin-left: 10px;font-weight: 400;">Profile Visible</h6>
					<div id="je" style="display: flex;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><i class="fas fa-check-circle" style="color: #1697ea!important;font-size: 20px;line-height: 0;"></i><p>ON</p></div>
						<div id="ke" style="display: none;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><div style="width: 18px ;height:18px;border-radius: 50%;border:1px solid gray;"><p style="visibility: hidden;">d</p></div><p>OFF</p></div>
					</div>
				</div>
				</div>	
			</div>
			<div style="display: flex;justify-content: space-between;" id="hid" class="pope">
				<div style="display: flex;justify-content: space-between;line-height: 1;">
					<i class="fas fa-user-shield" style="color: #7c797e!important;font-size:27px;"></i><div>
					<div style="margin-left: 2px;">
						<h6 style="margin-left: 10px;font-weight: 400;">Profile Hidden</h6>
					<div id="j" style="display: flex;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><div style="width: 18px ;height:18px;border-radius: 50%;border:1px solid gray;"><p style="visibility: hidden;">d</p></div><p>OFF</p></div>
					<div id="k" style="display: none;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><i class="fas fa-check-circle" style="color: #1697ea!important;font-size: 20px;line-height: 0;"></i><p>ON</p></div>
						
					</div>
				</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<div class="vis_u" style="display: none;width: 90%;margin: auto;">
	<i class="fas fa-arrow-left" id="back_two" style="font-size: 25px;cursor: pointer;"></i>
		<div style="border:1px solid #e5e5e5;border-radius: 5px;" >
			<div class="_hov" id="_name">
				<div style="display: flex;justify-content: space-between;margin-left: 10px;margin-top: 10px;width: 40%; ">
					<i class="far fa-id-badge" style="color: #7c797e!important;font-size:24px; "></i>
					<p style="font-weight: 400;margin-left: -55px;">Change your Name</p>	<i class="fas fa-chevron-right" style="font-size: 20px;"></i>			

				</div>
			</div>
			<div class="_hov" id="_username">
				<div style="display: flex;justify-content: space-between;margin-left: 10px;margin-top: 10px;width: 40%; ">
					<i class="far fa-user" style="color: #7c797e!important;font-size:24px; "></i>
					<p style="font-weight: 400;margin-left: -30px;">Change your Username</p>	<i class="fas fa-chevron-right" style="font-size: 20px;"></i>			

				</div>
			</div>
			<div class="_hov" id="_password">
				<div style="display: flex;justify-content: space-between;margin-left: 10px;margin-top: 10px;width: 40%; ">
					<i class="fas fa-unlock-alt" style="color: #7c797e!important;font-size:24px; "></i>
					<p style="font-weight: 400;margin-left: -30px;">Change your Password</p>	<i class="fas fa-chevron-right" style="font-size: 20px;"></i>			

				</div>
			</div>
		</div>

</div>
<div class="ch_name"  style="display: none;width: 90%;margin: auto;">
	<i class="fas fa-arrow-left" id="back_three" style="font-size: 25px;cursor: pointer;"></i>
	<div style="border:1px solid #e5e5e5;border-radius: 5px;text-align: center;" >
			<h4> Change Name</h4>
			<div style="display: flex;justify-content: space-between; width: 55%;margin: auto;">
				<input type="text" name="" id="change_name" placeholder="Firstname"><input type="text" name="" id="change_namee" placeholder="Lastname">
			</div><br>
			<div style="display: flex;justify-content: space-between; width: 55%;margin: auto;">
				<input type="text" name="" id="change_password" placeholder="Your Password" style="width: 100%;">
			</div>
			<div style="width: 55%;margin: auto;margin-top: 10px;">
				<button class="rev">
					<div class="spinner-border text-primary" id="ei" style="display: none;text-align: center;margin-left: auto;margin-right: auto; color: white!important;width: 20px; height: 20px;" role="status">
  					<span class="sr-only">Loading...</span>
					</div><p id="ea">Review Change</p></button>
			</div>
			
			<br>

	</div>
</div>
<div class="ch_username"  style="display: none;width: 90%;margin: auto;">
	<i class="fas fa-arrow-left" id="back_four" style="font-size: 25px;cursor: pointer;"></i>
	<div style="border:1px solid #e5e5e5;border-radius: 5px;text-align: center;" >
			<h4> Change username</h4>
			<div style="display: flex;justify-content: space-between; width: 55%;margin: auto;">
				<input type="text" name="" id="change_username" placeholder="Username" style="width: 100%;">
			</div><br>
			<div style="display: flex;justify-content: space-between; width: 55%;margin: auto;">
				<input type="text" name="" id="change_passworde" placeholder="Your Password" style="width: 100%;">
			</div>
			<div style="width: 55%;margin: auto;margin-top: 10px;">
				<button class="reve">
					<div class="spinner-border text-primary" id="ei" style="display: none;text-align: center;margin-left: auto;margin-right: auto; color: white!important;width: 20px; height: 20px;" role="status">
  					<span class="sr-only">Loading...</span>
					</div><p id="ea">Review Change</p></button>
			</div>
			
			<br>

	</div>
</div>
<div class="ch_password"  style="display: none;width: 90%;margin: auto;">
	<i class="fas fa-arrow-left" id="back_five" style="font-size: 25px;cursor: pointer;"></i>
	<div style="border:1px solid #e5e5e5;border-radius: 5px;text-align: center;" >
			<h4> Change Password</h4>
			<div style="display: flex;justify-content: space-between; width: 55%;margin: auto;">
				<input type="text" name="" id="change_usernamee" placeholder="Old Password" style="width: 100%;">
			</div><br>
			<div style="display: flex;justify-content: space-between; width: 55%;margin: auto;">
				<input type="text" name="" id="change_passwordee" placeholder="New Password" style="width: 100%;">
			</div>
			<div style="width: 55%;margin: auto;margin-top: 10px;">
				<button class="revee">
					<div class="spinner-border text-primary" id="ei" style="display: none;text-align: center;margin-left: auto;margin-right: auto; color: white!important;width: 20px; height: 20px;" role="status">
  					<span class="sr-only">Loading...</span>
					</div><p id="ea">Review Change</p></button>
			</div>
			
			<br>

	</div>
</div>
<div class="ch_info"  style="display: none;width: 90%;margin: auto;">
	<i class="fas fa-arrow-left" id="back_six" style="font-size: 25px;cursor: pointer;"></i>
	<div style="border:1px solid #e5e5e5;border-radius: 5px;" >
		
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<h6 style="font-weight: 400;font-family: verdana;">Email visibility</h6>
			<div style="display: flex;justify-content: space-between;" id="vise" class="pope">
					<div style="display: flex;justify-content: space-between;line-height: 1;">
					<i class="fas fa-globe-africa" style="color: #7c797e!important;font-size:27px;"></i><div>
					<div style="margin-left: 10px;">
						<h6 style="margin-left: 10px;font-weight: 400;">Profile Visible</h6>
					<div id="jee" style="display: flex;justify-content: space-between;width: 50%;line-heig ht: 1;margin-left: 7px;"><i class="fas fa-check-circle" style="color: #1697ea!important;font-size: 20px;line-height: 0;"></i><p>ON</p></div>
						<div id="kee" style="display: none;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><div style="width: 18px ;height:18px;border-radius: 50%;border:1px solid gray;"><p style="visibility: hidden;">d</p></div><p>OFF</p></div>
					</div>
				</div>
				</div>	
			</div>
			<div style="display: flex;justify-content: space-between;" id="hide" class="pope">
				<div style="display: flex;justify-content: space-between;line-height: 1;">
					<i class="fas fa-user-shield" style="color: #7c797e!important;font-size:27px;"></i><div>
					<div style="margin-left: 2px;">
						<h6 style="margin-left: 10px;font-weight: 400;">Profile Hidden</h6>
					<div id="ji" style="display: flex;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><div style="width: 18px ;height:18px;border-radius: 50%;border:1px solid gray;"><p style="visibility: hidden;">d</p></div><p>OFF</p></div>
					<div id="ki" style="display: none;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><i class="fas fa-check-circle" style="color: #1697ea!important;font-size: 20px;line-height: 0;"></i><p>ON</p></div>
						
					</div>
				</div>
				</div>	
			</div>
		</div>
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<h6 style="font-weight: 400;font-family: verdana;">Number visibility</h6>
			<div style="display: flex;justify-content: space-between;" id="visee" class="pope">
					<div style="display: flex;justify-content: space-between;line-height: 1;">
					<i class="fas fa-globe-africa" style="color: #7c797e!important;font-size:27px;"></i><div>
					<div style="margin-left: 10px;">
						<h6 style="margin-left: 10px;font-weight: 400;">Profile Visible</h6>
					<div id="jeee" style="display: flex;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><i class="fas fa-check-circle" style="color: #1697ea!important;font-size: 20px;line-height: 0;"></i><p>ON</p></div>
						<div id="keee" style="display: none;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><div style="width: 18px ;height:18px;border-radius: 50%;border:1px solid gray;"><p style="visibility: hidden;">d</p></div><p>OFF</p></div>
					</div>
				</div>
				</div>	
			</div>
			<div style="display: flex;justify-content: space-between;" id="hidee" class="pope">
				<div style="display: flex;justify-content: space-between;line-height: 1;">
					<i class="fas fa-user-shield" style="color: #7c797e!important;font-size:27px;"></i><div>
					<div style="margin-left: 2px;">
						<h6 style="margin-left: 10px;font-weight: 400;">Profile Hidden</h6>
					<div id="jeeee" style="display: flex;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><div style="width: 18px ;height:18px;border-radius: 50%;border:1px solid gray;"><p style="visibility: hidden;">d</p></div><p>OFF</p></div>
					<div id="keeee" style="display: none;justify-content: space-between;width: 50%;line-height: 1;margin-left: 7px;"><i class="fas fa-check-circle" style="color: #1697ea!important;font-size: 20px;line-height: 0;"></i><p>ON</p></div>
						
					</div>
				</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<div class="alll">
	<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;">
	<div class="u_hover" id="profile_vis">
		<div style="width: 90%;margin: auto;margin-top:10px;display: flex;justify-content: space-between; ">
			<div>
				<h6 style="font-weight: 400;font-family: verdana;">Profile visibility</h6>
				<p style="color: #6d737b;">Manage your profile visibility, choose if your profile will be visibe for other users or not.</p>
			</div>

			<div>
				<img src="./img/u.jpg" style="width: 60px;height: 60px;margin-top: 30px;">
			</div>

		</div>
					<hr style="margin-top: -10px;">
					<div style="width: 80%;margin:auto;margin-top: -10px;margin-bottom: 5px;color: #1697ea;font-weight: 400;font-family: verdana;">
						Manage your profile
					</div>
	</div>
	<div class="u_hover" id="profile_u">
		<div style="width: 90%;margin: auto;margin-top:10px;display: flex;justify-content: space-between; ">
			<div>
				<h6 style="font-weight: 400;font-family: verdana;">Username & Password</h6>
				<p style="color: #6d737b;">Change your Username or your Password quiqly.</p>
			</div>

			<div>
				<img src="./img/e.png" style="width: 60px;height: 60px;margin-top: 30px;">
			</div>

		</div>
					<hr style="margin-top: 19px;">
					<div style="width: 80%;margin:auto;margin-top: -10px;margin-bottom: 5px;color: #1697ea;font-weight: 400;font-family: verdana;">
						Change username & Pass
					</div>
	</div>
	<div class="u_hover" id="info_u">
		<div style="width: 90%;margin: auto;margin-top:10px;display: flex;justify-content: space-between; ">
			<div>
				<h6 style="font-weight: 400;font-family: verdana;">Your Information</h6>
				<p style="color: #6d737b;">Change your information quiqly</p>
			</div>

			<div>
				<img src="./img/p.png" style="width: 60px;height: 60px;margin-top: 30px;">
			</div>

		</div>
					<hr style="margin-top: 38.5px;">
					<div style="width: 80%;margin:auto;margin-top: -10px;margin-bottom: 5px;color: #1697ea;font-weight: 400;font-family: verdana;">
						Manage your profile
					</div>
	</div>
</div>
</div>
<script>
	$('#profile_vis').on('click',function(){
		$('.alll').css("display",'none');
		$(".visibility").fadeIn();
		$('.ty').append('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer;"></i><h5 style="margin-left:5px;">Profile Visibility</h5>');
				$('.oshit').css('display','none');

	})

	$('#profile_u').on('click',function(){
		$('.alll').css("display",'none');
		$(".vis_u").fadeIn();
		$('.ty').append('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer;"></i><h5 style="margin-left:5px;">Personal Information</h5>');
		$('.oshit').css('display','none');


	})
$('#info_u').on('click',function(){
		$('.alll').css("display",'none');
		$(".ch_info").fadeIn();
		$('.ty').append('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer;"></i><h5 style="margin-left:5px;">Personal Information</h5>');
		$('.oshit').css('display','none');


	})
	$('#hid').on('click',function(){
		$('#j').css('display','none');
		$('#je').css('display','none');
		$('#ke').css('display','flex');
		$('#k').css('display','flex');
		var id = '<?php echo $id;?>';
		var type = 'hide';
		$.ajax({
			type:'POST',
			url:'type.php',
			data:{
				type:type,
				id:id,
			},	
		});

	})

	$('#vis').on('click',function(){
		$('#j').css('display','flex');
		$('#je').css('display','flex');
		$('#ke').css('display','none');
		$('#k').css('display','none');
		var id = '<?php echo $id;?>';
		var type = 'show';
		$.ajax({
			type:'POST',
			url:'type.php',
			data:{
				type:type,
				id:id,
			},	
		});
	})
	//
$('#hide').on('click',function(){
		$('#kee').css('display','flex');
		$('#jee').css('display','none');
		$('#ji').css('display','none');
		$('#ki').css('display','flex');
		var id = '<?php echo $id;?>';
		var type = 'hide';
	})

$('#vise').on('click',function(){
		$('#kee').css('display','none');
		$('#jee').css('display','flex');
		$('#ji').css('display','flex');
		$('#ki').css('display','none');
		var id = '<?php echo $id;?>';
		var type = 'show';
})

$('#hidee').on('click',function(){
		$('#keee').css('display','flex');
		$('#jeee').css('display','none');
		$('#jeeee').css('display','none');
		$('#keeee').css('display','flex');
		var id = '<?php echo $id;?>';
		var type = 'hide';
	})

$('#visee').on('click',function(){
		$('#keee').css('display','none');
		$('#jeee').css('display','flex');
		$('#jeeee').css('display','flex');
		$('#keeee').css('display','none');
		var id = '<?php echo $id;?>';
		var type = 'show';
})
	$('#back').on('click',function(){
		$('.alll').fadeIn();
		$(".visibility").css("display",'none');
		$('.ty').html('');
		$('.oshit').fadeIn();

	})
	$('#back_two').on('click',function(){
		$('.alll').fadeIn();
		$('.oshit').fadeIn();
		$(".visibility").css("display",'none');
		$(".vis_u").css("display",'none');
		$('.ty').html('');
	})
	$('#back_three').on('click',function(){
		$('.ch_name').css('display','none');
		$('.vis_u').fadeIn();
		$('.ty').html('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer;"></i><h5 style="margin-left:5px;">Personal Information</h5>');
	})
	$('#back_four').on('click',function(){
		$('.ch_username').css('display','none');
		$('.vis_u').fadeIn();
		$('.ty').html('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer;"></i><h5 style="margin-left:5px;">Personal Information</h5>');
	})
	$('#back_five').on('click',function(){
		$('.ch_password').css('display','none');
		$('.vis_u').fadeIn();
		$('.ty').html('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer;"></i><h5 style="margin-left:5px;">Personal Information</h5>');
	})
	$('#back_six').on('click',function(){
		$('.ch_info').css('display','none');
		$('.oshit').fadeIn();
		$('.alll').fadeIn();
		$('.ty').css('display','none');
	})					
	$('#_name').on('click',function(){
		$('.oshit').css('display','none');
		$('.vis_u').css('display','none');
		$('.ch_name').fadeIn();
		$('.oshit').css('display','none');
		$('.ty').append('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer; margin-left:5px;"></i><h6 style="margin-left:5px;margin-top:4px;">Name</h6>');
		var set = setInterval(beg,0);
		function beg(){
			var 
				firstname = $('#change_name').val(),
				lastname = $('#change_namee').val(),
				password = $('#change_password').val(),
				id = '<?php echo $id;?>';
			if(firstname=="" || lastname=="" ||password==""){
				$('.rev').css('background-color','#f0f2f5');
				$('.rev').css('border','1px solid #f0f2f5');
			}else{
				$('.rev').css('background-color','#1697ea');
				$('.rev').css('border','1px solid #1697ea');
			}
		}
		
	})
	$('.rev').on('click',function(){
			var 
				firstname = $('#change_name').val(),
				lastname = $('#change_namee').val(),
				password = $('#change_password').val(),
				id = '<?php echo $id;?>';
				if(firstname!=="" || lastname!=="" ||password!==""){
					$.ajax({
						type:'POST',
						url:'update_name.php',
						data:{
							id:id,
							firstname:firstname,
							lastname:lastname,
							password:password,
						},beforeSend:function(){
							$('#ea').css('display','none');							
							$('#ei').css('display','block');
						},success:function(e){
							$('#ea').css('display','block');							
							$('#ei').css('display','none');
							$('.ch_name').append(e);
						},
					});
				}
			})

	$('#_username').on('click',function(){
		$('.oshit').css('display','none');
		$('.vis_u').css('display','none');
		$('.ch_username').fadeIn();
		$('.oshit').css('display','none');
		$('.ty').append('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer; margin-left:5px;"></i><h6 style="margin-left:5px;margin-top:4px;">Username</h6>');
		var set = setInterval(bege,0);
		function bege(){
			var 
				username = $('#change_username').val(),
				password = $('#change_passworde').val(),
				id = '<?php echo $id;?>';
			if(username=="" ||password==""){
				$('.reve').css('background-color','#f0f2f5');
				$('.reve').css('border','1px solid #f0f2f5');
			}else{
				$('.reve').css('background-color','#1697ea');
				$('.reve').css('border','1px solid #1697ea');
			}
		}
		
	})


	$('.reve').on('click',function(){
			var 
				username = $('#change_username').val(),
				password = $('#change_passworde').val(),
				id = '<?php echo $id;?>';
				if(username!=="" ||password!==""){
					if(username.length>20 || username.length<5){
					$('#change_username').css('border','1px solid red');
					$('#change_username').css('color','red');
					$('#change_username').val('Weak username');
					$("#change_username").on('click',function(){
					$('#change_username').css('border','1px solid #e2e3ea');
					$("#change_username").css("color","black");
					$("#change_username").val("");
					})
				}else{
					$.ajax({
						type:'POST',
						url:'update_username.php',
						data:{
							id:id,
							username:username,
							password:password,
						},beforeSend:function(){
							$('#ea').css('display','none');							
							$('#ei').css('display','block');
						},success:function(e){
							$('#ea').css('display','block');							
							$('#ei').css('display','none');
							$('.ch_username').append(e);
						},
					});
				}
					
				}
			})



	$('#_password').on('click',function(){
		$('.oshit').css('display','none');
		$('.vis_u').css('display','none');
		$('.ch_password').fadeIn();
		$('.oshit').css('display','none');
		$('.ty').append('<i class="fas fa-arrow-right" id="back_two" style="font-size: 15px;cursor: pointer; margin-left:5px;"></i><h6 style="margin-left:5px;margin-top:4px;">Password</h6>');
		var set = setInterval(begee,0);
		function begee(){
			var 
				old_password = $('#change_usernamee').val(),
				new_password = $('#change_passwordee').val(),
				id = '<?php echo $id;?>';
			if(old_password=="" ||new_password==""){
				$('.revee').css('background-color','#f0f2f5');
				$('.revee').css('border','1px solid #f0f2f5');
			}else{
				$('.revee').css('background-color','#1697ea');
				$('.revee').css('border','1px solid #1697ea');
			}
		}
		
	})


	$('.revee').on('click',function(){
			var 
				old_password = $('#change_usernamee').val(),
				new_password = $('#change_passwordee').val(),
				id = '<?php echo $id;?>';
				if(old_password!=="" ||new_password!==""){
					$.ajax({
						type:'POST',
						url:'update_password.php',
						data:{
							id:id,
							old_password:old_password,
							new_password:new_password,
						},beforeSend:function(){
							$('#ea').css('display','none');							
							$('#ei').css('display','block');
						},success:function(e){
							$('#ea').css('display','block');							
							$('#ei').css('display','none');
							$('.ch_password').append(e);
						},
					});
				}
					
			})
</script>
<?php

 ;?>
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
<!DOCTYPE html>
<html style="background-color: #f0f2f5;">
<head>
	<title>Home</title>
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
</head>

<body>
	<div id="share_post_div" style="display: none; background-color: rgba(255,255,255, 0.6); position: fixed;width: 100%;height: 100vh;z-index: 20;">
		<div id="i_po" style="width: 40%;height: auto;position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;height: 360px;background: white;border-radius: 10px;-webkit-box-shadow: 0px 0px 23px -3px rgba(99,93,99,1);-moz-box-shadow: 0px 0px 23px -3px rgba(99,93,99,1);box-shadow: 0px 0px 23px -3px rgba(99,93,99,1);">

		</div>
	</div>




	<div id="add_post" style="display: none;  background-color: rgba(255,255,255, 0.6); position: fixed;width: 100%;height: 100vh;z-index: 20;">
	<div id="ii_po" style="width: 40%;height: auto;position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;height: 360px;background: white;border-radius: 10px;-webkit-box-shadow: 0px 0px 23px -3px rgba(99,93,99,1);
-moz-box-shadow: 0px 0px 23px -3px rgba(99,93,99,1);
box-shadow: 0px 0px 23px -3px rgba(99,93,99,1);">
<input type="text" id="audience_type" name="" value="public" style="position: absolute;visibility: hidden;left: -90%;">
<div style="display:none; ;" class="audience">
	<script>
		$('#ii_po').css('height','400px');
	</script>
	<div style="width: 90%;margin: auto;text-align: center;margin-top: 10px;">
		<h4 style="display: inline-block;font-family: Segoe UI;font-weight: 400;">Who can see your post ?</h4><div class="fermer"><i class="fas fa-times" style="color: #757b82!important;margin-top: 5px;font-size: 23px;"></i></div>
			<hr style="margin-top: 5px;">
		<p style="text-align: left;color: gray;">Your post will be visible in the news feed, on your profile and in search results.</p>
	</div>
	<div class="aud_select" id="s_public">
		<div style="width: 90%;display: flex;justify-content: space-between;margin: auto;">
			<div style="display: flex;margin-top: 15px;">
				<i class="fas fa-globe-africa" style="font-size: 25px;color: #65676b;"></i>
				<div style="margin-left: 10px;margin-top: -5px;">
				<p style="display: block;color: black;font-weight: 600;">Public</p>
				<p style="display: block; margin-top: -20px;">Every users</p>
				</div>
			</div>
			<div id="i_public" class="cho" style="margin-top: 15px;"><div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div></div>
		</div>
	</div>
	<div class="aud_select" id="s_followers">
		<div style="width: 90%;display: flex;justify-content: space-between;margin: auto;">
			<div style="display: flex;margin-top: 15px;">
				<i class="fas fa-user-friends" style="font-size: 21px;color: #65676b;"></i>
				<div style="margin-left: 10px;margin-top: -5px;">
				<p style="display: block;color: black;font-weight: 600;">Followers</p>
				<p style="display: block; margin-top: -20px;">Users who follwing you</p>
				</div>
			</div>
			<div id="i_followers" class="cho" style="margin-top: 15px;"><div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div></div>
		</div>
	</div>
	<div class="aud_select" id="s_me">
		<div style="width: 90%;display: flex;justify-content: space-between;margin: auto;">
			<div style="display: flex;margin-top: 15px;">
				<i class="fas fa-user-lock" style="font-size: 25px;color:#65676b; "></i>
				<div style="margin-left: 10px;margin-top: -5px;">
				<p style="display: block;color: black;font-weight: 600;">Only me</p>
				<p style="display: block; margin-top: -20px;">No users can see your post</p>
				</div>
			</div>
			<div  id="i_me" class="cho" style="margin-top: 15px;"><div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div></div>
		</div>
	</div>
	<div style="width: 90%;margin: auto;">
		<div style="display: flex;justify-content: space-between;width: 50%;margin: auto;margin-right: 0;margin-top: 10px;">
			<button onclick="precedent()" class="precedent">Precedent</button>
			<button onclick="change_aud()" id="aud_change" class="s_bef">Save change</button>
		</div>
	</div>
	<script>
		function precedent(){
			$('.audience').css('display','none');
			$('.postinge').css('display','block');
		}
		function change_aud(){
			var type = $('#audience_type').val();
			if(type=='public'){
				$('.monde').html('<div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-globe-africa" style="font-size: 13px;margin-top: 4px;color:black;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Public</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div>');
			}else if(type=='followers'){
				$('.monde').html('<div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-user-friends" style="font-size: 13px;margin-top: 4px;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Followers</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div>');
			}else if(type=='me'){
				$('.monde').html('<div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-user-lock" style="font-size: 13px;margin-top: 4px;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Only me</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div>');
			}
			$('.audience').css('display','none');
			$('.postinge').css('display','block');
		}
		$('#s_public').on('click',function(){
			$('#i_public').html('<div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_followers').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_me').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#audience_type').val('public');
			$('#aud_change').removeClass('s_bef');
			$('#aud_change').addClass('s_aft');

		})
		$('#s_followers').on('click',function(){
			$('#i_followers').html('<div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_public').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_me').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#audience_type').val('followers');
			$('#aud_change').removeClass('s_bef');
			$('#aud_change').addClass('s_aft');
		})
		$('#s_me').on('click',function(){
			$('#i_me').html('<div style="background-color: white;border-radius: 50%;border:6px solid #1697ea;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_public').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#i_followers').html('<div style="background-color: white;border-radius: 50%;border:1px solid gray;width: 25px;height: 25px;"><p style="visibility: hidden;">d</p></div>');
			$('#audience_type').val('me');
			$('#aud_change').removeClass('s_bef');
			$('#aud_change').addClass('s_aft');
		})
	</script>
</div>
<div class="post_images" style="display: none;">
	<div style="width: 90%;margin: auto;text-align: center;margin-top: 10px;">
			<h4 style="display: inline-block;font-family: Segoe UI;font-weight: 400;">Select Photos</h4><div  class="fermer"><i class="fas fa-times" style="color: #757b82!important;margin-top: 5px;font-size: 23px;"></i></div>
		</div>
		
		<hr style="margin-top: 5px;">
		<div style="position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom:0 ;height: 50px;text-align: center;">
			<label  class="share_ph" for="images_in">Upload photos to share</label>
			<img id="output" style="width: 60px;height: 60px;display: none;" />
			<input type="file" accept="image/*" name="files[]" id="images_in" multiple onchange="loadFile(event)" style="display: none;">
			  
		</div>
		<div style="position: absolute;bottom: 10px;width: 100%;">
			<hr>
			<div style="width: 40%;margin-right: 10px;margin-left: auto;display: flex;justify-content: space-between;">
				<button onclick="shit_back()" class="precedentee">Precedent</button>
				<button onclick="save_post()" id="audi" class="s_bef">Save </button></div>
		</div>

		<div id="preview" style="display: none; height: 200px;margin-top: -18px; text-align: center;overflow: hidden;overflow-x: scroll;"></div>
</div>
<div class="postinge">
		<div style="width: 90%;margin: auto;text-align: center;margin-top: 10px;">
			<h3 style="display: inline-block;font-family: Segoe UI;font-weight: 400;">Create Post</h3><div class="fermer"><i class="fas fa-times" style="color: #757b82!important;margin-top: 5px;font-size: 23px;"></i></div>
			<hr style="margin-top: 5px;">
		</div>
		<div style="width: 90%;margin: auto;margin-top: 10px;">
			<div style="width: 100%;display: flex;">
				<div style="cursor: pointer;"><img src="<?php echo $user_pic;?>" style="width: 45px;height: 45px;border-radius: 50%;"></div><div style="margin-left: 5px;max-width: 50%;">
					<p style="font-weight: 400;font-family: Segoe UI;font-size: 18px;"><?php echo "".$user_firstname." ".$user_lastname."";?></p>
					<div class="monde"><div style="width: 90%;margin: auto; display: flex;justify-content: space-between;"><i class="fas fa-globe-africa" style="font-size: 13px;margin-top: 4px;color:black;"></i><p style="font-family:Segoe UI;font-size: 14px;font-weight: 600; ">Public</p><i class="fas fa-sort-down" style="font-size: 15px;"></i></div></div>
				</div>

			</div>
			<script>
				$('.monde').on('click',function(){
					$('.postinge').css('display','none');
					$('.audience').css('display','block');
				})
			</script>
			<textarea id="area" style="width: 100%;margin-top: 15px;border: none;resize: none;" rows="3" placeholder="What you wanna talk about, <?php echo $user_firstname;?> ?"></textarea>
			<div id="get_im"></div>
			<div style="margin-top: 10px;display: flex;justify-content: space-between;position: absolute;bottom: 20px;width: 90%;">
				<div style="display: flex;">
					<div style="display: flex;justify-content: space-between;">
						<div class="po_ho" id="image_se"><i class="far fa-image" style="font-size: 25px;color: #43b35e;margin-top: 7px;"></i></div>
						<div class="po_ho"><i class="fab fa-youtube" style="font-size: 25px;color: red;margin-top: 7px;"></i></div>
						<div class="po_ho"><i class="fas fa-user-tag" style="font-size: 23px;color: #1877f2;margin-top: 7px;"></i></div>
						<div class="po_ho"><i class="fas fa-ellipsis-h" style="font-size: 23px;color: gray; margin-top: 7px;"></i></div>
					</div>
					<div style="border-left: 1px solid #d7d7d7;height: 35px;margin-top: 5px; width: 1px;"><p style="visibility: hidden;">d</p></div>
				</div>
				<div style="width: 100%;margin-top: 5px;margin-left: 10px;"><button onclick="add_post()" id="bu" class="bef_b">Post</button></div>
			</div>
		</div>

</div>
</div>
</div>
<script>
</script>
<div id="body">


<div class="nnt">
  <div class="ap">
  
  	<h6 style="margin-left: 10px;display: inline-block; font-weight: 600;font-family: verdana;text-align: center;">Notifications</h6>
  	
  </div>
 <div class="foe" >
 	<div style="position: relative;">
 		<div class="ape" >
 	<div style="text-align: center ; width: 100%;height: 100%;margin-top: 5px;"><p style="color: #1697ea;font-size: 13px; font-family: verdana;text-align: center;">See all incoming activities</p></div></div>
 </div>
 </div>
 
<div style="margin-top:60px;" >
	<hr>
	<div class="for_noti" style="display: block;">

		<div id="p" style="text-align: center;">
			<div class="spinner-border rez" role="status" style="color: #1697ea;">
  			<span class="sr-only">Loading...</span>
			</div>
		</div>
	</div>
	
</div>


</div>
<?php
$select = mysqli_query($con,"SELECT * FROM messages WHERE user_by='$user_id' ORDER BY id DESC");
$f = mysqli_fetch_array($select);
//get last  notifications ;


 ;?>

<script>

  		$(".comm").on('click',function(){
  			$(this).css("color"," #1697ea");
  			$(".belle").css("color","#8b8da9");
  			$(".for_noti").toggle("left");
  			$(".for_mess").toggle("right");
  			$('.jojou').css('display','none');
  			var id='<?php echo $user_id;?>';
  			$.ajax({
  				type:'POST',
  				url:'get_noti_m.php',
  				data:{
  					id:id,
  				},success:function(data){
  					$(".for_mess").append(data);
  				}
  			})

  		})
  		$(".belle").on('click',function(){
  			$(this).css("color","#1697ea");
  			$(".comm").css("color","#8b8da9");
  			$(".for_mess").toggle("left");
  			$(".for_noti").toggle("right");
  		})
  	</script>
<div class="spinner-grow text-primary spi" role="status" style="position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;width: 100px;height: 100px;display: none;">
  <span class="sr-only">Loading...</span>
</div>
<div class="header" style="; display: flex; height: 50px;border-bottom: 2px solid #e5e5e5;box-shadow: rgba(0, 0, 0, 0.2);position: fixed;">
	<div class="logee" style="">
		<h3 style="font-weight: 600;margin-left: 20px;">MeetUp<i class="fas fa-child" style="color: #1697ea"></i></h3>
	</div>
	
	<div style="margin-top: 10px;  width: 38%;margin-right: 73px; text-align: center;display: flex;justify-content: space-between;">
	<div style="width: 60px;" class="men_hover" onclick="home()"><i id="hm" class="fas fa-home hm" style="color: #8b8d90;font-size: 24px;cursor: pointer;vertical-align: top;"></i></div>
	 <div style="width: 60px;" class="men_hover"  onclick="chat()"><i id="hm" class="fas fa-globe-africa" style="color: #8b8d90;font-size: 24px;cursor: pointer;vertical-align: top;"></i></div>
	<div style="width: 60px;" class="men_hover" onclick="messagee()">  <i id="hm" class="far fa-envelope" style="color: #8b8d90;font-size: 24px;cursor: pointer;vertical-align: top;"></i></div>
	 <div style="width: 60px;" class="men_hover">
      <i id="hm" class="far fa-bell bg" style="color: #8b8d90;font-size: 24px;cursor: pointer;display: inline-block;"></i>
      <span class="sfee" style="display: none;vertical-align: top;background-color: red;color: white;border-radius: 20%;width: 10px;height: 20px;text-align: center; margin-left: -10px;  font-size: 13px;font-weight: 600;"></span>
   		 </div>
	<div style="width: 60px;" class="men_hover"> <i id="hm" class="fas fa-cog" style="color: #8b8d90;font-size: 24px;cursor: pointer;vertical-align: top;"></i></div>
	  
	</div>
	<div class="ff" style="width: 20%;margin-right: 20px;">
		<div class="search"><i class="fas fa-search" style="display: inline-block;float: left;margin-top: 8px;margin-left: 10px;color: #8f959c;"></i><input type="text" name="text" placeholder="Search for somoene" class="in" onkeyup="search()"></div>
	</div>
</div>
	</div>
	<script>
		$(".in").on('focusin',function(){
			$(".search").animate({width:"200%"},400);
			$('.search').css("box-shadow","2px 4px 8px gray")
		})
		$(".in").on('focusout',function(){
			$(".search").animate({width:"150%"},400);
			$('.search').css("box-shadow","none");
			$(".in").val("");
		})
	</script>
	<div class="footer" style="z-index: 20;display: none;">
		<div style="text-align: center;margin-top: 5px;">
			<i class="fas fa-home hm" style="font-size: 25px;"   ></i>
			<i class="fas fa-globe-africa" style="font-size: 25px;"></i>
			<i class="far fa-envelope" style="font-size: 25px;" ></i>
		</div>
	</div>
</div>
	<div class="ale" style="background-color: #f0f2f5;">
		
	</div>
	<div class="f_m"></div>
	
		<div class="god"></div>

	
</div>
</body>
</html>
<script>
		var user_pic='<?php echo $user_pic;?>';

			$.ajax({
				type:'POST',
				url:'homi.php',
				beforeSend:function(){
					$(".spi").css("display","block");
				},
				success:function(data){
					$(".spi").css("display","none");
					$('.ale').html(data)
					
				},
				error:function(error){
					alert(error)
				}
			})
		
	

	function home(){
		$(".hm").css("color","#1697ea");
		$(".fa-globe-africa").css("color","#65676b");
		$(".fa-envelope").css("color","#65676b");
		$.ajax({
				type:'POST',
				url:'homi.php',
				beforeSend:function(){
					$(".spi").css("display","block");
				},
				success:function(data){
					$(".spi").css("display","none");
					$('.ale').css("display","block");
					$('.ale').html(data);
				},
				error:function(error){
					alert(error)
				}
			})
	}
	function chat(){
		$(".hm").css("color","#65676b");
		$(".fa-globe-africa").css("color","#1697ea");
		$(".fa-envelope").css("color","#65676b");
		$.ajax({
				type:'POST',
				url:'chat.php',
				beforeSend:function(){
					$(".spi").css("display","block");
				},
				success:function(data){
					$(".spi").css("display","none");
					$('.ale').html(data)
				},
				error:function(error){
					alert(error)
				}
			})
	}
	function messagee(){
		$(".hm").css("color","#65676b");
		$(".fa-globe-africa").css("color","#65676b");
		$(".fa-envelope").css("color","#1697ea");
		$.ajax({
				type:'POST',
				url:'message.php',
				beforeSend:function(){
					$(".spi").css("display","block");
				},
				success:function(data){
					$(".spi").css("display","none");
					$('.ale').html(data)
				},
				error:function(error){
					alert(error)
				}
			})
	}
  
$('.bg').on('click',function(){
  $('#base').val('');
  $(".nnt").toggle();
  $('.sfee').css('display','none');
   var id = '<?php echo $user_id;?>';
	$.ajax({
  				type:'POST',
  				url:'get_noti.php',
  				data:{id:id},
  				beforeSend:function(){
  					
  				},success:function(data){
  					$("#p").css("display","none");
  					$(".for_noti").html(data);
  					
  					
  				}
  			})
	$.ajax({
  				type:'POST',
  				url:'set_noti_.php',
  				data:{id:id},
  				beforeSend:function(){
  					//
  				},success:function(data){
  					
  				}
  			})
  			
})
//var id = '<?php  $user_id;?>';
//setInterval(function(){

//$.ajax({
	//type:'POST',
	//url:'count_noti.php',
	//data:{
		//id:id,
	//},success:function(data){
		//$(".sfee").html(data);
		
	//}
//})
//},1000)
</script>
 <script type="text/javascript">
 	
 	
 	var conn = new WebSocket('ws://localhost:8082');

conn.onopen = function(e) {
    console.log("Connection established!");
    
};



 </script>
<script>
	function add_post(){
		var 
			text = $('#area').val();
		if(text!==''){
			var id = '<?php echo $user_id;?>',
				audience = $('#audience_type').val();
			$.ajax({
				type:'POST',
				url:'post.php',
				data:{
					id:id,
					text:text,
					audience:audience,
				},beforeSend:function(){
					$('#bu').html('<div class="spinner-border" style="width: 30px; height: 30px;" role="status"><span class="visually-hidden" style="visibility:hidden;">Loading...</span></div>');
				},success:function(d){
					$('#add_post').css('display','none');
					$('.all_data').prepend(d);
					$('#bu').html('Post');
				}
			})
		}
	}
</script>
<script>
  function loadFile(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      $('#output').css('display','visible');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
	$('#image_se').on('click',function(){
		$('#preview').html('');
		$('.share_ph').css('display','block');
		$('#preview').css('display','none');
		$('#ii_po').css('height','300px');
		$('.postinge').css('display','none');
		$('.post_images').css('display','block');

	})
</script>
<script>
	function loadFile() {

  var preview = document.querySelector('#preview');
  var get_im = document.querySelector('#get_im');
  var get = document.querySelector('#get_im');
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {
  	$('.share_ph').css('display','none');
  	$('#ii_po').css('height','450px');
  	$('#preview').css('display','flex');
  	$('#preview').css('height','335px');

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    $('#audi').removeClass('s_bef');
    $('#audi').addClass('s_aft');

    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 200;
      image.width = 200;
      image.title  = file.name;
      image.id = Math.floor(Math.random() * 200);
      image.src    = this.result;
      image.className= 'shite';
      preview.appendChild(image);
     
      
    });
    
    reader.readAsDataURL(file);
    
  }

}

document.querySelector('#images_in').addEventListener("change", loadFile);
</script>
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
 
  </script>
  <script>
  	function shit_back(){
  		$('#preview').html('');
  		$('#audi').removeClass('s_aft');
  		$('#audi').addClass('s_bef');
		$('.share_ph').css('display','block');
		$('#preview').css('display','none');
		$('#ii_po').css('height','400px');
		$('.postinge').css('display','block');
		$('.post_images').css('display','none');
  		
  	}
  	function save_post(){
  		var
  		 	image = $('#images_in').val();
  		if(image!==''){
  			$('.postinge').css('display','block');
		$('.post_images').css('display','none');
  		}
  	}
  </script>
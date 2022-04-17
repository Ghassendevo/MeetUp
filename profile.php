<?php 
include("./connect.php");

ob_start();
session_start();
if (!isset($_SESSION['login_user'])) {
	header('location: findurcrush.php');
}
else {
	$user = $_SESSION['login_user'];
	$selet = mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
	$i = mysqli_fetch_array($selet);
	$_fir = ucfirst($i['firstname']);
	$_last = ucfirst($i['lastname']);
	$_pic = $i['pic'];
	$_id = $i['id'];
}
//update online time
$update = mysqli_query($con,"UPDATE users SET status='online' WHERE username='$user'") or die(mysqli_error($con));
//get user informations.
$id = $_POST['id'];
$select = mysqli_query($con,"SELECT * FROM users WHERE id='$id'") or die(mysqli_error($con));
$ff = mysqli_fetch_array($select);
$user_firstname = ucfirst($ff['firstname']);
$user_lastname = ucfirst($ff['lastname']);
$user_pic = $ff['pic'];
$user_username = $ff['username'];
$user_status = $ff['status'];
$user_first = $ff['first'];
$user_id = $ff['id'];
// get user profile .
$id = $_POST['id'];

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
<div class="lefte">
<div style="position: fixed;">
	<div class="name" onclick="pro()">
		<img src="<?php echo $_pic ;?>" style="height: 40px;width: 40px;border-radius: 50%;display: inline-block;margin-left: 5px;"><p id="ope" style="display: inline-block;font-weight: 400;font-family: verdana;margin-left: 10px;margin-bottom: -20px;"><?php echo "".$_fir." ".$_last."" ;?></p>
	</div>
	<script>
		function pro(){
			$(".ale").css("display","none");
			var id = '<?php echo $_id;?>';
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
		<i class="fas fa-users-cog" style="color: #1697ea;font-size: 25px;margin-left: 10px;"></i><p style="display: inline-block;font-weight: 400;font-family: verdana;margin-left: 10px;margin-bottom: -20px;">Contact with Ghassen</p>
	</div>
	<div class="name" style="margin-left: 20px;">
		<i class="fas fa-bug" style="font-size: 25px;color: red;margin-left: 10px;"></i></i><p style="display: inline-block;font-weight: 400;font-family: verdana;margin-left: 10px;margin-bottom: -20px;">Report for bugs</p>
	</div>
	<hr style="color: #dcdfe3;margin-left: 20px;">
	<h5 style="color:#65676b;font-weight: 400;font-family: arial;">Profile views</h5>
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
							alert('error');
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
<div class="dde">
<div id="ohd" >
	<?php 
	if($user_username==$user){
		//if user session is the user.
		;?>
				<script>
					$('#oh').addClass('oh');
				</script>
				<?php
		;?>
		<div style="padding-bottom: 10px; margin-top: 65px; box-shadow: 1px 2px  #e5e5e5;background-color: white;">
		<div style="text-align: center;margin-top: -60px;z-index: -1;text-align: left;line-height: 80%;">
			<div style="display: flex;justify-content: space-between;">
			<div style="line-height: 80%;">
			<img src="<?php echo $user_pic ;?>" style="width: 160px;cursor: pointer;height: 160px;border-radius: 5px;border:2px solid white;border-radius: 50%;-webkit-box-shadow: 0px 1px 14px 4px rgba(176,166,176,0.96);
				-moz-box-shadow: 0px 1px 14px 4px rgba(176,166,176,0.96);
				box-shadow: 0px 1px 14px 4px rgba(176,166,176,0.96);margin-bottom: -30px;margin-top: 20px; z-index: 2;margin-left: 10px;display: inline-block;">
				<div style="margin-top: 10px;margin-left: 10px;display: inline-block;line-height: 80%;vertical-align: bottom;">
					<p id="op" style=" font-weight: 400;font-family: verdana;vertical-align: ;color: black; font-size: 20px;float: ri"><?php echo "".$user_firstname." ".$user_lastname."" ;?></p>
					<div style="display: flex;justify-content: space-between;line-height: 80%;">
						<div style="" class="mp">
							<p style="font-weight: bold;">0</p>
							<p style="margin-top: -10px;">Posts</p>
						</div>
						<div style="" class="mp" id="s_followers">
							<p style="font-weight: bold;">200</p>
							<p style="margin-top: -10px;">Followers</p>
						</div>
						<div style="" class="mp" id="s_following">
							<p style="font-weight: bold;">800</p>
							<p style="margin-top: -10px;">Following</p>
						</div>
					</div>

				</div>
			
			</div>
			<div style=""id="pen" title="Edit">
				<div class="pin">
					<i class="fas fa-pen" style="color: white;margin-top: 6px;"></i>
				</div>
			</div>
		</div>
		<div class="overly" style="z-index: 3;text-align: left;">
			<p style="margin-top: 30px;font-weight: 400;">Edit</p>
			<i class="far fa-edit" style="margin-top: 50px;margin-left: -20px;"></i>
		</div>
		<div>
		<div style="float: right;margin-top: -40px;z-index: 2">
			<div class="hova" id="for_images"><p style="color: #65676b;margin-top: 10px;font-family: verdana;font-weight: 400;">Images<i class="far fa-images" style="margin-left: 5px;color: red;"></i></p></div>
			<div class="hove" id="for_about" ><p style="color: #65676b;margin-top: 10px;font-family: verdana;font-weight: 400;">About <i class="far fa-address-card" style="color: #00c851;"></i></p></div>
			<div class="hovee" id="for_setting" style=""><p style="color: #65676b;margin-top: 10px;font-family: verdana;font-weight: 400;">Setting<i class="far fa-images" style="margin-left: 5px;color: red;"></i></p></div>

		</div>
		</div>
	</div>
</div>
<?php 
	$f = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$_id'");
	if(mysqli_num_rows($f)>0){
		$fol_count = mysqli_num_rows($f);
	}else{
		$fol_count = '';
	}

	$fe = mysqli_query($con,"SELECT * FROM followers WHERE follow_by='$_id'");
	if(mysqli_num_rows($fe)>0){
		$fole_count= mysqli_num_rows($fe);
	}else{
		$fole_count='';
	}

;?>
<div class="for_foll" style="display: none; z-index: 10; position: absolute;width: 100%;height: 100vh;background: rgba(0, 0, 0, 0.4);margin: auto;top: 0;right: 0;left: 0;bottom: 0;">
	<div class="foll_all " style="width: 40%;height: 80vh;background-color: white;border-radius: 10px;position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;">
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<div style="display: flex;justify-content: space-between;width: 45%;"><i id="b_ca" title="Back" class="fas fa-arrow-left" style="font-size: 25px;cursor: pointer;"></i><p style="font-size: 20px;font-weight: bold;"><?php echo "".$user_firstname." ".$user_lastname."";?></p></div>
		</div>
		<div style="margin-top: -10px;display:flex;justify-content: space-around;border-bottom: 1px solid #dcdfe3; ">
				<div id="filo1" class="ini"><p id="filo1_p" style="font-weight: bold;"><?php echo $fol_count;?> Followers</p></div>
				<div id="filo2" class="foll" style="cursor: pointer; width: 50%;height: 30px;padding-top: 4px; margin-top: 15px; text-align: center;"><p id="filo2_p" style="font-weight: 400; color:#8b8d90; "><?php echo $fole_count;?> Following</p></div>

		</div>
		
		<div class="foll_data" style="width:95%;margin: auto;margin-top: 10px;">
		</div>

	</div>
</div>
<script>
		$('#b_ca').on('click',function(){
			$('.for_foll').css('display','none');
		})
		$('#s_following').on('click',function(){
			$('.for_foll').css('display','block');
			$('#filo2').removeClass('foll');
		$('#filo2').addClass('ini');
		$('#filo1_p').css('color','#8b8d90');
		$('#filo1_p').css('font-weight','400');
		$('#filo2_p').css('color','black');
		$('#filo2_p').css('font-weight','bold');
		$('#filo1').removeClass('ini');
		$('#filo1').addClass('foll');
			var 
		s_id='<?php echo $_id;?>',
		id= '<?php echo $id;?>';
	$.ajax({
		type:'POST',
		url:'followerss.php',
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
		$('#s_followers').on('click',function(){
			$('.for_foll').css('display','block');
			$('#filo1').removeClass('foll');
		$('#filo1').addClass('ini');
		$('#filo2_p').css('color','#8b8d90');
		$('#filo2_p').css('font-weight','400');
		$('#filo1_p').css('color','black');
		$('#filo1_p').css('font-weight','bold');
		$('#filo2').removeClass('ini');
		$('#filo2').addClass('foll');
			$('.for_foll').css('display','block');
			var 
		s_id='<?php echo $_id;?>',
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
			$('.new_spi').css('display','none');
			$('.foll_data').html(d);
		}
	})
		})

		var 
		s_id='<?php echo $_id;?>',
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
			$('.new_spi').css('display','none');
			$('.foll_data').html(d);
		}
	})
	$('#b_ca').on('click',function(){
		$('.for_foll').css('display','none');
	})
	$('#filo2').on('click',function(){
		var 
		s_id='<?php echo $_id;?>',
		id= '<?php echo $id;?>';
	$.ajax({
		type:'POST',
		url:'followerss.php',
		data:{
			s_id:s_id,
			id:id,
		},beforeSend:function(){
			$('.foll_data').html('<div style="text-align: center;margin-top: 10px;" class="new_spi"><div class="lds-roller"><div></div><div></div><div></div></div></div>');
		},success:function(d){
			$('.foll_data').html(d);
		}
	})
		$(this).removeClass('foll');
		$(this).addClass('ini');
		$('#filo1_p').css('color','#8b8d90');
		$('#filo1_p').css('font-weight','400');
		$('#filo2_p').css('color','black');
		$('#filo2_p').css('font-weight','bold');
		$('#filo1').removeClass('ini');
		$('#filo1').addClass('foll');
	})
	$('#filo1').on('click',function(){
		var 
		s_id='<?php echo $_id;?>',
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
		$(this).removeClass('foll');
		$(this).addClass('ini');
		$('#filo2_p').css('color','#8b8d90');
		$('#filo2_p').css('font-weight','400');
		$('#filo1_p').css('color','black');
		$('#filo1_p').css('font-weight','bold');
		$('#filo2').removeClass('ini');
		$('#filo2').addClass('foll');
	})
</script>
<script>
	$('.pin').on('click',function(){
			$('#for_about').addClass('by');
			$('#for_images').addClass('by');
		$('#for_setting').addClass('by');			
	})

	$('#for_images').on('click',function(){
		$('#for_about').addClass('by');
		$('#for_setting').addClass('by');
		$(this).removeClass('by');
		$(this).addClass('hova');
		var id = '<?php echo $user_id;?>';
		var user_id = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'data_for_images.php',
			data:{
				id:id,
				user_id:user_id,
			},
			beforeSend:function(){
				var d = '<div style="width:100%;height:200px;justify-content:center;text-align:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden"></span></div></div>';
				$('.ali').html(d);
			},success:function(e){
				$('.ali').css('display','none');
				$('#data_u').css('display','none');
				$('#data_c').css('display','block');
				$('#data_c').html(e);
			}
		})
	})

	$('#for_setting').on('click',function(){
		$('#for_about').addClass('by');
		$('#for_images').addClass('by');
		$(this).removeClass('by');
		$(this).addClass('hova');
		var id = '<?php echo $user_id;?>';
		var user_id = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'data_for_setting.php',
			data:{
				id:id,
				user_id:user_id,
			},
			beforeSend:function(){
				var d = '<div style="width:100%;height:200px;justify-content:center;text-align:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden"></span></div></div>';
				$('.ali').html(d);
			},success:function(e){
				$('.ali').css('display','none');
				$('#data_u').css('display','none');
				$('#data_c').css('display','block');
				$('#data_c').html(e);
			}
		})
	})

	$('#pen').on('click',function(){
		var id = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'data_for_about.php',
			data:{id:id},
			beforeSend:function(){
				var d = '<div style="width:100%;height:200px;justify-content:center;text-align:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden"></span></div></div>';
				$('.oi').css('display','none');
				$('#data_c').html(d);
				$('.ali').html(d);
			},
			success:function(e){
					$('.ali').css('display','none');
					$('#data_c').css('display','none');
					$('#data_u').css('display','block');
					$('#data_u').html(e);
			}
		})
	})
	$('#for_about').on('click',function(){
		$(this).removeClass('by');
		$('#for_setting').addClass('by');		
		$('#for_images').addClass('by');
		$(this).addClass('hova');
		var id = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'data_for_aboute.php',
			data:{id:id},
			beforeSend:function(){
				var d = '<div style="width:100%;height:200px;justify-content:center;text-align:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden"></span></div></div>';
				$('.oi').css('display','none');
				$('#data_c').html(d);
				$('.ali').html(d);
			},
			success:function(e){
					$('.ali').css('display','none');
					$('#data_c').css('display','none');
					$('#data_u').css('display','block');
					$('#data_u').html(e);
			}
		})
	})
</script>
	<div style="background-color: white;height: 360px; border:1px solid #e5e5e5; overflow: auto; overflow-x: hidden; width: 100%; margin-top: 10px;">
		<div id="data_c" style="margin-top: 10px;"></div>
		<div id="data_u" style="margin-top: 10px;"></div>
	<br>
	<div class="ali">
	<?php
	$check=  mysqli_query($con,"SELECT * FROM images WHERE user_id='$user_id'");
	$f = mysqli_num_rows($check);
	if ($f==0) {
	 	;?>
	 	<div class="after_data"></div>
	 		<div style="margin: auto;text-align: center;justify-content: center;" class="rabi">
	 			<h3 style="font-weight: bold;">Profile</h3>
	 			<p style="color: #8b8d90;">When you share photos and videos <br>they'll appear on your profile</p>
	 			<label onclick="start_c()" for="cam" class="ede"><h6 style="color: #1697ea;font-weight: bold; cursor: pointer;">Share your first photo or video<h6></label>
	 		</div>
		<div class="after" style=" margin-left: auto;margin-right: auto;width: 80%;border-radius: 10px; height: 160px; border-bottom: none;text-align: center;justify-content: center;">
			<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status">
  		<span class="sr-only">Loading...</span>
		</div>
			<div id="mullol" style="display: none;"><i class="fas fa-cloud-upload-alt" style="color: #1697ea;font-size: 90px;margin-top: 10px;"></i>
			<p style="color: gray;font-family: 'Muli',sans-serif; font-weight: bold; ">Let users say your images</p></div>
			</div>
		
		<div id="wow" style="text-align: center;width: 300px;margin-left: auto;margin-right: auto;color: #65676b;font-family: verdana;font-weight: 400;">
		
			<input class="file" type="file" id="cam" name="files[]" style="display: none;" multiple   >

		</div>
		<div style="text-align: center;display: none;margin-top: 10px;" id="shit">
		<button   class="save" style="display: inline-block;">Save</button> 
		<button class="discard" onclick="discard()" style="display: inline-block;">Discard</button>
		</div>
		
	 	<?php
	 }else{
	 	;?>
	 	<div class="det" style="display: none;">
	 		<div class="after_data" ></div>
	 		<div style="margin: auto;text-align: center;justify-content: center;" class="rabi">
	 			<h3 style="font-weight: bold;">Profile</h3>
	 			<p style="color: #8b8d90;">When you share photos and videos <br>they'll appear on your profile</p>
	 			<label onclick="start_c()" for="cam" class="ede"><h6 style="color: #1697ea;font-weight: bold; cursor: pointer;">Share your first photo or video<h6></label>
	 		</div>
		<div class="after" style=" margin-left: auto;margin-right: auto;width: 80%;border-radius: 10px; height: 160px; border-bottom: none;border:2px solid gray; border-style: dotted;text-align: center;justify-content: center;">
			<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status">
 		 <span class="sr-only">Loading...</span>
		</div>
			<div id="mullol"><i class="fas fa-cloud-upload-alt" style="color: #1697ea;font-size: 90px;margin-top: 10px;"></i>
			<p style="color: gray;font-family: 'Muli',sans-serif; font-weight: bold; ">Let users say your images</p></div>
		</div>
		
		<div id="wow" style="text-align: center;width: 300px;margin-left: auto;margin-right: auto;color: #65676b;font-family: verdana;font-weight: 400;">
			<label onclick="start_c()" for="cam" class="ed"><div style="margin-top: 2px;font-family: 'Muli', sans-serif;">CHOOSE IMAGE  <i class="far fa-images"></i></div></label>
			
			<input class="file" type="file" id="cam" name="files[]" style="display: none;" multiple   >

		</div>
		<div style="text-align: center;display: none;margin-top: 10px;" id="shit">
		<button   class="save" style="display: inline-block;">Save</button> 
		<button class="discard" onclick="discard()" style="display: inline-block;">Discard</button>
		</div>
	 	</div>

	 		 	<div style="width: 93%;margin: auto;margin-top: -20px;"><h3 style="font-weight: 400;border-bottom: 1px solid #e5e5e5;">IMAGES</h3></div>

	 	<div class="fi" style="width: 95%;margin: auto;">
	 	<div id="first" onclick="fuck()" style="margin-left: 10px;display: inline-block;">
		<div  class="custom-control custom-checkbox" >
		  <input type="checkbox" class="custom-control-input" id="defaultChecked2" >
		  <label class="custom-control-label"  for="defaultChecked2">Select All</label>
		</div>
		</div>
		<div style="display: none;float: right; margin-right: 10px; " id="opt">
			
			<div class="for_delete" onclick="del()"><i class="far fa-trash-alt" id="delete" style="color: red; font-size: 25px;"></i></div>
		</div>
		</div>
	
<div  class="dey">
	 	<?php
	 	$take = mysqli_query($con,"SELECT * FROM images WHERE user_id='$id'");
	 	$count = mysqli_num_rows($take);
	 	while ($run = mysqli_fetch_array($take)) {
	 		$im = $run['image'];
	 		$id = $run['id'];
	 		$user_id= $run['user_id'];

					;?>
	 	<div style="display: inline-block;" id="l<?php echo $id;?>" style="width: 95%;margin: auto;">
	 		<img src=".<?php echo $im ;?>" class="mule_img" id="<?php echo $id;?>">
	 		<div class="hiee" id="'<?php echo $id;?>'">
	 			<div style="margin-top:30px;margin-left:auto;margin-right:auto;border-radius:50%;width:30px;height:30px;text-align:center;"><i class="fas fa-search-plus" style="color:white;font-size:25px;margin-top:25px;"></i>
	 			</div>
	 		</div>
			<div id="check<?php echo $id;?>" class="one" style="background-color: #1697ea;border-radius: 10px;height: 30px; width: 30px;text-align: center;position: relative; justify-content: center;bottom: 35px;left: 20px;z-index: 10;display: none;">
			<i class="fas fa-check" style="color: white;justify-content: center;margin-top: 7px;"></i>
			</div>
			

<script type="text/javascript">

//$(".one").css("visibility","hidden");
//$(".selected").css("visibility","hidden");
</script>
	 	</div>
	 		<script>
	 
	 function del(){
	 	var user_id = '<?php echo $user_id;?>';
	 	$.ajax({
	 		type:'POST',
	 		url:'delete_all_img.php',
	 		data:{
	 			user_id:user_id,
	 		},success:function(data){
	 			$('.rabi').css('display','block');
	 			$(".det").css("display","none");
	 			$('.dey').css("display","none");
	 			$('.fi').css("display",'none');
	 		},error:function(err){alert(err)}
	 	})
	 }
 	function fuck(){
 	 	if(document.getElementById('defaultChecked2').checked){
 	 	
 		$("#opt").css("display","inline-block");
		$('.one').css("display","block");
		$('.hiee').css('visibility','hidden');
		$(".selected").css("visibility","visible");
 	}else{
 		$('.hiee').css('visibility','visible');
 		$("#opt").css("display","none");
		$('.one').css("display","none");
		$(".selected").css("visibility","hidden");
 	}
 	}
</script>
	 	<script>
					$("#l<?php echo $id;?>").on('click',function(){
						var id = '<?php echo $id;?>';
						var user_id = '<?php echo $user_id;?>';
						$.ajax({
							type:'POST',
							url:'zoom_o.php',
							data:{
								id:id,
								user_id:user_id,
							},
							success:function(data){
								$(".zoome").html(data);
								$(".zoome").css("display","block");
							},
							error:function(err){
								alert(err);
							},
						})
					})


       
       
		</script>
	 	
		
	 	<?php
	 	}
	 
	 
	 }
	;?>

		<div class="zoome" style="display: none; position: absolute;background-color: rgba(0,0,0, 0.5);z-index: 10;width: 100%;height: 100vh;margin: auto;top: 0;bottom: 0;left:0;right: 0;z-index: 20;">
		</div>
	</div>
	<div>
		<?php
		//dsqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
	}else{
		$p = mysqli_query($con,"SELECT * FROM followers WHERE follow_by='$_id' AND follow_to='$id'");
		$s_block = mysqli_query($con,"SELECT * FROM block WHERE block_by='$_id' AND block_to='$id' OR block_by='$id' AND block_to='$_id'");
		$gy = mysqli_fetch_array($s_block);
		if(mysqli_num_rows($s_block)==1){
			if($gy['block_by']==$_id){
					//feature of unblock user
				;?>
				<div style="text-align: center;margin-top: 60px;">
						<img src="./img/block.jpg" style="width: 100px;height: 100px;">
						<h3 style="font-weight: bold;color: black;margin-top: 10px;">This Page Isn't Available Right Now</h3>
						<p>You blocked this user, you can't visit his profile or send him a private message.<br>Try unblocking this user.</p>
						<button class="relaoad" onclick="unblock()">Unblock User</button>
				</div>
				<script>
					function unblock(){
						
						//sent block request.
						var 
							by = '<?php echo $_id;?>',
							to = '<?php echo $id;?>';
						$.ajax({
							type:'POST',
							url:'unblock.php',
							data:{
								by:by,
								to:to,
							},success:function(d){

							}
						})
						//reload
						var 
							id = '<?php echo $id;?>';
						$(".ale").css("display","none");
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
				<?php
			}else{
				// error
				;?>
				<div style="text-align: center;margin-top: 60px;">
					<img src="./img/block.jpg" style="width: 90px;height: 90px;">
						<h3 style="font-weight: bold;color: black;margin-top: 10px;">This Page Isn't Available Right Now</h3>
						<p>This may be because of a technical error that we're working to get<br> fixed. Try reloading this page</p>
						<button class="relaoad" onclick="proe()">Reload Page</button>
				</div>
				<script>
					function proe(){
						$(".ale").css("display","none");
						var id = '<?php echo $id;?>';
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
				<?php
			}
			
	}else{
				;?>
				<script>
					$('#oh').addClass('oh');
				</script>
				<?php
		if(mysqli_num_rows($p)==1){
			$follow = '<button class="following" id="following">
							<p style="margin-top: 7px;font-weight: 400;">Following</p>
						</button>
						<button class="follow" style="display:none;">
							<i class="fas fa-user-plus" style="color: white!important;margin-top: 5px;font-size: 15px;margin-right: 3px;"></i>
							<p style="margin-top: 7px;font-weight: bold;">Follow</p>
						</button>
						';
		}else{
				$follow = '<button class="follow" id="follow">
							<i class="fas fa-user-plus" style="color: white!important;margin-top: 5px;font-size: 15px;margin-right: 3px;"></i>
							<p style="margin-top: 7px;font-weight: bold;">Follow</p>
						</button>
						<button class="following" style="display:none;">
							<p style="margin-top: 7px;font-weight: 400;">Following</p>
						</button>
						';
		}
		$fff = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$id'");
		if(mysqli_num_rows($fff)==0){
			$fol_count ='';
		}else{
			$fol_count= mysqli_num_rows($fff);
		}
		$ttt = mysqli_query($con,"SELECT * FROM followers WHERE follow_by='$id'");
		if(mysqli_num_rows($ttt)==0){
			$fole_count ='';
		}else{
			$fole_count= mysqli_num_rows($ttt);
		}
		;?>
		<div style="padding-bottom: 10px; margin-top: 65px; box-shadow: 1px 2px  #e5e5e5;background-color: white;">
		<div style="text-align: center;margin-top: -60px;z-index: -1;text-align: left;line-height: 80%;">
			<div style="display: flex;justify-content: space-between;">
			<div style="line-height: 80%;">
			<img src="<?php echo $user_pic ;?>" style="width: 160px;cursor: pointer;height: 160px;border-radius: 5px;border:2px solid white;border-radius: 50%;-webkit-box-shadow: 0px 1px 14px 4px rgba(176,166,176,0.96);
				-moz-box-shadow: 0px 1px 14px 4px rgba(176,166,176,0.96);
				box-shadow: 0px 1px 14px 4px rgba(176,166,176,0.96);margin-bottom: -30px;margin-top: 20px; z-index: 2;margin-left: 10px;display: inline-block;">
				<div style="margin-top: 10px; margin-left: 10px;display: inline-block;line-height: 80%;vertical-align: bottom;">
					<p id="op" style=" font-weight: 400;font-family: verdana;vertical-align: ;color: black; font-size: 20px;float: ri"><?php echo "".$user_firstname." ".$user_lastname."" ;?></p>
					<div style="display: flex;justify-content: space-between;line-height: 80%;">
						<div style="" class="mp">
							<p style="font-weight: bold;">0</p>
							<p style="margin-top: -10px;">Posts</p>
						</div>
						<div style="" class="mp" id="foll_num">
							<p style="font-weight: bold;"><?php echo  $fol_count;?></p>
							<p style="margin-top: -10px;">Followers</p>
						</div>
						<div style="" class="mp" id="folli_num">
							<p style="font-weight: bold;"><?php echo $fole_count;?></p>
							<p style="margin-top: -10px;">Following</p>
						</div>
					</div>
					<div style="display: flex;justify-content: space-between;">
						<?php echo $follow;?>
						<button class="mess">
							<i class="far fa-comment-dots" style="color: black!important;margin-top: 1px;font-size: 20px;"></i>
						</button>
					</div>

				</div>
			
			</div>
			
			<div style=""id="pen" title="Edit" style="text-align: center;">
				<div class="pine" style="text-align: center;">
					<i class="fas fa-ellipsis-v" style="color: black;margin-top: 6px;margin-right: 12px;"></i>
				</div>
			</div>
		</div>
		
		<div>
		<div style="float: right;margin-top: -40px;z-index: 2">
			<div class="hova" id="for_images"><p style="color: #65676b;margin-top: 10px;font-family: verdana;font-weight: 400;">Images<i class="far fa-images" style="margin-left: 5px;color: red;"></i></p></div>
			<div class="hove" id="for_about" ><p style="color: #65676b;margin-top: 10px;font-family: verdana;font-weight: 400;">About <i class="far fa-address-card" style="color: #00c851;"></i></p></div>
			
		</div>
		</div>
	</div>
</div>
<div class="for_foll" style="display: none; position: absolute;width: 100%;height: 100vh;background: rgba(0, 0, 0, 0.4);margin: auto;top: 0;right: 0;left: 0;bottom: 0;">
	<div class="foll_all " style="width: 40%;height: 80vh;background-color: white;border-radius: 10px;position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;">
		<div style="width: 95%;margin: auto;margin-top: 10px;">
			<div style="display: flex;justify-content: space-between;width: 40%;"><i id="b_ca" title="Back" class="fas fa-arrow-left" style="font-size: 25px;cursor: pointer;"></i><p style="font-size: 20px;font-weight: bold;"><?php echo "".$user_firstname." ".$user_lastname."";?></p></div>
		</div>
		<div style="margin-top: -10px;display:flex;justify-content: space-around;border-bottom: 1px solid #dcdfe3; ">
				<div id="filo1" class="ini"><p id="filo1_p" style="font-weight: bold;"><?php echo $fol_count;?> Followers</p></div>
				<div id="filo2" class="foll" style="cursor: pointer; width: 50%;height: 30px;padding-top: 4px; margin-top: 15px; text-align: center;"><p id="filo2_p" style="font-weight: 400; color:#8b8d90; "><?php echo $fole_count;?> Following</p></div>

		</div>
		
		<div class="foll_data" style="width:95%;margin: auto;margin-top: 10px;">
		</div>

	</div>
</div>
<script>
	var 
		s_id='<?php echo $_id;?>',
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
			$('.new_spi').css('display','none');
			$('.foll_data').html(d);
		}
	})
	$('#b_ca').on('click',function(){
		$('.for_foll').css('display','none');
	})
	$('#filo2').on('click',function(){
		var 
		s_id='<?php echo $_id;?>',
		id= '<?php echo $id;?>';
	$.ajax({
		type:'POST',
		url:'followerss.php',
		data:{
			s_id:s_id,
			id:id,
		},beforeSend:function(){
			$('.foll_data').html('<div style="text-align: center;margin-top: 10px;" class="new_spi"><div class="lds-roller"><div></div><div></div><div></div></div></div>');
		},success:function(d){
			$('.foll_data').html(d);
		}
	})
		$(this).removeClass('foll');
		$(this).addClass('ini');
		$('#filo1_p').css('color','#8b8d90');
		$('#filo1_p').css('font-weight','400');
		$('#filo2_p').css('color','black');
		$('#filo2_p').css('font-weight','bold');
		$('#filo1').removeClass('ini');
		$('#filo1').addClass('foll');
	})
	$('#filo1').on('click',function(){
		var 
		s_id='<?php echo $_id;?>',
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
		$(this).removeClass('foll');
		$(this).addClass('ini');
		$('#filo2_p').css('color','#8b8d90');
		$('#filo2_p').css('font-weight','400');
		$('#filo1_p').css('color','black');
		$('#filo1_p').css('font-weight','bold');
		$('#filo2').removeClass('ini');
		$('#filo2').addClass('foll');
	})
</script>
<?php 
$c = mysqli_query($con,"SELECT * FROM users WHERE id='$_id'");
$f = mysqli_fetch_array($c);
$pic= $f['pic'];
$_firstname = ucfirst($f['firstname']);
$_lastname = ucfirst($f['lastname']);

;?>

<script>
		$('#foll_num').on('click',function(){
		$('.for_foll').css('display','block');
		$('#filo1').removeClass('foll');
		$('#filo1').addClass('ini');
		$('#filo2_p').css('color','#8b8d90');
		$('#filo2_p').css('font-weight','400');
		$('#filo1_p').css('color','black');
		$('#filo1_p').css('font-weight','bold');
		$('#filo2').removeClass('ini');
		$('#filo2').addClass('foll');

		var 
		s_id='<?php echo $_id;?>',
		id= '<?php echo $id;?>';
	$.ajax({
		type:'POST',
		url:'followers.php',
		data:{
			s_id:s_id,
			id:id,
		},beforeSend:function(){
			$('.new_spi').css('display','block');
		},success:function(d){
			$('.new_spi').css('display','none');
			$('.foll_data').html(d);
		}
	})
		})


		$('#folli_num').on('click',function(){
		$('.for_foll').css('display','block');
		$('#filo2').removeClass('foll');
		$('#filo2').addClass('ini');
		$('#filo1_p').css('color','#8b8d90');
		$('#filo1_p').css('font-weight','400');
		$('#filo2_p').css('color','black');
		$('#filo2_p').css('font-weight','bold');
		$('#filo1').removeClass('ini');
		$('#filo1').addClass('foll');
		var 
		s_id='<?php echo $_id;?>',
		id= '<?php echo $id;?>';
	$.ajax({
		type:'POST',
		url:'followerss.php',
		data:{
			s_id:s_id,
			id:id,
		},beforeSend:function(){
			$('.new_spi').css('display','block');
		},success:function(d){
			$('.new_spi').css('display','none');
			$('.foll_data').html(d);
		}
	})
		})

	$('.follow').on('click',function(){
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
				by = '<?php echo $_id;?>',
				to = '<?php echo $id;?>',
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


		$(this).css('display','none');
		$('.profile_options').css('display','none');
		$('.following').css('display','block');
		$('#followinge').css('display','flex');
		$('#followe').css('display','none');
		var 
			follow_by = '<?php echo $_id;?>',
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

	$('.following').on('click',function(){
		$(this).css('display','none');
		$('.follow').css('display','flex');
		$('#followinge').css('display','none');
		$('#followe').css('display','flex');
		var 
			follow_by = '<?php echo $_id;?>',
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
	$('.mess').on('click',function(){
				var
						user_id = '<?php echo $id ;?>',
						user='<?php echo $_id;?>';

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
	$('#for_images').on('click',function(){
		$('#for_about').addClass('by');
		$('#for_setting').addClass('by');
		$(this).removeClass('by');
		$(this).addClass('hova');
		var id = '<?php echo $id;?>';
		var user = '<?php echo $user;?>';
		$.ajax({
			type:'POST',
			url:'data_for_imagess.php',
			data:{
				id:id,
				user:user,
			},
			beforeSend:function(){
				var d = '<div style="width:100%;height:200px;justify-content:center;text-align:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden"></span></div></div>';
				$('.ali').html(d);
			},success:function(e){
				$('.ali').css('display','none');
				$('#data_u').css('display','none');
				$('#data_c').css('display','block');
				$('#data_c').html(e);
			}
		})
	})

	$('#for_about').on('click',function(){
		$(this).removeClass('by');
		$('#for_setting').addClass('by');		
		$('#for_images').addClass('by');
		$(this).addClass('hova');
		var id = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'data_for_aboute.php',
			data:{id:id},
			beforeSend:function(){
				var d = '<div style="width:100%;height:200px;justify-content:center;text-align:center;"><div class="spinner-border text-primary" role="status"><span class="visually-hidden"></span></div></div>';
				$('.oi').css('display','none');
				$('#data_c').html(d);
				$('.ali').html(d);
			},
			success:function(e){
					$('.ali').css('display','none');
					$('#data_c').css('display','none');
					$('#data_u').css('display','block');
					$('#data_u').html(e);
			}
		})
	})


</script>
	<div style="background-color: white;height: 360px; border:1px solid #e5e5e5; overflow: auto; overflow-x: hidden; width: 100%; margin-top: 10px;">
		<div id="data_c" style="margin-top: 10px;"></div>
		<div id="data_u" style="margin-top: 10px;"></div>
	<br>
	<div class="ali">
	<?php
	$check=  mysqli_query($con,"SELECT * FROM images WHERE user_id='$user_id'");
	$f = mysqli_num_rows($check);
	if ($f==0) {
	 	;?>
	 		<div style="margin: auto;text-align: center;justify-content: center;" class="rabie">
	 			<h3 style="font-weight: bold;">Profile</h3>
	 			<p style="color: #8b8d90;">When <?php echo $_fir;?> share photos and videos <br>they'll appear for you</p>
	 			<label  for="cam" class="ede"><h6 style="color: #1697ea;font-weight: bold; cursor: pointer;">There are no photos or videos<h6></label>
	 		</div>
		<div class="after" style=" margin-left: auto;margin-right: auto;width: 80%;border-radius: 10px; height: 160px; border-bottom: none;text-align: center;justify-content: center;">
			<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status">
  		<span class="sr-only">Loading...</span>
		</div>
			
		
	 	<?php
	 }else{
	 	;?>
	 	<div style="width: 93%;margin: auto;margin-top: -20px;"><h3 style="font-weight: 400;border-bottom: 1px solid #e5e5e5;">IMAGES</h3></div>
	 
<div  class="dey">
	 	<?php
	 	$take = mysqli_query($con,"SELECT * FROM images WHERE user_id='$id'");
	 	$count = mysqli_num_rows($take);
	 	while ($run = mysqli_fetch_array($take)) {
	 		$im = $run['image'];
	 		$id = $run['id'];
	 		$user_id= $run['user_id'];

					;?>
	 	<div style="display: inline-block;" id="l<?php echo $id;?>" style="width: 95%;margin: auto;">
	 		<img src=".<?php echo $im ;?>" class="mule_img" id="<?php echo $id;?>">
	 		<div class="hiee" id="'<?php echo $id;?>'">
	 			<div style="margin-top:30px;margin-left:auto;margin-right:auto;border-radius:50%;width:30px;height:30px;text-align:center;"><i class="fas fa-search-plus" style="color:white;font-size:25px;margin-top:25px;"></i>
	 			</div>
	 		</div>
			<div id="check<?php echo $id;?>" class="one" style="background-color: #1697ea;border-radius: 10px;height: 30px; width: 30px;text-align: center;position: relative; justify-content: center;bottom: 35px;left: 20px;z-index: 10;display: none;">
			<i class="fas fa-check" style="color: white;justify-content: center;margin-top: 7px;"></i>
			</div>
			

<script type="text/javascript">

//$(".one").css("visibility","hidden");
//$(".selected").css("visibility","hidden");
</script>
	 	</div>
	 	
	 	<script>
					$("#l<?php echo $id;?>").on('click',function(){
						var id = '<?php echo $id;?>';
						var user_id = '<?php echo $user_id;?>';
						$.ajax({
							type:'POST',
							url:'zoom_oo.php',
							data:{
								id:id,
								user_id:user_id,
							},
							success:function(data){
								$(".zoome").html(data);
								$(".zoome").css("display","block");
							},
							error:function(err){
								alert(err);
							},
						})
					})


       
       
		</script>
	 	
		
	 	<?php
	 	}
	 
	 
	 }
	;?>

		<div class="zoome" style="display: none; position: absolute;background-color: rgba(0,0,0, 0.5);z-index: 10;width: 100%;height: 100vh;margin: auto;top: 0;bottom: 0;left:0;right: 0;z-index: 20;">
		</div>
	</div>
	</div>
		<?php
	}
}
	;?>
	</div>
</div>


<div class="dde"></div>
</body>
</html>
<script>
	function start_c(){
		var set = setInterval(count,0);
		function count(){
			var file = $('#cam').val();
			if(file!==""){
				$('.rabi').css('display','none');
				$("#wow").css("display","none")
				$("#shit").css("display","block");
				var file_data = $('.file').prop('files')[0];
				var form_data = new FormData();
				 var totalfiles = document.getElementById('cam').files.length;
				for (var index = 0; index < totalfiles; index++) {
					 form_data.append("files[]", document.getElementById('cam').files[index]);
				}
				
				$.ajax({
				type:'POST',
				url:"multi.php",
				contentType: false,
				processData: false,
				data:form_data,
				beforeSend:function(){
					$("#mullol").css("display","none");
					$("#mulspi").css("display","block");
				},
				success:function(data){
					$(".after").html(data);
				},
			})
				clearInterval(set);
			}
		}
	}
	
	$('.discard').on('click',function(){
				$("#cam").val("");
				$(".rabi").css("display","block")
				$("#shit").css("display","none");
			$('.after').html('');
  			
	})
	//submit data.
	$(".save").on('click',function(){
				var file_data = $('.file').prop('files')[0];
				var form_data = new FormData();
				var id = '<?php echo $id ;?>';
				var user_id =  '<?php echo $user_id ;?>';
				 var totalfiles = document.getElementById('cam').files.length;
				for (var index = 0; index < totalfiles; index++) {
					 form_data.append("files[]", document.getElementById('cam').files[index]);
				}
				form_data.append('id', id);
				form_data.append('user_id', user_id);
				$.ajax({
				type:'POST',
				url:"save_multi.php",
				contentType: false,
				processData: false,
				data:form_data,
				beforeSend:function(){
					$("#mullol").css("display","none");
					$("#mulspi").css("display","block");
				},
				success:function(data){
				$("#cam").val("");
				$("#wow").css("display","none")
				$("#shit").css("display","none");
				$('.after').css('display',"none");
				$(".after_data").html(data);
					
				},
			})
	})
	
</script>
<div class="ddd"></div>
<div class="block_pan"  style=" z-index: 200; display: none; position: absolute; background:rgba(0, 0, 0, 0.2);width: 100%;height: 100vh;margin: auto;left: 0;right: 0;top: 0;bottom: 0;">
		<div class="ask_block" style="">
			<div style="width: 90%;margin: auto;text-align: center;margin-top: 20px;">
				<a style="font-weight: 400;font-size: 20px;color: red;">Are you sure you want to block <?php echo ''.$user_firstname.' '.$user_lastname.' ';?> ?</a>
				<p style="color: gray;margin-top: 10px;text-align: left;"><?php echo ''.$user_firstname.' '.$user_lastname.' ';?> will no longer be able to:
					See your posts, 
					Tag you,
					Invite you to events or groups,
					Start a conversation with you,
					Add you as a friend.
				</p>

				<div class="af">
					<a style="" id="cancel_block" class="c_ac">CANCEL</a><a id="conf_block" style="color: #1697ea;" class="c_ac">BLOCK</a>
				</div>
			</div>
		</div>
</div>
<div class="profile_options" style="z-index: 200; display: none; position: absolute;background:rgba(0, 0, 0, 0.4);width: 100%;height: 100vh;margin: auto;left: 0;right: 0;top: 0;bottom: 0;">
	<?php 
	$s = mysqli_query($con,"SELECT * FROM followers WHERE follow_by='$_id' AND follow_to='$id'");
	if(mysqli_num_rows($s)>0){
		$g='<div class="op_hov" id="followinge"><p style="color:red;margin-top:10px; font-weight:400;font-size:20px;">Unfollow</p><div style="background:#ff00001f;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-user-times" style="color:red;!important;margin-top:9px;"></i></div></div>
		<div class="ope_hov" style="display:none;" id="followe"><p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">Follow</p><div style="background:#1697ea1a;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-user-plus" style="color:#1697ea;!important;margin-top:9px;"></i></div></div>
		';
	}else{
		$g='<div class="ope_hov" id="followe"><p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">Follow</p><div style="background:#1697ea1a;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-user-plus" style="color:#1697ea;!important;margin-top:9px;"></i></div></div>

		<div class="op_hov" style="display:none;" id="followinge"><p style="color:red;margin-top:10px; font-weight:400;font-size:20px;">Unfollow</p><div style="background:#ff00001f;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-user-times" style="color:red;!important;margin-top:9px;"></i></div></div>
		';
	}

	$_g = mysqli_fetch_array($s);
	if($_g['first']!=='yes'){
		$ge = '<div class="ope_hov" id="see_first">
								<p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">See first</p><div style="background:#1697ea1a;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-star" style="color:#1697ea!important;margin-top:9px;"></i></div>
							</div>
							<div class="ope_hov" style="display:none;" id="unsee_first" >
								<p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">Unseen first</p><div style="background:#fbfbd8;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-star" style="color:#bfbf1b!important;margin-top:9px;"></i></div>
							</div>
							';
	}else{
		$ge = '<div class="ope_hov" id="unsee_first">
								<p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">Unseen first</p><div style="background:#fbfbd8;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-star" style="color:#bfbf1b!important;margin-top:9px;"></i></div>
							</div>
				<div class="ope_hov" id="see_first" style="display:none;">
								<p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">See first</p><div style="background:#1697ea1a;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-star" style="color:#1697ea!important;margin-top:9px;"></i></div>
							</div>
						';
	}	
	;?>

				<div id="panel" style="display: none; position: absolute;margin: auto;bottom: 0;right: 0;left: 0;background-color: white;height: 50vh;width: 50%;border-top-left-radius: 20px;border-top-right-radius: 20px;">
						<div id="hide_op" style="background-color: #dcdfe3;cursor: pointer; border-radius:50px;height: 10px;width:20%;margin: auto;margin-top: 10px;"><p style="visibility: hidden;">d</p></div>

					<div style="width: 90%;margin: auto;margin-top: 20px;">
							<?php echo $g;?>
							<div class="ope_hov" id="report">
								<p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">Report</p><div style="background:#1697ea1a;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-bug" style="color:#1697ea!important;margin-top:9px;"></i></div>
							</div>
							<div style=" display: none; position: absolute;top: 40%;left: 40%; z-index: 9;" id="c_suc">
								<div style="width: 90px;height: 30px;text-align: center; color: white;background-color: #151722c2;">Link Copied</div>
								<div style="width: 20px;margin: auto;background-color: #151722c2;border: 1px solid gray;border-bottom: 3px solid transparent;"></div>
							</div>
							<div class="ope_hov" id="copy_link" style="z-index: -1;">
								<p style="color:black;margin-top:10px; font-weight:400;font-size:20px;">Copy link</p><div style="background:#1697ea1a;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-link" style="color:#1697ea!important;margin-top:9px;"></i></div>
							</div>
							<?php echo $ge;?>
							<div class="op_hov" id="block">
								<p style="color:red;margin-top:10px; font-weight:400;font-size:20px;">Block</p><div style="background:#ff00001f;margin-top:10px; width:40px;height:40px;border-radius:50%;text-align:center;"><i class="fas fa-user-slash" style="color:red!important;margin-top:9px;"></i></div>
							</div>
					</div>
				</div>

				<div id="report_panel" style="display: none; position: absolute;margin: auto;bottom: 0;right: 0;left: 0;background-color: white;height: 50vh;width: 30%;border-top-left-radius: 20px;border-top-right-radius: 20px;">
					<div id="hide_report" style="background-color: #dcdfe3;cursor: pointer; border-radius:50px;height: 7px;width:20%;margin: auto;margin-top: 10px;"><p style="visibility: hidden;">d</p></div>
					<div class="_rill" style="display: none; margin-top: 15px;">
						<div style="text-align: center;"><i class="far fa-check-circle" style="color: #00800070;"></i></div>
						<h5 style="font-weight: bold;margin-top: 10px;text-align: center;">Thanks for letting us know</h5>
						<p style="margin-top: 5px;color: #bdbebf;text-align: center;">Your feedback is important in helping us keep the MeetApp community safe</p>

					</div>
					<div class="_rall">
						<h4 style="text-align: center;font-weight: bold;margin-top: 10px;">Report</h4>
						<hr>
						<h6 style="font-weight: bold;margin-top: 10px;text-align: center;">Why are you reporting this post?</h6>
						<div  class="wrong_p" id="wrong_p"><p style="text-align: center;">It's wrong profile</p></div>
						<div  class="wrong_p" id="ina"><p style="text-align: center;">It's inappropriate</p></div>


					</div>
				</div>
				<input type="text" value="www.meetapp.com/profile.php?u=<?php echo $id;?>" name="" id="te" style="position: absolute;top: -20%;">
</div>
</div>


<script>
	$('#cancel_block').on('click',function(){
		$("#panel").slideToggle('1000');
		$('.profile_options').css('display','none');
		$('.block_pan').css('display','none');
	})
	$('#see_first').on('click',function(){
		$(this).css('display','none');
		$('#unsee_first').css('display','flex');
		var 
			by = '<?php echo $_id;?>',
			to = '<?php echo $id;?>',
			type = 'first';
		$.ajax({
			type:'POST',
			url:'f_b.php',
			data:{
				by:by,
				to:to,
				type:'first',
			},success:function(e){
				//
			}
		});
	})

	$('#conf_block').on('click',function(){
		var 
							id = '<?php echo $id;?>';
						$(".ale").css("display","none");
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
		var 
			by = '<?php echo $_id;?>',
			to = '<?php echo $id;?>',
			type = 'block';
		$.ajax({
			type:'POST',
			url:'f_b.php',
			data:{
				by:by,
				to:to,
				type:'type'
			},
		});
	})

	$('#unsee_first').on('click',function(){
		$(this).css('display','none');
		$('#see_first').css('display','flex');
		var 
			by = '<?php echo $_id;?>',
			to = '<?php echo $id;?>',
			type = 'first';
		$.ajax({
			type:'POST',
			url:'f_b.php',
			data:{
				by:by,
				to:to,
				type:'first',
			},success:function(e){
				//
			}
		});
	})
	$('#block').on('click',function(){
		$('.profile_options').css('display','none');
		$('.block_pan').css('display','block');
		
	})

	$('#wrong_p').on('click',function(){
		$('._rall').css('display','none');
		$('._rill').fadeIn();
		var 
			type='wrong profile',
			report_by = '<?php echo $_id;?>',
			report_to = '<?php echo $id;?>';
		$.ajax({
			type:'POST',
			url:'report.php',
			data:{
				type:type,
				report_by:report_by,
				report_to:report_to,
			},success:function(d){
				//
			},
			error:function(){
				alert('Sorry an error was accurated');
			},
		})

	})
	$('#ina').on('click',function(){
		$('._rall').css('display','none');
		$('._rill').fadeIn();
		var 
			type='inappropriate',
			report_by = '<?php echo $_id;?>',
			report_to = '<?php echo $id;?>';
		$.ajax({
			type:'POST',
			url:'report.php',
			data:{
				type:type,
				report_by:report_by,
				report_to:report_to,
			},success:function(d){
				//
			},
			error:function(){
				alert('Sorry an error was accurated');
			},
		})

	})
$('#copy_link').on('click',function(){
	var c = $('#te');
	c.select();
	document.execCommand("copy");
	$('#c_suc').fadeIn();
	$('#c_suc').addClass('copied');
	setTimeout(function(){
		$('#c_suc').css('display','none');
	},1000)

})
$('#report').on('click',function(){
	$('._rill').css('display','none');
	$('._rall').css('display','block');
	$("#panel").slideToggle('1000',function(){
		$("#report_panel").slideToggle('1000');
	});
})
$('#hide_report').on('click',function(){
	$("#report_panel").slideToggle('1000',function(){
		$('.profile_options').css('display','none');
	});
})


$('#hide_op').on('click',function(){
	$('#panel').slideToggle('1000',function(){
	$('.profile_options').css('display','none');

	});
})

$('#pen').on('click',function(){
	$('.profile_options').css('display','block');
	$('#panel').slideToggle('1000');
})



	$('#followe').on('click',function(){
		//set notification by websocket API.
		$(this).css('display','none');
		$('#followinge').css('display','flex');
	conn.onopen = function(e) {

    console.log("Connection established!");
    
};
conn.onerror = function(e) {
    console.log("error");
};
		conn.onmessage = function(e){

		}
			var 
				by = '<?php echo $_id;?>',
				to = '<?php echo $id;?>',
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

				$('#panel').slideToggle('1000',function(){
				$('.profile_options').css('display','none');
				});
		$("#follow").css('display','none');
		$('.follow').css('display','none');
		$('.following').css('display','block');
		var 
			follow_by = '<?php echo $_id;?>',
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

	$('#followinge').on('click',function(){
		$(this).css('display','none');
		$('#followe').css('display','flex');
		$('#panel').slideToggle('1000',function(){
	$('.profile_options').css('display','none');
	});
		$('.following').css('display','none');
		$('.follow').css('display','flex');
		var 
			follow_by = '<?php echo $_id;?>',
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


</script>
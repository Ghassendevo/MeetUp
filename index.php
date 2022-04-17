<!DOCTYPE html>
<html>
<head>
	<title>findurcrush</title>
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
  
</head>
<body style="background-color: "><div id="all">

		<div class="header" style="border-top: 2px solid #1697ea;;">
			<br>
			<div class="loge">
				<h1 class="h1" >MeetUp<i class="fas fa-child" style="color: #1697ea"></i></h1>
			</div>
			<div style="display: inline-block;float: right;margin-right: 10px;margin-top: 10px;">
				<button class="login_btn" onclick="log()">Login</button>
				<button class="sign_btn" onclick="sign()" >Join us</button>

			</div>
		</div>
		<div class="ppi">
			<img src="./img/fr.png" style="width: 100%;height: 80vh;">
		</div>
		<div class="ppo" >
			<div style="">
				<form action="login.php" method="POST">
				<div style="text-align: center;"><img src="./img/gge.jpg" style="width: 90px;height: 90px;text-align: center;"></div>
				<h3 style="font-weight: bold;margin-top: 5px;text-align: center;">WELCOME</h3>
				<div style="width: 80%;margin-left: auto;margin-right: auto;height: 30px;" onclick="username()">
					<label style="color: gray;font-weight: 400;margin-left: 10px;display: none;" id="fir_us">Username</label>
						<div style="width: 100%;border-bottom:1px solid gray;display: flex;padding-bottom: 5px;cursor: text;" id="for_us">
							<i class="fas fa-user" id="i_us" style="display: inline-block;margin-left: 10px;color: gray;"></i>
							<input type="text" name="username" class="f_username" required="" placeholder="Username" style="color: black;border:none; font-weight: 400;margin-left: 10px;cursor: text;width: 100%;" id="fi_us">
							
						</div>

				</div>
				<br><br>
				<div style="width: 80%;margin-left: auto;margin-right: auto;height: 30px;" onclick="password()">
					<label style="color: gray;font-weight: 400;margin-left: 10px;display: none;" id="fir_us">Password</label>
						<div style="width: 100%;border-bottom:1px solid gray;display: flex;padding-bottom: 5px;cursor: text;" id="po_us">
							<i class="fas fa-lock" id="p_us" style="display: inline-block;margin-left: 10px;color: gray;"></i>
							<input type="text" required="" class="f_password" name="password" placeholder="Password" style="color: black;border:none; font-weight: 400;margin-left: 10px;cursor: text;width: 100%;" id="pi_us">
							
						</div>

				</div>
				<div style="width: 80%; margin: auto;"><div class="form-check" style="display: inline-block;margin-top: 20px;">
					  <input
					    class="form-check-input"
					    type="checkbox"
					    value=""
					    id="flexCheckDefault"
					  />
					  <label class="form-check-label" for="flexCheckDefault">
					  	Remember me
					  </label>
					</div><a class="aa" >Forgot password ?</a></div>
				<div style="width: 80%;text-align: center;margin-top: 15px;margin-left: auto;margin-right: auto;"><button type="submit" name="submit" class="loge_shit" value="submit"><div class="spinner-border text-primary"  style="display: none; text-align: center;margin-left: auto;margin-right: auto;color: white!important;" role="status">
				 		 <span class="sr-only">Loading...</span>
						</div><a style="font-weight: bold;">Log In</a></button></div>
							</div>
							<br>
				<div style=" width: 80%;margin: auto;text-align: center;"><a class="new" style="color: #0071b9;text-align: center;font-weight: bold;"> Create New Meetup Acoount</a>
				</div>
				</form>

			</div>

			<div class="show" style="display: none;" >
					<div style="text-align: center;"><img src="./img/gge.jpg" style="width: 90px;height: 90px;text-align: center;"></div>
					<h3 style="font-weight: bold;margin-top: 5px;text-align: center;">CREATE ACCOUNT</h3>
					<div style="display: flex;justify-content: space-between;width: 90%;margin: auto;">
						<div class="form-outline" style="width: 48%;">
						  <input type="text" id="form1" class="form-control firstname" placeholder="firstname" />
						</div>
						<div class="form-outline" style="width: 48%;">
						  <input type="text" id="form1" class="form-control lastname" placeholder="lastname" />
						</div>
					</div>
					<div style="width: 90%;margin: auto;margin-top: 10px;">
						<div class="form-outline">
						  <input type="text" id="form1" class="form-control username" placeholder="username" />
						</div>
						<div class="data">
						</div>	
						<select class="gender" style="width: 100%;margin-top: 10px;height: 35px;border-radius: 5px;border:1px solid #ced4da;color: gray;"><option value="Male" selected="">Male</option><option value="Female">Female</option> </select>
					</div>
					<div style="width: 90%;margin: auto;margin-top: 10px;">
						<div class="form-outline">
						  <input type="password" id="form1" class="form-control password" placeholder="Password" />
						</div>
						
					</div>
					<div style="width: 90%;text-align: center;margin-top: 15px;margin-left: auto;margin-right: auto;"><button type="submit" name="submit" class="loge_shite" value="submit" onclick="sign()"><div class="spinner-border text-primary" id="spo" style="display: none; text-align: center;margin-left: auto;margin-right: auto;color: white!important;" role="status">
				 		 <span class="sr-only">Loading...</span>
						</div><a id="cr" style="font-weight: bold;">Create</a></button></div>
						<div style=" width: 80%;margin: auto;text-align: center;margin-top: 10px;"><a class="new" style="color: #0071b9;text-align: center;font-weight: bold;"> Already have an account ?</a>
				</div>
							</div>


			</div>
	
	
</div>
<div class="d" style="width: 100%;height: 100vh;justify-content: center;background-color: white;">
		<div style="margin: auto;">
			<div style="width: 50%;height: 50vh;  position: absolute;margin: auto;top: 0;left: 0;bottom: 0;right: 0;">
				<div style="text-align: center;"><h1 class="h1" style="font-family: Segoe UI;" >MeetUp<i class="fas fa-child" style="color: #1697ea"></i></h1></div><br>
								<div id="myProgress">
							  <div id="myBar"></div>
							</div>
            </div>
			</div>
			
		</div>
</div>

</body>
</html>

<script>

	$('.new').on('click',function(){
		$('.ppo').animate({
			width:'toggle'
		});
	$('.show').animate({
		width:'toggle'
	});
	})
	$('.loge_shit').on('click',function(){
		var username = $('.f_username').val();
		var password = $('.f_password').val();
		if(username!=='' && password!==''){
		$('#all').css('display','none');
		$('.d').css('display','flex');
		var i = 0;
		if (i == 0){
			 i = 1;
			  var elem = document.getElementById("myBar");
			    var width = 1;
			    var id = setInterval(frame, 10);
			     function frame(){
			     	 if (width >= 100) {
        clearInterval(id);
        $("#myBar").css('border-radius','5px');
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
			     }
		}
		}
	})
	function username(){
 	$('#for_us').css('border-bottom','2px solid #1697ea');
 	 $('#for_us').css('padding-bottom','10px');
 	$('#i_us').css('color','#1697ea');
	}
	$('#fi_us').on('focusout',function(){
	$('#for_us').css('border-bottom','1px solid gray');
 	$('#for_us').css('padding-bottom','5px');
 	$('#i_us').css('color','gray');
	})

	function password(){
	$('#po_us').css('border-bottom','2px solid #1697ea');
 	$('#po_us').css('padding-bottom','10px');
 	$('#p_us').css('color','#1697ea');
	}
	$('#po_us').on('focusout',function(){
	$('#po_us').css('border-bottom','1px solid gray');
 	$('#po_us').css('padding-bottom','5px');
 	$('#p_us').css('color','gray');
	})
	
</script>


<script>
	
	$('.sign_btn').on('click',function(){
		$('.ppo').animate({
			width:'toggle'
		});
	$('.show').animate({
		width:'toggle'
	});
	})
	function log(){
		$('.ppo').animate({
			width:'toggle'
		});
	$('.show').animate({
		width:'toggle'
	});
	}
	function sign(){
		var
			firstname = $(".firstname").val(),
			lastname = $(".lastname").val(),
			usernamee = $(".username").val(),
			username = usernamee.toLowerCase();
			gender = $(".gender").val(),
			password = $(".password").val();
			if(firstname!=='' || lastname!=='' || username!==''  || password!==''){
				//firstname
				if(firstname.length>20){
					$(".firstname").val('firstname must be less then 20');
					$(".firstname").css("color","red");
					$(".firstname").on('click',function(){
					$(".firstname").css("color","#495086");
					$(".firstname").val("");
					})
				}else{
					var e=true;
				}

				//lastname
				if(lastname.length>20){
					$(".lastname").val('lastname must be less then 20');
					$(".lastname").css("color","red");
					$(".lastname").on('click',function(){
					$(".lastname").css("color","#495086");
					$(".lastname").val("");
					})
				}else{
					var d=true;
				}

				//username
				if(username.length>20 || username.length<5){
					$(".username").val('usernamee should be between 5 and 20 characters');
					$(".username").css("color","red");
					$(".username").on('click',function(){
					$(".username").css("color","#495086");
					$(".username").val("");
					})
				}else{
					var c=true;
				}

				//password
				if(password.length<4){
					$('.password').attr('type','show');
					$(".password").val('password should be greater then  5 characters');
					$(".password").css("color","red");
					$(".password").on('click',function(){
					$(".password").css("color","#495086");
					$('.password').attr('type','password');
					$(".password").val("");
					})
				}else{
					var a=true;
				}
				if(a!==true){}else if(c!==true){}else if(d!==true){}else if(e!==true){}else{
					$.ajax({
						type:'POST',
						url:'sign_up.php',
						data:{
							firstname:firstname,
							lastname:lastname,
							username:username,
							gender:gender,
							password:password,

						},beforeSend:function(){
							$('#spo').css('display','block');
							$('#cr').css('display','none');
						},
						success:function(data){
							$(".data").html(data);
							$('#spo').css('display','none');
							$('#cr').css('display','block');
							
						},error:function(){
							alert("error")
						}
					})
				}
				


			}
	}
	
	function out(){
		$(".d").fadeOut();
	}
	function oute(){
		$(".e").fadeOut();
	}
	function ss(){
			$(".d").fadeOut();
			$(".e").fadeIn();
		}
</script>

<script src="node_modules/socket.io-client/dist/socket.io.js"></script>
<script>
  var socket = io();
</script>
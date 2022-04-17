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
<?php
include("./connect.php");
$user_id = $_POST['user_id'];
$user = $_POST['user'];

$select = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$ff = mysqli_fetch_array($select);
$firstname = ucfirst($ff['firstname']);
$lastname = ucfirst($ff['lastname']);
$id = $ff['id'];
$pic = $ff['pic'];
$status = $ff['status'];
if ($status=='online') {
	$on='<span style="display: inline-block;background-color: #31a24c;margin-top:10px;margin-left:10px; border-radius: 50%;height: 10px;width: 10px;border:2px solid white;"><p style="visibility: hidden;">.</p></span>';
}else{
	$on='<span style="display: inline-block;background-color: red;margin-top:10px;margin-left:10px;border-radius: 50%;height: 10px;width: 10px;border:2px solid white;"><p style="visibility: hidden;">.</p></span>';
}

// update last view.

$up = mysqli_query($con,"UPDATE messages SET reade='yes' WHERE user_to='$user' AND user_by='$user_id'") or die(mysqli_error($con));

;?>
<div class="chatting">
	<div style="background-color:#1697ea;height: 30px; ">
		<p style="color: white;font-family: verdana;font-weight: 400;margin-left: 5px;display: inline-block;vertical-align: top;"><?php echo  "".$firstname." ".$lastname."" ;?>
			
		</p><?php echo $on;?>

		<i class="fas fa-times" style="display: inline-block;float: right;margin-right: 10px;color: white;cursor: pointer;font-size: 20px;"></i>
		<i class="fas fa-chevron-down" style="display: inline-block;float: right;margin-right: 10px;color: white;cursor: pointer;font-size: 20px;"></i>
		<i class="fas fa-chevron-up" style="display:none;float: right;margin-right: 10px;color: white;cursor: pointer;font-size: 20px;"></i>
	</div>
	<div class="lob" id="lob" style="height: 235px;overflow: hidden;overflow-y: scroll;">
		<div class="spinner-border rez" role="status" style="color: gray;display: none; position: absolute;margin: auto;top: 0;bottom: 0;right: 0;left: 0;">
  <span class="sr-only">Loading...</span>
</div>
		<div class="spinner-border ser" role="status" style="position: absolute;margin: auto; top: 0;bottom: 0;left: 0;right: 0;color: gray;display: none;" >
 	 <span class="sr-only">Loading...</span>
	</div>
	</div>
	<div class="foo" style="background-color: #f0f2f5;width: 100%;margin-left: auto;margin-right: auto;height: 35px;">
		<input class="inn" type="text" name="" placeholder="Write a message"><i class="far fa-paper-plane g<?php echo $id;?>" style="display: inline-block;float: right;margin-right: 10px;margin-top: 5px; color:#1697ea;font-size: 25px;cursor: pointer; "></i>
	</div> 
</div>
<script>
	$(".fa-paper-plane").on('click',function(){

		if($(".inn").val()!==''){
			var
				id = '<?php echo $user_id;?>',
				user='<?php echo $user ;?>',
				arr = [];
				arr.push(id);
				message = $(".inn").val();
			$.ajax({
				type:'POST',
				url:'send_mess.php',
				data:{
					id:id,
					user:user,
					message:message,
				},success:function(){
					$(".inn").val("");
				},error:function(){
					alert("error")
				}
			})
		}
	})
	var
		id = '<?php echo $user_id;?>',
		user='<?php echo $user ;?>',
		arr = [];
		arr.push(id);
$("#lob").mouseover(function(){
			
			
		})
$("#lob").mouseleave(function(){

			
		})
		

	
		$.ajax({
		type:'POST',
		url:'get_m.php',
		data:{
			id:arr,
			user:user,
		},beforeSend:function(){
			$('.rez').css("display","block");
		},success:function(data){
			$('.rez').css("display","none");
			$(".ser").css("display","none");
			$(".lob").html(data);
			var tt = document.getElementById('lob');
			tt.scrollTop = tt.scrollHeight;
		}
	})
	
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
</script>

 <script type="text/javascript">


 	

conn.onopen = function(e) {
    console.log("Connection established!");
    
};
conn.onerror = function(e) {
    console.log("error");
};
conn.onmessage = function(e) {
   var data = JSON.parse(e.data);
   var 
		too = '<?php echo $user_id;?>',
		byy='<?php echo $user ;?>';
		var arr = [data.to];
		console.log(arr[0]+ data.by+ data.message);
		console.log(byy+too);
   if(data.type=="message"){
   	if(data.to!==byy){
   
   }else if(data.by!==too){

   }else{
   	$('.typing').css("display","none");
   		var o = '<div style="display:block;margin-left:5px;"><img src="<?php echo $pic;?>" style="width:30px;height:px;border-radius:50%;display:inline-block;" ><div class="mme<?php echo $id;?>" style=" z-index:1; width: max-content;max-width: 50%; margin-right: auto;margin-left: 0;margin-left: 5px;background-color: #f0f2f5;border-radius: 20px;border-bottom-right-radius: 0px;margin-top: 10px;text-align: left;padding-left: 20px;padding-right:20px;padding-top: 10px; padding-bottom: 1px; height: auto;word-wrap: break-word;margin-bottom: 5px;display: inline-block;"><p style="color: black;margin-top: 5px;font-weight: 400;">'+data.message+'</p></div></div>';
	$(".no").css("display","none");
    $(".lob").append(o);
    var tt = document.getElementById('lob');
	tt.scrollTop = tt.scrollHeight;
     
   }
}
if(data.type=="typing"){
	if(data.to!==byy){
   
   }else if(data.by!==too){

   }else{
   		var o = '<div class="typing"><img src="<?php echo $pic;?>" style="width:30px;height:px;border-radius:50%;display:inline-block;vertical-align:top;" ><div class="mme<?php echo $id;?> ba" id="hoe"><span></span><span></span><span></span></div></div>';
			
			$(".no").css("display","none");
    			$(".typing").css("display","none");
				$(".lob").append(o);
			
    var tt = document.getElementById('lob');
	tt.scrollTop = tt.scrollHeight;
     
   }
}
if(data.type=="styping"){
	//clear typing
	$(".typing").css("display","none");
	 var tt = document.getElementById('lob');
	tt.scrollTop = tt.scrollHeight;
}
    
   
};


$(".g<?php echo $id;?>").on('click',function(){
	if($(".inn").val()!==''){
		
	var 
		ms = $(".inn").val(),
		to = '<?php echo $user_id;?>',
		by='<?php echo $user ;?>';
	data = {
	"type":"message",
	"by":by,
	"to":to,
	"message":ms,
}
	var d ='<div class="mme<?php echo $id;?>" style="width: max-content;max-width: 50%; margin-right: 0;margin-left: auto;margin-right: 5px;background-color: #1697ea;border-radius: 20px;border-bottom-right-radius: 0px;margin-top: 10px;text-align: left;padding-left: 20px;padding-right:20px;padding-top: 10px; padding-bottom: 1px; height: auto;word-wrap: break-word;margin-bottom: 5px;display: block;"><p style="color: white;margin-top: 5px;font-weight: 400;">'+ms+'</p></div>';
	$(".no").css("display","none");
	$(".lob").append(d);
	var tt = document.getElementById('lob');
			tt.scrollTop = tt.scrollHeight;
	conn.send(JSON.stringify(data));
	$(".inn").val("");
	}
})
conn.onclose = function(){
conn.close();
}

	var typingTimer;
	var doneTypingTimerInterval = 2000;
	var input = $(".inn");

	input.on('keyup',function(){
		clearTimeout(typingTimer);
		typingTimer = setTimeout(doneTyping, doneTypingTimerInterval);
	var 
		ms = $(".inn").val(),
		to = '<?php echo $user_id;?>',
		by='<?php echo $user ;?>';
	data = {
	"type":"typing",
	"by":by,
	"to":to,
	"message":ms,
}
	
	conn.send(JSON.stringify(data));
	
	});
	input.on('keydown',function(e){
		clearTimeout(typingTimer);
		if(e.keyCode==13){
			if(input.val()!==''){

				var 
		ms = $(".inn").val(),
		to = '<?php echo $user_id;?>',
		by='<?php echo $user ;?>';
	data = {
	"type":"message",
	"by":by,
	"to":to,
	"message":ms,
}
	var d ='<div class="mme<?php echo $id;?>" style="width: max-content;max-width: 50%; margin-right: 0;margin-left: auto;margin-right: 5px;background-color: #1697ea;border-radius: 20px;border-bottom-right-radius: 0px;margin-top: 10px;text-align: left;padding-left: 20px;padding-right:20px;padding-top: 10px; padding-bottom: 1px; height: auto;word-wrap: break-word;margin-bottom: 5px;display: block;"><p style="color: white;margin-top: 5px;font-weight: 400;">'+ms+'</p></div>';
	$(".no").css("display","none");
	$(".lob").append(d);
	var tt = document.getElementById('lob');
			tt.scrollTop = tt.scrollHeight;
	conn.send(JSON.stringify(data));
	$(".inn").val("");
			}
		}
	});

	function doneTyping(){
	var 
		ms = $(".inn").val(),
		to = '<?php echo $user_id;?>',
		by='<?php echo $user ;?>';
	
		data = {
	"type":"styping",
	"by":by,
	"to":to,
	"message":ms,
}
conn.send(JSON.stringify(data));
	}
	

 </script>


<?php
 ;?>

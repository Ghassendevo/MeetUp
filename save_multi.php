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
  <div style="width: 93%;margin: auto;margin-top: -20px;" class="jy">
<h3 style="font-weight: 400;border-bottom: 1px solid #e5e5e5;">IMAGES</h3> 
 </div>
  <div class="fi" style="width: 93%;margin: auto;">
	 	<div id="first" onclick="fuck()" style="display: inline-block;">
		<div  class="custom-control custom-checkbox" >
		  <input type="checkbox" class="custom-control-input" id="defaultChecked2" >
		  <label class="custom-control-label"  for="defaultChecked2">Select All</label>
		</div>
		</div>
		<div style="display: none;float: right;margin-right: 10px;" id="opt">
			
			<div class="for_delete" onclick="del()"><i class="far fa-trash-alt" id="delete" style="color: red; font-size: 25px;"></i></div>
		</div>
		</div>
		<div class="aftere" style="display: none; margin-left: auto;margin-right: auto;width: 80%;border-radius: 10px; height: 160px; border-bottom: none;border:2px solid gray; border-style: dotted;text-align: center;justify-content: center;">
			<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status">
  		<span class="sr-only">Loading...</span>
		</div>
	</div>
	<div style="display: none;" class="oh">
		
		<div style="margin: auto;text-align: center;justify-content: center;" class="rabi">
	 			<h3 style="font-weight: bold;">Profile</h3>
	 			<p style="color: #8b8d90;">When you share photos and videos <br>they'll appear on your profile</p>
	 			<label onclick="start_c()" for="cam" class="ede"><h6 style="color: #1697ea;font-weight: bold; cursor: pointer;">Share your first photo or video<h6></label>
	 		</div>
		<div id="mullol"><i class="fas fa-cloud-upload-alt" style="color: #1697ea;font-size: 90px;margin-top: 10px;"></i>
			<p style="color: gray;font-family: 'Muli',sans-serif; font-weight: bold; ">Let users say your images</p></div>
			</div>
		
		<div id="wow" style="text-align: center;width: 300px;margin-left: auto;margin-right: auto;color: #65676b;font-family: verdana;font-weight: 400;">
			
			<input class="file" type="file" id="cam" name="files[]" style="display: none;" multiple   >

		</div>
		<div style="text-align: center;display: none;margin-top: 10px;" id="shit">
		<button   class="save" style="display: inline-block;">Save</button> 
		<button class="discard" onclick="discard()" style="display: inline-block;">Discard</button>
		</div>
	</div>

	<?php
include("./connect.php");
$id = $_POST['id'];
$user_id  = $_POST['user_id'];
//get images.
$output='';

if(is_array($_FILES)){
	foreach ($_FILES['files']['name'] as $name => $value) {
		$file_name = explode(".", $_FILES['files']['name'][$name]);

		$allowed_ext = array("jpg", "jpeg", "png", "gif");
		if(in_array($file_name[1], $allowed_ext)){
			$new_name = md5(rand()) . '.' . $file_name[1];

			$sourcePath = $_FILES['files']['tmp_name'][$name];
			$select = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'");
			$f = mysqli_fetch_array($select);
			$username = $f['username'];
			$id_e = substr($new_name, 0, -6);
			$targetPath = "./img/$username/$new_name";
			$targetPathe = "/img/$username/$new_name";

			if(file_exists("./img/$username")){
				move_uploaded_file($sourcePath, $targetPath);

				$insert = mysqli_query($con,"INSERT INTO images(user_id, image) VALUES('$user_id','$targetPathe')");
				$se = mysqli_query($con,"SELECT * FROM images WHERE  user_id='$user_id' ORDER BY id DESC");
				$f = mysqli_fetch_array($se);
					$img_path = $f['image'];
					$eid = $f['id'];
					;?>

					<?php
						$output = '
				<div style="display:inline-block;margin-top:10px;" class="sh" id="l'.$eid.'">
				<img src=".'.$img_path.'" class="mule_img" id="'.$eid.'">
	 			<div class="hiee" id="'.$eid.'">
	 			<div style="margin-top:30px;margin-left:auto;margin-right:auto;border-radius:50%;width:30px;height:30px;text-align:center;"><i class="fas fa-search-plus" style="color:white;font-size:25px;margin-top:25px;"></i>
	 			</div>
		 		</div>
				<div id="check'.$id.'" class="one" style="background-color: #1697ea;border-radius: 10px;height: 30px; width: 30px;text-align: center;position: relative; justify-content: center;bottom: 35px;left: 20px;z-index: 10;visibility: hidden;">
				<i class="fas fa-check" style="color: white;justify-content: center;margin-top: 7px;"></i>
				</div>
				';
				echo $output;
				;?>
				</div>
				<script>
		
					$("#l<?php echo $eid;?>").on('click',function(){

						var id = '<?php echo $eid;?>';
						$.ajax({
							type:'POST',
							url:'zoom.php',
							data:{
								id:id,
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
				;?>
				
				<?php
					
				
				

			}else{
				mkdir("./img/$username");
				move_uploaded_file($sourcePath, $targetPath);
				$output .= '<img src="'.$targetPath.'" id="'.$new_name.'" style="width:150px;height:150px;">';
				$insert = mysqli_query($con,"INSERT INTO images(user_id, image) VALUES('$user_id','$targetPath')");
			}
			
			
		}
	}
}

;?>


<div class="zoome" style="display: none; position: absolute;background-color: rgba(0,0,0, 0.6);z-index: 5;width: 100%;height: 100vh;margin: auto;top: 0;bottom: 0;left:0;right: 0;">
	
</div>
	<script>
		function fuck(){
 	 	if(document.getElementById('defaultChecked2').checked){
 		$("#opt").css("display","inline-block");
		$('.one').css("visibility","visible");
		$('.hiee').css('visibility','hidden');
		$(".selected").css("visibility","visible");
 	}else{
 		$('.hiee').css('visibility','visible');
 		$("#opt").css("display","none");
		$('.one').css("visibility","hidden");
		$(".selected").css("visibility","hidden");
 	}
 	}

		clearInterval(count);
		 function del(){
	 	var user_id = '<?php echo $user_id;?>';
	 		$.ajax({
	 		type:'POST',
	 		url:'delete_all_img.php',
	 		data:{
	 			user_id:user_id,
	 		},success:function(data){
	 			$('.fi').css("display",'none');
	 			$('.rabi').css('display','block');
	 			$('.jy').css('display','none');
	 			$('.bit').css('display','none');
	 			$('.sh').css('display','none');
	 		},error:function(err){alert(err)}
	 	})
	 }
		</script>

		<script>
	function start_c(){
		var set = setInterval(count,0);
		function count(){
			var file = $('#cam').val();
			if(file!==""){
				$("#wow").css("display","none")
				$("#shit").css("display","block");
				$('.rabi').css('display','none');
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
					$(".aftere").css('display','block');
					$(".aftere").html(data);
				},
			})
				clearInterval(set);

			}
		}
	}
	
	$('.discard').on('click',function(){
				$("#cam").val("");
				$('.aftere').css('display','none');
				$("#wow").css("display","none");
				$('.rabi').css('display','block');
				$("#shit").css("display","none");
				var app='<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status"><span class="sr-only">Loading...</span></div>	<div id="mullol"><i class="fas fa-cloud-upload-alt" style="color: #1697ea;font-size: 90px;margin-top: 10px;"></i><p style="color: gray; font-weight: bold; ">Let users say your images</p></div></div>';
			$('.after').html(app);
  			
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

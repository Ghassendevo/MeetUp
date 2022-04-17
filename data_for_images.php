<div class="oi">
<?php
include('./connect.php');
$id = $_POST['id'];
$user_id = $_POST['user_id'];
	$check=  mysqli_query($con,"SELECT * FROM images WHERE user_id='$id'");
	$f = mysqli_num_rows($check);
	if ($f==0) {
	 	;?>
	 	<br>
	 	<div class="after_data"></div>
	 		<div style="margin: auto;text-align: center;justify-content: center;margin-top: 30px;" class="rabi">
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
		<script>
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
	 	<?php
	 }else{
	 	;?>
	 	<div class="det" style="display: none;">
	 		<div class="after_data" ></div>
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

	 	<div style="width: 93%;margin: auto;"><h3 style="font-weight: 400;border-bottom: 1px solid #e5e5e5;">IMAGES</h3></div>
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
	
<div  class="dey" style=";width: 95%;margin: auto;">
	 	<?php
	 	$take = mysqli_query($con,"SELECT * FROM images WHERE user_id='$id'");
	 	$count = mysqli_num_rows($take);
	 	while ($run = mysqli_fetch_array($take)) {
	 		$im = $run['image'];
	 		$id = $run['id'];
	 		$user_id= $run['user_id'];

					;?>
	 	<div style="display: inline-block;" id="l<?php echo $id;?>">
	 		<img src=".<?php echo $im ;?>" class="mule_img" id="<?php echo $id;?>">
	 		<div class="hiee" id="'<?php echo $id;?>'">
	 			<div style="margin-top:30px;margin-left:auto;margin-right:auto;border-radius:50%;width:30px;height:30px;text-align:center;"><i class="fas fa-search-plus" style="color:white;font-size:25px;margin-top:25px;"></i>
	 			</div>
	 		</div>
			<div id="check<?php echo $id;?>" class="one" style="background-color: #1697ea;border-radius: 10px;height: 30px; width: 30px;text-align: center;position: relative; justify-content: center;bottom: 35px;left: 20px;z-index: 10;display: none;">
			<i class="fas fa-check" style="color: white;justify-content: center;margin-top: 7px;"></i>
			</div>
			

<script type="text/javascript">
	function start_c(){
		var set = setInterval(count,0);
		function count(){
			var file = $('#cam').val();
			if(file!==""){
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
				success:function(data){*$
					alert('data')
					$(".after").html(data);
				},
			})
				clearInterval(set);
			}
		}
	}
	
	$('.discard').on('click',function(){
				$("#cam").val("");
				$("#wow").css("display","block")
				$("#shit").css("display","none");
				var app='<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status"><span class="sr-only">Loading...</span></div>	<div id="mullol"><i class="fas fa-cloud-upload-alt" style="color: #1697ea;font-size: 90px;margin-top: 10px;"></i><p style="color: gray; font-weight: bold; ">Let users say your images</p></div></div>';
			$('.after').html(app);
  			
	})
	//submit data.
	
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
	 			$(".det").css("display","block");
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
		<?php
	
	

 ;?>
 </div>

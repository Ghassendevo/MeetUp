<div class="oi">
<?php
include('./connect.php');
$id = $_POST['id'];
$user = $_POST['user'];
$fir = ucfirst($user);
	$check=  mysqli_query($con,"SELECT * FROM images WHERE user_id='$id'");
	$f = mysqli_num_rows($check);
	if ($f==0) {
	 	;?>
	 	<br>
	 	<div class="after_data"></div>
	 		<div style="margin: auto;text-align: center;justify-content: center;margin-top: 0px;" class="rabi">
	 			<h3 style="font-weight: bold;">Profile</h3>
	 			<p style="color: #8b8d90;">When <?php echo $fir;?> share photos and videos <br>they'll appear for you</p>
	 			<label for="cam" class="ede"><h6 style="color: #1697ea;font-weight: bold; cursor: pointer;">There are no photos or videos<h6></label>
	 		</div>
		<div class="after" style=" margin-left: auto;margin-right: auto;width: 80%;border-radius: 10px; height: 160px; border-bottom: none;text-align: center;justify-content: center;">
			<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status">
  		<span class="sr-only">Loading...</span>
		</div>
			
		
	 	<?php
	 }else{
	 	;?>
	 	<div class="det" style="display: none;">
	 		<div class="after_data" ></div>
		<div class="after" style=" margin-left: auto;margin-right: auto;width: 80%;border-radius: 10px; height: 160px; border-bottom: none;border:2px solid gray; border-style: dotted;text-align: center;justify-content: center;">
			<div class="spinner-border text-primary" id="mulspi" style="display: none;text-align: center;margin-left: auto;margin-right: auto;" role="status">
 		 <span class="sr-only">Loading...</span>
		
	 	</div>
</div></div>
<div style="width: 93%;margin: auto;"><h3 style="font-weight: 400;border-bottom: 1px solid #e5e5e5;">IMAGES</h3></div>
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
		<?php
	
	

 ;?>
 </div>

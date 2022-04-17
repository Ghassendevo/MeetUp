<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
<?php 
include("./connect.php");
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$select = mysqli_query($con,"SELECT * FROM images WHERE id='$id'");
while ($f = mysqli_fetch_array($select)) {
	$path = $f['image'];
	;?>
	<div class="outclick" style="position: absolute;margin: auto;top: 0;bottom: 0;right: 0;left: 0;width: 50%;height: 70vh;background-color: white;border-radius: 10px;">
		<img src=".<?php echo $path ;?>" style="width:670px;height: 447px;border-radius: 5px;margin-top: 5px;margin-left: 5px;">
	</div>
	<div class="can" >
		<i class="fas fa-times" style="margin-top: 5px;color: gray;margin-left: 9px;" id="hy" ></i>
	</div>
	<div class="set">
		<a href='dowload.php?u=<?php echo $id ;?>.<?php echo $user_id;?>'>
		<div class="dow">
			<i class="fas fa-long-arrow-alt-down" style="color: white;margin-top: 6px;font-size: 20px;"></i>
		</div>
		</a>
		<div class="supp" onclick="supp()">
			<i class="far fa-trash-alt" style="color: white;margin-top: 6px;font-size: 20px;"></i>
		</div>
	</div>
	<script>
		$(".can").on('click',function(){
			$(".zoome").css("display","none");
		})

		function supp(){
			var 
			 	id = '<?php echo $id;?>',
			 	user_id = '<?php echo $user_id;?>';
			 $.ajax({
			 	type:'POST',
			 	url:'supp.php',
			 	data:{
			 		id:id,
			 		user_id,
			 	},
				success:function(data){
					$('.zoome').css("display","none");

				}
			 });
			 //delete with display none ;
			 $('#l<?php echo $id;?>').css("display","none");
		}
		

	</script>
	<?php
}
;?>
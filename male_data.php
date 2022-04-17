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
<?php 
include("./connect.php");
$data = mysqli_query($con,"SELECT * FROM users WHERE gender='male'") or die(mysqli_error($con));
$user_id = $_POST['id'];
while ($fetch = mysqli_fetch_array($data)) {
	$firstname = ucfirst($fetch['firstname']);
	$lastname = ucfirst($fetch['lastname']);
	$pic = $fetch['pic'];
	$id = $fetch['id'];
	//count likes.
	$likes = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$id'") or die(mysqli_error($con));
	$count_likes = mysqli_num_rows($likes);
	if($count_likes>0){
		$ce = '<div style="margin-top: 5px;">
				<i class="far fa-heart" style="color: red;font-size: 25px;display: inline-block;"></i><p style="display: inline-block;font-family: arial;color: gray">'.$count_likes.'</p>
				</div>';
	}else{
		$ce='';
	}
	//check if the user is already like the profile.
	$ch = mysqli_query($con,"SELECT * FROM likes WHERE liked_by='$user_id' AND liked_to='$id'") or die(mysqli_error($con));
	$get = mysqli_num_rows($ch);
	if($get>0){
		$like = '<i class="fas fa-heart dislike'.$id.'" style="color:red;font-size:30px;cursor:pointer;"></i><i class="far fa-heart like'.$id.'" style="color:gray;cursor:pointer; font-size:30px;display:none;"></i>';
	}else{
		$like = '<i class="far fa-heart like'.$id.'" style="color:gray;cursor:pointer; font-size:30px;"></i><i class="fas fa-heart dislike'.$id.'" style="color:red;font-size:30px;display:none;cursor:pointer;"></i>';
	}
	;?>
	<div class="user_p">
		<div class="user_top" style="margin-left: 10px;margin-top: 10px;">
			<img src="<?php echo $pic ;?>" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%;border:2px solid #1697ea;cursor: pointer;">
			<p style="color: black;font-weight: 400; font-family: verdana;display: inline-block;"><?php echo  "".$firstname." ".$lastname."" ;?></p>
			<i class="fas fa-plus add<?php echo $id ;?>" style="display: inline-block;float: right;margin-right: 5px;color: #8f959c;font-size: 20px;cursor: pointer;"></i>
			<i class="fas fa-check remove<?php echo $id;?>" style="display: none;float: right;margin-right: 5px;color: #1697ea;font-size: 20px;cursor: pointer;"></i>
		</div>
		<div class="user_center">
			<div class="ii" style="width: 90%;height: 300px;margin-left: auto;margin-right: auto;">
				<img src="<?php echo $pic ;?>" class="iim" >
				<div class="count<?php echo $id;?>">
					<?php echo $ce ;?>
				</div>
				
			</div>

		</div>
		<hr style="margin-top: 35px;">

		<div style="text-align: center;justify-content: center;">
			<?php echo $like ;?>
		</div>
	</div>



<script>
	$(".like<?php echo $id ;?>").on('click',function(){
		$(this).css('display','none');
		$(".dislike<?php echo $id;?>").css("display","block");
		var 
			liked_to = '<?php echo $id;?>',
			liked_by = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'like.php',
			data:{
				liked_to:liked_to,
				liked_by:liked_by,
			},
			success:function(data){
				$('.count<?php echo $id;?>').html(data);
			}
		})
	})
	$(".dislike<?php echo $id ;?>").on('click',function(){
		$(this).css('display','none');
		$(".like<?php echo $id;?>").css("display","block");
		var 
			liked_to = '<?php echo $id;?>',
			liked_by = '<?php echo $user_id;?>';
		$.ajax({
			type:'POST',
			url:'dislike.php',
			data:{
				liked_to:liked_to,
				liked_by:liked_by,
			},
			success:function(data){
				$(".count<?php echo $id;?>").html(data);
			}
		})
	})
	$(".add<?php echo $id ;?>").on('click',function(){
		$(this).css("display","none");
		$(".remove<?php echo $id ;?>").css("display","inline-block");
	})
	$(".remove<?php echo $id ;?>").on('click',function(){
		$(this).css("display","none");
		$(".add<?php echo $id ;?>").css("display","inline-block");
	})
</script>
	
	<?php

}
;?>

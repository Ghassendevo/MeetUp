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
<?php
//get images.
$output='';
if(is_array($_FILES)){
	foreach ($_FILES['files']['name'] as $name => $value) {
		$file_name = explode(".", $_FILES['files']['name'][$name]);

		$allowed_ext = array("jpg", "jpeg", "png", "gif");
		if(in_array($file_name[1], $allowed_ext)){
			$new_name = md5(rand()) . '.' . $file_name[1];

			$sourcePath = $_FILES['files']['tmp_name'][$name];

			$targetPath = "./img/".$new_name;
			$id = substr($new_name, 0, -6);
			if(move_uploaded_file($sourcePath, $targetPath)){
				$output .= '
				<div style="display:inline-block;margin-top:10px;" id="l'.$id.'">
				<img class="mul_img"  src="'.$targetPath.'" id="'.$new_name.'" >
				<div class="hie" id="'.$id.'"><div style="margin-top:30px;margin-left:auto;margin-right:auto;background-color:red;border-radius:50%;width:30px;height:30px;text-align:center;"><i class="fas fa-times" style="color:white;font-size:20px;margin-top:5px;"></i></div></div>
				</div>

				';
				;?>
				<script>
					$("#<?php echo $id;?>").on('click',function(){
						$("#l<?php echo $id;?>").css('display','none');
					})
				</script>
				<?php
			}
		}else{
			;?>
			<p style="justify-content: center; font-family: 'Verdana',  sans-serif;color: red;font-weight: bold;font-family: 25px;margin-top: 30px;">Only images are allowed !</p>
			<script>
				$("#wow").css("display","block")
				$("#shit").css("display","none");
				var file = $('#cam').val();
				$('#cam').val("");

			</script>
			<?php
		}
	}
}
;?>
<div style="max-height: 155px;overflow: auto;">
	<?php echo $output;?>
</div>
<?php
;?>
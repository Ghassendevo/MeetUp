<?php 
include("./connect.php");
$id = $_POST['id'];


$d = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$id' AND liked_by!='$id' ORDER BY id DESC");
$m = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$id' AND follow_by!='$id' ORDER BY id DESC");
$cf = mysqli_num_rows($m);
$ce = mysqli_num_rows($d);
if($ce+$cf==0){
	//no notifiactions (0)
				;?>
				<div style="line-height: 0.2;" class="no_noti">
					<div style="width: 200px;margin-left: auto;margin-right: auto;">
						<img src="./img/noti.png" style="width: 100%;height: 150px;">
					</div>
					<p style="text-align: center;color: black;font-weight: 400;font-family: verdana">No notifications</p>
				</div>
					<?php
}else{
	$d = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$id' AND liked_by!='$id' ORDER BY id DESC");
	$m = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$id' AND follow_by!='$id' ORDER BY id DESC");
		// There are notifications(#0);2

				echo "<div>";
				while($i = mysqli_fetch_array($m)){
					$not = $i['noti'];
					if ($not=='no') {
						$follow_by_id = $i['follow_by'];
						$se = mysqli_query($con,"SELECT * FROM users WHERE id='$follow_by_id'");
						$tg = mysqli_fetch_array($se);
						$follow_by_f = ucfirst($tg['firstname']);
						$follow_by_l = ucfirst($tg['lastname']);
						$follow_by_pic = $tg['pic'];
						;?>
						<div class="tr">
					<div style="margin-bottom: 10px;margin-left: 10px;">
					<img src="<?php echo $follow_by_pic;?>" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;">
					<div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;">
						<p style="color: #1697ea;font-family: sans-serif;"><?php echo "".$follow_by_f." ".$follow_by_l."";?></p>
						<p style="color: gray;">Started following you.</p>
					</div>	
					<div style="display: inline-block;float: right;margin-right: 5px;"><span style="width: 10px;height: 10px;background-color:#1697ea;border-radius: 50%; "></span></div>
					</div>
					</div>
						<?php
						$sete = mysqli_query($con,"UPDATE followers SET noti='yes' WHERE follow_to='$id'") or die(mysqli_error($con));
					}else{
						$follow_by_id = $i['follow_by'];
							
							$SELECT = mysqli_query($con,"SELECT * FROM users WHERE id='$follow_by_id' ORDER BY id DESC");
							$get = mysqli_fetch_array($SELECT);
							$follow_by_f = ucfirst($get['firstname']);
							$follow_by_l = ucfirst($get['lastname']);
							$follow_by_pic = $get['pic'];
							;?>
							<div class="tre">
							<div style="margin-bottom: 10px;margin-left: 10px;">
							<img src="<?php echo $follow_by_pic;?>" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;">
							<div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;">
								<p style="color: black;font-family: sans-serif;"><?php echo "".$follow_by_f." ".$follow_by_l."";?></p>
								<p style="color: gray;">Started following you.</p>
							</div>	
							</div>
							</div>
							<?php
					}
				}
				echo "</div>";
	// There are notifications(#0);1
					echo "<div>";

				while ($f = mysqli_fetch_array($d)) {

				$noti = $f['noti'];
				if($noti=='no'){
					$liked_by_id = $f['liked_by'];
					

					$SELECT = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by_id'");
					$get = mysqli_fetch_array($SELECT);
					$liked_by_n = ucfirst($get['firstname']);
					$liked_by_t = ucfirst($get['lastname']);
					$liked_by_pic = $get['pic'];

					
					;?>
					<div class="tr">
					<div style="margin-bottom: 10px;margin-left: 10px;">
					<img src="<?php echo $liked_by_pic;?>" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;">
					<div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;">
						<p style="color: #1697ea;font-family: sans-serif;"><?php echo "".$liked_by_n." ".$liked_by_t."";?></p>
						<p style="color: gray;">gave to your profile a like</p>
					</div>	
					<div style="display: inline-block;float: right;margin-right: 5px;"><span style="width: 10px;height: 10px;background-color:#1697ea;border-radius: 50%; "></span></div>
					</div>
					</div>
					<?php
						$set = mysqli_query($con,"UPDATE likes SET noti='yes' WHERE liked_to='$id'") or die(mysqli_error($con));
				}else{
							$liked_by_id = $f['liked_by'];
							
							$SELECT = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by_id' ORDER BY id DESC");
							$get = mysqli_fetch_array($SELECT);
							$liked_by_n = ucfirst($get['firstname']);
							$liked_by_t = ucfirst($get['lastname']);
							$liked_by_pic = $get['pic'];
							;?>
							<div class="tre">
							<div style="margin-bottom: 10px;margin-left: 10px;">
							<img src="<?php echo $liked_by_pic;?>" style="width: 40px;height: 40px;border-radius: 50%;display: inline-block;">
							<div style="display: inline-block;vertical-align: top;margin-left: 5px;line-height: 0.4;margin-top: 5px;">
								<p style="color: black;font-family: sans-serif;"><?php echo "".$liked_by_n." ".$liked_by_t."";?></p>
								<p style="color: gray;">gave to your profile a like</p>
							</div>	
							</div>
						</div>
				<?php
				
			}
}
	echo "</div>";
}


;?>

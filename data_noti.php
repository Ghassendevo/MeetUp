<?php
include('./connect.php');
$user_id = $_POST['user_id'];
      $s = mysqli_query($con,"SELECT * FROM likes WHERE liked_to='$user_id' ORDER BY id DESC") or die(mysqli_error($con));
      if(mysqli_num_rows($s)>0){
        while($c=mysqli_fetch_array($s)){
          $liked_by = $c['liked_by'];
          $get = mysqli_query($con,"SELECT * FROM users WHERE id='$liked_by'");
          $g = mysqli_fetch_array($get);
          $pi = $g['pic'];
          $first = ucfirst($g['firstname']);
          $last = ucfirst($g['lastname']);
          ;?><div class="ho">
          <div style="display: inline-block;margin-bottom: 10px;">
            <img src="<?php echo $pi;?>" style="width: 50px;height: 50px;border-radius: 50%;">
          </div>
          <p style="display: inline-block; color: #1697ea;margin-left: 10px;"><?php echo "".$first." ".$last."";?> <span style="color: black;">liked your profile .</span></p>
          </div>
          <?php
        }
      }

       ;?>
      
<?php 
include('./connect.php');
$by = $_POST['by'];
$to = $_POST['to'];
;
$type = $_POST['type'];
if($type=='first'){
	//type == see first.7
	$f = mysqli_query($con,"SELECT * FROM followers WHERE follow_to='$to' AND follow_by='$by'");
	$i = mysqli_fetch_array($f);
	if($i['first']=='yes'){
			$_p = mysqli_query($con,"UPDATE followers SET first='no' WHERE follow_to='$to' AND follow_by='$by'") or die(mysqli_error($con));

	}else{
			$_p = mysqli_query($con,"UPDATE followers SET first='yes' WHERE follow_to='$to' AND follow_by='$by'") or die(mysqli_error($con));

	}
}else{
	//type == block.
	$r = mysqli_query($con,"SELECT * FROM block WHERE block_to='$to' AND block_by='$by'");
	if(mysqli_num_rows($r)==0){
		$_p = mysqli_query($con,"INSERT INTO block (block_by,block_to) VALUES ('$by','$to')");
		$d = mysqli_query($con,"DELETE  FROM followers WHERE follow_by='$by' AND follow_to='$to'");
	}
}
;?>
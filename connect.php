<?php 
$con = mysqli_connect("localhost","root","");
		if(!$con){
			die("cannot connect to the data base");
		}

$select_db = mysqli_select_db($con,'crush');
		if(!$select_db){
			die("cannot select database");
		}
date_default_timezone_set("Africa/Tunis");
;?>
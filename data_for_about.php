<?php 
include('./connect.php');
$id = $_POST['id'];
$check=  mysqli_query($con,"SELECT * FROM about WHERE user_id='$id'");
	$f = mysqli_num_rows($check);
$checke=  mysqli_query($con,"SELECT * FROM users WHERE id='$id'");

	$get = mysqli_fetch_array($checke);
	$firstname = ucfirst($get['firstname']);
	$lastname = ucfirst($get['lastname']);
	$oo = mysqli_query($con,"SELECT * FROM about WHERE user_id='$id'") or die(mysqli_error($con));
	$ji = mysqli_fetch_array($oo);
	
	;?>
	<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;border-bottom: 1px solid #e5e5e5;">
	<h3 style="font-weight: 400;">ABOUT</h3>

</div>
<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;margin-top: 10px;">
	<div class="form-group" style="width: 45%;">
	               <label for="inputName">FirstName And LastName</label>
	               <div style="display: flex;justify-content: space-between;">
	                 <input style="width: 48%;" type="text" class="form-control" id="lastname" placeholder="<?php echo $ji['firstname'];?>">
	                 <input style="width: 48%; " type="text" class="form-control" id="firstname" placeholder="<?php echo $ji['lastname'];?>">

	             	</div>
	 </div>
	 <div class="form-group" style="width: 45%;">
	               <label for="inputName">Link</label>
	                 <input type="text" class="form-control" id="link" placeholder="<?php echo $ji['link'];?>">
	 </div>
</div>
<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;">
	<div class="form-group" style="width: 45%;">
	               <label for="inputName"> E-mail</label>
	                 <input type="text" class="form-control" id="email" placeholder="<?php echo $ji['email'];?>">
	 </div>
	 <div class="form-group" style="width: 45%;">
	               <label for="inputName">Job</label>
	                 <input type="text" class="form-control" id="job" placeholder="<?php echo $ji['job'];?>">
	 </div>
</div>
<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;">
	<div class="form-group" style="width: 45%;">
	               <label for="inputName">Age</label>
	                 <input type="text" class="form-control" id="age" placeholder="<?php echo $ji['age'];?>">
	 </div>
	 <div class="form-group" style="width: 45%;">
	               <label for="inputName">Location</label>
	                 <input type="text" class="form-control" id="location" placeholder="<?php echo $ji['location'];?>">
	 </div>
</div>
<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;">
	<div class="form-group" style="width: 45%;">
	               <label for="inputName">Phone Number</label>
	                 <input type="text" class="form-control" id="number" placeholder="<?php echo $ji['number'];?>">
	 </div>
	 <div class="form-group" style="width: 45%;">
	               <label for="inputName">Education</label>
	                 <input type="text" class="form-control" id="education" placeholder="<?php echo $ji['education'];?>">
	 </div>
</div>
<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;">
	<div class="form-group" style="width: 45%;">
	               <label for="inputName">Relation</label>
	                 <input type="text" class="form-control" id="relation" placeholder="<?php echo $ji['relation'];?>">
	 </div>
	
</div>
<div style="width: 90%;margin: auto;display: flex;justify-content: space-between;">
<button class="upe"  >UPDATE</button></div>

<script>
	$('.upe').on('click',function(){
		var
			 firstname = $('#firstname').val(),
			 lastname = $('#lastname').val(),
			 location = $('#location').val(),
			 age = $('#age').val(),
			 email = $('#email').val(),
			 job = $('#job').val(),
			 number = $('#number').val(),
			 education = $('#education').val(),
			 relation = $('#relation').val(),
			 link = $('#link').val(),
			 id = '<?php echo $id;?>';
									 if(firstname==""){
									 	 firstname ='<?php echo $ji['firstname'];?>';
									 }
									  if(lastname==""){
									 	 lastname = '<?php echo $ji['lastname'];?>';
									 }
									  if(location==""){
									 	 location = '<?php echo $ji['location'];?>';
									 }
									  if(age==""){
									 	 age = '<?php echo $ji['age'];?>';
									 }
									  if(email==""){
									 	 email = '<?php echo $ji['email'];?>';
									 }
									  if(job==""){
									 	 job = '<?php echo $ji['job'];?>';
									 }
									  if(number==""){
									 	 number = '<?php echo $ji['number'];?>';
									 }
									  if(education==""){
									 	 education = '<?php echo $ji['education'];?>';
									 }
									  if(relation==""){
									 	 relation = '<?php echo $ji['relation'];?>';
									 }
									  if(link==""){
									 	 link = '<?php echo $ji['link'];?>';
									 }
									 
			
	$.ajax({
		type:'POST',
		url:'update_data_about.php',
		data:{
			id:id,
			firstname:firstname,
			lastname:lastname,
			location:location,
			age:age,
			email:email,
			job:job,
			number:number,
			education:education,
			relation:relation,
			link:link,
		},beforeSend:function(){

		},success:function(data){
		},error:function(){
			alert('please check your internet');
		},
	});

	})
</script>
	<?php

;?>
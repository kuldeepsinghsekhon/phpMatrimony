
<div class="grid_3">
<?php

$firstname="";
$middlename="";
$lastname="";
$email="";
$password="";
$day="";
$month="";
$year="";
$aboutme="";
$gender="";
$errorMsg="";
$dob="";
if($_POST){	
$firstname=test_input($_POST['firstname']);
$middlename=$_POST['middlename'];
$lastname=test_input($_POST['lastname']);
$email=test_input($_POST['email']);
$password=test_input($_POST['password']);
$day=test_input($_POST['day']);
$month=test_input($_POST['month']);
$year=test_input($_POST['year']);
$aboutme=test_input($_POST['aboutme']);
$gender=test_input($_POST['gender']);

	if ((!$aboutme) || (!$gender) || (!$firstname)|| (!$lastname)|| (!$email)  || (!$password) || (!$day)|| (!$month)|| (!$year))
		 { $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
	
	if(!$firstname){
		$errorMsg .= "* First Name<br>";
	}
	if(!$lastname){
		$errorMsg .= "* Last Name<br>";
	}
	if(!$email){
		$errorMsg .= "* Email<br>";
	}
	if(!$password){
		$errorMsg .= "* Password<br>";
	}
	if(!$day){
		$errorMsg .= "* Day from dob<br>";
	}
	if(!$month){
		$errorMsg .= "*Month<br>";
	}
	if(!$year){
		$errorMsg .= "*Year<br>";
	}
	if(!$aboutme){
		$errorMsg .= "* AboutMe<br>";
	}
	if(!$gender){
		$errorMsg .= "* Confirm your gender<br>";
	  } 
	else if (strlen($password)<4) {
	          $errorMsg .= "<u>ERROR:</u><br />Your Password is too short. 4 - 20 characters please.<br />"; 
     }  
		 }else {
			 $dob=$year."-".$month."-".$day;
			 $dob=date('y-m-d',strtotime($dob));
			  $flag =mysqli_query($conn,"Insert into members(first_name,last_name,middle_name,email,password,aboutme,gender,dob)values('$firstname','$lastname','$middlename','$email','$password','$aboutme','$gender','$dob')");
				if($flag){
					$errorMsg .="Congratulations, You registered successfully.";
					
					header('location: login.php');
					exit();
					
					
				}else{
					$errorMsg .="Failed to register. Kindly check form again. ";
				}
		 }
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?> 
 <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Register</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-6 login_left">
	  <?php echo $errorMsg; ?>
	     <form method="post" action="register.php">
	  	    <div class="form-group">
		      <label for="edit-name">First name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="firstname" value="" size="60" maxlength="60" class="form-text required">
		    </div>
		    <div class="form-group">
		      <label for="edit-name">Middel name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="middlename" value="" size="60" maxlength="60" class="form-text required">
		    </div>
		    <div class="form-group">
		      <label for="edit-name">Last name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="lastname" value="" size="60" maxlength="60" class="form-text required">
		    </div>
		    <div class="form-group">
		      <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
		      <input type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text required">
		    </div>
		    <div class="form-group">
		      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="email" value="" size="60" maxlength="60" class="form-text required">
		    </div>
		    <div class="age_select">
		      <label for="edit-pass">D.O.B <span class="form-required" title="This field is required.">*</span></label>
		        <div class="age_grid">
		         <div class="col-sm-4 form_box">
                  <div class="select-block1">
                    <select name="day">
	                    <option value="">Date</option>
	                     <?php for($i=1;$i<=31;$i++){
	                   echo"<option value=$i>$i</option>";
						 }
	                    ?> 
	                    
                    </select>
                  </div>
            </div>
            <div class="col-sm-4 form_box2">
                   <div class="select-block1">
                    <select name="month">
	                    <option value="">Month</option>
	                    <option value="1">January</option>
	                    <option value="2">February</option>
	                    <option value="3">March</option>
	                    <option value="4">April</option>
	                    <option value="5">May</option>
	                    <option value="6">June</option>
	                    <option value="7">July</option>
	                    <option value="8">August</option>
	                    <option value="9">September</option>
	                    <option value="10">October</option>
	                    <option value="11">November</option>
	                    <option value="12">December</option>
                    </select>
                  </div>
                 </div>
                 <div class="col-sm-4 form_box1">
                   <div class="select-block1">
                    <select name="year">
                    <option value="">Year</option>
                   <?php for($i=1920;$i<=2020;$i++){
	                   echo"<option value=$i>$i</option>";
						 }
	                   ?>
                    </select>
                   </div>
                  </div>
                  <div class="clearfix"> </div>
                 </div>
              </div>
              <div class="form-group form-group1">
                <label class="col-sm-7 control-lable" for="sex">Sex : </label>
                <div class="col-sm-5">
                    <div class="radios">
				        <label for="radio-01" class="label_radio">
				            <input type="radio" name="gender" value="male" checked> Male
				        </label>
				        <label for="radio-02" class="label_radio">
				            <input type="radio" name="gender" value="female"> Female
				        </label>
	                </div>
                </div>
                <div class="clearfix"> </div>
             </div>
			  <div class="form-group">
			     <label for="edit-name">About Me <span class="form-required" title="This field is required.">*</span></label>
				 <textarea name="aboutme"class="form-control bio" placeholder="" rows="3"></textarea>
			  </div>
			  <div class="form-actions">
			    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
			  </div>
		 </form>
	  </div>
	  <div class="col-sm-6">
	     <ul class="sharing">
			<li><a href="#" class="facebook" title="Facebook"><i class="fa fa-boxed fa-fw fa-facebook"></i> Share on Facebook</a></li>
		  	<li><a href="#" class="twitter" title="Twitter"><i class="fa fa-boxed fa-fw fa-twitter"></i> Tweet</a></li>
		  	<li><a href="#" class="google" title="Google"><i class="fa fa-boxed fa-fw fa-google-plus"></i> Share on Google+</a></li>
		  	<li><a href="#" class="linkedin" title="Linkedin"><i class="fa fa-boxed fa-fw fa-linkedin"></i> Share on LinkedIn</a></li>
		  	<li><a href="#" class="mail" title="Email"><i class="fa fa-boxed fa-fw fa-envelope-o"></i> E-mail</a></li>
		 </ul>
	  </div>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>

<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!--  -->
<?php 
include 'Dbcon.php';
include 'User.php';
$connection= new Dbcon();
$newuser= new User();
$errors=array();

 if(isset($_POST['submit'])){
	$name= $_POST['name'];
	
	$email= $_POST['email'];
	$mobile= $_POST['mobile'];
	$question= $_POST['question'];
	$answer= $_POST['answer'];
	$password= $_POST['password'];
	$confirmpassword= $_POST['confirmpassword'];
	// echo $name;
	// echo $question;
	// echo "<script>alert('$name')</script>";

	if($name != "" && $email != "" && $mobile != "" && $question != "" && $answer != "" && $password != "" && $confirmpassword != "")
    {
        if (ctype_alpha(str_replace(' ', '', $name)) === false) {
            // echo "Yes\n";
			echo "<script>alert('Only Alphabets are allowed in Name')</script>";
            $errors[]=array('input'=>'First Name', 'msg'=>'Only Alphabet is allowed');
            // exit;
		}
		
        if ( ! preg_match('/^[0-9]{10}+$/', $mobile)) 
        {
            echo "<script>alert('Only 10 digits are allowed')</script>";
            $errors[]=array('input'=>'Mobile', 'msg'=>'Only 10 digits are allowed');
            // exit;
        }
        // $errors[]=array('input'=>'Fields', 'msg'=>'Required Field');
        if ($password != $confirmpassword) {
            echo "<script>alert('Password does not match')</script>";
            $errors[]=array('input'=>'password', 'msg'=>'Password does not match');
            // exit;
		}
		
        if (sizeof($errors)==0) {
            $newuser->signup($email, $name, $mobile, $password, $question, $answer, $connection->conn);
            
        }

    } else {
        echo "<script>alert('All Fields are Required')</script>";
    }
    

 }
?>
<!--  -->
<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});

					$(document).ready(function(){
						$('#name').blur(function(){
							$name= document.getElementById('name').value;
							$name= $name.trim();
							document.getElementById('name').value= $name;
						})

						$('#email').on("keyup", function(){
							$email= document.getElementById('email').value;
							$email= $email.replace(/\s/g, '')
							document.getElementById('email').value= $email;

						})

						$('#mobile').on("blur", function(){
							$count=0;
							$flag=0;
							$mobile= document.getElementById('mobile').value;
							$mobile= $mobile.trim();
							document.getElementById('mobile').value= $mobile;
							$fchar= $mobile.charAt(0);
							$len= $mobile.length;
							
							// alert($fchar);
							if ($fchar != 0 && $len != 10){
								alert("10 digits are  allowed in Mobile Field If not starts with 0");
								document.getElementById('mobile').value='';
							}
							else if ($fchar == 0 && $len != 11){
								alert("11 digits are allowed in Mobile Field If  starts with 0");
								document.getElementById('mobile').value='';
							}
							else if ($mobile.charAt(0) == 0 && $mobile.charAt(1)==0){
								alert("Two consecutive 0 in beginning are not allowed in Mobile Field If  starts with 0");
								document.getElementById('mobile').value='';
							}
							// document.getElementById('email').value= $email;
							else {
								if($len == 11){
									for(i=1; i<10; i++){
										if($mobile.charAt(i) == $mobile.charAt(i+1)){
											$count++;
											if($count == 9){
												$flag=1;
											}
										}
										
									}

								}
								if($len == 10){
									for(i=0; i<8; i++){
										if($mobile.charAt(i) == $mobile.charAt(i+1)){
											$count++;
											if($count == 8){
												$flag=1;
											}
											
										}
										
										
									}
								}
								if($flag == 1){
									alert("All digits can't be Similar");
									document.getElementById('mobile').value='';
								}
							}
						})
					})
				</script>
<!--script-->
</head>
<body>
	<!---header--->
	<?php include 'header.php'; ?>
	<!---header--->
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Full Name<label>*</label></span>
						<input type="text" id="name" name="name" pattern="^[A-Za-z]+( [A-Za-z]+)*$" title="Only Alphabets are allowed" required> 
					 </div>
					 <!-- <div>
						<span>Last Name<label>*</label></span>
						<input type="text" name="lastname" pattern="[A-Za-z]" title="Only Alphabets are allowed" required> 
					 </div> -->
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" id="email" name="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Only Valid Email Format is Required" required> 
					 </div>
					 <div>
						<span>Mobile<label>*</label></span>
						<input type="text" id="mobile" name="mobile" pattern="[0-9]{10,11}" required> 
					 </div>
					 <div>
						 <span>Security Question<label>*</label></span>
						 <!-- <input type="text">  -->
						 <select id="" name="question">
						 <option value="">--Select--</option>
						 <option value="What was your childhood nickname?">What was your childhood nickname?</option>
						 <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
						 <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
						 <option value="What was your dream job as a child?">What was your dream job as a child?</option>
						 <option value="What was your favourite teacher's nickname?">What was your favourite teacher's nickname?</option>
						 </select>
						 
					 </div>
					 <div>
						<span>Answer<label>*</label></span>
						<input type="text" name="answer"> 
					</div>

					 <!-- <div class="clearfix"> </div> -->
					   <!-- <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a> -->
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirmpassword">
							 </div>
					 </div>
					 
			<!-- </form> -->
				<div class="clearfix"> </div>
				<div class="register-but">
				   <!-- <form> -->
					   <input type="submit" value="submit" name="submit">
					   <div class="clearfix"> </div>
				   
				</div>
				</form>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
			<!---footer--->
				<?php include 'footer.php'; ?>
			<!---footer--->
</body>
</html>

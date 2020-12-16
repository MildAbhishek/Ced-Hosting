<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();

if (isset($_SESSION['signup'])){
	$mobile= $_SESSION['signup']['mobile'];
	$email= $_SESSION['signup']['email'];
}
$message="";

if(isset($_POST['sendmobileotpBtn'])){
	$mobile= $_POST['mobilenumber'];
	// echo "<script>alert('$mobile')</script>";
	$_SESSION['mobilenumber']=$mobile;

	$otp = rand(1000, 9999);
	$_SESSION['session_otp'] = $otp;
	
    $message = "Your One Time Password is " .$otp;
}
?>

<?php

// echo $_SESSION['session_otp'];
// $message="";

$fields = array(
    "sender_id" => "FSTSMS",
    "message" =>"$message",
    "language" => "english",
    "route" => "p",
    "numbers" => "$mobile",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: pFUkVbK8YWslSIQC5EiqzJtnfujharTO92Go0mdZRc61AwXyxDEbG0S8cmzjTX1wWx6RFMfepy24No7H",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
 
}
?>

<?php 
include 'User.php';
include 'Dbcon.php';

$newuser= new User();
$connection= new Dbcon();

if (isset($_POST['verifymobileotpBtn'])){
	// echo "<script>alert('Yes')</script>";
	$otp= $_POST['mobileotpfield'];

	// echo "<script>alert($otp)</script>";
	// echo "<script>alert($_SESSION['session_otp'])</script>";
	if ($otp == $_SESSION['session_otp']) {
		// echo "<script>alert('Verified')</script>";
		$newuser->verifyMobile($mobile, $connection->conn);
		
		
	} else {
		echo "Invalid OTP";
	}
}

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!--lightboxfiles-->
<script type="text/javascript">
	$(function() {
	$('.team a').Chocolat();
	});
</script>	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
<script type="text/javascript">
	$(function() {
							
	$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
});
</script>



					
<!--script-->
</head>
<body>
	<!---header--->
	<?php include 'header.php'; ?>
	<!---header--->
	<!---banner--->
		<div class="banner" style="height:400px;">
		<h2 class="text-center" style="color:white;">Verify Your Mobile Number and Email Here !!!</h2>
			<div class="container">
				<div class="row">
					<div class="col-4" style="float:left; width:100px;height:300px; margin:75px;">
						<form class="form-horizontal" action="" method="POST">
							<div>
								<span>Mobile<label>*</label></span>
								<input type="number" id="mobile" name="mobilenumber" value="<?php echo $mobile; ?>" title="Only Valid Mobile Number is desired" > 
							</div>
							
							<div class="register-but" id="sendmobileotpBtn">
							<input type="submit" value="Send OTP" name="sendmobileotpBtn" class="btn btn-default" >
							<!-- <div class="clearfix"> </div> -->
							</div>
							<div id="mobileotpfield">
								<span>OTP<label>*</label></span>
								<input type="number" name="mobileotpfield" pattern="" title="" > 
							</div>

							<div class="register-but"  id="verifymobileotpBtn">
							<input type="submit" value="Verify OTP" name="verifymobileotpBtn" class="btn btn-default">
							</div>
						</form>
					</div>
					<div class="col-4" style="float:left; width:100px;height:300px; margin:75px;">
					<!-- <form class="form-horizontal" action="/action_page.php">
							<div>
								<span>Mobile<label>*</label></span>
								<input type="text" id="mobile" name="mobile" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Only Valid Email Format is Required" required> 
							</div>
							<div>
								<span>OTP<label>*</label></span>
								<input type="text" id="otp" name="otp" pattern="" title="" required> 
							</div>
							<div class="register-but"> -->
							<!-- <form> -->
							<!-- <input type="submit" value="submit" name="submit" class="btn btn-default"> -->
							<!-- <div class="clearfix"> </div> -->
							<!-- 					
							</div>
						</form> -->
					</div>
					<div class="col-4" style="float:left; width:100px;height:300px; margin:75px;">
					<form class="form-horizontal" action="/action_page.php">
							<div>
								<span>Email<label>*</label></span>
								<input type="text" id="email" name="email" value="<?php echo $email; ?>" title="Only Valid Email Format is Required" required> 
							</div>
							<div>
								<span>OTP<label>*</label></span>
								<input type="text" id="emailotp" name="emailotp" pattern="" title="" required> 
							</div>
							<div class="register-but">
							<!-- <form> -->
							<input type="submit" value="submit" name="submit" class="btn btn-default">
							<!-- <div class="clearfix"> </div> -->
					
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	<!---banner--->

			
			<!---footer--->
			<?php include 'footer.php' ?>
			<!---footer--->
<!-- <script>
  $(document).ready(function(){
	  $('#sendmobileotpBtn').click(function(){
		  document.getElementById('mobileotpfield').style.display='block';
		  document.getElementById('verifymobileotpBtn').style.display='block';
		  document.getElementById('sendmobileotpBtn').style.display='none';
		});
	});
</script>"; -->

<?php 

function sendOTP($email, $otp) {
	require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
	
	$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls'; // tls or ssl
	$mail->Port     = "587";
	$mail->Username = "neverlikebefore01@gmail.com";
	$mail->Password = "";
	$mail->Host     = "smtp.gmail.com";
	$mail->Mailer   = "smtp";
	$mail->SetFrom("neverlikebefore01@gmail.com", "web");
	$mail->AddAddress($email);
	$mail->Subject = "OTP to Login";
	$mail->MsgHTML($message_body);
	$mail->IsHTML(true);
	$result = $mail->Send();
	
	return $result;
}
?>			
</body>
</html>
<?php
	session_start();	
	//include("header.php");	
?>
<br><br><br><br>
<!DOCTYPE html>
<html>
<head>
<title>How to Implement OTP SMS Mobile Verification in PHP with TextLocal</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<div class="container">
		<div class="error"></div>
		<form id="frm-mobile-verification">
			<div class="form-heading">Mobile Number Verification</div>
			<div class="form-row">
				USER NAME:
				<?php echo $_SESSION['u_name'];?>
				<br><br> 
				Enter Number:
				<INPUT TYPE="number" NAME="txtm_contact" id="mobile" class="form-input"
					placeholder="Enter the 10 digit mobile"/>
			<!--	New Number :
				<input type="number" name="txtn_contact"  class="form-input"
					placeholder="Enter the 10 digit mobile"> -->
			</div>

			<input type="button" class="btnSubmit" value="Send OTP"
				onClick="sendOTP();">
		</form>
	</div>

	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="verification.js"></script>
</body>
</html>

<?php

	if(isset($_POST['btnsubmit']))
	{
		$newphone=$_POST['txtn_contact'];
		$oldphone=$_POST['txtm_contact'];
		
		$_SESSION['newphone']=$newphone;
		$_SESSION['oldphone']=$oldphone;
			
	}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<?php include "header.php"; ?>
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Contact Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
<body>

	<center>
		<h4 class="sent-notification"></h4>
        <div class="container">				
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-md-7">
		<form id="myForm">
        <div class="form-group">
        <center><table  class="table table-hover table-bordered " >
		<div class="alert alert-success alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h5><b>Email Sending</b> Email will be send successfully by filling this form </h5>
		</div>
            <h2 class="bg-warning text-center">Contact Us</h2>

            <tr>
			<td><label>Name :</label></td>
			<td><input id="name" type="text" placeholder="Enter Name"></td>
			</tr>
            <tr>
			<td><label>Email :</label></td>
			<td><input id="email" type="text" placeholder="Enter Email"></td>
			</tr>
            <tr>
			<td><label>Subject :</label></td>
            <td><input id="subject" type="text" placeholder=" Enter Subject"> </td>
			</tr>
            <tr>
			<td><p>Message :</p></td>
			<td><textarea id="body" rows="5" placeholder="Type Message"></textarea></td>
			</tr>
            <tr>
            <td colspan="2" class="text-center">
			<button type="button" class="genric-btn info circle" onclick="sendEmail()" value="Send An Email">Submit</button> </td>
            </div>
            </table></center>
            </form>
            </div>
            </div>
            </div>
            </section>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
<?php include "footer.php"; ?>

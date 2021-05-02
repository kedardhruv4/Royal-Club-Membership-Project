<?php
	include("header.php");
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<FORM NAME="f1" ACTION="forpwd.php" METHOD="post">
<center>
<table class="table table-hover table-bordered ">
<tr class="bg-warning">
<td colspan=2>
<center><h3>Forget Password</h3></center>
</td>
</tr>

<tr>
<td><h6>USER NAME</td></h6>
<td><INPUT TYPE="text" NAME="txtu_name"/></td>
</tr>

<tr>
<td><h6>security question:</td></h6>
<td>
<select name="cmbsecurity_que" size=1>
<option selected value="What Is Your First School Name?">What Is Your First School Name?</option>
<option value="fav movie?">fav movie?</option>
<option value="What Is Your Favourite Food?">What Is Your favourite food?</option>
<option value="What Is Your Favourite Traveling Place?">What Is Your favourite Traveling Place?</option>
<option value="What Is Your Favourite Hobby?">What Is Your Hobby?</option>
</select></td>
</tr>
<tr>
<td><h6>ANSWER:</td></h6>
<td><INPUT TYPE="text" NAME="txtsecurity_ans"/></td>
</tr>
<<tr>
<td colspan=2><center><input class="genric-btn info circle e-large" type="submit" name="btnok"/></center>
</td>
</tr>
</table></center>
</form>
</div>
</div>
</div>
</section>
</body>
</html>


<?php
if(isset($_POST['btnok']))
{
	$u_name=$_POST['txtu_name'];
	$security_que=$_POST['cmbsecurity_que'];
	$security_ans=$_POST['txtsecurity_ans'];
	
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con)or die(mysql_error());
	$sql="select * from member_login where u_name='$u_name' and security_que='$security_que' and security_ans='$security_ans'";
	$cmd=mysql_query($sql,$con)or die(mysql_error());	
	$rset=mysql_fetch_array($cmd);
	$n=mysql_numrows($cmd);
	if($n<=0)
	{
		echo  "invalid...";
		exit();
	}
	else
	{
		echo "<h3>Your Password is:".$rset['u_password'];
	}
}
?>
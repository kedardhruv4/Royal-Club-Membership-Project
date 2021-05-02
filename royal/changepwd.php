<?php
	include("header.php");	
?>
<head>
<style type="text/css">
#customAlert
{
	
	top:0;
	left:0;
	right:0;
	bottom:0;
	z-index:999;
	background-color:rgba(255,255,255,0.75);	
}
#box
{
	border-radius:5px;
	margin-top:10px;
	margin-left:30px;
	height:320px;
	width:1100px;
	text-align:center;
	box-shadow:2px 2px 8px black;
} 
.heading
{
	background-color:#339966;
	color:white;
	font-size:large;
	padding:5px;
}

.content
{
margin-top:30px;	
}

#confirmbtn
{
	height:25px;
	width:80px;
	border-radius:10px;
	background-color:#339966;
	color:white;
	cursor:pointer;
	margin-top:20px;
	margin-left:400px;
}



</Style>
<head>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-1"></div>
<div class="col-md-12">
<FORM NAME="f1" ACTION="changepwd.php" METHOD="post">
<div id="customAlert">
	<div id="box">
		<div class="heading">
			Change PASSWORD 
		</div>
		<div class="content">
			<table class="table table-hover">
				<tr>
				<td><h6>USER NAME :</h6></td>
				<td><h6><?php echo $_SESSION['u_name'];?></h6></td>
				</tr>
				<tr>
				<td><h6>OLD PASSWORD :</h6></td>
				<td><h6><INPUT TYPE="password" NAME="txtu_password"/></h6></td>
				</tr>
				<tr>
				<td><h6>NEW PASSWORD :</h6></td>
				<td><h6><INPUT TYPE="password" NAME="txtn_password"/></h6></td>
				</tr>
				<tr>
				<td><INPUT TYPE="submit" id="confirmbtn" NAME="btnok" VALUe="OK"></td>
				<td><INPUT TYPE="reset" id="confirmbtn" NAME="btncncl" VALUe="cancel"></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
</FORM>
</div>
</div>
</div>
</section>

<?php
if(isset($_POST['btnok']))
{
	$m_id=$_SESSION['m_id'];
	$u_name=$_SESSION['u_name'];
	$u_password=$_POST['txtu_password'];
	$n_password=$_POST['txtn_password'];
	
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con)or die(mysql_error());
	$sql="select * from member_login where u_name='$u_name' and u_password='$u_password'";
	$cmd=mysql_query($sql,$con)or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
	$n=mysql_numrows($cmd);
	if($n<=0)
	{	
		echo "invalid user name or old password....";
		exit();
	}
	else
	{
		$sql1="update member_login set u_name='$u_name',u_password='$n_password' where m_id=$m_id";
		$cmd1=mysql_query($sql1,$con) or die(mysql_error());
		echo "<b>password successfully changed....";
	}	
	}
?>
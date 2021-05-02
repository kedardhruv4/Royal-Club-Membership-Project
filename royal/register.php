        <?php include "header.php"; ?>
		

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select max(m_id)as mm_id from resgister_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());

$num=mysql_numrows($cmd);
	
	if($num==0)
	{
		//for the first record
		$m_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$m_id=$rset['mm_id']+1;
	}
?>
<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Registration form</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Register</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
		<section >
			<div class="container">
				<div class="row">
				<div class="col-sm-2"></div>
					<div class="col-xl-8 text-center">
					<br/>
                      
						<form name="frmreg" action="register.php" method="post">
<center>
<table class="table table-hover table-bordered " >
<tr>
	<td colspan=2 class="bg-warning"><center><h1> MEMBER REGISTRATION</center></h1></td>
</tr>

<tr>
	<td><h6>Name:</h6></td>
	<td><input type="text" name="txtm_name" required /></td>
</tr>

<tr>
	<td><h6> Number Of Child:</h6></td>
	<td><input type="text" name="txtm_child" required /></td>
</tr>

<tr>
	<td><h6>Number Of Adult:</h6></td>
	<td><input type="text" name="txtm_adult" required /></td>
</tr>


<tr>
	<td><h6>Address:</h6></td>
	<td><input type="text" name="txtm_address" required /></td>
</tr>

<tr>
	<td><h6>Mob no.:</h6></td>
	<td><input type="text" name="txtm_contact" required /></td>
</tr>

<tr>
	<td><h6>Email Id:</h6></td>
	<td><input type="text" name="txtm_emailid" required /></td>
</tr>

<tr>
	<td><h6>Sequrity Question:</h6></td>
	<td><input type="text" name="txtsecurity_que"required /></td>
</tr>

<tr>
	<td><h6>Sequrity Answer:</h6></td>
	<td><input type="text" name="txtsecurity_ans" required /></td>
</tr>

	
<tr>
	<td><h6>User name:</h6></td>
	<td><input type="text" name="txtu_name" required /></td>
</tr>
	
<tr>
	<td><h6>Password:</h6></td>
	<td><input type="password" name="txtu_password" required /></td>
</tr>

<tr>
<td><h6>Type of Membership:</h6></td>
<td>

<?php
	//Fill the combo from membership_master_master table for various membership
$sql="select ms_name from membership_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());
?>
<select name="cmbms_name" size=1 class="form-control" required>
<option selected value="select">Select</option>
<?php
while($rset=mysql_fetch_array($cmd))
{
	$val=$rset['ms_name'];
?>
<option value="<?php echo $val; ?>">
<?php echo $val; ?>
</option>
<?php
}
?>

</td>
</tr>



<tr>
	<td><input type="submit" value="SIGN UP" name="btnsub" class="btn btn-success"/></td>
	<td><input type="reset" value="CANCEL" name="btnres" class="btn btn-danger"></td>
</tr>
</table>
</center>
</form>

                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
<?php include "footer.php"; ?>


<?php

if($_POST['btnsub'])
{
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

	$sql="select max(m_id) as mm_id from member_login";

	$cmd=mysql_query($sql,$con);

	$num=mysql_numrows($cmd);
	
	if($num==0)
	{
		$m_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$m_id=$rset['mm_id']+1;
	}
	echo $m_id;

	$m_name=$_POST['txtm_name'];
	$m_address=$_POST['txtm_address'];
	
	$m_contact=$_POST['txtm_contact'];
	$m_emailid=$_POST['txtm_emailid'];
	$m_child=$_POST['txtm_child'];
	$m_adult=$_POST['txtm_adult'];
	$security_que=$_POST['txtsecurity_que'];
	$security_ans=$_POST['txtsecurity_ans'];
	$u_name=$_POST['txtu_name'];
	$u_password=$_POST['txtu_password'];
	$ms_name=$_POST['cmbms_name'];
	
	
	
	$sql="select ms_id from membership_master where ms_name='".$ms_name."'";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
	$ms_id=$rset['ms_id'];
	
	$sql="insert into resgister_master values($m_id,'$m_name',$m_child,$m_adult,'$m_address',$m_contact,'$m_emailid')";

    $cmd=mysql_query($sql,$con) or die(mysql_error());
	
	$sql="insert into member_login values('$u_name','$u_password',$ms_id,$m_id,'$security_que','$security_ans')";

	$cmd=mysql_query($sql,$con) or die(mysql_error());
	
	
	
	
		
	echo "<script>alert('record Inserted successfully');</script>";

	mysql_close($con);

}
?>
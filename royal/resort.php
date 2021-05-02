<?php
include "admin_header.php";

?>
<?php

$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//To generate resort_id automatically,when form loads

$sql="select max(resort_id)as mresort_id from resort_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());
$num=mysql_numrows($cmd);	
	if($num==0)
	{
		//for the first record
		$resort_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$resort_id=$rset['mresort_id']+1;
	}
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<form name="p1" action="resort.php" method="post" ENCTYPE="multipart/form-data">
<center>
<table class="table table-hover table-bordered ">

<tr class="bg-warning">
<td colspan=2>
<center><h3>Inserting New Records</h3></center>
</td>
</tr>
<tr>
<td><h6>Resort ID :</h6></td>
<td><input type="text" name="txtresort_id" readonly="readonly" value="<?php echo $resort_id; ?>"/></td>
</tr>

<tr>
<td><h6>Resort Name :</h6></td>
<td>
<input type="text" name="txtresort_name"/>
</td>
</tr>

<tr>
<td><h6>Resort Contact :</h6></td>
<td>
<input type="text" name="txtresort_contact"/>
</td>
</tr>

<tr>
<td><h6>Resort Image :</h6></td>
<td>
<input type="file" name="flufile"/>
</td>
</tr>

<tr>
<td><h6>Resort Type :</h6></td>
<td>
<?php
	//Fill the combo from resort_type_master table for various resort_type
$sql4="select rt_name from resort_type_master";
$cmd4=mysql_query($sql4,$con) or die(mysql_error());
?>
<select name="cmbrt_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset4=mysql_fetch_array($cmd4))
{
	$val4=$rset4['rt_name'];
?>
<option value="<?php echo $val4; ?>">
<?php echo $val4; ?>
</option>

<?php
}
?>
</select>
</td>
</tr>

<tr>
<td><h6>State Resort :</h6></td>
<td>
<?php
	//Fill the combo from state_master table for various state
$sql5="select s_name from state_master";
$cmd5=mysql_query($sql5,$con) or die(mysql_error());
?>
<select name="cmbs_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset5=mysql_fetch_array($cmd5))
{
	$val5=$rset5['s_name'];
?>
<option value="<?php echo $val5; ?>">
<?php echo $val5; ?>
</option>

<?php
}
?>
</select>
</td>
</tr>

<tr>
<td><h6>Employe of Resort :</h6></td>
<td>
<?php
	//Fill the combo from employe_master table for various employe_name
$sql6="select e_name from employe_master";
$cmd6=mysql_query($sql6,$con) or die(mysql_error());
?>
<select name="cmbe_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset6=mysql_fetch_array($cmd6))
{
	$val6=$rset6['e_name'];
?>
<option value="<?php echo $val6; ?>">
<?php echo $val6; ?>
</option>

<?php
}
?>
</select>
</td>
</tr>

<tr>
<td><h6>Nearest City :</h6></td>
<td>
<input type="text" name="txtn_city"/>
</td>
</tr>

<tr>
<td><h6>Nearest Airport :</h6></td>
<td>
<input type="text" name="txtn_airport"/>
</td>
</tr>

<tr>
<td><h6>Nearest Railway :</h6></td>
<td>
<input type="text" name="txtn_railway"/>
</td>
</tr>
</tr>

<tr>
<td><h6>Resort Description :</h6></td>
<td>
<textarea name="txtr_description" rows="10" cols="30"/></textarea>
</td>
</tr>

<tr>
<td colspan=2><center><input class="btn btn-success"  type="submit" name="btnsubmit"/></center></td>
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
if(isset($_POST['btnsubmit']))
{
	$resort_id=$_POST['txtresort_id'];
	$resort_name=$_POST['txtresort_name'];
	$resort_contact=$_POST['txtresort_contact'];
	$rt_name=$_POST['cmbrt_name'];
	$s_name=$_POST['cmbs_name'];
	$e_name=$_POST['cmbe_name'];
	$n_city=$_POST['txtn_city'];
	$n_airport=$_POST['txtn_airport'];
	$n_railway=$_POST['txtn_railway'];
	$r_description=$_POST['txtr_description'];


//For Storing Resort image as path

	$tpath=$_FILES['flufile']['tmp_name'];
	$apath='resortimage/'.$_FILES['flufile']['name'];
	move_uploaded_file($tpath,$apath);

//Get resort_type id for the particular selected resort_type from combo

	$sql1="select rt_id from resort_type_master where rt_name='".$rt_name."'";
	$cmd1=mysql_query($sql1,$con) or die(mysql_error());
	$rset1=mysql_fetch_array($cmd1);
	$rt_id=$rset1['rt_id'];
	
//Get s_id for the particular selected state from combo

	$sql2="select s_id from state_master where s_name='".$s_name."'";
	$cmd2=mysql_query($sql2,$con) or die(mysql_error());
	$rset2=mysql_fetch_array($cmd2);
	$s_id=$rset2['s_id'];

//Get e_id for the particular selected employee from combo

	$sql3="select e_id from employe_master where e_name='".$e_name."'";
	$cmd3=mysql_query($sql3,$con) or die(mysql_error());
	$rset3=mysql_fetch_array($cmd3);
	$e_id=$rset3['e_id'];

//Executing Insert Query

	$sql="insert into resort_master value($resort_id,'$resort_name',$resort_contact,'$apath','$rt_id','$s_id','$e_id','$n_city','$n_airport','$n_railway','$r_description')";
	$cmd=mysql_query($sql,$con) or die(mysql_error());

	echo"Record Inserted Successfully<br><br>";
	mysql_close($con);
}
?>












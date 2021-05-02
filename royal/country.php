<?php
include "admin_header.php";

?>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select max(c_id)as mc_id from country_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());

$num=mysql_numrows($cmd);
	
	if($num==0)
	{
		//for the first record
		$c_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$c_id=$rset['mc_id']+1;
	}
?>

<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<form name="c1" action="country.php" method="post">
<center>
<table class="table table-hover table-bordered ">

<tr class="bg-warning">
<td colspan=2>
<center><h3>Inserting New Records</h3></center>
</td>
</tr>

<tr>
<td><h6>Country ID :</h6></td>
<td>
<input type="text" name="txtc_id" readonly="readonly" value="<?php echo $c_id; ?>"/>
</td>
</tr>
<br>
<tr>
<td><h6>Country Name :</h6></td>
<td>
<input type="text" name="txtc_name"/>
</td>
</tr>

<tr>
<td><h6>Type of country :</h6></td>
<td>

<?php
	//Fill the combo from trip_master table for various trip
$sql="select t_name from trip_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());
?>
<select name="cmbt_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset=mysql_fetch_array($cmd))
{
	$val=$rset['t_name'];
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
<td colspan="2"><center><input class="genric-btn info circle e-large" type="submit" name="btnsubmit"/></center>
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
if(isset($_POST['btnsubmit']))
{
	$c_id=$_POST['txtc_id'];
	$c_name=$_POST['txtc_name'];
	$t_name=$_POST['cmbt_name'];
	
	//Get  t_name for the particular selected trip from combo

	$sql="select t_id from trip_master where t_name='".$t_name."'";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
	$t_id=$rset['t_id'];
	
//Inserting new category
	
	$sql="insert into country_master values($c_id,'$c_name','$t_id')";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	echo"<br>Record Successfully Inserted...";
	mysql_close($con);
}
?>	

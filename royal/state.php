<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select max(s_id)as ms_id from state_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());

$num=mysql_numrows($cmd);
	
	if($num==0)
	{
		//for the first record
		$s_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$s_id=$rset['ms_id']+1;
	}
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<form name="s1" action="state.php" method="post">
<center>
<table class="table table-hover table-bordered ">

<tr class="bg-warning">
<td colspan=2>
<center><h3>Inserting New Records</h3></center>
</td>
</tr>



<tr>
<td><h6>State ID :</h6></td>
<td>
<input type="text" name="txts_id" readonly="readonly" value="<?php echo $s_id; ?>"/>
</td>
</tr>
<br>
<tr>
<td><h6>State Name :</h6></td>
<td>
<input type="text" name="txts_name"/>
</td>
</tr>

<tr>
<td><h6>State of country :</h6></td>
<td>

<?php
	//Fill the combo from country_master table for various country
$sql="select c_name from country_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());
?>
<select name="cmbc_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset=mysql_fetch_array($cmd))
{
	$val=$rset['c_name'];
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
<td colspan=2><center><input class="btn btn-success" type="submit" name="btnsubmit"/></center>
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
	$s_id=$_POST['txts_id'];
	$s_name=$_POST['txts_name'];
	$c_name=$_POST['cmbc_name'];
	
	//Get  c_name for the particular selected country from combo

	$sql="select c_id from country_master where c_name='".$c_name."'";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
	$c_id=$rset['c_id'];
	
//Inserting new category
	
	$sql="insert into state_master values($s_id,'$s_name','$c_id')";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	echo"<br>Record Successfully Inserted...";
	mysql_close($con);
}
?>	




<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select max(e_id)as me_id from employe_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());

$num=mysql_numrows($cmd);
	
	if($num==0)
	{
		//for the first record
		$e_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$e_id=$rset['me_id']+1;
	}
?>

<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<form name="e1" action="employe.php" method="post">
<center>
<table class="table table-hover table-bordered ">

<tr class="bg-warning">
<td colspan=5>
<center><h3>Inserting New Records</h3></center>
</td>
</tr>
<tr>
<td>Employe ID:</td>
<td>
<input type="text" name="txte_id" readonly="readonly" value="<?php echo $e_id; ?>"/>
</td>
</tr>
<tr>
<td>Employe Name:</td>
<td>
<input type="text" name="txte_name"/>
</td>
</tr>

<tr>
<td>Employe Designation:</td>
<td>
<input type="text" name="txte_designation"/>
</td>
</tr>

<tr>
<td>Employe Contact:</td>
<td>
<input type="text" name="txte_contact"/>
</td>
</tr>

<tr>
<td>Employe Email ID:</td>
<td>
<input type="text" name="txte_emailid"/>
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
	$e_id=$_POST['txte_id'];
	$e_name=$_POST['txte_name'];
	$e_designation=$_POST['txte_designation'];
	$e_contact=$_POST['txte_contact'];
	$e_emailid=$_POST['txte_emailid'];

	
//Inserting new employe
	
	$sql="insert into employe_master values($e_id,'$e_name','$e_designation','$e_contact','$e_emailid')";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	echo"<br>Record Successfully Inserted...";
	mysql_close($con);
}
?>	


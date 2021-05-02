<?php
include "admin_header.php";

?>


<?php
$con=mysql_connect("localhost","root","")or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get data in grid for updating with update hyperlink

	$sql="select * from state_master";
	$cmd=mysql_query($sql,$con) or die(mysql_error());	
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">
<center>
<table class="table table-hover table-bordered " >

<tr class="bg-warning">
<td colspan=5><center>
	<h3>Updating State_master data</center></h3></td>
</tr>
<tr>
<td><h6>State ID</h6></td>
<td><h6>State Name</h6></td>
<td><h6>State of country</h6></td>
<td><h6>Update</h6></td>
<?php
while($rset=mysql_fetch_array($cmd))
{
	echo"<tr>";
	echo"<td>".$rset['s_id']."</td>";
	echo"<td>".$rset['s_name']."</td>";
?>
<?php
$sql1="select c_name from country_master where c_id=".$rset['c_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$c_name=$rset1['c_name'];
echo"<td>".$c_name."</td>";
?>

<td>
	<a class="btn btn-danger" href="updatestate2.php?s_id=<?php echo $rset['s_id'];?>">Update</a>
</td>
<?php
	echo"</tr>";
}
mysql_close($con);	
?>

</table></center>
</form>
</div>
</div>
</div>
</section>
</body>
</html>

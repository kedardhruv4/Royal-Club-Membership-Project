<?php
include "admin_header.php";

?>


<?php

	$con=mysql_connect("localhost","root","")or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get data in grid for updating with update hyperlink

	$sql="select * from country_master";
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
	<h3>Updating Country_master data</center></h3></td>
</tr>
<tr>
<td><h6>Country ID</h6></td>
<td><h6>County Name</h6></td>
<td><h6>Type of country</h6></td>
<td><h6>Update</h6></td>
<?php
while($rset=mysql_fetch_array($cmd))
{
	echo"<tr>";
	echo"<td>".$rset['c_id']."</td>";
	echo"<td>".$rset['c_name']."</td>";
?>
<?php
$sql1="select t_name from trip_master where t_id=".$rset['t_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$t_name=$rset1['t_name'];
echo"<td>".$t_name."</td>";
?>

<td>
	<a class="btn btn-danger" href="updatecountry2.php?c_id=<?php echo $rset['c_id'];?>">Update</a>
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

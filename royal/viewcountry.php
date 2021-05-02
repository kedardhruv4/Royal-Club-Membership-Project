<?php
include "admin_header.php";

?>

<?php

$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from country_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());	
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-2"></div>
<div class="col-md-8">
<center>
<table  class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">Country Data </h2>
</tr>
<tr class="bg-warning">
<td><h6><center>Country ID</center></h6></td>
<td><h6><center>Country Name</center></h6></td>
<td><h6><center>Type of Country</center></h6></td>

<tr>
<?php
while($rset=mysql_fetch_array($cmd))
{

	echo"<tr>";
	echo"<td><h6>".$rset['c_id']."</h6></td>";
?>
	<td>
	<h6><?php echo $rset['c_name']; ?></h6>
	
</td>	
	
<?php
	//Get trip name from category table for particular  t_id,for Displayimg it to user

$sql1="select t_name from trip_master where t_id=".$rset['t_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$t_name=$rset1['t_name'];
echo"<td><h6>".$t_name."</h6></td>";
echo"</tr>";
}

mysql_close($con);

?>
</table></center>
</div>
</div>
</div>
</section>
</body>
</html>

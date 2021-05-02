<?php
include "admin_header.php";

?>
<?php

$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from state_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());	

?>

<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-2"></div>
<div class="col-md-8">
<center>
<table class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">State Data</center></h2></td>
<h3 class="text-right"><a class="btn btn-success" href="state.php"><i class="fa fa-plus "></i>&nbsp Insert</a>
<a class="btn btn-primary" href="updatestate.php"><i class="fa fa-plus "></i>&nbsp Update</a></h3>
</tr>
<tr class="bg-warning">
<td><h6><center>State ID</center></h6></td>
<td><h6><center>State Name</center></h6></td>
<td><h6><center>State of Country</center></h6></td>

<tr>
<?php

while($rset=mysql_fetch_array($cmd))
{

	echo"<tr>";
	echo"<td><h6>".$rset['s_id']."</h6></td>";
?>
	<td>
	<h6><?php echo $rset['s_name']; ?></h6>
	
</td>	
	
<?php
	//Get country name from state_master table for particular  s_id,for Displayimg it to user

$sql1="select c_name from country_master where c_id=".$rset['c_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$c_name=$rset1['c_name'];
echo"<td><h6>".$c_name."</h6></td>";
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


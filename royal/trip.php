<?php
include "admin_header.php";

?>
<?php

$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from trip_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());	

?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-2"></div>
<div class="col-md-8">
	<table class="table table-hover table-bordered " >
	<center>
	<h2 class="text-left alert alert-info">Trip Data</h2>
	<tr class="bg-warning">
		<th><h6><center>Trip ID</center></h6></th>
		<th><h6><center>Trip Name</center></h6></th>
	</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
?>
	<tr>
	<td><h6><?php echo $rset['t_id']; ?></h6></td>
	<td><h6><?php echo $rset['t_name']; ?></h6></td>
	
	</tr>
<?php
}
?>

</table>
</div>
</div>
</div>
</section>
</body>
</html>
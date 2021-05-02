<?php
include "admin_header.php";

?>

<?php

$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from room_master";
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

<h2 class="text-left alert alert-info">Room Data</h2>
<tr class="bg-warning">
<td><h6><center>Trip code</center></h6></td>
<td><h6><center>Trip Name</center></h6></td>

</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
?>
	<tr>
	<td><h6><?php echo $rset['room_code']; ?></h6></td>
	<td><h6><?php echo $rset['room_name']; ?></h6></td>
	
	</tr>
<?php
}
?>
</table></center>
</div>
</div>
</div>
</section>
</body>
</html>
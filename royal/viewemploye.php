<?php
include "admin_header.php";

?>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from employe_master";
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

<h2 class="text-left alert alert-info">Employe Data</center></h2></td>
<h3 class="text-right"><a class="btn btn-success" href="employe.php"><i class="fa fa-plus "></i>&nbsp Insert</a>
<a class="btn btn-primary" href="updateemploye.php"><i class="fa fa-plus "></i>&nbsp Update</a></h3>

</tr>
<tr class="bg-warning">
<td><h6><center>Employe ID</center></h6></td>
<td><h6><center>Employe Name</center></h6></td>
<td><h6><center>Employe Designation</center></h6></td>
<td><h6><center>Employe Contact</center></h6></td>
<td><h6><center>Employe Email ID</center></h6></td>
</tr>

<?php
while($rset=mysql_fetch_array($cmd))
{
?>
	<tr>
	<td><h6><?php echo $rset['e_id']; ?></h6></td>
	<td><h6><?php echo $rset['e_name']; ?></h6></td>
	<td><h6><?php echo $rset['e_designation']; ?></h6></td>
	<td><h6><?php echo $rset['e_contact']; ?></h6></td>
	<td><h6><?php echo $rset['e_emailid']; ?></h6></td>

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
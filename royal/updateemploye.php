<?php
include "admin_header.php";

?>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
//get data in grid for updating with update hyperlink

	$sql="select * from employe_master";
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
<td colspan=6><center>
	<h3>Updating Employe data</center></h3></td>
</tr>
<tr>
<td>Employe ID</td>
<td>Employe Name</td>
<td>Employe Designation</td>
<td>Employe Contact</td>
<td>Employe Email ID</td>
<td>Update</td>
</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
?>
	<tr>
	<td><?php echo $rset['e_id']; ?></td>
	<td><?php echo $rset['e_name']; ?></td>
	<td><?php echo $rset['e_designation']; ?></td>
	<td><?php echo $rset['e_contact']; ?></td>
	<td><?php echo $rset['e_emailid']; ?></td>
	
<td>
	<a class="btn btn-danger" href="updateemploye2.php?e_id=<?php echo $rset['e_id'];?>">Update</a>
</td>
</tr>
<?php
}
?>
</table></center>
</form>
</div>
</div>
</div>
</section>
</body>
</html>

<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get data in grid for updating with update hyperlink

	$sql="select * from resort_master";
	$cmd=mysql_query($sql,$con) or die(mysql_error());	
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-md-6">
<center>
<table class="table table-hover table-bordered " >

<tr class="bg-warning">
<td colspan=12><center>
	<h3>Updating Resort data</center></h3></td>
</tr>
<tr>
<td><h6>Resort ID</h6></td>
<td><h6>Resort Name</h6></td>
<td><h6>Resort Contact</h6></td>
<td><h6>Resort Image</h6></td>
<td><h6>Resort Type</h6></td>
<td><h6>Resort State</h6></td>
<td><h6>Resort Employe</h6></td>
<td><h6>Nearest City</h6></td>
<td><h6>Nearest Airport</h6></td>
<td><h6>Nearest Railway</h6></td>
<td><h6>Resort Description</h6></td>

<td><h6>Update</h6></td>
</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
	echo"<tr>";
	echo"<td>".$rset['resort_id']."</td>";
	echo"<td>".$rset['resort_name']."</td>";
	echo"<td>".$rset['resort_contact']."</td>"

?>
<td>
	<input type='image' name='img1' src='<?php echo $rset['resort_image']; ?>' width=100 height=100/>
</td>
<?php
$sql1="select rt_name from resort_type_master where rt_id=".$rset['rt_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$rt_name=$rset1['rt_name'];
echo"<td>".$rt_name."</td>";
?>

<?php
$sql2="select s_name from state_master where s_id=".$rset['s_id']; 
$cmd2=mysql_query($sql2,$con)or die(mysql_error());
$rset2=mysql_fetch_array($cmd2);
$s_name=$rset2['s_name'];
echo"<td>".$s_name."</td>";
?>

<?php
$sql3="select e_name from employe_master where e_id=".$rset['e_id']; 
$cmd3=mysql_query($sql3,$con)or die(mysql_error());
$rset3=mysql_fetch_array($cmd3);
$e_name=$rset3['e_name'];
echo"<td>".$e_name."</td>";

	echo"<td>".$rset['n_city']."</td>";
	echo"<td>".$rset['n_airport']."</td>";
	echo"<td>".$rset['n_railway']."</td>";
	echo"<td>".$rset['r_description']."</td>";

?>


<td>
	<a class="btn btn-danger" href="updateresort2.php?resort_id=<?php echo $rset['resort_id'];?>">Update</a>
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




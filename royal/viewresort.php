<?php
include "admin_header.php";

?>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from resort_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-md-12">
<center>
<table class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">Resort Data</center></h2></td>
<h3 class="text-right"><a class="btn btn-success" href="resort.php"><i class="fa fa-plus "></i>&nbsp Insert</a>
<a class="btn btn-primary" href="updateresort.php"><i class="fa fa-plus "></i>&nbsp Update</a></h3>

</tr>
<tr class="bg-warning">
<td><h6><center>Resort ID</center></h6></td>
<td><h6><center>Resort Name</center></h6></td>
<td><h6><center>Resort Contact</center></h6></td>
<td><h6><center>Resort Image</center></h6></td>
<td><h6><center>Resort Type</center></h6></td>
<td><h6><center>State of resort</center></h6></td>
<td><h6><center>Employe of resort</center></h6></td>
<td><h6><center>Nearest City</center></h6></td>
<td><h6><center>Nearest Airport</center></h6></td>
<td><h6><center>Nearest Railway</center></h6></td>
<td><h6><center>Resort Description</center></h6></td>

<tr>
<?php
while($rset=mysql_fetch_array($cmd))
{

	echo"<tr>";
	echo"<td><h6>".$rset['resort_id']."</h6></td>";
?>
	<td>
	<h6><?php echo $rset['resort_name']; ?></h6>
	</td>	
	<td>
	<h6><?php echo $rset['resort_contact']; ?></h6>
	</td>
	<td>
	<input type='image' name='img1' src='<?php echo $rset['resort_image']; ?>' width=100 height=100/>
	</td>
	
<?php
	
	//Get Resort_type name from resort_type_master table for particular  rt_id,for Displayimg it to user
$sql1="select rt_name from resort_type_master where rt_id=".$rset['rt_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$rt_name=$rset1['rt_name'];
echo"<td><h6>".$rt_name."</h6></td>";


	//Get state name from state_master table for particular  s_id,for Displayimg it to user
$sql1="select s_name from state_master where s_id=".$rset['s_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$s_name=$rset1['s_name'];
echo"<td><h6>".$s_name."</h6></td>";


	//Get employe name from employe_master table for particular  e_id,for Displayimg it to user
$sql1="select e_name from employe_master where e_id=".$rset['e_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$e_name=$rset1['e_name'];
echo"<td><h6>".$e_name."</h6></td>";


echo"<td><h6>".$rset['n_city']."</h6></td>";
echo"<td><h6>".$rset['n_airport']."</h6></td>";
echo"<td><h6>".$rset['n_railway']."</h6></td>";
echo"<td><h6>".$rset['r_description']."</h6></td>";

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

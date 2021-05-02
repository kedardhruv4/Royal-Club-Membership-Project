<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get data in grid for updating with update hyperlink

	$sql="select * from room_type_master";
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
<td colspan=8><center>
	<h3>Updating Room data</center></h3></td>
</tr>
<tr>
<td><h6>Room ID</h6></td>
<td><h6>Resort Name</h6></td>
<td><h6>Room Code</h6></td>
<td><h6>Capacity</h6></td>
<td><h6>Price</h6></td>
<td><h6>Room Detail</h6></td>
<td><h6>Room Image</h6></td>
<td><h6>Update</h6></td>
</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
	echo"<tr>";
	echo"<td>".$rset['room_id']."</td>";

	//Get resort_name from resort_master table to display from its resort_id
$sql1="select resort_name from resort_master where resort_id=".$rset['resort_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$resort_name=$rset1['resort_name'];
echo"<td>".$resort_name."</td>";

	//Get room_name from room_master table to display from its room_code
$sql2="select room_name from room_master where room_code=".$rset['room_code']; 
$cmd2=mysql_query($sql2,$con)or die(mysql_error());
$rset2=mysql_fetch_array($cmd2);
$room_name=$rset2['room_name'];
echo"<td>".$room_name."</td>";

echo"<td>".$rset['capacity']."</td>";
echo"<td>".$rset['price']."</td>";
echo"<td>".$rset['room_detail']."</td>";

?>

<td>
	<input type='image' name='img1' src='<?php echo $rset['room_image']; ?>' width=100 height=100/>
</td>

<td>
	<a class="btn btn-danger" href="updateroom2.php?room_id=<?php echo $rset['room_id'];?>">Update</a>
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

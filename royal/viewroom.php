<?php
include "admin_header.php";

?>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from room_type_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());	
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-1"></div>
<div class="col-md-10">
<center>
<table class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">Room Data</center></h2></td>
<h3 class="text-right"><a class="btn btn-success" href="room1.php"><i class="fa fa-plus "></i>&nbsp Insert</a>
<a class="btn btn-primary" href="updateroom.php"><i class="fa fa-plus "></i>&nbsp Update</a></h3>

</tr>
<tr class="bg-warning">
<td><h6><center>Room ID</center></h6></td>
<td><h6><center>Resort Name</center></h6></td>
<td><h6><center>Room Code</center></h6></td>
<td><h6><center>Capacity of Room</center></h6></td>
<td><h6><center>Price</center></h6></td>
<td><h6><center>Room Detail</center></h6></td>
<td><h6><center>Resort Image</center></h6></td>

<tr>
<?php
while($rset=mysql_fetch_array($cmd))
{

	echo"<tr>";
	echo"<td><h6>".$rset['room_id']."</h6></td>";
	
	//Get Resort name from resort_master table for particular  resort_id,for Displayimg it to user
$sql1="select resort_name from resort_master where resort_id=".$rset['resort_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$resort_name=$rset1['resort_name'];
echo"<td><h6>".$resort_name."</h6></td>";

//Get room name from room_master table for particular  room_code,for Displayimg it to user
$sql2="select room_name from room_master where room_code=".$rset['room_code']; 
$cmd2=mysql_query($sql2,$con)or die(mysql_error());
$rset2=mysql_fetch_array($cmd2);
$room_name=$rset2['room_name'];
echo"<td><h6>".$room_name."</h6></td>";
?>
	<td>
	<h6><?php echo $rset['capacity']; ?></h6>
	</td>	
	<td>
	<h6><?php echo $rset['price']; ?></h6>
	</td>
	<td>
	<h6><?php echo $rset['room_detail']; ?></h6>
	</td>
	<td>
	<input type='image' name='img1' src='<?php echo $rset['room_image']; ?>' width=120 height=100/>
	</td>
	
<?php
	
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

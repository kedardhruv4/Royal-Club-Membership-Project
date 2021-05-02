<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get room_id from previous page using query string

	$room_id=$_GET['room_id'];

//get all data of particular room_id for updation
 
	$sql="select * from room_type_master where room_id=$room_id";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">
<form name="form_update" action="updateroom3.php" method="post" ENCTYPE="multipart/form-data">
<center>
<table class="table table-hover table-bordered " cellpadding="60%" cellspacing="60%">

<tr class="bg-warning">
<td colspan="3"><center><h3>Updating Room Data</h3></center></td>
</tr>
<tr>
	<td><h6>Capacity :</h6></td>
	<td colspan="2">
	<input type="hidden" name="hdroom_id" value="<?php echo $room_id; ?>"/>
	<input type="text" name="txtcapacity" value="<?php echo $rset['capacity']; ?>"/>
	</td>
</tr>
<tr>
	<td><h6>Price :</h6></td>
	<td colspan="2">
	<input type="text" name="txtprice" value="<?php echo $rset['price']; ?>"/>
	</td>
</tr>
<tr>
	<td><h6>Room detail :</h6></td>
	<td colspan="2">
	<input type="text" name="txtroom_detail" value="<?php echo $rset['room_detail']; ?>"/>
	</td>
</tr>
<tr>
	<td><h6>Room Image :</h6><td>
	<td>
	<input type="file" name="flufile"/>
	<input type='image' name='img1' src='<?php echo $rset['room_image']; ?>' width=100 height=100/>
	</td>
</tr>
<tr>
<td colspan="3">
<center><input class="btn btn-success" type="submit" name="btnupdate" value="UPDATE"/></center>
</td>
</tr>
</table></center>
</form>
</div>
</div>
</div>
</section>
</body>
</html>

<?php
mysql_close($con);
?>


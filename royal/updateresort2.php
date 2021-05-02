<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get resort_id from previous page using query string

	$resort_id=$_GET['resort_id'];

//get all data of particular resort_id for updation
 
	$sql="select * from resort_master where resort_id=$resort_id";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
?>
<section >
<br><br><br><br>1
<div class="container">				
<div class="row">
<div class="col-md-6">
<form name="form_update" action="updateresort3.php" method="post" ENCTYPE="multipart/form-data">
<center>
<table class="table table-hover table-bordered " >

<tr class="bg-warning">
<td colspan=7><center><h3>Updating Resort Data</h3></center></td>
</tr>
<tr>
	<td><h6>Resort Name</h6></td>
	<td><h6>Resort Contact</h6></td>
	<td><h6>Resort Image</h6></td>
	<td><h6>Nearest City</h6></td>
	<td><h6>Nerest Airport</h6></td>
	<td><h6>Nearest Railway</h6></td>
	<td><h6>Resort Description</h6></td>

</tr>
<tr>
	<td>
	<input type="hidden" name="hdresort_id" value="<?php echo $resort_id; ?>"/>
	<input type="text" name="txtresort_name" value="<?php echo $rset['resort_name']; ?>"/>
	</td>
	<td>
	<input type="text" name="txtresort_contact" value="<?php echo $rset['resort_contact']; ?>"/>
	</td>

	<td>
	<input type="file" name="flufile"/>
	<input type='image' name='img1' src='<?php echo $rset['resort_image']; ?>' width=100 height=100/>
	</td>
	
	<td>
	<input type="text" name="txtn_city" value="<?php echo $rset['n_city']; ?>"/>
	</td>
	
	<td>
	<input type="text" name="txtn_airport" value="<?php echo $rset['n_airport']; ?>"/>
	</td>
	
	<td>
	<input type="text" name="txtn_railway" value="<?php echo $rset['n_railway']; ?>"/>
	</td>
	
	<td>
	<input type="text" name="txtr_description" value="<?php echo $rset['r_description']; ?>"/>
	</td>
	
</tr>
<tr>
<td colspan="7">
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

<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get c_id from previous page using query string

	$c_id=$_GET['c_id'];

//get all data of particular c_id for updation
 
	$sql="select * from country_master where c_id=$c_id";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">
<form name="form_update" action="updatecountry3.php" method="post" >
<center>
<table class="table table-hover table-bordered " >

<tr class="bg-warning">
<td colspan=2><center><h3>Updating Country Data</h3></center></td>
</tr>
<tr>
	<td><h6>Country Name :</h6></td>

	<td>
	<input type="hidden" name="hdc_id" value="<?php echo $c_id; ?>"/>
	<input type="text" name="txtc_name" value="<?php echo $rset['c_name']; ?>"/>
	</td>
</tr>
<tr>
<td colspan=2>
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

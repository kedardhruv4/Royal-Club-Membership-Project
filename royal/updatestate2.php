<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get s_id from previous page using query string

	$s_id=$_GET['s_id'];

//get all data of particular s_id for updation
 
	$sql="select * from state_master where s_id=$s_id";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
?>

<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">
<form name="form_update" action="updatestate3.php" method="post" >
<center>
<table class="table table-hover table-bordered " >

<tr class="bg-warning">
<td colspan=2><center><h3>Updating State Data</h3></center></td>
</tr>
<tr>
<td><h6>State Name :</h6></td>
	<td>
	<input type="hidden" name="hds_id" value="<?php echo $s_id; ?>"/>
	<input type="text" name="txts_name" value="<?php echo $rset['s_name']; ?>"/>
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

<?php
mysql_close($con);
?>



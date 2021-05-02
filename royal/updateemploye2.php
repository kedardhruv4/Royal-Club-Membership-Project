<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//get e_id from previous page using query string

	$e_id=$_GET['e_id'];

//get employe data of particular e_id
 
	$sql="select * from employe_master where e_id=$e_id";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	$rset=mysql_fetch_array($cmd);
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">
<form name="form_update" action="updateemploye3.php" method="post">	
<center>
<table class="table table-hover table-bordered " >

<tr class="bg-warning">
<td colspan=2><center><h3>Updating employe Data</h3></center></td>
</tr>
<tr>
	<td>Employe Name :</td>
	<td>
	<input type="hidden" name="hde_id" value="<?php echo $e_id; ?>"/>
	<input type="text" name="txte_name" value="<?php echo $rset['e_name']; ?>"/>
	</td>
</tr>
<tr>
	<td>Employe Designation :</td>
	<td>
	<input type="text" name="txte_designation" value="<?php echo $rset['e_designation']; ?>"/>
	</td>
</tr>
<tr>
	<td>Employe Contact :</td>
	<td>
	<input type="text" name="txte_contact" value="<?php echo $rset['e_contact']; ?>"/>
	</td>
</tr>
<tr>
	<td>Employe Email ID :</td>
	<td>
	<input type="text" name="txte_emailid" value="<?php echo $rset['e_emailid']; ?>"/>
	</td>	
</tr>
<tr>
<td colspan="5">
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

<?php 
include "admin_header.php";
?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<form name="dateorder" action="dateorder.php" method="post">
<center>
<table class="table table-hover table-bordered ">

<tr class="bg-warning">
<td colspan=2>
<center><h3>Date Wise Order Records</h3></center>
</td>
</tr>

<tr>
<td>From Date :</td>
<td>
<input type="date" name="txtcheckin_date"/>
</td>
</tr>

<tr>
<td>To Date :</td>
<td>
<input type="date" name="txtt_date"/>
</td>
</tr>

<tr>
<td colspan=2><center><input class="genric-btn info circle e-large" type="submit" name="btnsubmit"/></center>
</td>
</tr>
</table></center>
</form>
</div>
</div>
</div>
</section>
<?php
if(isset($_POST['btnsubmit']))
{
	$fdate=$_POST['txtcheckin_date'];
	$tdate=$_POST['txtt_date'];
	
	//View order Data for Particular dates
	
	$sql="select * from res where checkin_date between '$fdate' and '$tdate'";
	$cmd=mysql_query($sql,$con) or die(mysql_error());
	
	$n=mysql_numrows($cmd);
	if($n!=0);
	{
	?>
	<section >
	<br><br><br><br>
	<div class="container">				
	<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-md-8">
	<center>
	<table  class="table table-hover table-bordered " >

	<h2 class="text-left alert alert-info">Bookings Dates </h2>
	<tr class="bg-warning">
		<td><h6><center>Booking ID</center></h6></td>
		<td><h6><center>Checkin_date</center></h6></td>
		<td><h6><center>Username</center></h6></td>
		<td><h6><center>Total Cost</center></h6></td>
	</tr>
	<?php
	while($rset=mysql_fetch_array($cmd))
	{
	?>
	<tr>
		<td><h6><center><?php echo $rset['id']; ?></center></h6></td>
		<?php 
			//Date Formatting
			$d=date('d-m-Y',strtotime($rset['checkin_date']));
		?>
		<td><h6><center><?php echo $d; ?></center></h6></td>
		<td><h6><center><?php echo $rset['username']; ?></center></h6></td>
		<td><h6><center><?php echo $rset['amount']; ?></center></h6></td>
	</tr>
	<?php
	}
	?>
	</table></center>
	</div>
	</div>
	</div>
	</section>
	</body>
	</html>
	<?php
	}
	//T_ELSE
	//{
		//echo "<h2>No Order Found</h2>";
	//}
	mysql_close($con);
}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
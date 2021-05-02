<?php
include "admin_header.php";

?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
$sql="select * from res";
$cmd=mysql_query($sql,$con) or die(mysql_error());	
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-2"></div>
<div class="col-md-8">
<center>
<table class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">Booking Order Data</h2>
<tr class="bg-warning">
<td><h6>ID</h6></td>
<td><h6>Resort ID</h6></td>
<td><h6>Room ID</h6></td>
<td><h6>Username</h6></td>
<td style="min-width:100px;"><h6>Checkin Date</h6></td>
<td style="min-width:100px;"><h6>Checkout Date</h6></td>
<td><h6>No. of Rooms</td>
<td><h6>Amount</td>
<!-- <td>Details</td> -->
</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
?>
<tr>
<td><h6><?php echo $rset['id']; ?></h6></td>
<td><h6><?php echo $rset['resort_id']; ?></h6></td>
<td><h6><?php echo $rset['room_id']; ?></h6></td>
<td><h6><?php echo $rset['username']; ?></h6></td>

<?php
//Date Formatting when Display the Date on Grid
$d=date('d-m-Y',strtotime($rset['checkin_date']));
?>
<td><h6><?php echo $d; ?></h6></td>

<?php
//Date Formatting when Display the Date on Grid
$do=date('d-m-Y',strtotime($rset['checkout_date']));
?>
<td><h6><?php echo $do; ?></h6></td>

<td><h6><?php echo $rset['no_of_room']; ?></h6></td>
<td><h6><?php echo $rset['amount']; ?></h6></td>

<!-- Give hyperlink foe detail order information and pass order id as query string -->
<!-- <td><a class="btn btn-danger" href="vieworderdetail.php?id=<?php //echo $rset['id']; ?>" >Order Detail </a></td> -->
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















































<?php
include "header.php";
?>
<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Bookings</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">My Booking</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//$_SESSION['u_name']=$_GET['u_name'];
$u_name=$_SESSION['u_name'];


$sql="select * from res where username='$u_name'";
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

<h2 class="text-left alert alert-info">Booking Details</h2>
<h3 class="text-left"><a class="btn btn-success" href="generateuserpdf.php"><i class="fa fa-plus "></i>&nbsp Download PDF</a></h3>

<tr class="bg-warning">
<td>ID</td>
<td>Resort ID</td>
<td>Room ID</td>
<td>Username</td>
<td style="min-width:100px;">Checkin Date</td>
<td style="min-width:100px;">checkout Date</td>
<td>Numbers of Rooms</td>
<td>Amount</td>
<!-- <td>Details</td> -->
</tr>
<?php
while($rset=mysql_fetch_array($cmd))
{
?>
<tr>
<td><?php echo $rset['id']; ?> </td>
<td><?php echo $rset['resort_id']; ?></td>
<td><?php echo $rset['room_id']; ?></td>
<td><?php echo $rset['username']; ?></td>

<?php
//Date Formatting when Display the Date on Grid
$d=date('d-m-Y',strtotime($rset['checkin_date']));
?>
<td><?php echo $d; ?></td>

<?php
//Date Formatting when Display the Date on Grid
$do=date('d-m-Y',strtotime($rset['checkout_date']));
?>
<td><?php echo $do; ?></td>

<td><?php echo $rset['no_of_room']; ?></td>
<td><?php echo $rset['amount']; ?></td>

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

<?php
include "footer.php";
?>













































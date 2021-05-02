<?php
include "admin_header.php";
?>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="select * from resgister_master a,member_login b where a.m_id=b.m_id";
$cmd=mysql_query($sql,$con) or die(mysql_error());	
?>
<html>
<body>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-md-12">
<center>
<table  class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">Customer Data </h2>
<tr class="bg-warning">
<td><h6><center>Customer ID</center></h6></td>
<td><h6><center>Customer Name</center></h6></td>
<td><h6><center>Customer Username</center></h6></td>
<td><h6><center>Customer Password</center></h6></td>
<td><h6><center>Customer Membership</center></h6></td>
<td><h6><center>No. of Child</center></h6></td>
<td><h6><center>No. of Adults</center></h6></td>
<td><h6><center>Address</center></h6></td>
<td><h6><center>Contact</center></h6></td>
<td><h6><center>Email ID</center></h6></td>
<td><h6><center>Security Question</center></h6></td>
<td><h6><center>Security Answer</center></h6></td>
<tr>
<?php
while($rset=mysql_fetch_array($cmd))
{

	echo"<tr>";
	echo"<td><h6>".$rset['m_id']."</h6></td>";
	echo"<td><h6>".$rset['m_name']."</h6></td>";
	echo"<td><h6>".$rset['u_name']."</h6></td>";
	echo"<td><h6>".$rset['u_password']."</h6></td>";
	//Get Membership name from membership_master table for particular  ms_id,for Displayimg it to user

$sql1="select ms_name from membership_master where ms_id=".$rset['ms_id']; 
$cmd1=mysql_query($sql1,$con)or die(mysql_error());
$rset1=mysql_fetch_array($cmd1);
$ms_name=$rset1['ms_name'];
echo"<td><h6>".$ms_name."</h6></td>";

	echo"<td><h6>".$rset['m_child']."</h6></td>";
	echo"<td><h6>".$rset['m_adult']."</h6></td>";
	echo"<td><h6>".$rset['m_address']."</h6></td>";
	echo"<td><h6>".$rset['m_contact']."</h6></td>";
	echo"<td><h6>".$rset['m_emailid']."</h6></td>";
	echo"<td><h6>".$rset['security_que']."</h6></td>";
	echo"<td><h6>".$rset['security_ans']."</h6></td>";
	echo "</tr>";
}
?>
</table></center>
</div>
</div>
</div>
</section>
</body>
</html>













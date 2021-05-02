<?php

include("header.php");

?>
<?php
$con=mysql_connect("localhost","root","");
$sdb=mysql_select_db("club_database",$con);
$m_id=$_SESSION['m_id'];

$sql="select * from resgister_master where m_id=$m_id";
$cmd=mysql_query($sql,$con);
$rset=mysql_fetch_array($cmd);
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-2"></div>
<div class="col-md-8">
<center>
<table  class="table table-hover table-bordered " >

<h2 class="text-left alert alert-info">User Profile</center></h2>
<tr>
<td><h6>Member Name : </h6></td>
<td><h6><?php echo $rset['m_name']; ?></h6></td>
</tr>

<tr>
<td><h6>Member Address : </h6></td>
<td><h6><?php echo $rset['m_address']; ?></h6></td>
</tr>

<tr>
<td><h6>Member Mob no : </h6></td>
<td><h6><?php echo $rset['m_contact']; ?></h6></td>
</tr>
<tr>
	<td colspan="1"><h2 class="text-left"><a class="btn btn-primary" href="changepwd.php">&nbsp Change Password</a></h2></td>
	<td colspan="1"><h2 class="text-right"><a class="btn btn-success" href="changenumber.php">&nbsp Number Verity</a></h2></td>
</tr>
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










<?php
$s_name=$_POST['txts_name'];
$s_id=$_POST['hds_id'];

//Executing update query
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
$sql="update state_master set s_name='$s_name' where s_id=$s_id";
$cmd=mysql_query($sql,$con) or die(mysql_error());
header("location:updatestate.php");
mysql_close($con);
?>


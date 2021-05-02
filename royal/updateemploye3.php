<?php
$e_name=$_POST['txte_name'];
$e_designation=$_POST['txte_designation'];
$e_contact=$_POST['txte_contact'];
$e_emailid=$_POST['txte_emailid'];
$e_id=$_POST['hde_id'];

$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

$sql="update employe_master set e_name='$e_name',e_designation='$e_designation',e_contact='$e_contact',e_emailid='$e_emailid' where e_id=$e_id";
$cmd=mysql_query($sql,$con) or die(mysql_error());
header("location:updateemploye.php");
mysql_close($con);
?>


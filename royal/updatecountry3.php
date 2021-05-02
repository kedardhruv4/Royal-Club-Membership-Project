<?php
$c_name=$_POST['txtc_name'];
$c_id=$_POST['hdc_id'];

//Executing update query
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
$sql="update country_master set c_name='$c_name' where c_id=$c_id";
$cmd=mysql_query($sql,$con) or die(mysql_error());
header("location:updatecountry.php");
mysql_close($con);
?>


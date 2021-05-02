<?php
$resort_name=$_POST['txtresort_name'];
$resort_contact=$_POST['txtresort_contact'];
$n_city=$_POST['txtn_city'];
$n_airport=$_POST['txtn_airport'];
$n_railway=$_POST['txtn_railway'];
$r_description=$_POST['txtr_description'];

$resort_id=$_POST['hdresort_id'];

//For getting image path

$tpath=$_FILES['flufile']['tmp_name'];
$apath='resortimage/'.$_FILES['flufile']['name'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
move_uploaded_file($tpath,$apath);

//Executing update query

$sql="update resort_master set resort_name='$resort_name',resort_contact='$resort_contact',resort_image='$apath',n_city='$n_city',n_airport='$n_airport',n_railway='$n_railway',r_description='$r_description' where resort_id=$resort_id";
$cmd=mysql_query($sql,$con) or die(mysql_error());
header("location:updateresort.php");
mysql_close($con);
?>


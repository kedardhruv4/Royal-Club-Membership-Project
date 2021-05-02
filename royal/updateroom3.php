<?php
$capacity=$_POST['txtcapacity'];
$price=$_POST['txtprice'];
$room_detail=$_POST['txtroom_detail'];

$room_id=$_POST['hdroom_id'];

//For getting image path

$tpath=$_FILES['flufile']['tmp_name'];
$apath='roomimage/'.$_FILES['flufile']['name'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
move_uploaded_file($tpath,$apath);

//Executing update query

$sql="update room_type_master set capacity='$capacity',price='$price',room_detail='$room_detail',room_image='$apath' where room_id=$room_id";
$cmd=mysql_query($sql,$con) or die(mysql_error());
header("location:updateroom.php");
mysql_close($con);
?>


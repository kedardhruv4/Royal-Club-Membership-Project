<?php
include "admin_header.php";

?>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

//To generate room_id automatically,when form loads

$sql="select max(room_id)as mroom_id from room_type_master";
$cmd=mysql_query($sql,$con) or die(mysql_error());
$num=mysql_numrows($cmd);	
	if($num==0)
	{
		//for the first record
		$room_id=1;
	}
	else
	{
		$rset=mysql_fetch_array($cmd);
		$room_id=$rset['mroom_id']+1;
	}
?>
<section >
<br><br><br><br>
<div class="container">				
<div class="row">
<div class="col-sm-3"></div>
<div class="col-md-6">

<form name="r1" action="room1.php" method="post" ENCTYPE="multipart/form-data">
<center>
<table class="table table-hover table-bordered ">

<tr class="bg-warning">
<td colspan=2>
<center><h3>Inserting New Records</h3></center>
</td>
</tr>

<tr>
<td><h6>Room ID</h6></td>
<td><input type="text" name="txtroom_id" readonly="readonly" value="<?php echo $room_id; ?>"/></td>
</tr>

<tr>
<td><h6>Resort Name :</h6></td>
<td>
<?php
	//Fill the combo from resort_master table for various resort
$sql1="select resort_name from resort_master";
$cmd1=mysql_query($sql1,$con) or die(mysql_error());
?>
<select name="cmbresort_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset1=mysql_fetch_array($cmd1))
{
	$val1=$rset1['resort_name'];
?>
<option value="<?php echo $val1; ?>">
<?php echo $val1; ?>
</option>
<?php
}
?>
</select>
</td>
</tr>

<tr>
<td><h6>Room Code :</h6></td>
<td>
<?php
	//Fill the combo from room_master table for various room
$sql2="select room_name from room_master";
$cmd2=mysql_query($sql2,$con) or die(mysql_error());
?>
<select name="cmbroom_name" size=1>
<option selected value="select">Select</option>
<?php
while($rset2=mysql_fetch_array($cmd2))
{
	$val2=$rset2['room_name'];
?>
<option value="<?php echo $val2; ?>">
<?php echo $val2; ?>
</option>
<?php
}
?>
</select>
</td>
</tr>

<br>
<br>

<tr>
<td><h6>Room Capacity :</h6></td>
<td>
<input type="text" name="txtcapacity"/>
</td>
</tr>

<br>
<br>

<tr>
<td><h6>Room Price :</h6></td>
<td>
<input type="text" name="txtprice"/>
</td>
</tr>

<br>
<br>

<tr>
<td><h6>Room Detail :</h6></td>
<td>
<input type="text" name="txtroom_detail"/>
</td>
</tr>

<br>
<br>

<tr>
<td><h6>Room Image:</h6></td>
<td>
<input type="file" name="flufile"/>
</td>
</tr>

<br>
<br>

<tr>
<td colspan=2><center><input class="btn btn-success" type="submit" name="btnsubmit"/></center>
</td>
</tr>
</table></center>
</form>
</div>
</div>
</div>
</section>
</body>
</html>
<?php
if(isset($_POST['btnsubmit']))
{
	$room_id=$_POST['txtroom_id'];
	$resort_name=$_POST['cmbresort_name'];
	$room_name=$_POST['cmbroom_name'];

	$capacity=$_POST['txtcapacity'];
	$price=$_POST['txtprice'];
	$room_detail=$_POST['txtroom_detail'];



//For Storing room_image as path

	$tpath=$_FILES['flufile']['tmp_name'];
	$apath='roomimage/'.$_FILES['flufile']['name'];
	move_uploaded_file($tpath,$apath);

//Get resort_id for the particular selected resort from combo

	$sql3="select resort_id from resort_master where resort_name='".$resort_name."'";
	$cmd3=mysql_query($sql3,$con) or die(mysql_error());
	$rset3=mysql_fetch_array($cmd3);
	$resort_id=$rset3['resort_id'];
	
//Get room_code for the particular selected room from combo

	$sql4="select room_code from room_master where room_name='".$room_name."'";
	$cmd4=mysql_query($sql4,$con) or die(mysql_error());
	$rset4=mysql_fetch_array($cmd4);
	$room_code=$rset4['room_code'];

//Executing Insert Query

	$sql5="insert into room_type_master value($room_id,'$resort_id','$room_code',$capacity,$price,'$room_detail','$apath')";
	$cmd5=mysql_query($sql5,$con) or die(mysql_error());

	echo"Record Inserted Successfully<br><br>";
	mysql_close($con);
}
?>


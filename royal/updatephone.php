<?php
session_start();
$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con)or die(mysql_error());
	
	$newphone=$_SESSION['newphone'];
	$oldphone=	$_SESSION['oldphone'];
	$m_id=$_SESSION['m_id'];
if(isset($_GET['chgphone']))
{
$sql1="update resgister_master set m_contact='$newphone' where m_id=$m_id";
		$cmd1=mysql_query($sql1,$con) or die(mysql_error());
		echo "<b>password successfully changed....";
		header("location:register.php");
	}	
}
?>
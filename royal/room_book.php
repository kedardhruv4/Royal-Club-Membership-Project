
<?php include "header.php"; ?> 
  
<?php 
if(isset($_SESSION['login']))
{
	
if(isset($_GET['resort_id']))
{	
	$_SESSION['resortid']=$_GET['resort_id'];
	$_SESSION['roomid']=$_GET['room_id'];
}
$resortid=$_SESSION['resortid'];
$roomid=$_SESSION['roomid'];
?>

<?php 
	$con1=mysql_connect("localhost","root","") or die (mysql_error());
	$sdb=mysql_select_db("club_database",$con1) or die(mysql_error());
	
	if(isset($_POST['sub']))
	{
		$username=$_SESSION['u_name'];
		$resortid=$_SESSION['resortid'];
		$roomid=$_SESSION['roomid'];
		//$roomtype=$_POST['field_1'];
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
		$room_nos=$_POST['room_nos'];
		$amount=$_POST['roomprice'];
		
		$sql1 = "INSERT INTO res VALUES('','$resortid','$roomid','$username','$startdate','$enddate','$room_nos',$amount)";
		$c2=mysql_query($sql1,$con1) or die(mysql_error());
		echo "<script> alert('room book successfully, will contact you soon...'); window.location='index.php'; </script>";
		
		
		//check name is set
    if($room_nos ==''){
        $error[] = 'Number of Room is required';
    }

   //if no errors carry on
    if(!isset($error)){

        //create html of the data
        ob_start();
        ?>
		<h1>Data from form</h1>
		<p>Username : <?php echo $username;?></p>
        <p>Checkin Date : <?php echo $startdate;?></p>
		<p>Checkout Date: <?php echo $enddate;?></p>
		<p>Number of Room : <?php echo $room_nos;?></p>
		<p>Total Amount : <?php echo $amount;?></p>

		<?php
			$body = ob_get_clean();

			$body = iconv("UTF-8","UTF-8//IGNORE",$body);

			include("mpdf/mpdf.php");
			$mpdf=new \mPDF('c','A4','','' , 12, 13, 12, 13, 13, 12); 

			//write html to PDF
			$mpdf->WriteHTML($body);
	 
			//output pdf
			$mpdf->Output('demo.pdf','F');

			//save to server
			//$mpdf->Output("mydata.pdf",'F');

		
	}
		
}
		//if their are errors display them
		if(isset($error)){
			foreach($error as $error){
				echo "<p style='color:#ff0000'>$error</p>";
			}
		}

?>     
		<html>
		<body>
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Accomodation</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Accomodation</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area">
            <div class="container">
			<div class="section-top-border">
						<?php
							$con=mysql_connect("localhost","root","") or die(mysql_error());
							$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
							$sql="select * from resort_master where resort_id=$resortid";
							$cmd=mysql_query($sql,$con);
							$sql1="select * from room_type_master where room_id=$roomid";
							$cmd1=mysql_query($sql1,$con);
							$rset=mysql_fetch_array($cmd);
							$rset1=mysql_fetch_array($cmd1);
						?>
						<h3 class="mb-30 title_color">resort</h3>
						<div class="row">
							<div class="col-md-3">
								<img src="<?php echo $rset1['room_image']; ?>" alt="" class="img-fluid">
							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
								<p>resort: <?php echo $rset['resort_name']; ?></p>
								<p><?php echo $rset1['room_detail']; ?></p>
								
								<span id="a1" > <?php echo $rset1['price']; ?> </span>
							</div>
						</div>
					</div>
					
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
		<!--================Booking Tabel Area =================-->
        <section class="hotel_booking_area">
            <div class="container">
                <div class="row hotel_booking_table">
                    <div class="col-md-3">
                        <h2>Book<br> Your Room</h2>
                    </div>
					<form action='' method="POST">
                    <div class="col-md-9">
                        <div class="boking_table">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker11'>
                                                <input type='text' name="startdate" class="form-control" placeholder="Arrival Date"/ required>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' name="enddate" class="form-control" placeholder="Departure Date"/ required>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="input-group">
											<p>no of guest:</p>
.                                            <input name="guest" class="form-control" type="text "/ required>
                                        </div>
                                        <div class="input-group">
										<p>no of rooms:</p>
                                            <input name="room_nos" class="form-control" id="room_nos" type="text " onChange="gettotal1()"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="roomprice" id="total1" readonly="" />
                                        </div>
                                        <button type="submit" name="sub" class="book_now_btn button_hover" href="#">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
            </div>
        </section>
        <!--================Booking Tabel Area  =================-->
        </body>
		</html>
		
        <br/><br>

<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
 var strUser=document.getElementById('a1').innerHTML=strUser;

}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
   }

</script>

<?php 

 include "footer.php";
 }
else
{
	echo "<script> alert('Please Login...'); window.location='login.php'; </script>";
	//echo "yet not logged in <a href='login.php'>login</a>";
}

 ?>

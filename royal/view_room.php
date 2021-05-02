<?php if(isset($_GET['resort_id']))
{	
	$resortid=$_GET['resort_id'];
	}
?>
<?php include "header.php"; ?>        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Accomodation</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
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
							$sql1="select * from room_type_master where resort_id=$resortid";
							$cmd1=mysql_query($sql1,$con);
							$rset=mysql_fetch_array($cmd);
							
						?>
						<h2 class="bg-warning text-center">RESORT</h2>
						<div class="row">
								<table class="table table-hover table-bordered ">
							<div class="col-md-3">
								<tr><td colspan="2"><img src="<?php echo $rset['resort_image']; ?>" alt="Resort Image" width="500px" height="500px" class="img-fluid"></td>
							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
								
								<tr>
								<td>Name : <?php echo $rset['resort_name']; ?></td>
								</tr>
								<tr>
								<td>Contact : <?php echo $rset['resort_contact']; ?></td>
								</tr>
								<tr>
								<td>City : <?php echo $rset['n_city']; ?></td>
								</tr>
			
								<tr>
								<td>About : <?php echo $rset['r_description']; ?></td>
								</tr>
							</tr>
							</div>
								</table>
						</div>
					</div>
					
                <div class="section_title text-center">
                    <h2 class="title_color">Special Accomodation</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,</p>
                </div>
                <div class="row mb_30">
                    <?php
				while($rset1 = mysql_fetch_array($cmd1))
			{
			?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="<?php echo $rset1['room_image']; ?>" width="300px" height="200px" alt="">
                                <a href="room_book.php?resort_id=<?php echo $rset1['resort_id']; ?>&room_id=<?php echo $rset1['room_id']; ?>" class="btn theme_btn button_hover">Book now</a>
                            </div>
                            <h4 class="sec_h4"><?php echo $rset1['room_detail']; ?></h4>
                        </div>
                    </div>
			<?php } ?>
                    
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
		
        <br/><br>
        <?php include "footer.php"; ?>
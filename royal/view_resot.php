<?php include "header.php"; ?>
<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Resort</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Resort</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
      
		<?php		
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());
	$sql1="select * from resort_master";
	$cmd1=mysql_query($sql1,$con) or die(mysql_error());	
		?>
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Hotel Accomodation</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
                </div>
                <div class="row mb_30">
				<?php
				while($rset1 = mysql_fetch_array($cmd1))
			{
			?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="<?php echo $rset1['resort_image']; ?>" width="300px" height="200px" alt="">
                                <a href="view_room.php?resort_id=<?php echo $rset1['resort_id']; ?>" class="btn theme_btn button_hover">Select</a>
                            </div>
                            <h4 class="sec_h4"><?php echo $rset1['resort_name']; ?></h4>
                        </div>
                    </div>
<?php } ?>
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
        
        
       <?php include "footer.php"; ?>


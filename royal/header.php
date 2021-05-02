<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Royal Club</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="image/logo1.jfif" alt="Royal Club LOGO"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            
							 <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-lg fa-home"></i> Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="view_resot.php">Resort<i class="fa fa-lg fa-location-arrow"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>

                            <li class="nav-item"><a class="nav-link" href="emailcontact.php">Contact</a></li>
							<?php
							session_start();
							if(isset($_SESSION['u_name']))
							{
							?>
					     <li class="nav-item"><a class="nav-link" href="userorder.php">USER Bookings</a></li>

                          <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
								<?php echo "$_SESSION[u_name]"; ?>
								</a>
                                
								<ul class="dropdown-menu text-center">
                          		<li class="nav-item"><a class="nav-link" href="viewprofile.php"><i class="fa fa-user"></i> Profile</a></li>
          
									<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> logout</a></li>
                                    
                                </ul>
                            </li>
							<?php
							}
								else
							{
							?>
								<li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lg fa-plane"></i>  Login</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i>  Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="register.php"><i class="fa fa-pencil-square-o"></i>Register</a></li>
                                </ul>
                            </li>
							<?php
							}
							?>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->
        

<?php 
session_start();
if(!isset($_SESSION['auname']))
{
	echo "<script> alert('please login'); window.location.href='admin_login.php'; </script>";
}

?>

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
                    <a class="navbar-brand logo_h" href="index.html"><img src="image/logo1.jfif" alt="Royal Club LOGO"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
						<li  class="nav-item"><a class="nav-link" href="admin_index.php"><i class="fa fa-lg fa-home"></i></a></li>  

 <li class="nav-item"><a class="nav-link" href="trip.php" >Trip Type</a> </li>
 <li class="nav-item"><a class="nav-link"  href="room.php" >Room Type</a> </li>


<li class="nav-item submenu dropdown">
                                <a href="viewcountry.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Country</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="country.php">insert country</a></li>
                                    <li class="nav-item"><a class="nav-link" href="updatecountry.php">update country</a></li>
                                </ul>
                            </li>

<li class="nav-item submenu dropdown">
                                <a href="viewstate.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">State</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="state.php">insert State</a></li>
                                    <li class="nav-item"><a class="nav-link" href="updatestate.php">update State</a></li>
                                </ul>
                            </li>

<li class="nav-item submenu dropdown">
                                <a href="viewresort.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resort</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="resort.php">insert resort</a></li>
                                    <li class="nav-item"><a class="nav-link" href="updateresort.php">update resort</a></li>
                                </ul>
                            </li>

<li class="nav-item submenu dropdown">
                                <a href="viewemploye.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">empoyee</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="employe.php">insert employee</a></li>
                                    <li class="nav-item"><a class="nav-link" href="updateemploye.php">update employee</a></li>
                                </ul>
                            </li>

<li class="nav-item submenu dropdown">
                                <a href="viewroom.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="room1.php">insert room</a></li>
                                    <li class="nav-item"><a class="nav-link" href="updateroom.php">update room</a></li>
                                </ul>
                            </li>



<li class="nav-item submenu dropdown">
                                <a href="report.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports</a>
                                <ul class="dropdown-menu text-center">
                                    <li class="nav-item"><a class="nav-link" href="vieworder.php">All Bookings</a></li>
                                    <li class="nav-item"><a class="nav-link" href="viewuser.php">All Customers</a></li>
									<li class="nav-item"><a class="nav-link" href="dateorder.php">Date Wish</a></li>

                                </ul>
                            </li>

<li class="nav-item submenu dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo " $_SESSION[auname]"; ?></a>
                                <ul class="dropdown-menu text-center">
                                 <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> logout</a></li>
                                </ul>
                            </li> 
 </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->
        

        <?php include "header.php"; ?>
		<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">login form</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">login</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
				<section >
				<div class="container">
				<div class="row">
                  <div class="col-xl-12 text-center">
				  <br/>
                        <form class="contact_form" action="admin_login.php" method="post" >
                            <div class="col-md-6"><br/></div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="txtuname" placeholder="Enter your User name" required>
                                </div>
                            
                                <div class="form-group">
                                    <input type="password" class="form-control" id="subject" name="txtpwd" placeholder="Enter Password" required>
                                </div>
								<div class="col-md-12">
                                <input type="submit" name="btnok" value="OK,LOGIN" class="btn btn-success button_hover">
								<br/>
								<br>
                            </div>
                            </div>
                           
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
<?php include "footer.php"; ?>


<?php
if(isset($_POST['btnok']))
{
	$_SESSION['auname']=$_POST['txtuname'];
	$_SESSION['apwd']=$_POST['txtpwd'];

$_SESSION['login']=true;
$_SESSION['usertype']='a';

$u_name=$_POST['txtuname'];
$u_password=$_POST['txtpwd'];

	$con=mysql_connect("localhost","root","") or die(mysql_error());

	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

	$sql="select * from admin_login where u_name='$u_name' and u_password='$u_password'";
	$cmd=mysql_query($sql,$con) or die(mysql_error());	
	
	$n=mysql_numrows($cmd);
	
	if($n<=0)
	{
		echo"Invalid Admin Username or Password...";
		exit();
	}
	else
	{
		header("location:admin_index.php");
	}

}
?>

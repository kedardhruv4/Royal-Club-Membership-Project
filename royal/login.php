        <?php include "header.php"; ?>
		<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Login</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
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
                        <form class="contact_form" action="login.php" method="post" >
                            <div class="col-md-6"><br/></div>
							<div class="col-md-6">
                                <div class="form-group" align="left">
                                  <label class="text-left"> Username : </label>
									<input type="text" class="form-control" id="name" name="txtu_name" placeholder="Enter your User name" required>
                                </div>
                            
                                <div class="form-group" align="left">
									Password :
                                    <input type="password" class="form-control" id="subject" name="txtu_password" placeholder="Enter Password" required>
                                </div>
								<h6 class="text-left"><a href="forpwd.php">Forget Password ?</a></h6>

								<div class="col-md-12">
                                <input type="submit" name="btnok" value="OK,LOGIN" class="btn btn-success button_hover">
								<a  href="register.php" class="btn btn-primary button_hover" >Register</a>
								<a href="admin_login.php" class="btn btn-primary button_hover" >Admin login</a>
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
	//echo "hellooooo";
	$_SESSION['u_name']=$_POST['txtu_name'];
	//$_SESSION['u_password']=$_POST['txtu_password'];
	$_SESSION['login']=true;
	$_SESSION['usertype']='u';
$u_name=$_POST['txtu_name'];
$u_password=$_POST['txtu_password'];

	$con=mysql_connect("localhost","root","") or die(mysql_error());

	$sdb=mysql_select_db("club_database",$con) or die(mysql_error());

	$sql="select * from member_login where u_name='$u_name' and u_password='$u_password' ";
	$cmd=mysql_query($sql,$con) or die(mysql_error());	
	$rset=mysql_fetch_array($cmd);
	$n=mysql_numrows($cmd);
	
	if($n<=0)
	{
		echo"Invalid Username or Password...";
		exit();
	}
	else
	{
		$_SESSION['m_id']=$rset['m_id'];
		header("location:index.php");
	}

}
?>


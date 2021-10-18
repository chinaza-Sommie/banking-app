<?php 
	require_once("../includes/DB.php");
  	require_once("../includes/sessions.php");
  	require_once("../includes/functions.php");
	
    // if (!isset($_SESSION['customer_ID']) && !isset($_SESSION['custmername'])) {
    //   header("location: ../login.php");
    // } 
    require 'logincheck.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/custStyle.css">
  </head>
  <body>


  		<?php require 'sidebar.php'; ?>

	        <!-- Page Content  -->
	      <div id="content" class=" p-5">

	        <div id="storeItems">
            <?php 
              echo ErrorMessage();
              echo SuccessMessage();

            ?>
	        	<div >
	        		<div class="col-md-4 heading-section text-center ftco-animate py-4" >
				        <span class="subheading" style="font-size: 20px">New Loan</span>
				    </div>
	        	</div>

	        	
	        		<div class="container ftco-animate" style="border: 1px solid grey; border-radius: 5px">
				        <div class="row justify-content-center">
				          <div class=" heading-section text-center ftco-animate py-4" >
				            <div class="icon d-flex justify-content-center align-items-center animated tada infinite" style="color: #e86ed0; font-size: 55px"><span class="flaticon-piggy-bank"></span></div>

                    <?php 
                      if(accountcomplete($UserId)){
                         echo " <div>
                            <i>
                              You have not completed your account. <br>
                              Please, click the button below to complete your account registration..
                            </i>
                          </div>

                        <div class='text-center pt-4' style='' >
                            <a href='profile.php' class='reg-login'>Profile</a>
                        </div>";
                      }else{
                        if(loanlistCheck($UserId)){
                          echo "<div>
                              <i>
                                You already have an active loan <br>
                                Click the button below to review active loan.
                              </i>
                            </div>

                          <div class='text-center pt-4' style='' >
                              <a href='pendingrequest.php' class='reg-login'>view active loan</a>
                          </div>";
                        }else{
                          echo "<div>
                                  <i>
                                    You have no active loan <br>
                                    Go ahead and apply for a loan. Click the button below.
                                  </i>
                                </div>

                              <div class='text-center pt-4' style='' >
                                  <a href='loanform.php' class='reg-login'>Apply</a>
                              </div>";
                        }
                      }
                    ?>

				          </div>
				    </div>      
	        </div>
	      </div>
		</div>

   <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
 
 
  </body>
  </html>
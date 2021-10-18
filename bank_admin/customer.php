<?php 
	require_once("../includes/DB.php");
  	require_once("../includes/sessions.php");
  	require_once("../includes/functions.php");
	
    require 'checkbanklogin.php';
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

	        <div  id="storeItems">
            <?php 
              echo ErrorMessage();
              echo SuccessMessage();

            ?>
	        	<div >
	        		<div class="col-md-4 heading-section text-center ftco-animate py-4" >
				        <span class="subheading" style="font-size: 20px">approved loan</span>
				    </div>
	        	</div>

	        	
	        		<div class="container ftco-animate" style="border: 1px solid grey; border-radius: 5px">
				        <div class="row justify-content-center">
				          <div class=" heading-section text-center ftco-animate py-4" >

  			        		<table class="table" style="width: 100%">
                      <tr style="border-bottom: 1px solid #e86ed0;">
                          <th>S/N</th>
                          <th>Customer name</th>
                          <th>Account number</th>
                          <th>Email address</th>
                          <th>Phone number</th>
                          <th>Date joined </th>
                          <th>Account Status </th>
                      </tr>

                      <?php 
                        global $ConnectingDB;
                         $sql = "SELECT * FROM registercustomer
                         ORDER BY id desc";
                         $stmtgigs = $ConnectingDB->query($sql);
                         $SN=0;
                          while ($DataRows = $stmtgigs->fetch()) {

                            $custID         = $DataRows['id'];
                            $firstname      = $DataRows['firstname'];
                            $lastname       = $DataRows['lastname'];
                            $acntnumber     = $DataRows['accnumber'];
                            $email          = $DataRows['email'];
                            $phoneno        = $DataRows['phonenumber'];
                            $dateadded      = $DataRows['dateadded'];
                            $accountstatus  = $DataRows['accountstatus'];
                            $SN++;
                      ?>
                      <tr>
                           <td><?php echo $SN;?></td>
                          <td><?php echo $firstname . " ". $lastname; ?></td>
                          <td> <?php echo $acntnumber; ?></td>
                          <td> <?php echo $email; ?></td>
                          <td> <?php echo $phoneno; ?></td>
                          <td><?php  $dateadded = strtotime($dateadded);
                                $dateadded = date('d M, Y', $dateadded); 
                                echo $dateadded; ?>        
                          </td>
                          <td><?php echo $accountstatus ;?></td>
                      </tr>
                    <?php }?>
                     
                    </table>
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
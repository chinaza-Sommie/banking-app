<?php 
	require_once("../includes/DB.php");
  	require_once("../includes/sessions.php");
  	require_once("../includes/functions.php");

      require 'logincheck.php';
   
	
  if(isset($_POST['applyloan'])){
  
    $amount       = $_POST['amount'];
    $payday     = $_POST['payday'];
    $Target = "../collateralDocuments/" . basename($_FILES["colatfile"]["name"]);
    $colFile = $_FILES["colatfile"]["name"];
    $offaddress     = $_POST['offaddress'];

    if(empty($amount) || empty($payday) || empty($colFile)){
      $_SESSION["ErrorMessage"] = "Fields cannot be empty ";
    }else{ 
      $rate        = 1;
      $interestrate = $rate / 100;
      $rate = $interestrate * $amount;

        global $ConnectingDB; 
        $sql = "INSERT INTO loanrequest(amount,customerNo,repaymentDate, interestRate, collateralDoc, offaddress)
        VALUES(:amount,:customerNo,:repaymentDate,:interestRate, :collateralDoC, :offaddresS)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue('amount',$amount);
        $stmt->bindValue('customerNo',$UserId);
        $stmt->bindValue('repaymentDate',$payday);
        $stmt->bindValue('interestRate',$rate);
        $stmt->bindValue('collateralDoC',$colFile);
        $stmt->bindValue('offaddresS',$offaddress);
        $Execute = $stmt->execute();
        if($Execute){
          move_uploaded_file($_FILES["colatfile"]["tmp_name"], $Target);
          $_SESSION["SuccessMessage"]= "Loan request has been sent. The bank would get back to you soon ;)";
          Redirect_to('newloan.php');
          
        }else{
          $_SESSION["ErrorMessage"]= "A problem occured. Please try again.";
          Redirect_to('loanform.php');

        }}
  }

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
				        <span class="subheading" style="font-size: 20px">apply for loan</span>
				    </div>
	        	</div>

	        	
	        		<div class="container ftco-animate" style="border: 1px solid grey; border-radius: 5px">
				        <div class="row justify-content-center" style="width: 100%">
				          <div class=" heading-section text-center ftco-animate py-4" style="width: 100%">

  			        		 <form method="POST" action="loanform.php" class="form-reg pl-3" enctype="multipart/form-data" style="width: 100%">
                       

                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Amount:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="text" class="form-control" name="amount" placeholder="Enter loan amount">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Interest Rate:</i></p>  
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="rate" value="1" placeholder="Enter Password" disabled="">
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Collateral file:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="file" name="colatfile" class="text-primary" id="file">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Office Address:</i></p>  
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="offaddress" placeholder="Enter Office Address">
                                </div>
                            </div>
                        </div>

                            <div class="col-lg-12">
                                <p class="text-left pl-3"><i>Re-payment Schedule:</i></p>  
                                <div clas s="input-group mb-4">
                                    <input type="date" class="form-control" name="payday" placeholder="Enter Password">
                                </div>
                            </div>

                        
                        <div class="text-right reg-submit-btn mt-md-3">
                          <input type="submit" name="applyloan" value="Apply" >
                        </div>
                    </form>
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
<?php 
	require_once("../includes/DB.php");
  	require_once("../includes/sessions.php");
  	require_once("../includes/functions.php");

     
   
	
  if(isset($_POST['registerbank'])){
  
    $bankname    = $_POST['bankname'];
    $branch     = $_POST['branch'];
    $banAdmname       = $_POST['banAdmname'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $confirmPass  = $_POST['confirmPass'];

    if(empty($bankname) || empty($branch) || empty($banAdmname) || empty($email) || empty($password) || empty($confirmPass)){
      $_SESSION["ErrorMessage"] = "Fields cannot be empty ";
    }elseif($password !== $confirmPass){
      $_SESSION["ErrorMessage"] = "Passwords do not match. Try again";
    }elseif(checkEmail($email)){
      $_SESSION["ErrorMessage"] = "This email already exists. Go ahead and login";
    }else{
        $password   = password_hash($password, PASSWORD_DEFAULT);

        global $ConnectingDB; 
        $sql = "INSERT INTO bankreg(bankname, branch,managername,email, password)
        VALUES(:bankname,:branch,:managername,:emaiL, :passworD)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue('bankname',$bankname);
        $stmt->bindValue('branch',$branch);
        $stmt->bindValue('managername',$banAdmname);
        $stmt->bindValue('emaiL',$email);
        $stmt->bindValue('passworD',$password);
        $Execute = $stmt->execute();
        if($Execute){
          $_SESSION["SuccessMessage"]= "Registration was successful. Please login ;)";
          Redirect_to('../login.php');
          
        }else{
          $_SESSION["ErrorMessage"]= "A problem occured. Please try again.";
          Redirect_to('registerbank.php');

        }
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>register bank</title>
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
				        <span class="subheading" style="font-size: 20px">apply for loan</span>
				    </div>
	        	</div>

	        	
	        		<div class="container ftco-animate" style="border: 1px solid grey; border-radius: 5px">
				        <div class="row justify-content-center" style="width: 100%">
				          <div class=" heading-section text-center ftco-animate py-4" style="width: 100%">

  			        		 <form method="POST" action="registerbank.php" class="form-reg pl-3" style="width: 100%">
                       
                       <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Bank name</i></p>  
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="bankname" placeholder="Enter name of bank">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Branch:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="text" class="form-control" name="branch" placeholder="Enter bank branch">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Bank Admin Manager:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="text" class="form-control" name="banAdmname" placeholder="eg john okafor">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Email Address:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Password:</i></p>  
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="password" placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Confirm Password:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="text" class="form-control" name="confirmPass" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>

                        <div class="text-right reg-submit-btn">
                          <input type="submit" name="registerbank" value="Sign-Up" >
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
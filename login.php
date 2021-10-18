<?php
  require_once("includes/DB.php");
  require_once("includes/sessions.php");
  require_once("includes/functions.php");

  if (isset($_POST['clogin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $found_Account = Login_Attempt($email);

    if (empty($email) || empty($password)) {
      
      $_SESSION["ErrorMessage"] = "fields cannot be empty";

    } elseif((!$found_Account) && (!password_verify($password, $found_Account["pass"]))) {
        $_SESSION["ErrorMessage"] = "incorrect email/password";
     
    }else{
      $_SESSION['customer_ID'] = $found_Account["id"];
      $_SESSION['custmername'] = $found_Account["lastname"];
      $_SESSION["SuccessMessage"] = "Welcome to your dashboard ".$_SESSION['custmername'];
      Redirect_to('cust_dashboard/newloan.php');
    }
}



if (isset($_POST['bnlogin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $found_bankAccount = Login_bankAttempt($email);

    if (empty($email) || empty($password)) {
      
      $_SESSION["ErrorMessage"] = "fields cannot be empty";

    }elseif((!$found_bankAccount) && (!password_verify($password, $found_bankAccount["pass"]))) {
        $_SESSION["ErrorMessage"] = "incorrect email/password";
     
    }else{
      $_SESSION['bank_ID'] = $found_bankAccount["id"];
      $_SESSION['bankname'] = $found_bankAccount["bankname"];
      $_SESSION["SuccessMessage"] = "Welcome to your dashboard ".$_SESSION['bankname'];
      if($_SESSION['bankname'] == "admin"  ){ 
      Redirect_to('superadmin/registerbank.php');
      }else{
        Redirect_to('bank_admin/bankdashboard.php');
      }
    }

    
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/custStyle.css">
  </head>
  <body>
    

    <section class="ftco-section ftco-no-pb" id="services">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 heading-section text-center ftco-animate py-4" style="background-color: black">
            <span class="subheading">Bank Loan</span>
            <div class="icon d-flex justify-content-center align-items-center " style="color: white; font-size: 55px"><span class="animated tada infinite flaticon-piggy-bank"></span></div>
            <h5 class="mb-2" style="color:#E86ED0"><i> LOGIN </i></h5>

            
          </div>


          <div class="col-md-8 d-flex align-self-stretch ftco-animate justify-content-center" style="box-shadow: 5px 5px 5px grey; border: 1px solid grey">
            <div class="media services d-block text-center" style=" width: 100%">
              <div class="row toggle">
                <div class="text-center col-md-6 py-2 active" onclick="openTabs(event, 'client')"> Client </div>
                <div class="text-center col-md-6 py-2" onclick="openTabs(event, 'bank')"> Bank </div>
              </div>
                <!-- <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div> -->
                <?php
                  echo ErrorMessage();
                  echo SuccessMessage();

                ?>
                <div id="client" class="mycontainhide" >
                  <div class="heading-section">
                    <h5 class="mt-md-4 reg-text subheading"><i>Client Login</i></h5>
                  </div>
                  
                  <div class="media-body py-md-4 px-2" >
                      <form method="POST" action="login.php" class="form-reg">
    
                        <div>
                          <p class="text-left pl-3"><i>Email:</i></p>  
                          <div class="input-group mb-4">
                            <input type="email" class="form-control" name="email" placeholder="Enter email address">
                          </div>
                        </div>

                        <div>
                          <p class="text-left pl-3"><i>Password:</i></p>  
                          <div class="input-group mb-4">  
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
        

                          <div class="text-right reg-submit-btn">
                            <input type="submit" name="clogin" value="Login" >
                          </div>
                      </form>

                  </div>
                </div>

                <div id="bank" class="mycontainhide" >
                  <div class="heading-section">
                    <h5 class="mt-md-4 reg-text subheading"><i>bank Login</i></h5>
                  </div>
                  
                  <div class="media-body py-md-4 px-2" >
                      <form method="POST" action="login.php" class="form-reg">
    
                        <div>
                          <p class="text-left pl-3"><i>Email:</i></p>  
                          <div class="input-group mb-4">
                            <input type="email" class="form-control" name="email" placeholder="Enter email address">
                          </div>
                        </div>

                        <div>
                          <p class="text-left pl-3"><i>Password:</i></p>  
                          <div class="input-group mb-4">  
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
        

                          <div class="text-right reg-submit-btn">
                            <input type="submit" name="bnlogin" value="Login" >
                          </div>
                      </form>

                  </div>
                </div>
            </div>      
          </div>
        </div>
    </section>

         

   
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
    <script type="text/javascript">
      function openTabs(e, tabId) {
      var i, mycontainhide;

      mycontainhide = document.getElementsByClassName('mycontainhide');
      for (i = 0; i < mycontainhide.length; i++) {
        mycontainhide[i].style.display = "none";
      }

      document.getElementById(tabId).style.display = "block";
    }
    window.onload = function() {
      openTabs(event, 'client');

    }
    </script>
  </body>
</html>
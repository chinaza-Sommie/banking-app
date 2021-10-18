<?php 
  require_once("includes/DB.php");
  require_once("includes/sessions.php");
  require_once("includes/functions.php");
?>

<?php
  if (isset($_POST['register'])) {
    $firstname    = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $gender       = $_POST['gender'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $confirmPass  = $_POST['confirmPass'];

    if(empty($firstname) || empty($lastname) || ($gender == "choose") || empty($email) || empty($password) || empty($confirmPass)){
      $_SESSION["ErrorMessage"] = "Fields cannot be empty ";
    }elseif($password !== $confirmPass){
      $_SESSION["ErrorMessage"] = "Passwords do not match. Try again";
    }elseif(checkEmail($email)){
      $_SESSION["ErrorMessage"] = "This email already exists. Go ahead and login";
    }else{
        $password   = password_hash($password, PASSWORD_DEFAULT);

        global $ConnectingDB; 
        $sql = "INSERT INTO registercustomer(firstname, lastname,gender,email, password, phonenumber)
        VALUES(:firstName,:lastName,:gendeR,:emaiL, :passworD, ' ')";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue('firstName',$firstname);
        $stmt->bindValue('lastName',$lastname);
        $stmt->bindValue('gendeR',$gender);
        $stmt->bindValue('emaiL',$email);
        $stmt->bindValue('passworD',$password);
        $Execute = $stmt->execute();
        if($Execute){
          $_SESSION["SuccessMessage"]= "Registration was successful. Please login ;)";
          Redirect_to('Login.php');
          
        }else{
          $_SESSION["ErrorMessage"]= "A problem occured. Please try again.";
          Redirect_to('registration.php');

        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
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
            <div class="icon d-flex justify-content-center align-items-center animated tada infinite" style="color: white; font-size: 55px"><span class="flaticon-piggy-bank"></span></div>
            <h5 class="mb-2" style="color:#E86ED0"><i>The safest way to acquire a loan</i></h5>

            <div class="loginreg-cont">
              <p> Already have an account?</p>
              
              <div class="text-center" style="" >
                <a href="#" class="reg-login">Login</a>
              </div>
            </div>
          </div>


          <div class="col-md-8 d-flex align-self-stretch ftco-animate justify-content-center" style="box-shadow: 5px 5px 5px grey; border: 1px solid grey">
            <div class="media services d-block text-center" style=" width: 100%">
                <!-- <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div> -->
                <?php
                  echo ErrorMessage();
                  echo SuccessMessage();

                ?>
                <div class="heading-section">
                  <h5 class="mt-md-4 reg-text subheading"><i> Register</i></h5>
                </div>
                
                <div class="media-body py-md-4 px-2">
                    <form method="POST" action="registration.php" class="form-reg">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Firstname:</i></p>  
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="firstname" placeholder="Enter firstname">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Lastname:</i></p>  
                                <div class="input-group mb-4">  
                                    <input type="text" class="form-control" name="lastname" placeholder="Enter lastname">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-left pl-3"><i>Gender:</i></p>  
                               <div class="input-group mb-4">  
                                    <div class="form-group" style="width: 100%">
                                        <select class="form-control" name="gender" id="sel1">
                                            <option value="choose">Choose Gender</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                                    
                                         </select>
                                    </div> 
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
                          <input type="submit" name="register" value="Sign-Up" >
                        </div>
                    </form>

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
    
  </body>
</html>
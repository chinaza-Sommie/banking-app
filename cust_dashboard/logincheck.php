<?php


 // if (!isset($_SESSION['customer_ID']) && !isset($_SESSION['custmername'])) {
 //      header("location: ../login.php");
 //    } 

$UserId = $_SESSION['customer_ID'];
global $ConnectingDB;
$sql = "SELECT * FROM registercustomer WHERE id='$UserId'";
$stmtuser = $ConnectingDB->query($sql);
if ($stmtuser) {
	while ($DataRows = $stmtuser->fetch()) {
		$firstname = $DataRows['firstname'];
		$lastname = $DataRows['lastname'];
		$email = $DataRows['email'];
		$gender = $DataRows['gender'];
		$acntnumber     = $DataRows['accnumber'];
		$phoneno        = $DataRows['phonenumber'];
		$bankname = $DataRows['bankname'];
		
	}
} else {
	header("location: ../login.php");
}
?>
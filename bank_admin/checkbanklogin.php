<?php
	$BankId = $_SESSION['bank_ID'];
global $ConnectingDB;
$sql = "SELECT * FROM bankreg WHERE id='$BankId'";
$stmtuser = $ConnectingDB->query($sql);
if ($stmtuser) {
	while ($DataRows = $stmtuser->fetch()) {
		$bankname = $DataRows['bankname'];
		$bankbranch = $DataRows['branch'];
		$email = $DataRows['email'];
		$manager = $DataRows['managername'];
	}
} else {
	header("location: ../login.php");
}
?>
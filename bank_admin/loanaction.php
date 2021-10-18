<?php
	require_once("../includes/DB.php");
  	require_once("../includes/sessions.php");
  	require_once("../includes/functions.php");

	if(isset($_GET['approveno'])){
		$approveno = $_GET['approveno'];
		$sql = "UPDATE loanrequest SET loanstatus = 'approved' WHERE reqid='$approveno'";
		$Execute = $ConnectingDB->query($sql);
		if ($Execute) {
			
			$_SESSION["SuccessMessage"] = "Loan has been approved";
			Redirect_to("approvedloan.php");
		} else {
			$_SESSION["ErrorMessage"] = "Something went wrong. Try again";
			Redirect_to("pendingrequest.php");
		}
	}elseif(isset($_GET['approveon'])){
		$approveon = $_GET['approveon'];
		$sql = "UPDATE loanrequest SET loanstatus = 'rejected' WHERE reqid='$approveon'";
		$Execute = $ConnectingDB->query($sql);
		if ($Execute) {
			
			$_SESSION["SuccessMessage"] = "Loan has been rejected";
			Redirect_to("pendingrequest.php");
		} else {
			$_SESSION["ErrorMessage"] = "Something went wrong. Try again";
			Redirect_to("pendingrequest.php");
		}
	}else{
		Redirect_to("../index.php");
	}
?>
<?php 
	require_once("../includes/DB.php");
  	require_once("../includes/sessions.php");
  	require_once("../includes/functions.php");
  		require 'logincheck.php';
  	if(isset($_GET['pay'])){
		$payloan = $_GET['pay'];
		global $ConnectingDB;
        	$sql = "SELECT * FROM loanrequest
        	WHERE customerNo = '$UserId' AND loanstatus = 'approved' ORDER BY reqid desc";
        	$stmtloan = $ConnectingDB->query($sql);
        	$SN=0;
        	while ($DataRows = $stmtloan->fetch()) {
        	$loanId   = $DataRows['reqid'];
        	$amount       = $DataRows['amount'];    
        	$customerID       = $DataRows['customerNo'];    
        	$daterequested    = $DataRows['dateRequested'];
        	$repaymentDate    = $DataRows['repaymentDate'];
        	$interestRate    = $DataRows['interestRate'];
        	$amountint = intval($amount);
      	}
      	
      	$sql = "INSERT INTO loanrepay(amount, customerID,reqdate, setpaydate,bankinterest)
        VALUES(:amount,:customerID,:reqdate, :setpaydate,:bankinterest)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue('amount',$amount);
        $stmt->bindValue('customerID',$customerID);
        $stmt->bindValue('reqdate',$daterequested );
        $stmt->bindValue('setpaydate',$repaymentDate );
        $stmt->bindValue('bankinterest',$interestRate);
        $Execute = $stmt->execute();
        if($Execute){
        	// delete the loan request from the loanrequesttable
        	$sqldelete= "DELETE FROM  loanrequest WHERE reqid='$payloan'";
			$Executedlt = $ConnectingDB->query($sqldelete);
			if($Executedlt){
				$_SESSION["SuccessMessage"]= "Payment was successful. Go ahead and take another loan ;)";
          		Redirect_to('newloan.php');
			}
          
        }else{
          $_SESSION["ErrorMessage"]= "A problem occured. Please try again.";
          Redirect_to('approvedloan.php');

        }
	}else{
		Redirect_to('../index.php');
	}

?>
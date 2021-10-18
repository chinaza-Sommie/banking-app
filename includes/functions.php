<?php
	// redirects user to a certain page 
	function Redirect_to($New_Location){
		header("Location:" . $New_Location);
		exit;
	}

	// checks if email exists before registering user
	function checkEmail($email){
		global $ConnectingDB;
		$sql = "SELECT email FROM registercustomer, bankreg WHERE registercustomer.email =:emaiL OR bankreg.email =:emaiL";
		$stmt = $ConnectingDB->prepare($sql);
		$stmt->bindValue(':emaiL', $email);
		$stmt->execute();
		$Result = $stmt->rowcount();
		if ($Result == 1) {
			return true;
		} else {
			return false;
		}
	}

	// checks if details are correct before login
	function Login_Attempt($Email)
{
	global $ConnectingDB;
	$sql = "SELECT * FROM registercustomer WHERE email=:emaiL LIMIT 1";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->bindValue(':emaiL', $Email);
	// $stmt->bindValue(':passworD',$Password);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result == 1) {
		return $found_Account = $stmt->fetch();
	} else {
		return null;
	}
}

// checks if details are correct before login
	function Login_bankAttempt($Email){
	global $ConnectingDB;
	$sql = "SELECT * FROM bankreg WHERE email=:emaiL LIMIT 1";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->bindValue(':emaiL', $Email);
	// $stmt->bindValue(':passworD',$Password);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result == 1) {
		return $found_bankAccount = $stmt->fetch();
	} else {
		return null;
	}
}


function loanlistCheck($UserId)
{
	global $ConnectingDB;
	$sql = "SELECT * FROM loanrequest WHERE customerNo = '$UserId' AND loanstatus != 'rejected' LIMIT 1";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->bindValue(':UserId', $UserId);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result >= 1) {
		return true;
	} else {
		return false;
	}
}

function accountcomplete($UserId)
{
	global $ConnectingDB;
	$sql = "SELECT * FROM registercustomer WHERE id = '$UserId' AND accountstatus = 'incomplete' LIMIT 1";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->bindValue(':UserId', $UserId);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result >= 1) {
		return true;
	} else {
		return false;
	}
}

function Total_customers()
{
	global $ConnectingDB;
	$sql = "SELECT id FROM registercustomer";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result >= 1) {
		echo $Result;
	} else {
		echo '0';
	}
}

function Total_loans()
{
	global $ConnectingDB;
	$sql = "SELECT reqid FROM loanrequest WHERE loanstatus = 'approved'";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result >= 1) {
		echo $Result;
	} else {
		echo '0';
	}
}

function Total_banks()
{
	global $ConnectingDB;
	$sql = "SELECT id FROM bankreg";
	$stmt = $ConnectingDB->prepare($sql);
	$stmt->execute();
	$Result = $stmt->rowcount();
	if ($Result >= 1) {
		$Result = $Result - 1;
		echo $Result;
	} else {
		echo '0';
	}
}
?>
<?php

function emptyInputLogin($username, $password){
		$result;
		if(empty($username) || empty($password)){
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}


function userexists($conn, $username){
	$sql = "SELECT * FROM buyers WHERE BuyerUsername = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: MemberRegister.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultdata)){
		return $row;
	} 
	else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
	
}


?>
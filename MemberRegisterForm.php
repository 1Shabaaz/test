<?php

 if(isset($_POST["submit"])) {
	 
	 require 'Connection.php';
	
	 $username	  				 = $_POST["username"];
	 $password	  				 = $_POST["password"];
	 $confirmpassword	  	     = $_POST["confirmpassword"];
	 $firstname	  				 = $_POST["firstname"];
	 $lastname	  				 = $_POST["lastname"];
	 $dob	  				     = $_POST["dob"];
	 $gender	  				 = $_POST["gender"];
	 $email	  				     = $_POST["email"];
	 $mobile	  				 = $_POST["mobile"];
	 $housenumber	  		     = $_POST["housenumber"];
	 $address	  				 = $_POST["address"];
	 $postcode	  				 = $_POST["postcode"];
	 
		
		if(empty($username) || empty($password) || empty($confirmpassword) || empty($firstname) || empty($lastname) || empty($dob) || empty($gender) || empty($email) || empty($mobile) || empty($housenumber) || empty($address) || empty($postcode))  {
			
			header("Location: MemberRegister.html");
			exit();
			
		} 

	 else if($password !== $confirmpassword){
			header("Location: MemberRegister.html");
			exit();
 }
	 
	 else{
		 
		 $sql = "SELECT BuyerUsername FROM buyers WHERE BuyerUsername = ?";
		 $stmt = mysqli_stmt_init($conn);
		 
		 if(!mysqli_stmt_prepare($stmt,$sql)){
			 header("Location: MemberRegister.html");
			exit();
			 
		 }
		 
		 else{
			 
			 mysqli_stmt_bind_param($stmt, "s", $username);
			 mysqli_stmt_execute($stmt);
			 mysqli_stmt_store_result($stmt);
			 $resultCheck = mysqli_stmt_num_rows($stmt);
			 if($resultCheck > 0){
				 header("Location: MemberRegister.html");
			exit();
			 }
			 
			 else{
				 
				 $sqlin = "INSERT INTO buyers VALUES ('NULL',?,?,?,?,?,?,?,?,?,?,?)";
				 $stmtin = mysqli_stmt_init($conn);
				 if(!mysqli_stmt_prepare($stmtin,$sqlin)){
			 header("Location: MemberRegister.html");
			exit();							
		 }
		 else {
			 
			 $hash = password_hash($password, PASSWORD_DEFAULT);
			 
			 mysqli_stmt_bind_param($stmtin, "sssssssssss", $username, $password, $firstname, $lastname, $dob, $gender, $email, $mobile, $housenumber, $address, $postcode);
			 mysqli_stmt_execute($stmtin);
			 header("Location: MemberRegister.html");
			exit();	
			
		 }
	 }
	 
	 
		 }
	 }
	 
	 
	 mysqli_stmt_close($stmt);
	 mysqli_stmt_close($stmtin);
	 mysqli_close($conn);
 }
	 
	 
	 
	 
	 ?>

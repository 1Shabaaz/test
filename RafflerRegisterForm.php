<?php

 if(isset($_POST["submit"])) {
	 
	 require 'Connection.php';
	
	  $Username	  				 = $_POST["username"];
	  $Password	  			 	 = $_POST["password"];
	  $confirmpassword	  		 = $_POST["confirmpassword"];
	  $typeseller	  			 = $_POST["typeseller"];
	  $sellername	  			 = $_POST["sellername"];
	  $regnumber	  			 = $_POST["regnumber"];
	  $email	  				 = $_POST["email"];
	  $phonenumber	  			 = $_POST["phonenumber"];
	  $address	  				 = $_POST["address"];
	  $postcode	  				 = $_POST["postcode"];
	 
	
		
		if(empty($Username) || empty($Password) || empty($confirmpassword)  || empty($sellername) ||  empty($email) || empty($phonenumber) || empty($address) || empty($postcode))  {
			
			header("Location: RafflerRegister.html?emptyfield");
			exit();
			
		} 

	 else if($Password !== $confirmpassword){
			header("Location: RafflerRegister.html");
			exit();
 }
	 
	 else{
		 
		 $sql = "SELECT SellerUsername FROM sellers WHERE SellerUsername = ?";
		 $stmt = mysqli_stmt_init($conn);
		 
		 if(!mysqli_stmt_prepare($stmt,$sql)){
			 header("Location: RafflerRegister.html");
			exit();
			 
		 }
		 
		 else{
			 
			 mysqli_stmt_bind_param($stmt, "s", $username);
			 mysqli_stmt_execute($stmt);
			 mysqli_stmt_store_result($stmt);
			 $resultCheck = mysqli_stmt_num_rows($stmt);
			 if($resultCheck > 0){
				 header("Location: RafflerRegister.html");
			exit();
			 }
			 
			 else{
				 
				 $sqlin = "INSERT INTO sellers VALUES('NULL',?,?,?,?,?,?,?,?,?)";
				 $stmtin = mysqli_stmt_init($conn);
				 if(!mysqli_stmt_prepare($stmtin,$sqlin)){
			 header("Location: RafflerRegister.html");
			exit();							
		 }
		 else {
			 
			 $hash = password_hash($password, PASSWORD_DEFAULT);
			 mysqli_stmt_bind_param($stmtin, "sssssssss", $Username, $Password, $typeseller, $sellername, $regnumber, $email, $phonenumber, $address, $postcode);
			 mysqli_stmt_execute($stmtin);
			 header("Location: RafflerRegister.html");
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
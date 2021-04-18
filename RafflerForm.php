<?php
session_start();
include_once('Connection.php');

$errors = array('username'=>'');

if(isset($_POST['submit'])){
	if(empty($_POST['Username']) || empty($_POST['Password'])){
		$errors['username'] = 'Missing Username or Password';
		
	}
	else
	{
		$username =$_POST['Username'];
		$Password =$_POST['Password'];
		
		
		$query= mysqli_query($conn, "SELECT * FROM sellers WHERE SellerUsername='$username' AND SellerPassword='$Password'");

$row = mysqli_fetch_array($query);

if(is_array($row)){
	$_SESSION["ID"] = 			$row["SellerID"];
	$_SESSION["Username"] = 	$row["SellerUsername"];
	$_SESSION["Password"] =	 	$row["SellerPassword"];
	$_SESSION["Type"] =	 		$row["TypeOfSeller"];
	$_SESSION["SellerName"] = 	$row["SellerName"];
	$_SESSION["RegNO"] = 		$row["RegNumber"];
	$_SESSION["Email"] = 		$row["Email"];
	$_SESSION["Phone"] = 		$row["PhoneNO"];
	$_SESSION["Address"] = 		$row["Address"];
	$_SESSION["Postcode"] =	    $row["Postcode"];
	
	
}
else {
	header("location:RafflerLogin.html");
}
if(isset($_SESSION["Username"])){
	header("location:Sellerwelcome.html");
}




	}
}

	
	
?>

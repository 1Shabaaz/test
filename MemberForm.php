<?php
session_start();
include_once('Connection.php');

if(isset($_POST['submit'])){
	if(empty($_POST['Username']) || empty($_POST['Password'])){
		echo 'Fill in fields';
		header("Location: MemberLogin.html");
	}
	else
	{
		$username =$_POST['Username'];
		$Password =$_POST['Password'];
		
		
		$query= mysqli_query($conn, "SELECT * FROM buyers WHERE BuyerUsername='$username' AND BuyerPassword='$Password'");

$row = mysqli_fetch_array($query);

if(is_array($row)){
	$_SESSION["ID"] = 	$row["BuyerID"];
	$_SESSION["Username"] = $row["BuyerUsername"];
	$_SESSION["Password"] = $row["BuyerPassword"];
	$_SESSION["FName"] = $row["FirstName"];
	$_SESSION["LName"] = $row["LastName"];
	$_SESSION["dob"] = $row["BuyerDOB"];
	$_SESSION["Gender"] = $row["BuyerGender"];
	$_SESSION["Email"] = $row["Email"];
	$_SESSION["Phone"] = $row["PhoneNO"];
	$_SESSION["HouseNO"] = $row["HouseNo"];
	$_SESSION["Address"] = $row["Address"];
	$_SESSION["Postcode"] = $row["PostCode"];
}
else {
	header("location:MemberLogin.html");
}
if(isset($_SESSION["Username"])){
	header("location:Buyerwelcome.html");
}




	}
}

	
	
?>

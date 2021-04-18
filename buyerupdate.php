<?php
session_start();
include_once('Connection.php');

if(isset($_POST['update'])){

$ID = $_SESSION["ID"];
$Username = $_POST["username"];
$Password = $_POST["password"];
$Confirm = $_POST["confirmpassword"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$housenumber = $_POST["housenumber"];
$address = $_POST["address"];
$postcode = $_POST["postcode"];


$sql = "UPDATE buyers SET BuyerUsername = '$Username', BuyerPassword = '$Password', FirstName = '$fname', LastName = '$lname',
 BuyerDOB = '$dob', BuyerGender = '$gender', Email = '$email', PhoneNO = '$mobile', HouseNo = '$housenumber', Address = '$address',PostCode = '$postcode' WHERE BuyerID = '$ID '";
 
 
if ($conn->query($sql)=== TRUE){
	echo "Data Updated";
	header("location: BuyerProfile.html");
} else {
	echo "Error";
}


$conn->close();
}
?>
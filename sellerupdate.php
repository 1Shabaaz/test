<?php
session_start();
include_once('Connection.php');

if(isset($_POST['update'])){

$ID = $_SESSION["ID"];
$Username = $_POST["username"];
$Password = $_POST["password"];
$Confirm = $_POST["confirmpassword"];
$Type = $_POST["typeseller"];
$Name = $_POST["sellername"];
$RegNO = $_POST["regnumber"];
$Email = $_POST["email"];
$PhoneNo = $_POST["phonenumber"];
$Address = $_POST["address"];
$Postcode = $_POST["postcode"];

$sql = "UPDATE sellers SET SellerUsername = '$Username', SellerPassword = '$Password', TypeOfSeller = '$Type', SellerName = '$Name',
 RegNumber = '$RegNO', Email = '$Email', PhoneNO = '$PhoneNo', Address = '$Address', Postcode = '$Postcode' WHERE SellerID = '$ID '";
 
 
if ($conn->query($sql)=== TRUE){
	echo "Data Updated";
	header("location: SellerProfile.html");
} else {
	echo "Error";
}


$conn->close();
}
?>

<?php
 
    $servername = "localhost:3306";
    $dbname = "test";
    $username = "root";
    $password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
 
 if(!$conn) { 
 die("Connection Failed: ".mysqli_connect_error());
 }
?>

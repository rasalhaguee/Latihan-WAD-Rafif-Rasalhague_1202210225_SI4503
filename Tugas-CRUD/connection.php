<?php   
// melakukan koneksi ke database
$host = "localhost:3308";
$username = "root";
$password = "";
$database = "tugascrud";

$connection = mysqli_connect($host,$username,$password,$database);
if(!$connection){
    die("Could not connect to Database!");
}
?>
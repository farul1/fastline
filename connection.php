<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_fastline";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
else{

}
?>
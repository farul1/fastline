<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `booking` WHERE ID_booking= $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:adminDash.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Booking Deleted!!!');
    window.location.href='BookingManage.php';
    </script>");

?>

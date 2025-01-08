<?php

include 'connection.php';

$ID = $_GET['id'];

// Delete associated records in the 'booking' table
$deleteBookingsSql = "DELETE FROM `booking` WHERE id_route = $ID";
$deleteBookingsQuery = mysqli_query($conn, $deleteBookingsSql);

// Now, delete the route
$deleteRouteSql = "DELETE FROM `route` WHERE id_route = $ID";
$deleteRouteQuery = mysqli_query($conn, $deleteRouteSql);

if ($deleteRouteQuery) {
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Successfully Route Deleted!!!');
        window.location.href='adminDash.php';
        </script>");
} else {
    echo "Error deleting route: " . mysqli_error($conn);
}


?>

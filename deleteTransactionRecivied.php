<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id_payment = $_GET['id'];

    // Delete associated booking records first
    $deleteBookingQuery = "DELETE FROM booking WHERE id_payment = $id_payment";
    mysqli_query($conn, $deleteBookingQuery);

    // Now you can safely delete the payment record
    $deletePaymentQuery = "DELETE FROM payment WHERE id_payment = $id_payment";
    mysqli_query($conn, $deletePaymentQuery);
}

// Redirect or display a message as needed
header("Location: PaymentManage.php");
exit();
?>

<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);

  $route_id = $_GET['route_id'] ?? null; 

if ($route_id) {
    $sqlget = "SELECT cost FROM route WHERE id = ?";
    $stmt = $conn->prepare($sqlget);
    $stmt->bind_param("i", $route_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $amount = 0;

    if ($row = $result->fetch_assoc()) {
        $amount = $row['cost'];
    }

    $stmt->close();
} else {
    $amount = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfile/payment1.css">
    <title>Transaksi</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            min-height: 100vh;
            background-image: url(image/bis27.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
</style>
   

</head>
<body>
<?php
if (isset($_POST['checkout'])) {
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cname = $_POST['cardName'];
    $cnumber = $_POST['cardNumber'];
    $expM = $_POST['expM'];
    $expY = $_POST['expYear'];
    $cvv = $_POST['cvv'];

    try {
        // Start a transaction to ensure atomicity
        $conn->begin_transaction();

        // Insert into payment table
        $stmt = $conn->prepare("INSERT INTO payment(amount, name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssissssi", $amount, $name, $email, $address, $city, $state, $zip, $cname, $cnumber, $expM, $expY, $cvv);
        $stmt->execute();

        // Get the last inserted payment ID
        $lastPaymentID = $stmt->insert_id;

        // Update booking table with the payment ID
        if (isset($_GET['booking_id'])) {
            $bookingID = $_GET['booking_id'];
            $updateBookingStmt = $conn->prepare("UPDATE booking SET id_payment = ? WHERE id_booking = ?");
            $updateBookingStmt->bind_param("ii", $lastPaymentID, $bookingID);
            $updateBookingStmt->execute();
            $updateBookingStmt->close();

            // Update kursi table with the payment ID
            $updateKursiStmt = $conn->prepare("UPDATE kursi SET id_payment = ? WHERE id_booking = ?");
            $updateKursiStmt->bind_param("ii", $lastPaymentID, $bookingID);
            $updateKursiStmt->execute();
            $updateKursiStmt->close();
        }

        // Commit the transaction
        $conn->commit();

        $stmt->close();
        $conn->close();

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Successfully added!!!');
            window.location.href='paySucess.php';
        </script>");
    } catch (Exception $e) {
        // Rollback the transaction on exception
        $conn->rollback();
        echo 'Error: ' . $e->getMessage();
    }
}
?>


<div class="container">

    <form method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                 <div class="inputBox">
                    <span>Amount You Pay :</span>
                    <input type="number" value="0" name="amount">
                </div>

                <div class="inputBox">
                    <span>Name :</span>
                    <input type="text" value="<?php echo $user_data['username'];?>" name="name">
                </div>

                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" value="<?php echo $user_data['email'];?>" name="email">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="surabaya" name="city">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="indonesia" name="state">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456" name="zip">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="image/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="syafaul priwantoro" name="cardName" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name="cardNumber" required>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" name="expM" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" name="expYear" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" name="cvv" required>
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn" name="checkout">

    </form>

</div>    
    
</body>
</html>
<?php 
session_start();
include("connection.php");

$sqlget = "SELECT * FROM payment";
$sqldata = mysqli_query($conn, $sqlget) or die('Error fetching data');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pembayaran Diterima</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssfile/sidebar.css">
    <style type="text/css">
        body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .adminTopic {
            text-align: center;
            color: #fff;
        }

        table {
            width: 99%;
            border-collapse: collapse;
            margin: auto;
            text-align: center;
            margin-top: 50px;
            background-color: rgb(255, 255, 255);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th {
            border-bottom: 2px solid rgb(187, 187, 187);
            padding: 15px 0;
            font-family: 'balsamiq_sansitalic';
            font-size: 18px;
            color: white;
            background-color: #7487A4;
        }

        table tr td {
            border-right: 2px solid rgb(187, 187, 187);
            height: 58px;
            padding: 15px 0;
            border-bottom: 2px solid rgb(187, 187, 187);
            font-size: 16px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr td a {
            color: white;
            border-radius: 5px;
            padding: 6px 12px;
            text-decoration: none;
            margin: 10px;
            font-weight: 700;
        }

        table tr td button {
            padding: 8px 12px;
            background-color: #7487A4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        table tr td button:hover {
            background-color: #33548B;
            color: white;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancle"></i>
    </label>

    <div class="sidebar">
        <header><img src="image/user.png">
            <p><?php echo $_SESSION['username']; ?></p>
        </header>
        <ul>
            <li><a href="adminDash.php">Mengelola Rute</a></li>
            <li><a href="ManagesBuses.php">Mengelola Bus</a></li>
            <li><a href="BookingManage.php">Pemesanan Tiket</a></li>
            <li><a href="PaymentManage.php">Transaksi</a></li>
            <li><a href="adminLogout.php">Logout</a></li>
        </ul>
    </div>

    <div class="sidebar2">
    <h1 class="adminTopic" style="text-align: center;">Pembayaran Diterima</h1></div>

    <table>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Card Name</th>
            <th>Card Number</th>
            <th>Expiration Month</th>
            <th>Expiration Year</th>
            <th>CVV</th>
            <th>Update/Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['id_payment'];
            echo "</td><td>";
            echo $row['amount'];
            echo "</td><td>";
            echo $row['name'];
            echo "</td><td>";
            echo $row['email'];
            echo "</td><td>";
            echo $row['address'];
            echo "</td><td>";
            echo $row['city'];
            echo "</td><td>";
            echo $row['state'];
            echo "</td><td>";
            echo $row['zip_code'];
            echo "</td><td>";
            echo $row['card_name'];
            echo "</td><td>";
            echo $row['card_number'];
            echo "</td><td>";
            echo $row['exp_month'];
            echo "</td><td>";
            echo $row['exp_year'];
            echo "</td><td>";
            echo $row['cvv'];
        ?>
            <td>
                <button>
                    <a href="updateTransactionRecivied.php?id=<?php echo $row['id_payment']; ?>">
                        Update
                    </a>
                </button>
            </td>

            <td>
                <button>
                    <a href="deleteTransactionRecivied.php?id=<?php echo $row['id_payment']; ?>">
                        Delete
                    </a>
                </button>
            </td>
        <?php
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
    </body>
    </html>

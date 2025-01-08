<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manajemen Pemesanan</title>
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
            border-radius: 0 0 15px 15px;
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

        table tr td button:before {
            content: "";
            background-color: rgba(255, 255, 255, 0.2);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: transform 0.3s ease;
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
            <li><a href="adminLogout.php">logout</a></li>
        </ul>
    </div>

    <div class="sidebar2">
        <h1 class="adminTopic">DAFTAR PEMESANAN</h1>

        <?php
        $sqlget = "SELECT * FROM booking";
        $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nomor Induk Kependudukan</th>
                <th>Telepone</th>
                <th>E-mail</th>
                <th>Jumlah Tiket Dipesan</th>
                <th>ID Route</th>
                <th>Selected Seats</th>
                <th>ID Payment</th>
                <th>Nama Penumpang</th>
                <th>ID Penumpang</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            ";

            while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                echo "<tr>
                        <td>{$row['id_booking']}</td>
                        <td>{$row['nik']}</td>
                        <td>{$row['telephone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['jumlah_tiket']}</td>
                        <td>{$row['id_route']}</td>
                        <td>{$row['id_payment']}</td>
                        <td>{$row['nama_penumpang']}</td>
                        <td>{$row['id_penumpang']}</td>
                        <td>";

                if (isset($row['selected_seats'])) {
                    echo $row['selected_seats'];
                } else {
                    echo "N/A"; 
                }

                echo "</td>
                        <td>
                            <button>
                                <a href='updateBooking.php?id={$row['id_booking']}'>Update</a>
                            </button>
                        </td>
                        <td>
                            <button>
                                <a href='deleteBooking.php?id={$row['id_booking']}'>Delete</a>
                            </button>
                        </td>
                    </tr>";

            }

        echo "</table>";
        ?>
    </div>
</body>

</html>
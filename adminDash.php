<?php 
session_start();
?>

<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssfile/sidebar.css">
    <title>Admin Manage Bus</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <style>
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
            border-radius: 10px 10px 0px 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table th {
            border-bottom: 2px solid rgb(187, 187, 187);
            padding: 15px 0;
            font-family: "balsamiq_sansitalic";
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
            color: black;
            border-radius: 5px;
            padding: 6px 12px;
            text-decoration: none;
            margin: 10px;
            font-weight: 700;
        }

        table tr td button {
            padding: 8px 12px;
            background-color: #9baac2;
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

        table tr td button:hover:before {
            transform: translate(-50%, -50%) scale(3);
        }

        .btnPolicy {
            padding: 22px 40px;
            background-color: #9baac2;
            color: black;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btnPolicy:hover {
            background-color: #33548B;
            color: white;
        }

        .btnPolicy:before {
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

        .btnPolicy:hover:before {
            transform: translate(-50%, -50%) scale(3);
        }

        .add-route-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
            margin-left: 60px;
        }

        .sidebar2 {
            margin-left: 0px;
            padding: 20px;
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
        <header>
            <img src="image/user.png" alt="Logo">
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
        <h1 class="adminTopic">MENGELOLA RUTE BUS</h1>
        <?php
            $sqlget = "SELECT * FROM route";
            $sqldata = mysqli_query($conn, $sqlget) or die('error getting');
            echo "<table>";
            echo "<tr>
                <th>ID</th>
                <th>ASAL</th>
                <th>TUJUAN</th>
                <th>KELAS BUS</th>
                <th>TANGGAL KEBERANGKATAN</th>
                <th>WAKTU KEBERANGKATAN</th>
                <th>HARGA</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>";
            while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                echo "<tr>
                    <td>{$row['id_route']}</td>
                    <td>{$row['via_city']}</td>
                    <td>{$row['destination']}</td>
                    <td>{$row['bus_name']}</td>
                    <td>{$row['departure_date']}</td>
                    <td>{$row['departure_time']}</td>
                    <td>{$row['cost']}</td>
                    <td>
                        <button class='btn-action'>
                            <a href='updateRoute.php?id={$row['id_route']}'>Update</a>
                        </button>
                    </td>
                    <td>
                        <button class='btn-action'>
                            <a href='deleteRoute.php?id={$row['id_route']}'>Delete</a>
                        </button>
                    </td>
                </tr>";
            }
            echo "</table>";
        ?>
        <br>
        <div class="add-route-container">
            <a href="Addroute.php">
                <button class="btnPolicy">Add Route</button>
            </a>
        </div>
    </div>
</body>
</html>

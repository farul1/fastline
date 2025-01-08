<?php
session_start();
include("connection.php");
include("function.php");
$user_data = check_login($conn);
?>

<?php include("connection.php") ?>

<!DOCTYPE html>
<html>

<head>
    <title>User Pemesanan Tiket</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssfile/sidebar.css">
    <style type="text/css">
body {
    background-image: url("image/bis18.jpg");
    background-position: center;
    background-size: cover;
    height: 100vh;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    font-family: 'Arial', sans-serif;
}

.adminTopic {
        text-align: center; 
        color: #fff; 
        font-size: 30px;
        margin-top: 10px;
        margin-left: -20%; 
    }

table {
    width: 80%;
    margin: auto;
    margin-top: 20px;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px #7487A4;
    overflow: hidden;
    margin-left: 0%;
}

table th, table td {
    padding: 15px;
    transition: background-color 0.3s ease;
}

table th {
    background-color: #7487A4;
    color: #fff;
}

table tr:nth-child(even) {
    background-color: #f5f5f5;
}

table tr:hover {
    background-color: #ddd;
}

table tr td a {
    display: block;
    color: #fff;
    background-color: #7487A4;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 10px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

table tr td a:hover {
    background-color: #7487A4; 
    transform: scale(1.05); 
}

table tr td button:hover {
    background-color: #ffffff;
    color: #fff;
}

.sidebar2 {
    margin-left: 250px;
    padding: 20px;
}

.sidebar2 a {
    text-decoration: none;
    color: #000000;
    transition: color 0.3s ease;
}

.sidebar2 a:hover {
    color: rgb(255, 255, 255);
}

        button {
            padding: 1px;
            border-radius: 10px;
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
            <p><?php echo $user_data['username']; ?></p>
        </header>
        <ul>
            <li><a href="viewBus.php">Pemesanan Tiket</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
    <div class="sidebar2">
        <h1 class="adminTopic">Pemesanan Tiket</h1>
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
            <th>Pemesanan</th>
          </tr>";
        while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['id_route'];
            echo "</td><td>";
            echo $row['via_city'];
            echo "</td><td>";
            echo $row['destination'];
            echo "</td><td>";
            echo $row['bus_name'];
            echo "</td><td>";
            echo $row['departure_date'];
            echo "</td><td>";
            echo $row['departure_time'];
            echo "</td><td>";
            echo $row['cost'];
            echo "</td>";
        ?>
            <td>
                <button>
                    <a href="AddBooking.php?id=<?php echo $row['id_route']; ?>">
                        Pesan Sekarang
                    </a>
                </button>
            </td>
        <?php
        }
        echo "</table>";
        ?>
    </div>
</body>

</html>

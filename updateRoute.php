<?php
session_start();
?>
<?php include("connection.php") ?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Rute</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssfile/sidebar.css">
    <link rel="stylesheet" href="cssfile/signUp2.css">
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

        .form_wrap .submit_btn:hover {
            color: #fff;
            font-weight: 600;
        }

        #decription {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #9597a6;
            padding: 10px;
            outline: none;
            color: black;
        }

        .idclass {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #9597a6;
            padding: 10px;
            outline: none;
            color: black;
        }
        .input_wrap {
        background-color: rgba(0, 0, 0, 0.3);
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
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

    <?php
    if (isset($_POST['routeUpdate'])) {
        $id = $_POST['id'];
        $via_city = $_POST['Via_city'];
        $destination = $_POST['destination'];
        $bus_name = $_POST['bus_name'];
        $dep_date = $_POST['departure_date'];
        $dep_time = $_POST['departure_time'];
        $cost = $_POST['cost'];

        $query = "UPDATE `route` SET Via_city='$via_city',destination='$destination',bus_name='$bus_name',departure_date='$dep_date',departure_time='$dep_time',cost='$cost' where id_route=$id";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo '<script type="text/javascript">alert("Route updated successfully!!!")</script>';
        } else {
            echo '<script type="text/javascript">alert("Route not updated!!!")</script>';
        }
    }
    ?>

    <div class="sidebar2">
        <div class="wrapper">
            <div class="registration_form">
                <div class="title">
                    Update Data Bus Rute
                </div>
                <form action="#" method="POST">
                    <div class="form_wrap">
                        <div class="input_wrap">
                            <label for="title">ID</label>
                            <input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id']; ?>">
                        </div>
                        <div class="input_wrap">
                            <label for="title">ASAL</label>
                            <input type="text" id="title" name="Via_city" placeholder="Via_city" required>
                        </div>
                        <div class="input_wrap">
                            <label for="title">TUJUAN</label>
                            <input type="text" id="title" name="destination" placeholder="Destination" required>
                        </div>
                        <div class="input_wrap">
                            <label for="title">KELAS BUS</label>
                            <input type="text" id="title" name="bus_name" placeholder="Bus Name" required>
                        </div>
                        <div class="input_wrap">
                            <label for="title">TANGGAL KEBERANGKATAN</label>
                            <input type="Date" id="title" name="departure_date" placeholder="Departure Date" class="idclass">
                        </div>
                        <div class="input_wrap">
                            <label for="title">WAKTU KEBERANGKATAN</label>
                            <input type="Time" id="title" name="departure_time" placeholder="Departure Time" class="idclass">
                        </div>
                        <div class="input_wrap">
                            <label for="title">HARGA</label>
                            <input type="number" id="title" name="cost" placeholder="Cost" class="idclass">
                        </div>
                        <div class="input_wrap">
                            <input type="submit" value="Update Route Now" class="submit_btn" name="routeUpdate">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

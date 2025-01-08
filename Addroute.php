<?php 
  session_start();
?>
<?php 
  include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cssfile/sidebar.css">
    <link rel="stylesheet" href="cssfile/signUp2.css">
    <title>Penambahan Rute</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <style type="text/css">
        body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form_wrap .submit_btn:hover {
            color: #fff;
            font-weight: 600;
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
        <?php 
            if(isset($_POST['routeAdd'])){
                $via_city = $_POST['via_city'];
                $destination = $_POST['destination'];
                $bus_name = $_POST['bus_name'];
                $dep_date = $_POST['departure_date'];
                $dep_time = $_POST['departure_time'];
                $cost = $_POST['cost'];

                if($conn->connect_error) {
                    die('Connection Failed :'.$conn->connect_error);
                } else {
                    $stmt = $conn->prepare("INSERT INTO route(via_city, destination, bus_name, departure_date, departure_time, cost) VALUES(?,?,?,?,?,?)");
                    $stmt->bind_param("sssssi", $via_city, $destination, $bus_name, $dep_date, $dep_time, $cost);
                    $stmt->execute();
                    echo '<script type="text/javascript">alert("Route added successfully")</script>';
                    $stmt->close();
                    $conn->close();
                }
            }
        ?>

              <div class="wrapper">
                <div class="registration_form">
                  <div class="title">
                  Penambahan Rute
                  </div>

                  <form method="POST">
                    <div class="form_wrap">
                      
                      <div class="input_wrap">
                        <label for="title">ASAL</label>
                        <input type="text" id="title" name="via_city" placeholder="Via_city" required>
                      </div>

                      <div class="input_wrap">
                        <label for="title">TUJUAN</label>
                        <input type="text" id="title" name="destination" placeholder="Destination" required>
                      </div>


                      <div class="input_wrap">
                        <label for="title">KELAS BUS</label>
                        <input type="text" id="title" name="bus_name" placeholder="Bus Name"  required>
                      </div>

                      <div class="input_wrap">
                        <label for="title">TANGGAL KEBERANGKATAN</label>
                        <input type="date" id="title" name="departure_date" placeholder="Date of Departure" class="idclass" required>
                      </div>

                      <div class="input_wrap">
                        <label for="title">WAKTU KEBERANGKATAN</label>
                        <input type="Time" id="title" name="departure_time" placeholder="Time of Departure" class="idclass" required>
                      </div>

                      <div class="input_wrap">
                        <label for="title">HARGA</label>
                        <input type="text" id="title" name="cost" placeholder="Cost" class="idclass" required>
                      </div>
                      
                      
                      <div class="input_wrap">
                        <input type="submit" value="Add Route Now" class="submit_btn" name="routeAdd">

                      </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

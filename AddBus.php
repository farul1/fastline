<?php
session_start();
include("connection.php");

// Bus adding logic
if(isset($_POST['AddBus'])){
    $nameOFbus = $_POST['bus_name'];
    $tel = $_POST['tel'];

    if($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO bus(Bus_Name, no_telp) VALUES(?, ?)");
        $stmt->bind_param("ss", $nameOFbus, $tel);
        $stmt->execute();

        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully Bus Added!!!');
                window.location.href='ManagesBuses.php';
              </script>");

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Penambahan Bus</title>
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
        .form_wrap .submit_btn:hover{
            color:#fff;
            font-weight: 600;

        }
        .idclass{
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
            <li><a href="adminLogout.php">Logout</a></li>
    </ul>
</div>

<div class="sidebar2">
    <div class="wrapper">
      <div class="registration_form">
        <div class="title">
        Penambahan Bus        
      </div>
        <form action="#" method="POST">
          <div class="form_wrap">
            
            <div class="input_wrap">
              <label for="title">Bus Name</label>
              <input type="text" id="title" name="bus_name" placeholder="Bus Name" required>
            </div>


            <div class="input_wrap">
              <label for="title">Telephone</label>
              <input type="text" id="title" name="tel" placeholder="Tel" required>
            </div>

            <div class="input_wrap">
              <input type="submit" value="Add Bus Now" class="submit_btn" name="AddBus">

        </div>
      </div>
    </form>
  </div>
</div>
</div>

</body>
</html>
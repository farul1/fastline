<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Page Pemesanan</title>
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
        .idclass {
          width: 100%;
          padding: 10px;
        }
        .input_wrap {
          background-color: rgba(0, 0, 0, 0.3);
          padding: 10px;
          margin-bottom: 10px;
          border-radius: 5px;
        }

        .seat_selection {
          margin-top: 20px;
          text-align: center;
        }

        .seat {
          display: inline-block;
          width: 30px;
          height: 30px;
          background-color: #ddd;
          margin: 5px;
          text-align: center;
          line-height: 30px;
          cursor: pointer;
          transition: background-color 0.3s ease-in-out;
          color: #000; 
        }
        .selected {
          background-color: #3498db;
          color: #fff;
        }
        h2 {
          color: #fff;
          font-size: 14px;
          margin-bottom: 10px;
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
      <p><?php echo $user_data['username'];?></p>
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
$selectedSeats = isset($_POST['selected_seats']) ? $_POST['selected_seats'] : [];

if (isset($_POST['AddBooking'])) {
    $nik = $_POST['nik'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $nama_penumpang = $_POST['nama_penumpang'];
    $id_route = $_POST['id_route'];
    $id_penumpang = $_POST['id_penumpang'];

    try {
        if ($conn->connect_error) {
            throw new Exception('Connection Failed: ' . $conn->connect_error);
        }

        $checkPenumpangQuery = $conn->prepare("SELECT id_penumpang FROM nama_penumpang WHERE id_penumpang = ?");
        $checkPenumpangQuery->bind_param("i", $id_penumpang);
        $checkPenumpangQuery->execute();
        $checkPenumpangResult = $checkPenumpangQuery->get_result();

        if ($checkPenumpangResult->num_rows == 0) {
            // If id_penumpang doesn't exist, provide a more detailed error message
            throw new Exception("Error: ID Penumpang ($id_penumpang) does not exist. Please enter a valid ID Penumpang.");
        }

        if (empty($selectedSeats)) {
            // Handle the case where no seats are selected
            throw new Exception('Error: Please select at least one seat.');
        }

        $conn->begin_transaction();

        $selectedSeatsValue = implode(",", $selectedSeats);

        $stmt = $conn->prepare("INSERT INTO booking (nik, telephone, email, jumlah_tiket, id_route, selected_seats, nama_penumpang, id_penumpang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            throw new Exception('Error in preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("ssssssss", $nik, $tel, $email, $jumlah_tiket, $id_route, $selectedSeatsValue, $nama_penumpang, $id_penumpang);

        if (!$stmt->execute()) {
            throw new Exception('Error in executing statement: ' . $stmt->error);
        }

        $lastBookingID = $stmt->insert_id;

        $conn->commit();

        $stmt->close();

        header("Location: AddPay.php?booking_id=$lastBookingID");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo 'Error: ' . $e->getMessage();
    }
}
?>


    <div class="wrapper">
      <div class="registration_form">
        <div class="title">
          Pemesanan Tiket
        </div>

        <form action="#" method="POST">
          <div class="form_wrap">

          <div class="input_wrap">
              <label for="title">Nomor Induk Kependudukan (NIK)</label>
              <input type="text" id="title" name="nik" placeholder="Nomor Induk Kependudukan (NIK)" required>
          </div>

          <div class="input_wrap">
              <label for="title">Nama Penumpang</label>
              <input type="text" id="title" name="nama_penumpang" placeholder="Nama Penumpang" required>
          </div>

          <div class="input_wrap">
            <label for="title">ID Penumpang</label>
            <input type="text" id="title" name="id_penumpang" placeholder="ID Penumpang" required>
          </div>


            <div class="input_wrap">
              <label for="title">Nomor Telepon</label>
              <input type="text" id="title" name="tel" placeholder="Nomor Telepon" required>
            </div>

            <div class="input_wrap">
              <label for="title">E-mail</label>
              <input type="email" id="title" name="email" placeholder="E-mail" class="idclass" required>
            </div>

            <div class="input_wrap">
              <label for="title">Jumlah Tiket Dipesan</label>
              <input type="text" id="title" name="jumlah_tiket" placeholder="Jumlah Tiket Dipesan" required>
            </div>


            <div class="input_wrap">
              <label for="title">ID Route</label>
              <input type="text" id="title" name="id_route" placeholder="ID Route" required>
            </div>

            <div class="seat_selection">
              <h2>Pilih Tempat Duduk (Max 36 Bis)</h2>
              <?php
              for ($i = 1; $i <= 36; $i++) {
                echo '<input type="checkbox" name="selected_seats[]" value="' . $i . '" id="seat' . $i . '" onclick="selectSeat(' . $i . ')"> <label for="seat' . $i . '">' . $i . '</label>';
              }
              ?>
            </div>

            <div class="input_wrap">
              <input type="submit" value="Booking Now" class="submit_btn" name="AddBooking">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    var selectedSeats = [];

    function selectSeat(seatNumber) {
      var seatElement = document.getElementById('seat' + seatNumber);

      if (selectedSeats.includes(seatNumber)) {
        selectedSeats = selectedSeats.filter(function (seat) {
          return seat !== seatNumber;
        });
        seatElement.classList.remove('selected');
      } else {
        if (selectedSeats.length < 5) { 
          selectedSeats.push(seatNumber);
          seatElement.classList.add('selected');
        } else {
          alert('Max 5 seats can be selected.');
        }
      }

      console.log('Selected Seats: ' + selectedSeats.join(', '));
    }
  </script>

</body>
</html>

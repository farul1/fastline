<?php
session_start();
include("connection.php");

if (isset($_POST['updateBooking'])) {
    // Assuming id_booking is an integer, you might want to validate/sanitize it.
    $id = (int)$_POST['id'];
    $id_penumpang = (int)$_POST['id_penumpang'];
    $nama_penumpang = mysqli_real_escape_string($conn, $_POST['nama_penumpang']);
    $nik = mysqli_real_escape_string($conn, $_POST['nik']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $board_place = (int)$_POST['board_place'];

    // Escape each element in the array using array_map and mysqli_real_escape_string
    $selectedSeats = implode(',', array_map(function ($seat) use ($conn) {
        return mysqli_real_escape_string($conn, $seat);
    }, $_POST['selected_seats']));

    $id_route = (int)$_POST['id_route'];

    // Define $jumlah_tiket and $selectedSeatsValue
    $jumlah_tiket = mysqli_real_escape_string($conn, $_POST['board_place']);
    $selectedSeatsValue = $selectedSeats;

    // Check if the id_penumpang exists in nama_penumpang table
    $checkPenumpangQuery = $conn->prepare("SELECT id_penumpang FROM nama_penumpang WHERE id_penumpang = ?");
    $checkPenumpangQuery->bind_param("i", $id_penumpang);
    $checkPenumpangQuery->execute();
    $checkPenumpangResult = $checkPenumpangQuery->get_result();

    if ($checkPenumpangResult->num_rows == 0) {
        // If id_penumpang doesn't exist, provide a more detailed error message
        echo '<script type="text/javascript">alert("Error: ID Penumpang does not exist. Please enter a valid ID Penumpang.");</script>';
    } else {
        // Continue with the rest of your code for updating the booking
        $query = "UPDATE `booking` SET nik=?, telephone=?, email=?, jumlah_tiket=?, selected_seats=?, id_route=?, id_penumpang=?, nama_penumpang=? WHERE id_booking=?";
        
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssiiiii', $nik, $tel, $email, $jumlah_tiket, $selectedSeatsValue, $id_route, $id_penumpang, $nama_penumpang, $id);

        // Execute the statement
        $query_run = mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        if ($query_run) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully Booking Updated!!!');
                window.location.href='BookingManage.php';
            </script>");
        } else {
            echo '<script type="text/javascript">alert("Booking not updated!!!");</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pemesanan</title>
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
        <header>
            <img src="image/user.png" alt="Logo">
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
        <div class="wrapper">
            <div class="registration_form">
                <div class="title">
                    Update Pemesanan Penumpang
                </div>
                <form action="#" method="POST">
                    <div class="form_wrap">
                        <div class="input_wrap">
                            <label for="title">Id</label>
                            <input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id']; ?>">
                        </div>
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
                            <input type="text" id="title" name="id_penumpang" placeholder="ID Penumpang" class="idclass" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Nomer Telpon</label>
                            <input type="text" id="title" name="tel" placeholder="Nomer Telpon" required>
                            </div>

                        <div class="input_wrap">
                            <label for="title">E-mail</label>
                            <input type="E-mail" id="title" name="email" placeholder="E-mail" class="idclass" required>
                            </div>

                        <div class="input_wrap">
                            <label for="title">Jumlah Tiket Dipesan</label>
                            <input type="text" id="title" name="board_place" placeholder="Jumlah Tiket Dipesan" required>
                            </div>

                        <div class="input_wrap">
                            <label for="title">ID Route</label>
                            <input type="text" id="title" name="id_route" placeholder="ID Route" required>
                        </div>


                        <div class="seat_selection">
                                <h2>Pilih Tempat Duduk (Max 36 Bis)</h2>
                                <?php
                                for ($i = 1; $i <= 36; $i++) {
                                    echo '<input type="checkbox" name="selected_seats[]" value="' . $i . '" id="seat' . $i . '"> <label for="seat' . $i . '">' . $i . '</label>';
                                }
                                ?>
                            </div>

                        <div class="input_wrap">
                            <input type="submit" value="Update Now" class="submit_btn" name="updateBooking">
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
                selectedSeats = selectedSeats.filter(function(seat) {
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

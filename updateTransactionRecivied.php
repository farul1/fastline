<?php
session_start();
?>

<?php include("connection.php") ?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Transaksi</title>
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
        <?php
        if (isset($_POST['updateTransaction'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $amount = $_POST['amount'];

            $query = "UPDATE `payment` SET amount='$amount',name='$name',email='$email',address='$address',city='$city' where id_payment=$id";

            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully Transaction Updated!!!');
                    window.location.href='PaymentManage.php';
                    </script>");
            } else {
                echo '<script type="text/javascript">alert("Booking not updated!!!")</script>';
            }
        }
        ?>

        <div class="wrapper">
            <div class="registration_form">
                <div class="title">
                    Update Booking
                </div>

                <form action="#" method="POST">
                    <div class="form_wrap">
                        <div class="input_wrap">
                            <label for="title">Id</label>
                            <input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id']; ?>">
                        </div>

                        <div class="input_wrap">
                            <label for="title">Jumlah pembayaran</label>
                            <input type="number" id="title" name="amount" placeholder="Paid Amount" class="idclass" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Nama Penumpang</label>
                            <input type="text" id="title" name="name" placeholder="Passenger Name" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Alamat</label>
                            <input type="text" id="title" name="address" placeholder="Address">
                        </div>

                        <div class="input_wrap">
                            <label for="title">E-mail</label>
                            <input type="E-mail" id="title" name="email" placeholder="E-mail" class="idclass" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Kota</label>
                            <input type="text" id="title" name="city" placeholder="board place" required>
                        </div>

                        <div class="input_wrap">
                            <input type="submit" value="Update Now" class="submit_btn" name="updateTransaction">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
session_start();
include("nav.php");
include("connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['Admin_username'];
    $password = $_POST['Admin_password'];

    $query = "SELECT * FROM `admin` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("location:adminDash.php");
    } else {
        echo '<script type="text/javascript">alert("Incorrect password!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Fastline Admin Login</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="cssfile/nav4.css">
    <link rel="stylesheet" href="cssfile/footer_l.css">
    <link rel="stylesheet" href="cssfile/login2.css">
    <link rel="stylesheet" a href="css\font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <style type="text/css">
        body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        

        .sign_up {
            font-size: 20px;
        }

        .sign_up:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>

</head>
<body>
<div class="login-box">
    <img src="image/user.png" class="avatar">
    <h1>Admin Login</h1>
    <form method="POST">
        <p>Username</p>
        <input type="text" name="Admin_username" placeholder="Enter Username">
        <p>Password</p>
        <input type="password" name="Admin_password" placeholder="Enter Password">
        <input type="submit" name="login" value="Login">
    </form>
</div>
</body>
</html>

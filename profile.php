<?php 
session_start();

    include("connection.php");
    include("function.php");

    $user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cssfile/sidebar.css">

    <style>
        body {
            background-image: url(image/bis14.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        * {
            padding: 0;
            margin: 0;
            list-style: none;
            box-sizing: border-box;
        }

        .logo {
            color: #fff;
            font-style: oblique;
            font-size: 35px;
            line-height: 80px;
            padding: 0px;
            font-weight: bold;
            float: left;
        }

        nav ul {
            float: left;
            margin-left: 20px;
        }

        nav ul li {
            display: inline-block;
            line-height: 80px;
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            font-size: 17px;
            text-transform: uppercase;
            border-radius: 15px;
            color: #fff;
        }

        nav ul li a:hover {
            background-color: #1b9bff;
            transition: 0.5s;
        }

        .usern {
            font-size: 25px;
            font-family: Arial;
            margin-top: 20px;
            text-align: center;
            color: #fff;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 5px 5px 15px 15px rgba(206, 233, 241, 0.8), -5px -5px 5px rgba(255, 255, 255, 0.2),
                15px 15px 15px rgba(0, 0, 0, 0.1), inset -5px -15px 15px rgba(255, 255, 255, 0.2),
                inset 5px 5px 5px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            margin: 150px;
        }

        .wrapper .left {
            width: 100%;
            max-width: 300px;
            background: #3A5795;
            padding: 50px 35px;
            text-align: center;
            color: #fff;
            border-radius: 100px;
        }

        .wrapper .left img {
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .wrapper .left button {
            background-color: #6e83b3;
            border: none;
            border-radius: 7px;
            color: white;
            padding: 10px;
            width: 80%;
            margin: auto;
            display: block;
            margin-top: 20px;
        }

        .wrapper .left button:hover {
            background-color: #51708a;
        }

        .wrapper .left a {
            text-decoration: none;
            color: #fff;
            display: block;
            margin-top: 20px;
        }

        .wrapper .right {
            width: 100%;
            color: #fff;
            padding: 0 50px;
            font-size: 15px;
        }

        .wrapper .right h3 {
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #fff;
        }

        .wrapper .right hr {
            border: 1px solid #fff;
            width: 50%;
        }

        .wrapper .right p {
        margin-bottom: 10px;

        }

        .btn3,
        .btn4 {
            background-color: #6e83b3;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 10px;
            width: 100px;
            margin-right: 10px;
            cursor: pointer;
        }

        .btn3:hover,
        .btn4:hover {
            background-color: #96adc0;
        }
        @media (min-width: 768px) {
            .wrapper {
                width: 80%;
            }

            .wrapper .left {
                width: 30%;
            }

            .wrapper .right {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <div class="usern"><b><font color="#fff"> Selamat Datang <?php echo $user_data['username'];?></font></b></div>
    <div class="wrapper">
        <div class="left">
            <img src="image/user.png" alt="user" width="200">
            <a href="viewBus.php"><button class="btn4">Home </button></a>
        </div>
        <div class="right">
            <h3>Account Information</h3>
            <hr />
            <p>User name: <?php echo $user_data['username'];?> </p><br>
            <p>Email: <?php echo $user_data['email'];?> </p><br>
            <p>First name: <?php echo $user_data['First_Name'];?></p><br>
            <p>Last name: <?php echo $user_data['Last_Name'];?></p><br>
            <h3>LOGOUT & SECURITY</h3>
            <hr />
            <a href="updateProfile.php?id=<?php echo $user_data['id_users'];?>">
                <button class="btn3">Update</button>
            </a>
            <a href="logout.php">
                <button class="btn3">Logout</button>
            </a>
            <a href="deleteProfile.php?id=<?php echo $user_data['id_users'];?>">
                <button class="btn3">Delete</button>
            </a>
        </div>
    </div>
</body>

</html>

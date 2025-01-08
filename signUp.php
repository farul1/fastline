<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="cssfile/nav4.css">
    <link rel="stylesheet" href="cssfile/signUp2.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">
        body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .confirm {
            background-color: black;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php include("nav.php"); ?>

<div class="confirm">

    <?php
    session_start();
    include("connection.php");
    include("function.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['user_name'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_pass = $_POST['cpassword'];

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            if ($password == $con_pass) {
                $user_id = random_num(20);
                $query = "insert into users (user_id,First_Name,Last_Name,username,email,password) values ('$user_id','$fname','$lname','$user_name','$email','$password')";
                mysqli_query($conn, $query);

                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully your Sign Up!!!');
                    window.location.href='Login.php';
                </script>");
            } else {
                echo "Please enter confirm password as previous one!!";
            }
        } else {
            echo "Please enter some valid information!";
        }
    }
    ?>

</div>

<div class="wrapper">
    <div class="registration_form">
        <div class="title">
            Sign Up for Fastline Bus Service
        </div>

        <form action="#" method="POST">
            <div class="form_wrap">
                <div class="input_grp">
                    <div class="input_wrap">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="input_wrap">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="input_wrap">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="input_wrap">
                    <label for="uname">Username</label>
                    <input type="text" id="uname" name="user_name" placeholder="Username" required>
                </div>
                <div class="input_wrap">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="input_wrap">
                    <label for="Confirm_password">Confirm Password</label>
                    <input type="password" id="password" name="cpassword" placeholder="Confirm Password" required>
                </div>
                <div class="input_wrap">
                    <input type="submit" value="Register Now" class="submit_btn">
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>

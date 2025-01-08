<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastline Help</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="cssfile/help2.css" />
    <link rel="stylesheet" href="cssfile/footer_l.css">
    <link rel="stylesheet" href="cssfile/nav4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style type="text/css">
        body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            animation-name: animate;
            animation-direction: alternate-reverse;
            animation-duration: 40s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-play-state: running;
            animation-timing-function: ease-in-out;
        }
        @keyframes animate {
            0%, 100% {
                background-image: url(image/bis18.jpg);
                transform: scale(1);
            }

            40%, 60%, 80% {
                background-image: url(image/bis14.jpg);
                transform: scale(1.05);
            }

            50%, 70% {
                background-image: url(image/bis14.jpg);
                transform: scale(0.95);
            }
        }
    </style>
</head>

<body>
<?php include("nav.php"); ?>
    <div class="wrapper">
        <h2>HELP CENTER</h2>
        <div class="line"><br><br><br><br></div>
    </div>

    <div class="single-service">
        <div class="help">
            <i class="fa fa-search"></i>
        </div>
        <span></span>
        <h3>Customer Support</h3><br><br>
        <p>We help you to make your journey better.</p>
    </div>

    <div class="single-service">
        <div class="help">
            <i class="fa fa-user"></i>
        </div>
        <span></span>
        <h3>TEAM MEMBERS</h3><br><br>
        <p>- Ahmad Ilman Nafia 1204220026</p>
        <p>- Syafarul Priwantoro 1204220018</p>
        <p>- Muhammad Rafli 1204220089</p>
        <p>- Syam Aldi Firmansyah 1204210113</p>
    </div>

    <div class="single-service">
        <div class="help">
            <i class="fa fa-headphones"></i>
        </div>
        <span></span>
        <h3>More Choices</h3><br><br>
        <p>We give you maximum choices across all the routes to choose your bus.</p>
    </div>


    <script src="js/mystyle.js"></script>
</body>

</html>

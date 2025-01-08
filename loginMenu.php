<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastline Login Menu</title>
	<link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="cssfile/nav1.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <style>
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
			font-family: Arial, sans-serif;
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
		.box {
			width: 500px;
			height: 250px;
			margin: auto;
			margin-top: 80px;
		}

		a {
			text-decoration: none;
		}

		.box1, .box2 {
			width: 500px;
			height: 122px;
			border: 4px solid #6991AF;
			background-color: rgba(1, 3, 0.3, 0.5);
			border-radius: 50px;
			margin-top: 35px;
			text-align: center;
			line-height: 122px; 
		}

		.box1:hover, .box2:hover {
			cursor: pointer;
			background-color: #6991AF;
			color: #fff;
		}

		.loginMenu {
			text-align: center;
			color: #fff;
			font-size: 40px;
			margin-top: 50px;
		}

		.menu {
			color: #fff;
			text-decoration: none;
			transition: color 0.3s, font-size 0.3s;
		}
		.menu:hover {
			color: #ffffff;
			font-size: 36px;
		}

		.box1 h1, .box2 h1 {
			margin: 0;
		}
    </style>
</head>
<body>
<h1 class="loginMenu">LOGIN MENU</h1>

<div class="box">
    <a href="Login.php">
        <div class="box1">
            <h1 class="menu">User Login</h1>
        </div>
    </a>

    <a href="adminLogin.php">
        <div class="box2">
            <h1 class="menu">Admin Login</h1>
        </div>
    </a>
</div>

</body>
</html>

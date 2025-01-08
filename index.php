<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <script type='text/javascript'>
    var msg = " Fastline Home ";
    msg = " // Layanan Bus / Based Pulau Jawa // " + msg;
    var pos = 0;

    function scrollMSG() {
        document.title = msg.substring(pos, msg.length) + msg.substring(0, pos);
        pos++;

        if (pos > msg.length) {
            pos = 0;
        }
        setTimeout(scrollMSG, 90);
    }
    scrollMSG();
</script>
    <link rel="icon" href="image/ticket.png" type="image">
    <link rel="stylesheet" href="cssfile/nav4.css">
    <link rel="stylesheet" href="cssfile/footer4.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous" />

        <style type="text/css">
            body {
                background-image: url(image/bis18.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            #container {
                height: 100vh;
                width: 100%;
                background-image: url(image/bis18.jpg);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                transition: 2s;
                font-family: cursive;
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

                .home_details {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    color: #fff;
                    font-family: normal;
                    font-size: 74px;
                    padding: 162px 5px 5px 185px;
                }

                .font {
                    color: #41608F;
                }

                .btnHome {
                    font-family: inherit; 
                    background-color: #41608F;
                    padding: 13px 44px 13px 44px;
                    font-size: 18px;
                    border-style: none;
                    transition: background-color 0.3s ease-in-out; 
                }

                .btnHome:hover {
                    background-color: #2d3950;
                    cursor: pointer;
                }




    </style>

</head>

<body>

    <div id="container">
        <?php include("nav.php"); ?>

        <h1 class="home_details">Paket Bus dijamin murah dan cepat. <br><font class="font">Di Mana Saja.</font><br>
        <a href="signUp.php"><button class="btnHome">DAFTAR SEKARANG</button></a>
        </h1>
    </div>

    <?php include("footer.php"); ?>

</body>



</html>

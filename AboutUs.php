<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>About US Fastline</title>
    <link rel="icon" href="image/ticket.png" type="image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfile/nav4.css">
    <link rel="stylesheet" href="cssfile/footer_l.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .about-sec {
            display: flex;
            padding: 3rem 0;
            width: 100%;
            justify-content: center;
            background: rgba(1, 2, 2, 0.5);
            margin-top: 106px;
        }

        .about-img {
            width: 350px;
            height: 250px;
            margin: 0 3rem;
        }
        .about-img img {
            height: 100%;
            width: 100%;
        }

        .about-intro {
            width: 400px;
            height: 250px;
            border-left: 3px solid #1D3BBD;
            padding-left: 2rem;
            margin: 0 3rem;
        }
        .about-intro p {
            margin-top: 1.0rem;
            font-size: 14px;
            opacity: 0.7;
            text-align: left;
        }
        @media only screen and (max-width: 900px) {
            .about-sec {
                flex-direction: column;
                align-items: center;
            }

            .about-img {
                width: 80%;
            }

            .about-intro {
                width: 100%;
                height: 100%;
                border-top: 3px solid #1D3BBD;
                border-left: none;
                padding: 1rem;
                margin-top: 2rem;
            }
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 50px auto;
            background-color: #DADCDF;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        th {
            background-color: #41608F;;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td a {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        td button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .topic_bus {
            text-align: center;
            color: #fff;
            margin-top: 50px;
            font-size: 40px;

        }

        @media only screen and (max-width: 900px) {
            table {
                font-size: 14px;
            }
        }
        .custom-image {
            display: block;
            margin: 20px auto; 
            max-width: 50%; 
            height: auto;
            border-radius: 20px;
        }

    </style>
</head>

<body>
    <?php include("nav.php"); ?>

    <div class="about-sec">
        <div class="about-img">
            <img src="image/bus6.png">
        </div>
        <div class="about-intro">
            <h3>About Us<span style="color: #4078b8;"> !</span></h3>
            <p>Kami, FastlineTicket, adalah pelopor Layanan Pemesanan Tiket Bus Online di Indonesia sejak tahun 2023. Langkah ini bertujuan untuk memberikan kemudahan dan kenyamanan kepada pelanggan dalam merencanakan perjalanan mereka. Dengan layanan kami, Anda dapat dengan mudah dan cepat memesan tiket bus untuk destinasi di seluruh Indonesia.</p>
        </div>
    </div>

    <?php include("connection.php");?>
    <h1 class="topic_bus">Armada Bus</h1>

    <?php
        $sqlget = "SELECT * FROM bus";
        $sqldata = mysqli_query($conn, $sqlget) or die('error getting');
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Bus Name</th>
            <th>Tel Number</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id_bus']; ?></td>
                <td><?php echo $row['Bus_Name']; ?></td>
                <td><?php echo $row['no_telp']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <img src="image/RUTE.jpg" alt="rute layanan" class="custom-image">

    <div class="about-sec">
        <div class="about-img">
            <img src="image/bus4.png">
        </div>
        <div class="about-intro">
            <p>Rencanakan perjalanan Anda, pesan tiket bus, dan tiba di tujuan Anda.</p>
            <p>Kami menawarkan platform pemesanan bus online lengkap di mana Anda dapat membeli dan menjual kursi bus. Para pelancong dapat membeli tiket bus secara online, dan sebagai balasannya, pesan teks dengan rincian perjalanan akan dikirimkan untuk mengonfirmasi reservasi kursi.</p>
        </div>
    </div>
</body>
</html>

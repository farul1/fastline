<?php 
	session_start();
?>
<?php 
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Bus</title>
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
		.form_wrap .submit_btn:hover {
			color: #fff;
			font-weight: 600;
		}
		#decription {
			width: 100%;
			border-radius: 3px;
			border: 1px solid #9597a6;
			padding: 10px;
			outline: none;
			color: black;
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
		<header>
			<img src="image/Re.png">
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
			if(isset($_POST['BusUpdate'])){
				$id = $_POST['id'];
				$nameOFbus = $_POST['bus_name'];
				$tel = $_POST['tel'];
			
				$query = "UPDATE `bus` SET Bus_Name=?, no_telp=? WHERE id_bus=?";
				$stmt = $conn->prepare($query);
				$stmt->bind_param("ssi", $nameOFbus, $tel, $id);
				$stmt->execute();
			
				if($stmt->affected_rows > 0){
					echo ("<script LANGUAGE='JavaScript'>
						window.alert('Successfully Bus updated!!!');
						window.location.href='ManagesBuses.php';
						</script>");
				} else {
					echo '<script type="text/javascript">alert("Not Updated!!!")</script>';
				}
			
				$stmt->close();
				$conn->close();
			}
			
		?>
		<div class="wrapper">
			<div class="registration_form">
				<div class="title">
					Bus Update/Edit
				</div>
				<form action="#" method="POST">
					<div class="form_wrap">
						<div class="input_wrap">
							<label for="title">Id</label>
							<input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id'];?>">
						</div>
						<div class="input_wrap">
							<label for="title">Bus Name</label>
							<input type="text" id="title" name="bus_name" placeholder="Bus Name" required>
						</div>
						<div class="input_wrap">
							<label for="title">Telepon</label>
							<input type="text" id="title" name="tel" placeholder="Tel" required>
						</div>
						<div class="input_wrap">
							<input type="submit" value="Update Bus Now" class="submit_btn" name="BusUpdate">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

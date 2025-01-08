<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Fastline Login</title>
  <link rel="icon" href="image/ticket.png" type="image">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="cssfile/nav4.css">
  <link rel="stylesheet" href="cssfile/footer_l.css">
  <link rel="stylesheet" href="cssfile/login.css">
  <link rel="stylesheet" href="css\font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style type="text/css">
    body {
            background-image: url(image/bis18.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
  <?php include("nav.php"); ?>

  <?php 
    session_start();
    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
      // Something was posted
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];

      if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Read from the database
        $query = "select * from users where username = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);

        if($result) {
          if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password'] === $password) {
              $_SESSION['user_id'] = $user_data['user_id'];
              header("Location:viewBus.php");
              die;
            }
          }
        }
        echo "Wrong username or password!";
      } else {
        echo "Wrong username or password!";
      }
    }
  ?>

  <div class="login-box">
    <img src="image/user.png" class="avatar">
    <h1>Login For Fastline</h1>
    <form method="post">
      <p>Username</p>
      <input type="text" name="user_name" placeholder="Enter Username">
      <p>Password</p>
      <input type="password" name="password" placeholder="Enter Password">
      <input type="submit" name="login" value="Login">
      <a href="signUp.php" class="sign_up">Sign up</a>
    </form>
  </div>
</body>
</html>

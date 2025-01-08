 <nav>
      <ul>
        <li class="logo"><h4>Fastline</h4></li>
        <li class="btn"><span class="fas fa-bars"></span></li>
        <div class="items">
          <li><a href="index.php">Home</a></li>
          <li><a href="help.php">Help</a></li>
          <li><a href="loginMenu.php">Login</a></li>
          <li><a href="AboutUs.php">About Us</a></li>
           <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="slide.php">Services</a></li>
        </div>

        <li class="signup-btn"> 
          <a href="signup.php">Sign Up</a>
        </li>
      </ul>
    </nav>

    <script>
      $('nav ul li.btn span').click(function(){
        $('nav ul div.items').toggleClass("show");
        $('nav ul li.btn span').toggleClass("show");
      });
    </script>
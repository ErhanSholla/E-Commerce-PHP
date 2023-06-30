<?php session_start()?>
<?php 

    if(isset($_POST['message'])){
      $name = $_POST['name'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $email = $_POST['email'];
      $connection = new mysqli("localhost","root",'','nikua');
      $query = "INSERT INTO `message`(`name`, `subject`, `message`, `email`)";
      $query .= "VALUES ('{$name}','{$subject}','{$message}','{$email}')";
      mysqli_query($connection,$query);
    }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    /> -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/cf37952229.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <section id="header">
      <h1>NIKUA</h1>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
          <li><a class="active" href="contact.php">Contact</a></li>
           <div class="btn-group">
            <button type="button" class="btn <?php if(isset($_SESSION['username'])){
                echo "btn-success";
              }else{
                echo "btn-danger";
              } ?> dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if(isset($_SESSION['username'])){
                echo "Hello ".$_SESSION['username'];
              }else{
                echo "Login";
              } ?>
            </button>
            
            <ul class="dropdown-menu">
              
              <li><a class="dropdown-item" href="cart.php">Cart <i class="fa-solid fa-cart-shopping"></i></a></li>
              <li><hr class="dropdown-divider"></li>
              <?php if($_SESSION['role']== 'admin'){
                echo "<li><a class='dropdown-item' href='admin/index.php'>Admin Panel</a></li>";
              }

              ?>
              <li><hr class="dropdown-divider"></li>
              <?php if(isset($_SESSION['username'])){
                echo "<li><a class='dropdown-item' href='logout.php'>Logout</a></li>";
              }else{
                echo "<li><a class='dropdown-item' href='login.php'>Login</a></li>";
              } ?>
              
               
            </ul>
          </div>
        </ul>
      </div>
    </section>
    <section class="about-header">
      <h2><strong>Contact US</strong></h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat, eos?
      </p>
    </section>

    <section id="contact-details" class="section-p1">
      <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today!</h2>
        <h3>Head Office</h3>
        <div>
          <li>
            <i class="fa-solid fa-map"></i>
            <p>92963 Amie Walks Apt. 368, East Monicashire</p>
          </li>
          <li>
            <i class="fa-solid fa-envelope"></i>
            <p>shollaerhan@gmail.com</p>
          </li>
          <li>
            <i class="fa-solid fa-phone"></i>
            <p>+38349712521</p>
          </li>
          <li>
            <i class="fa-solid fa-clock"></i>
            <p>Monday to Friday: 10:00am to 18:00pm</p>
          </li>
        </div>
      </div>

      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86457.49382539761!2d8.471656158203125!3d47.3768866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900b9749bea219%3A0xe66e8df1e71fdc03!2sZ%C3%BCrich%2C%20Switzerland!5e0!3m2!1sen!2s!4v1687077045562!5m2!1sen!2s"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    <section id="form-details">
      <form action="" method="post">
        <span>Leave A Message</span>
        <h2>We Love to hear from you</h2>
        <input type="text" name='name' placeholder="Your Name" name="" id="" />
        <input type="text" name='email' placeholder="Your Email" name="" id="" />
        <input type="text" name='subject' placeholder="Your Subject" name="" id="" />
        <textarea
          name=""
          id=""
          cols="30"
          rows="10"
          placeholder="Your Message"
          name='message'
        ></textarea>
        <button class="normal" type="submit" name='message' value="message">Submit</button>
      </form>
      <div class="people">
        <div>
          <img src="Images/People/1.png" alt="" />
          <p>
            <span>John Dee</span> Senior General Manager <br />
            Phone: +000 123 321 321 <br />
            Email: contact@example.com
          </p>
        </div>
        <div>
          <img src="Images/People/2.png" alt="" />
          <p>
            <span>John Dee</span> Senior General Manager <br />
            Phone: +000 123 321 321 <br />
            Email: contact@example.com
          </p>
        </div>
        <div>
          <img src="Images/People/3.png" alt="" />
          <p>
            <span>John Dee</span> Senior General Manager <br />
            Phone: +000 123 321 321 <br />
            Email: contact@example.com
          </p>
        </div>
      </div>
    </section>
    <section id="newsletter" class="section-m1">
      <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>
          Get E-mail updates about our latest shop and
          <span>special offers.</span>
        </p>
      </div>
      <div class="form">
        <input type="text" placeholder="Enter Your Email" id="" />
        <button class="normal">Sign Up</button>
      </div>
    </section>
    <footer>
      <div class="col">
        <h1>NIKUA</h1>
        <h4>Contact</h4>
        <p><strong>Address</strong>: 42000 Ahmet Selaci Vushtrri</p>
        <p><strong>Phone</strong>+38349712523</p>
        <p><strong>Hours</strong>: 10:00 - 18:00, Mon-Fri</p>
        <div class="follow">
          <h4>Follow us</h4>
          <div class="icon">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>
      </div>
      <div class="col">
        <h4><strong>About</strong></h4>
        <a href="#">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Condition</a>
        <a href="#">Contact Us</a>
      </div>
      <div class="col">
        <h4><strong>My Account</strong></h4>
        <a href="#">Sign in</a>
        <a href="#">View Cart</a>
        <a href="#">Privacy Policy</a>
        <a href="#">My Wishlist</a>
        <a href="#">Tract My Order</a>
        <a href="#">Help</a>
      </div>
      <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
          <img src="Images/Pay/app.jpg" alt="" />
          <img src="Images/Pay/play.jpg" alt="" />
        </div>
        <p>Secured Payment Gateways</p>
        <img src="Images/Pay/pay.png" alt="" />
      </div>
    </footer>
    <div class="copyright">
      <p>© Copyright : <strong>Erhan Sholla</strong></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>

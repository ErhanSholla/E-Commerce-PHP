<?php ob_start()?>
<?php $connection = new mysqli("localhost","root",'','nikua');?>
<?php session_start()?>
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
          <li><a class="active" href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
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
      <h2><strong>About US</strong></h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat, eos?
      </p>
    </section>
    <section id="about-header" class="section-p1">
      <img src="Images/About/59e773fb503700b9b0eb98ab643d5ba8.jpg" alt="" />
      <div>
        <h2>Who are we?</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Exercitationem facere ipsa sapiente aliquam doloribus. Repellat
          eveniet, non nam, quos iure blanditiis recusandae sunt voluptate
          quaerat quibusdam cupiditate sed. Alias assumenda dignissimos
          aspernatur a accusamus eius nulla blanditiis commodi dicta aut,
          eligendi hic ipsa accusantium debitis laborum, culpa fugit, at esse?
        </p>
        <abbr title=""
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente,
          culpa. Quos assumenda cumque voluptates qui in adipisci sapiente
          nostrum ducimus?</abbr
        >
        <br /><br />
        <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%"
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente hic
          iusto consectetur ullam blanditiis impedit nulla. Rerum odio libero
          dicta.</marquee
        >
      </div>
    </section>
    <section id="feature" class="section-p1">
      <div class="fe-box">
        <img src="Images/f1.png" alt="" />
        <h6>Free Shipping</h6>
      </div>
      <div class="fe-box">
        <img src="Images/f2.png" alt="" />
        <h6>Online Order</h6>
      </div>
      <div class="fe-box">
        <img src="Images/f3.png" alt="" />
        <h6>Save Money</h6>
      </div>
      <div class="fe-box">
        <img src="Images/f4.png" alt="" />
        <h6>Promotion</h6>
      </div>
      <div class="fe-box">
        <img src="Images/f5.png" alt="" />
        <h6>Happy Sell</h6>
      </div>
      <div class="fe-box">
        <img src="Images/f6.png" alt="" />
        <h6>24/7 Support</h6>
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

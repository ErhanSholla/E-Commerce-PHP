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
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
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
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
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
              
              <?php if(isset($_SESSION['role'])){
                 if($_SESSION['role']== 'admin'){
                  echo "<li><hr class='dropdown-divider'></li>";
                echo "<li><a class='dropdown-item' href='admin/index.php'>Admin Panel</a></li>";
              }
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
    <section id="hero">
      <div class="hero-txt">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all our products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button class="btn btn-primary">Shop Now</button>
      </div>
      <div class="hero-img">
        <img
          src="Images/3d-business-young-man-walking-with-coffee.png"
          alt=""
        />
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
    <section id="product1" class="section-p1">
      <h2>Featured Products</h2>
      <p>Summer Collection New Modern Design</p>
      <div class="pro-container">
        <?php 
         
        
              $query =  "SELECT * FROM `posts` WHERE post_category_id = 4 ORDER BY post_id DESC LIMIT 0, 8";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_price = $row['post_price'];
                    $post_date = $row['post_date'];
        ?>
        <div class="pro">
          <img src="Images/Products/<?php echo $post_image?>" alt="f1" />
          <div class="des">
            <span><?php echo $post_author?></span>
            <h5><?php echo $post_title?></h5>
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <h4>$<?php echo $post_price?></h4>
          </div>
          <a href="singlep.php?id=<?php echo $post_id?>"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
        </div>
       <?php }?>
        
        
        
        
        
      </div>
    </section>
    <section id="banner" class="section-m1">
      <h4>Repair Services</h4>
      <h2>Up to <span>70% OFF</span> All T-Shirts & Accessories</h2>
      <button class="normal">Explore More</button>
    </section>
    <section id="product1" class="section-p1">
      <h1>New Arrivals</h1>
      <p>Summer Collection New Modern Design</p>
       <div class="pro-container">
        <?php 
         
        
              $query =  "SELECT * FROM `posts` WHERE post_category_id = 5 ORDER BY post_id DESC LIMIT 0, 8";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_price = $row['post_price'];
                    $post_date = $row['post_date'];
        ?>
        <div class="pro">
          <img src="Images/Products/<?php echo $post_image?>" alt="f1" />
          <div class="des">
            <span><?php echo $post_author?></span>
            <h5><?php echo $post_title?></h5>
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <h4>$<?php echo $post_price?></h4>
          </div>
          <a href="singlep.php?id=<?php echo $post_id?>"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
        </div>
       <?php }?>           

      


      </div>
    </section>
    <section id="sm-banner" class="section-p1">
      <div class="banner-box">
        <h4>Crazy Deals</h4>
        <h2>Buy 1 Get 1 free</h2>
        <span>The best classic dress is on sale at NIKUA</span>
        <button class="white">Learn More</button>
      </div>
      <div class="banner-box banner-box2">
        <h4>Spring/Summer</h4>
        <h2>Upcoming Season</h2>
        <span>The best classic dress is on sale at NIKUA</span>
        <button class="white">Collection</button>
      </div>
    </section>
    <section id="banner3">
      <div class="box">
        <h2>Season Sale</h2>
        <h3>Winter Collection -50% OFF</h3>
      </div>
      <div class="box box2">
        <h2>NEW FOOTWEAR COLLECTION</h2>
        <h3>Spring / Summer 2022</h3>
      </div>

      <div class="box box3">
        <h2>T-SHIRTS</h2>
        <h3>New Trendy Prints</h3>
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

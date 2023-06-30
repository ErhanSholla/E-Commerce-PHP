<?php ob_start()?>
<?php $connection = new mysqli("localhost","root",'','nikua');?>
<?php session_start()?>
<?php 
   if(!isset($_SESSION['role'])){
      header("Location: login.php");
  }
?>
<?php 
 
  if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_title'];
    $product_img = $_POST['product_img'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name = '$product_name'");
    if(mysqli_num_rows($select_cart) > 0){
      echo "Product Already added to cart";
    }else{
      $insert_production = "INSERT INTO `cart` (`name`, `image`, `price`, `quantity`)"; 
      $insert_production .= "VALUES ('{$product_name}', '{$product_img}', '{$product_price}', '{$product_quantity}')";
      mysqli_query($connection,$insert_production);
    }
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
    <?php 
      if(isset($_GET['id'])){
        $the_id = $_GET['id'];
        $query = "SELECT * FROM `posts` WHERE post_id = $the_id";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_price = $row['post_price'];
                    $post_date = $row['post_date'];
                  
      }}
    ?>
    <section id="header">
      <h1>NIKUA</h1>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a  href="shop.php">Shop</a></li>
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
    <section id="product-details" class="section-p1">
      <div class="single-pro-img">
  <img src="Images/Products/<?php echo isset($post_image) ? $post_image : ''; ?>" width="100%" id="mainImg" alt="" />

  <div class="small-img-gr">
    <div class="small-img-col">
      <img src="Images/Products/f1.jpg" width="100%" class="small-img" alt="" />
    </div>
    <div class="small-img-col">
      <img src="Images/Products/f2.jpg" width="100%" class="small-img" alt="" />
    </div>
    <div class="small-img-col">
      <img src="Images/Products/f3.jpg" width="100%" class="small-img" alt="" />
    </div>
    <div class="small-img-col">
      <img src="Images/Products/f4.jpg" width="100%" class="small-img" alt="" />
    </div>
  </div>
</div>

<div class="single-pro-details">
  <form action="" method="post">
    <input type="hidden" name="product_img" value="<?php echo isset($post_image) ? $post_image : ''; ?>">
    <h6>Home / T-Shirts</h6>
    <h4><?php echo isset($post_title) ? $post_title : ''; ?></h4>
    <input type="hidden" name="product_title" value="<?php echo isset($post_title) ? $post_title : ''; ?>">
    <h3>$<?php echo isset($post_price) ? $post_price : '0'; ?>.00</h3>
    <input type="hidden" name="product_price" value="<?php echo isset($post_price) ? $post_price : '0'; ?>">
    <select name="product_size"> 
      <option>Select Size</option>
      <option>XL</option>
      <option>XXL</option>
      <option>Small</option>
      <option>Large</option>
    </select>
    <input type="number" name="product_quantity" value="1" /> 
    <button class="normal" type="submit" value="add_to_cart" name="add_to_cart">Add to Cart</button>
    <h4>Product Details</h4>
    <span><?php echo isset($post_content) ? $post_content : ''; ?></span>
  </form>
</div>

      </div>
    </section>
    <section id="product1" class="section-p1">
      <h1>Featured Products</h1>
      <p>Summer Collection New Modern Design</p>
      <div class="pro-container">
        <div class="pro">
          <img src="Images/Products/n1.jpg" alt="f1" />
          <div class="des">
            <span>adidas</span>
            <h5>Cartoon Astronaut T-Shirts</h5>
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <h4>$78</h4>
          </div>
          <a href="#"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
        </div>
        <div class="pro">
          <img src="Images/Products/n2.jpg" alt="f1" />
          <div class="des">
            <span>adidas</span>
            <h5>Cartoon Astronaut T-Shirts</h5>
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <h4>$78</h4>
          </div>
          <a href="#"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
        </div>
        <div class="pro">
          <img src="Images/Products/n3.jpg" alt="f1" />
          <div class="des">
            <span>adidas</span>
            <h5>Cartoon Astronaut T-Shirts</h5>
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <h4>$78</h4>
          </div>
          <a href="#"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
        </div>
        <div class="pro">
          <img src="Images/Products/n4.jpg" alt="f1" />
          <div class="des">
            <span>adidas</span>
            <h5>Cartoon Astronaut T-Shirts</h5>
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <h4>$78</h4>
          </div>
          <a href="#"><i class="fa-solid fa-cart-shopping" id="cart"></i></a>
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

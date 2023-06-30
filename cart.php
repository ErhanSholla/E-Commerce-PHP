<?php session_start()?>
<?php $connection = new mysqli("localhost","root",'','nikua');?>
<?php 
   if(!isset($_SESSION['role'])){
      header("Location: login.php");
      exit();
  }
?>
<?php 
    if(isset($_POST['update_update_btn'])){
      $update_value = $_POST['update_quantity'];
      $update_id = $_POST['update_quantity_id'];
      $update = mysqli_query($connection, "UPDATE `cart` SET quantity = {$update_value} WHERE id = {$update_id}");
      if($update){
        header('location: cart.php');
      }
    }

    if(isset($_GET['remove'])){
      $remove_id = $_GET['remove'];
      mysqli_query($connection, "DELETE FROM `cart` WHERE id = $remove_id");
       header('location: cart.php');
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
      <h2><strong>Contact US</strong></h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat, eos?
      </p>
    </section>
    <section id="cartss" class="section-p1">
      <table width="100%">
        <thead>
          <tr>
            <td>Remove</td>
            <td>Images</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
          </tr>
        </thead>
        <tbody>
          <?php 
              $select_cart = mysqli_query($connection, "SELECT * FROM `cart`");
              $total = 0;
              if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
          ?>
           <tr>
            <td>
              <a href="cart.php?remove=<?php echo $fetch_cart['id'] ?>"><i class="far fa-times-circle"></i></a>
            </td>
            <td><img src="Images/Products/<?php echo $fetch_cart['image'] ?>" alt="" /></td>
            <td><?php echo $fetch_cart['name'] ?></td>
            <td>$<?php echo $fetch_cart['price'] ?>.00</td>
            <form action="" method="post">
              <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id'] ?>">
            <td><input class="input" type="number" min='1' name="update_quantity" value="<?php echo $fetch_cart['quantity'] ?>" />
                <input type="submit" value="update" name="update_update_btn" class="btn btn-primary">
          </td>
            </form>
            <td>$<?php echo $subtotal = number_format($fetch_cart['price'] * $fetch_cart['quantity'] ) ?>.00</td>
          </tr>
          <?php 
          $total += $subtotal;
              }
              }
          ?>
         
          
         
          
        </tbody>
      </table>
    </section>
    <section id="cart-add" class="section-p1">
      <div class="coupon">
        <h3>Apply Coupon</h3>
        <div>
          <input type="text" placeholder="Enter Your Coupon" name="" id="" />
          <button class="normal">Apply</button>
        </div>
      </div>
      <div id="subtotal">
        <h3>Cart Total</h3>
        <table>
          <tr>
            <td>Cart Subtotal</td>
            <td>$<?php echo $total ?>.00</td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td>Free</td>
          </tr>
          <tr>
            <td><strong>Total</strong></td>
            <td><strong>$<?php echo $total ?>.00</strong></td>
          </tr>
        </table>
        <button class="normal <?= ($total) > 1 ? '' :'disabled'; ?>">Proceed to Checkout</button>
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

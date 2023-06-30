<?php 
    if(isset($_POST['create_user'])){
      $username = $_POST['username'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $role = $_POST['role'];
      $address = $_POST['address'];
      $password = $_POST['password'];
      $query = "INSERT INTO `users`( `username`, `firstname`, `lastname`, `password`, `email`, `role`, `address`)";
      $query .= "VALUES ('{$username}','{$firstname}','{$lastname}','{$password}','{$email}','{$role}','{$address}')";
      mysqli_query($connection, $query);
    }
?>

<form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Username:</label>
        <input type="text" class="form-control" name="username" />
      </div>
     
     
     
      <div class="form-group">
        <label for="title">Firstname:</label>
        <input type="text" class="form-control" name="firstname" />
      </div>
     
      
      <div class="form-group">
        <label for="post_image">Lastname</label>
        <input type="text" class="form-control" name="lastname" />
      </div>
     
      <div class="form-group">
        <label for="post_tags">Email:</label>
        <input type="email" class="form-control" name="email" />
      </div>
      
      <div class="form-group">
        <label for="post_tags">Password:</label>
        <input type="password" class="form-control" name="password" />
      </div>
      <div class="form-group">
        <label for="post_tags">Role</label>
        <br>
        <select name="role" id="role">
          <option value="subscriber">Subscriber</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="form-group">
        <label for="post_tags">Address</label>
        <input type="text" class="form-control" name="address" />
      </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
        </div>
    </form>
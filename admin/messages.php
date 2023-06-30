
<?php 
  include "includes/header.php";
?>

    <div id="wrapper">
   

     <?php include "includes/navigation.php" ?>
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                Welcome to Admin
                
                <small><?php echo $_SESSION['username']?></small>
              </h1>
              
              <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Email</th>
                   
                    </tr>
                </thead>
                <tbody>
                <?php  
                
                $query = "SELECT * FROM `message` ";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $subject = $row['subject'];
                    $message = $row['message'];
                    $email = $row['email'];
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$name</td>";
                    echo "<td>$subject</td>";
                    echo "<td>$message</td>";   
                    echo "<td>$email</td>";   
                    echo "<td><a href='messages.php?delete={$id}'>Delete</a></td>";
                    echo "</tr>";

                }

                ?>

                <?php 
                    if(isset($_GET['delete'])){
                        $user_id = $_GET['delete'];
                        $query = "DELETE FROM `message` WHERE id = {$user_id}";
                        mysqli_query($connection, $query);
                        header("Location: messages.php");
                    }
                
                
                ?>
                  
                     
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>

      <!-- /#page-wrapper -->
      
   <?php 
    include "includes/footer.php"; 
  ?>
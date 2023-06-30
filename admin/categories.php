
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
              

              <div class="col-xs-6">
                <form action="" method="post">
                    <div class="form-group">
                          <?php 
                    if(isset($_POST['submit'])){
                        $cat_title = $_POST['cat_title'];
                        if($cat_title == "" || empty($cat_title)){
                            echo "This Fiel Should Not be Empty";

                        }else{
                            $query = "INSERT INTO `category`(`cat_title`) ";
                            $query .= "VALUES ('{$cat_title}')";
                            mysqli_query($connection,$query);
                        }
                    }
                ?>
                <label for="">Add Category</label>
                      <input type="text" class="form-control" name="cat_title">
                    </div>
                     <div class="form-group">
                      <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                    </div>
                </form>
               <?php 
                    if(isset($_GET['update'])){
                        $the_cat_id = $_GET['update'];
                        include "includes/update_category.php";
                        
                    }
               ?>


              </div >
              <div class="col-xs-6">
              <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $categories = $connection->query("SELECT * FROM `category`");
                        $data = $categories->fetch_all(MYSQLI_ASSOC);
                        foreach($data as $dat){
                            echo "<tr>";
                            echo "<td>".$dat['cat_id']."</td>";
                            echo "<td>".$dat['cat_title']."</td>";
                            echo "<td><a href='categories.php?delete={$dat['cat_id']}'>Delete</a></td>";
                            echo "<td><a href='categories.php?update={$dat['cat_id']}'>Update</a></td>";
                            echo "</tr>";
                        }
                    ?>
                    <?php 
                        if(isset($_GET['delete'])){
                            $id = $_GET['delete'];
                            $query = "DELETE FROM `category` ";
                            $query .= "WHERE cat_id = $id";
                            mysqli_query($connection,$query);
                            header("Location: categories.php");
                        }
                    ?>
                </tbody>
              </table>
              </div>
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
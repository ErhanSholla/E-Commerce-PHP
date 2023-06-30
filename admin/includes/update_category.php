 <form action="" method="post">
                    <label for="">Update Category</label>
                    <div class="form-group">
                    <?php 
                        if(isset($_GET['update'])){
                            $the_cat_id = $_GET['update'];
                            $query = "SELECT * FROM `category` WHERE cat_id = $the_cat_id";
                            $result = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['cat_id'];
                                $cat_titlee = $row['cat_title'];
                       
                    ?>
                    <input type="text" value="<?php  if(isset($cat_titlee)) {echo $cat_titlee;}?>" class="form-control" name="cat_titles">
                    <?php      } }?>
                 
                    <?php 
                        if(isset($_POST['update'])){
                            $the_cat_title = $_POST['cat_titles'];
                            $query = "UPDATE `category` SET `cat_title`= '{$the_cat_title}' WHERE cat_id = $the_cat_id";
                            mysqli_query($connection,$query);
                            header("Location: categories.php");
                        }
                    ?>
                    
                    </div>
                   <div class="form-group">
                         <input type="submit" name="update" class="btn btn-warning" value="Update Category">
                     </div>
                       
                </form>
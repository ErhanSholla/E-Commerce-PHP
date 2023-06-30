<?php 
    if(isset($_GET['p_id'])){
        $the_edit_id = $_GET['p_id'];
         $query = "SELECT * FROM `posts` where post_id = {$the_edit_id}";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_price = $row['post_price'];
                    $post_date = $row['post_date'];
                }


    }

    if(isset($_POST['update_post'])){
        $post_category_id = $_POST['post_category_id'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST['author'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_price = $_POST['post_price'];
        
        move_uploaded_file($post_image_temp, "../Images/Products/$post_image");

        if(empty($post_image)){
        $query = "SELECT * from posts WHERE post_id = {$the_edit_id}";
        $select_image = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_image)){
          $post_image = $row['post_image'];
        }
      }
       $query = "UPDATE `posts` SET post_category_id = $post_category_id, post_title = '$post_title', 
                post_author = '$post_author', post_image = '$post_image', 
                post_content = '$post_content', post_price = '$post_price', post_date = now()
                WHERE post_id = {$the_edit_id}";
        mysqli_query($connection,$query);
        header("Location: posts.php");
    }
?>


<form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title ?>" name="post_title" />
      </div>
     
      <div class="form-group">
        <label for="">Category</label>
        <br>
       <select name="post_category_id" id="post_category">
     <?php 
            $query = "SELECT * FROM category";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result))
        {
            $cat_id = $row['cat_id'];
            $cat_title= $row['cat_title'];
            echo " <option value='$cat_id'>$cat_title</option>";
        }
        ?>
       
       </select>
      </div>
     
      <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control"  value="<?php echo $post_author ?>" name="author" />
      </div>
     
      
       <div class="form-group">
        <img src="../Images/Products/<?php echo $post_image?>" width="200" alt="">
        <input type="file" name="image" />
      </div>
     
      <div class="form-group">
        <label for="post_tags">Post Price</label>
        <input type="text" class="form-control"  value="<?php echo $post_price ?>"name="post_price" />
      </div>
     
      <div class="form-group">
        <label for="post_content">Post Content</label>
          <textarea class="form-control" name="post_content" id="" rows="10" cols="30"><?php echo $post_content?></textarea>
        </div>
     
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
        </div>
    </form>
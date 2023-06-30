<?php 
    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category_id'];
        

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_price = $_POST['post_price'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        move_uploaded_file($post_image_temp, "../Images/Products/$post_image");

        $query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_image`, `post_content`, `post_price`, `post_date`)";
        $query .= "VALUES ('{$post_category_id}','{$post_title}','{$post_author}','{$post_image}','{$post_content}','{$post_price}',now())";
        mysqli_query($connection, $query);
    }
?>

<form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" />
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
        <input type="text" class="form-control" name="author" />
      </div>
     
      
      <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" />
      </div>
     
      <div class="form-group">
        <label for="post_tags">Post Price</label>
        <input type="text" class="form-control" name="post_price" />
      </div>
     
      <div class="form-group">
        <label for="post_content">Post Content</label>
          <textarea class="form-control" name="post_content" id="" rows="10" cols="30"></textarea>
        </div>
     
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
        </div>
    </form>
<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Content</th>
                    <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                // Display Posts
                $query = "SELECT * FROM `posts` ";
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
                    echo "<tr>";
                    echo "<td>$post_id</td>";
                    echo "<td>$post_category_id</td>";
                    echo "<td>$post_title</td>";
                    echo "<td>$post_author</td>";
                    echo "<td><img src='../Images/Products/$post_image' width='100px'/></td>";
                    echo "<td>$post_price</td>";
                    echo "<td>$post_content</td>";
                    echo "<td>$post_date</td>";
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "</tr>";

                }

                ?>

                <?php 
                    if(isset($_GET['delete'])){
                        $delete_id = $_GET['delete'];
                        $query = "DELETE FROM `posts` WHERE post_id = {$delete_id}";
                        mysqli_query($connection, $query);
                        header("Location: posts.php");
                    }
                
                
                ?>
                    
                </tbody>
              </table>
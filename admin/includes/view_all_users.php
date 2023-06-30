<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                
                $query = "SELECT * FROM `users` ";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $user_id = $row['id'];
                    $username = $row['username'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $role = $row['role'];
                    $address = $row['address'];
                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$username</td>";
                    echo "<td>$firstname</td>";
                    echo "<td>$lastname</td>";
                    echo "<td>$email</td>";
                    echo "<td>$role</td>";
                    echo "<td>$address</td>";
                    if($role == 'admin'){  
                    echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Change to Subscriber</a></td>";
                    }else{
                         echo "<td><a href='users.php?change_to_admin={$user_id}'>Change to Admin</a></td>";
                    }
                    
                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                    echo "</tr>";

                }

                ?>

                <?php 
                    if(isset($_GET['delete'])){
                        $user_id = $_GET['delete'];
                        $query = "DELETE FROM `users` WHERE id = {$user_id}";
                        mysqli_query($connection, $query);
                        header("Location: users.php");
                    }
                
                
                ?>
                    <?php 
                        if(isset($_GET['change_to_admin'])){
                            $adminID = $_GET['change_to_admin'];
                            $query = "UPDATE users SET role = 'admin' WHERE id = $adminID";
                            mysqli_query($connection, $query);
                            header("Location: users.php");
                        }
                    ?>
                     <?php 
                        if(isset($_GET['change_to_subscriber'])){
                            $adminID = $_GET['change_to_subscriber'];
                            $query = "UPDATE users SET role = 'subscriber' WHERE id = $adminID";
                            mysqli_query($connection, $query);
                            header("Location: users.php");
                        }
                    ?>
                </tbody>
              </table>
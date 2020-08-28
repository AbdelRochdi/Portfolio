<?php include "admin_header.php" ?>

<?php

$message = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $about = $_POST['about'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_temp, "../images/$image");


    $name = mysqli_real_escape_string($connection,$name);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    $about = mysqli_real_escape_string($connection,$about);
    $image = mysqli_real_escape_string($connection,$image);


    
    

    $search_query = "SELECT * FROM users WHERE email = '$email'";
    $search_result = mysqli_query($connection,$search_query);
    
    if (strlen($name)<2){

        $message = "<div class='alert alert-danger'>your first name is too short</div>";

    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $message = "<div class='alert alert-danger'>your email format is invalid</div>";

    }else if (mysqli_num_rows($search_result) > 0) {

        $message = "<div class='alert alert-danger'>your email already exists, please login</div>";

    }else if (!preg_match("#.*^(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){

        $message = "<div class='alert alert-danger'>your password should have at least a capital, a lower a number, a special caracter and should be longer than 6 caracters</div>";

    }else{
    
    $password = password_hash($password, PASSWORD_DEFAULT);
       
    $query = "INSERT INTO users(name,email,password,about,image) VALUES ('{$name}','{$email}','{$password}','{$about}','{$image}')";
    $register_query = mysqli_query($connection,$query);
    $message = "<div class='alert alert-success'>registration submitted</div>";
    // header("Location: index.php");
    if (!$register_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    }

}

    
?>


<div class="container">
    <div class="row ">
        <div class="box ">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Add user</h2>
                <hr>
                <div id="add_err2"><?php echo $message ?></div>
                <form action="users.php" method="post" enctype="multipart/form-data">    
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            <input type="text" id="name" name="name" maxlength="25" class="form-control">
                            <label>Email</label>
                            <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file"  name="image">
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea class="form-control "name="about" id="" cols="30" rows="5"></textarea>
                             </div>
                            <label>Password</label>
                            <input type="password" id="password" name="password" maxlength="25" class="form-control">
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <button type="submit" id="register" name="submit" class="btn btn-default">Submit</button>
                        </div>
                        
                    </div>
                </form>
               
            </div>
        </div>
    </div>

</div>



            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Name</th>                       
                        <th>Email</th>
                        <th>About</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM users";
                            $load_users_query = mysqli_query($connection,$query);

                            if (!$load_users_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_users_query)) {
                                $user_id = $row['id'];
                                $user_name = $row['name'];
                                $user_email = $row['email'];
                                $user_about = $row['about'];
                                $user_image = $row['image'];
                                
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$user_name</td>";
                                echo "<td>$user_email</td>";                               
                                echo "<td>$user_about</td>";                               
                                echo "<td><img class= 'img-responsive' src='../images/$user_image' alt=''></td>";

                                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_user_id = $_GET['delete'];

                                $delete_query = "DELETE FROM users WHERE id = $deleted_user_id";
                                $deleted_user_query = mysqli_query($connection,$delete_query);

                                header('Location: users.php');
                            }
                            

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

    <?php include "admin_footer.php" ?>
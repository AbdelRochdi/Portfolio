<?php 
    require_once 'header.php'; 
    session_start();
?>

<?php
    $message = "";
if (isset($_POST['login'])) {

    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $login_query = mysqli_query($connection,$query);

    if (!$login_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($login_query)){
        $db_id = $row['id'];
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_name = $row['name'];
    } 
    $row_count = mysqli_num_rows($login_query);
    if ($row_count < 1) {
        $message = "<div class='alert alert-danger'>this email does not exist, try again </div>";;
    }else {
        if (password_verify($password, $db_password)) {
            // $message = "<div class='alert alert-success'>Welcome $db_fname </div>";
            $_SESSION['id'] = $db_id;
            $_SESSION['name'] = $db_name;
            $_SESSION['email'] = $db_email;

            header('Location: admin');
        } else{
            $message =  "<div class='alert alert-danger'>your password in incorrect</div>";
        }
    }
    



}

?>   

<section class="contact">
        <div class="container">
            <div class="section-heading">
                <h1>Login</h1>
                <h6>Welcome To Your Portfolio</h6>
                <h6><?php echo $message ?></h6>
            </div>
            <form action="login.php" method="post" data-aos='fade-up' data-aos-dealy="300">
               
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
               
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </section>

    <?php require_once 'footer.php' ?>

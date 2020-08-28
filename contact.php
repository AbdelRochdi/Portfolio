<?php require_once 'header.php' ?>
<?php
         use PHPMailer\PHPMailer\PHPMailer;
         use PHPMailer\PHPMailer\Exception;

        $alert = "";
        if (isset($_POST['contact'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $services = $_POST['services'];
            $subject = $_POST['subject'];
           
            $message = "Message From ".$email."<br><br>";
            $message .= $subject;

            if (strlen($name)<2){

                $alert = "<div class='alert alert-danger'>your first name is too short</div>";
    
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $alert = "<div class='alert alert-danger'>your email format is invalid</div>";
    
            }else if ($subject == ""){

                $alert = "<div class='alert alert-danger'>message field should not be empty</div>";
    
            }else{

               

                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/SMTP.php';

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                                    // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers

                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                
                    $mail->Username = 'Rochdi.MyPortfolio@gmail.com';                 // SMTP username
                    $mail->Password = 'portfolio123';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to`PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom($email);
                    $mail->addAddress('rochdi.myportfolio@gmail.com');     // Add a recipient
                    

                    
                    
                    


                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $services;
                    $mail->Body    = $message;
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "<h1 classe='alert'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</h1>";
                }

               
            }

            
        }
    
    
    ?>
<section class="contact">
        <div class="container">
            <div class="section-heading">
                <h1>Contact</h1>
                <h6>Let's work together</h6>
                <?php echo $alert ?>
            </div>
            <form action="contact.php" method="post" data-aos='fade-up' data-aos-dealy="300">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="services">Services:</label>
                <select name="services" id="services">
                    <option value="Web Design">Web Design</option>
                    <option value="Web Developement">Web Developement</option>
                    <option value="Web Design/Developement">Web Design/Developement</option>
                </select>
                <label for="subject">Subject:</label>
                <textarea name="subject" id="subject" cols="10" rows="10"></textarea>
                <input type="submit" name="contact">
            </form>
        </div>
    </section>

    <?php require_once 'footer.php' ?>

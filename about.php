<?php require_once 'header.php' ?>
<?php 

$query = "SELECT * FROM users WHERE id= 0";
$users_query = mysqli_query($connection,$query);

if (!$users_query) {
    die("QUERY FAILED". mysqli_error($connection));
}

$row = mysqli_fetch_array($users_query);
    $user_image = $row['image'];
    $user_about = $row['about'];
?>

<section class="about">
        <div class="container">
            <div class="profile-img" data-aos='fade-right' data-aos-dealy="300" >
                <img src="images/<?php echo $user_image ?>" alt="profile image">
            </div>
            <div class="about-details" data-aos='fade-left' data-aos-dealy="600">
                <div class="about-heading">
                    <h1>About </h1>
                    <h6>Myself</h6>
                </div>
                <p><?php echo $user_about ?></p>
                <div class="social-media">
                    <ul class="nav-list">
                        <li>
                            <a href="https://www.facebook.com/abdelghafour.rochdi" target="blank" class="icon-link">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/AbdelRochdi" target="blank"  class="icon-link">
                                <i class="fa fa-github-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/abdelghafour-rochdi-110932152/"  target="blank" class="icon-link">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </section>

    <section class="experience">
        <div class="container">
            <div class="section-heading">
                <h1>Work Experience</h1>
                <h6>Past and current jobs</h6>
            </div>
            <div class="timeline" data-aos='fade-down' data-aos-dealy="300">
                <ul>
                <?php 
                            $query = "SELECT * FROM experience";
                            $experience_query = mysqli_query($connection,$query);

                            if (!$experience_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($experience_query)) {
                                $title = $row['title'];
                                $description = $row['description'];
                                $start = $row['start'];
                                $finish = $row['finish'];

                                ?>
                        <li class="date" data-date="<?php echo $start ?> / <?php echo $finish ?>">
                        <h1><?php echo $title ?></h1>
                        <p>
                        <?php echo $description ?>
                        </p>
                    </li>
                
	
                        <?php
                            }
                        ?>
                    
                   
                </ul>
            </div>
        </div>
    </section>

<?php require_once 'footer.php' ?>

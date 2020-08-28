<?php require_once 'header.php' ?>

<section class="services">
        <div class="container">
            <div class="section-heading">
                <h1>Services</h1>
                <h6>What I can do for you</h6>
            </div>
            <div class="my-skills">
                <div class="skill" data-aos='fade-in' data-aos-dealy="300">
                    <div class="icon-container">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h1>Web Design</h1>
                    <p>
                        Professional UI/UX design.
                    </p>
                </div>
                <div class="skill" data-aos='fade-in' data-aos-dealy="600">
                    <div class="icon-container">
                        <i class="fas fa-code"></i>
                    </div>
                    <h1>Front-End</h1>
                    <p>
                        Professional and good looking Front-End with ReactJs. 
                    </p>
                </div>
                <div class="skill" data-aos='fade-in' data-aos-dealy="900">
                    <div class="icon-container">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h1>Back-End</h1>
                    <p>
                        Professional, Fast and Optimal Back-end with PHP or ExpressJs.
                    </p>
                </div>
            </div>
        </div>
    </section>

<section class="portfolio">
        <div class="container">
            <div class="section-heading">
                <h1>Portfolio</h1>
                <h6>View some of my recent work</h6>
            </div>
            <?php 
                            $query = "SELECT * FROM projects";
                            $project_query = mysqli_query($connection,$query);

                            if (!$project_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($project_query)) {
                                $category = $row['category'];
                                $title = $row['title'];
                                $image = $row['image'];
                                $description = $row['description'];
                                $link = $row['link'];

                                ?>
                        
            <div class="portfolio-item">
                <div class="potfolio-img has-margin-right" data-aos='fade-right' data-aos-dealy="300">
                    <img src="images/<?php echo $image ?>" alt="">
                </div>
                <div class="portfolio-description" data-aos='fade-left' data-aos-dealy="600">
                    <h6><?php echo $category ?></h6>
                    <h1><?php echo $title ?></h1>
                    <p>
                    <?php echo $description ?>
                    </p>
                    <a href="<?php echo $link ?>" class="cta">View Details</a>
                </div>
            </div>
	
                        <?php
                            }
                        ?>
            
            <div class="portfolio-item">
                <div class="portfolio-description has-margin-right" data-aos='fade-right' data-aos-dealy="900">
                    <h6>Web developement</h6>
                    <h1>Blog Website</h1>
                    <p>
                       Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla corrupti dignissimos explicabo aliquid tenetur obcaecati, autem reiciendis adipisci eum! Deleniti quae dolor facilis laudantium modi magnam officia unde dolore culpa! 
                    </p>
                    <a href="" class="cta">View Details</a>
                </div>
                <div class="potfolio-img" data-aos='fade-left' data-aos-dealy="1200">
                    <img src="images/portitem2.jpeg" alt="">
                </div>
            </div>
            <div class="portfolio-item" data-aos='fade-right' data-aos-dealy="1500">
                <div class="potfolio-img has-margin-right">
                    <img src="images/portitem3.jpeg" alt="">
                </div>
                <div class="portfolio-description" data-aos='fade-left' data-aos-dealy="1800">
                    <h6>Web developement</h6>
                    <h1>Blog Website</h1>
                    <p>
                       Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla corrupti dignissimos explicabo aliquid tenetur obcaecati, autem reiciendis adipisci eum! Deleniti quae dolor facilis laudantium modi magnam officia unde dolore culpa! 
                    </p>
                    <a href="" class="cta">View Details</a>
                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php' ?>

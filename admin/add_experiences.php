<?php include "admin_header.php" ?>
<?php 

if (isset($_POST['add_experience'])) {
    $experience_title = $_POST['experience_title'];
    $experience_desc = $_POST['experience_desc'];
    $experience_start = $_POST['experience_start'];
    $experience_finish = $_POST['experience_finish'];


    $experience_title = mysqli_real_escape_string($connection,$experience_title);
    $experience_desc = mysqli_real_escape_string($connection,$experience_desc);
    $experience_start = mysqli_real_escape_string($connection,$experience_start);
    $experience_finish = mysqli_real_escape_string($connection,$experience_finish);

    $query = "INSERT INTO experience(title,description,start,finish) VALUES ('$experience_title','$experience_desc','$experience_start','$experience_finish')";
    $add_experience_query = mysqli_query($connection,$query);

    if (!$add_experience_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add an experience
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_experiences.php" method="post" enctype="multipart/form-data">    
             
            
     
                    <div class="form-group">
                        <label for="title">experience Title</label>
                        <input type="text" class="form-control" name="experience_title">
                    </div>

                    
                    <div class="form-group">
                        <label for="experience_desc">experience Description</label>
                        <textarea class="form-control "name="experience_desc" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="experience_start">experience start</label>
                        <input type="date" class="form-control" name="experience_start">
                    </div>

                    <div class="form-group">
                        <label for="experience_finish">experience finish</label>
                        <input type="date" class="form-control" name="experience_finish">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_experience" value="Add experience">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
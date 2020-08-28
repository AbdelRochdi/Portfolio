<?php include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $e_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM experience WHERE id = $e_id ";
$load_experience_query = mysqli_query($connection,$edit_query);

while($row = mysqli_fetch_array($load_experience_query)){
    $e_id = $row['id'];
    $e_title = $row['title'];
    $e_desc = $row['description'];
    $e_start = $row['start'];
    $e_finish = $row['finish'];
}

if (isset($_POST['edit_experience'])) {
    $experience_title = $_POST['experience_title'];
    $experience_desc = $_POST['experience_desc'];
    $experience_start = $_POST['experience_start'];
    $experience_finish = $_POST['experience_finish'];


    $experience_title = mysqli_real_escape_string($connection,$experience_title);
    $experience_desc = mysqli_real_escape_string($connection,$experience_desc);
    $experience_start = mysqli_real_escape_string($connection,$experience_start);
    $experience_finish = mysqli_real_escape_string($connection,$experience_finish);

    $query = "UPDATE experience SET  title = '$experience_title' , description = '$experience_desc',  start = '$experience_start', finish = '$experience_finish'  WHERE id = $e_id ";
    $edit_experience_query = mysqli_query($connection,$query);

    if (!$edit_experience_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }

    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit experience
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_experience.php?edit=<?php echo $e_id ?>" method="post" enctype="multipart/form-data">    
     
             

                    <div class="form-group">
                        <label for="title">experience Title</label>
                        <input type="text" value = "<?php echo $e_title ?>" class="form-control" name="experience_title">
                    </div>

                
      
      
      
                    

                    
                    <div class="form-group">
                        <label for="experience_desc">experience Description</label>
                        <textarea class="form-control" name="experience_desc" id="" cols="30" rows="5"><?php echo $e_desc ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="experience_start">experience start</label>
                        <input type="date" class="form-control" value = "<?php echo $e_start ?>" name="experience_start">
                    </div>

                    <div class="form-group">
                        <label for="experience_finish">experience finish</label>
                        <input type="date" value = "<?php echo $e_finish ?>" class="form-control" name="experience_finish">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_experience" value="Edit experience">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
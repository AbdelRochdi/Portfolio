<?php include "admin_header.php" ?>
<?php 

if (isset($_POST['add_project'])) {
    $project_id = $_POST['project_id'];
    $project_title = $_POST['project_title'];
    $project_image = $_FILES['image']['name'];
    $project_image_temp = $_FILES['image']['tmp_name'];
    $project_desc = $_POST['project_desc'];
    $project_category = $_POST['project_category'];
    $project_link = $_POST['project_link'];

    move_uploaded_file($project_image_temp, "../images/$project_image");

    $project_id = mysqli_real_escape_string($connection,$project_id);
    $project_title = mysqli_real_escape_string($connection,$project_title);
    $project_image = mysqli_real_escape_string($connection,$project_image);
    $project_desc = mysqli_real_escape_string($connection,$project_desc);
    $project_category = mysqli_real_escape_string($connection,$project_category);
    $project_link = mysqli_real_escape_string($connection,$project_link);

    $query = "INSERT INTO projects(id,category,title,image,description,link) VALUES ($project_id,'$project_category','$project_title','$project_image','$project_desc','$project_link')";
    $add_project_query = mysqli_query($connection,$query);

    if (!$add_project_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a project
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_projects.php" method="post" enctype="multipart/form-data">    
             <div class="form-group">
                        <label for="project_id">project id</label>
                        <input type="number" class="form-control" name="project_id">
                    </div>
             <div class="form-group">
                        <label for="project_category">project category</label>
                        <input type="text" class="form-control" name="project_category">
                    </div>
     
                    <div class="form-group">
                        <label for="title">project Title</label>
                        <input type="text" class="form-control" name="project_title">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="project_image">project Image</label>
                        <input type="file"  name="image">
                    </div>

                    
                    <div class="form-group">
                        <label for="project_desc">project Description</label>
                        <textarea class="form-control "name="project_desc" id="" cols="30" rows="5"></textarea>
                    </div>
                    

                    <div class="form-group">
                        <label for="project_link">project link</label>
                        <input type="text" class="form-control" name="project_link">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_project" value="Add project">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
<?php include "admin_header.php" ?>
<?php 

if (isset($_GET['edit'])) {
    $pro_id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM projects WHERE id = $pro_id ";
$load_project_query = mysqli_query($connection,$edit_query);

while($row = mysqli_fetch_array($load_project_query)){
    $p_id = $row['id'];
    $p_category = $row['category'];
    $p_title = $row['title'];
    $p_image = $row['image'];
    $p_desc = $row['description'];
    $p_link = $row['link'];
}

if (isset($_POST['edit_project'])) {
    $project_title = $_POST['project_title'];
    $project_image = $_FILES['image']['name'];
    $project_image_temp = $_FILES['image']['tmp_name'];
    $project_desc = $_POST['project_desc'];
    $project_category = $_POST['project_category'];
    $project_link = $_POST['project_link'];

    move_uploaded_file($project_image_temp, "../images/$project_image");

    $project_title = mysqli_real_escape_string($connection,$project_title);
    $project_image = mysqli_real_escape_string($connection,$project_image);
    $project_desc = mysqli_real_escape_string($connection,$project_desc);
    $project_category = mysqli_real_escape_string($connection,$project_category);
    $project_link = mysqli_real_escape_string($connection,$project_link);

    $query = "UPDATE projects SET category = '$project_category', title = '$project_title' ,image ='$project_image', description = '$project_desc',  link = '$project_link'  WHERE id = $p_id ";
    $edit_project_query = mysqli_query($connection,$query);

    if (!$edit_project_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }

    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit project
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="edit_project.php?edit=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">    
     
             <div class="form-group">
                        <label for="project_category">project category</label>
                        <input type="text" class="form-control" value = "<?php echo $p_category ?>" name="project_category">
                    </div>

                    <div class="form-group">
                        <label for="title">project Title</label>
                        <input type="text" value = "<?php echo $p_title ?>" class="form-control" name="project_title">
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
                        <textarea class="form-control" name="project_desc" id="" cols="30" rows="5"><?php echo $p_desc ?></textarea>
                    </div>
                    

                    <div class="form-group">
                        <label for="project_link">project link</label>
                        <input type="text" value = "<?php echo $p_link ?>" class="form-control" name="project_link">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_project" value="Edit project">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
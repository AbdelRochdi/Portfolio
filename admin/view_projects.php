<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            project List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Category</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM projects";
                            $load_projects_query = mysqli_query($connection,$query);

                            if (!$load_projects_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_projects_query)) {
                                $project_id = $row['id'];
                                $project_category = $row['category'];
                                $project_title = $row['title'];
                                $project_image = $row['image'];
                                $project_desc = $row['description'];
                                $project_link = $row['link'];


                                echo "<tr>";
                                echo "<td>$project_id</td>";
                                echo "<td>$project_category</td>";
                                echo "<td>$project_title</td>";
                                echo "<td><img class= 'img-responsive' src='../images/$project_image' alt=''></td>";
                                echo "<td>$project_desc</td>";
                                echo "<td>$project_link</td>";
                                echo "<td> <a href='edit_project.php?edit=$project_id'>Edit</a></td>";
                                echo "<td><a href='view_projects.php?delete=$project_id'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_project_id = $_GET['delete'];

                                $delete_query = "DELETE FROM projects WHERE project_id = $deleted_project_id";
                                $deleted_project_query = mysqli_query($connection,$delete_query);

                                header('Location: view_projects.php');
                            }

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
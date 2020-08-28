<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            experience List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Description</th>
                        <th>start</th>
                        <th>finish</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM experience";
                            $load_experiences_query = mysqli_query($connection,$query);

                            if (!$load_experiences_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_experiences_query)) {
                                $experience_id = $row['id'];
                                $experience_title = $row['title'];
                                $experience_desc = $row['description'];
                                $experience_start = $row['start'];
                                $experience_finish = $row['finish'];

                                

                                if ($experience_finish === "0000-00-00") {
                                    $experience_finish = 'Present';
                                }


                                echo "<tr>";
                                echo "<td>$experience_id</td>";
                                echo "<td>$experience_title</td>";
                                echo "<td>$experience_desc</td>";
                                echo "<td>$experience_start</td>";
                                echo "<td>$experience_finish</td>";
                                echo "<td> <a href='edit_experience.php?edit=$experience_id'>Edit</a></td>";
                                echo "<td><a href='view_experiences.php?delete=$experience_id'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_experience_id = $_GET['delete'];

                                $delete_query = "DELETE FROM experiences WHERE experience_id = $deleted_experience_id";
                                $deleted_experience_query = mysqli_query($connection,$delete_query);

                                header('Location: view_experiences.php');
                            }

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
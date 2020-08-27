<?php include "admin_header.php" ?>
<?php 

if (isset($_POST['add_product'])) {
    $product_title = $_POST['product_title'];
    $product_image = $_FILES['image']['name'];
    $product_image_temp = $_FILES['image']['tmp_name'];
    $product_desc = $_POST['product_desc'];
    $product_info = $_POST['product_info'];
    $product_price = $_POST['product_price'];

    move_uploaded_file($product_image_temp, "../img/$product_image");

    $product_title = mysqli_real_escape_string($connection,$product_title);
    $product_image = mysqli_real_escape_string($connection,$product_image);
    $product_desc = mysqli_real_escape_string($connection,$product_desc);
    $product_info = mysqli_real_escape_string($connection,$product_info);

    $query = "INSERT INTO products(product_title,product_image,product_desc,product_info,product_price) VALUES ('$product_title','$product_image','$product_desc','$product_info',$product_price)";
    $add_product_query = mysqli_query($connection,$query);

    if (!$add_product_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a product
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_product.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Product Title</label>
                        <input type="text" class="form-control" name="product_title">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <input type="file"  name="image">
                    </div>

                    
                    <div class="form-group">
                        <label for="product_desc">Product Description</label>
                        <textarea class="form-control "name="product_desc" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_info">Product Infos</label>
                        <textarea class="form-control "name="product_info" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="number" class="form-control" name="product_price">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_product" value="Add product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
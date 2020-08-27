<?php include "admin_header.php" ?>
<?php session_start(); ?>

<?php 
    //getting the session id
    if (isset($_SESSION['id'])) {
        $client_id = $_SESSION['id'];
    }
    //getting the item id
    if (isset($_GET['item'])) {
        $item_id = $_GET['item'];

        //getting all items from cart table
    $cart_query = "SELECT * FROM cart WHERE item_id = $item_id AND client_id = $client_id";
    $cart_search_query = mysqli_query($connection,$cart_query);
    if (!$cart_search_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($cart_search_query)) {
        $item_title = $row['item_title'];
        $item_image = $row['item_image'];
        $item_price = $row['item_price'];
        $item_quantity = $row['item_quantity'];
    }
    $row_count = mysqli_num_rows($cart_search_query);

    if($row_count > 0){
        $update_query = "UPDATE cart SET item_quantity = item_quantity+1 WHERE item_id = $item_id AND client_id = $client_id";
        $update_item_query = mysqli_query($connection,$update_query);
        header('Location: cart.php');

    }else{


         //getting the item infos from products table
        $item_query = "SELECT * FROM products WHERE product_id = $item_id";
        $item_search_query = mysqli_query($connection,$item_query);

        while ($row = mysqli_fetch_array($item_search_query)) {
            $item_title = $row['product_title'];
            $item_image = $row['product_image'];
            $item_price = $row['product_price'];
            
        }

        if (!$item_search_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }


        
         //adding the item to cart if it doesn't already exist
        $add_query = "INSERT INTO cart(client_id,item_id,item_title,item_image,item_price) VALUES ($client_id,$item_id,'$item_title','$item_image',$item_price)";
        $add_to_cart_query = mysqli_query($connection,$add_query);

        if (!$add_to_cart_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        header('Location: cart.php');
    }
    }

    

   

      

?>



            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cart
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Add</th>
                        <th>Reduce</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            
                            $cart_query = "SELECT * FROM cart WHERE client_id = $client_id";
                            $cart_search_query = mysqli_query($connection,$cart_query);
                            while ($row = mysqli_fetch_array($cart_search_query)) {
                                
                                $cart_id = $row['item_id'];
                                $item_title = $row['item_title'];
                                $item_image = $row['item_image'];
                                $item_price = $row['item_price'];
                                $item_quantity = $row['item_quantity'];

                                $total = $item_price * $item_quantity;

                                echo "<tr>";
                                echo "<td>$cart_id</td>";
                                echo "<td>$item_title</td>";
                                echo "<td><img class= 'img-responsive' src='../img/$item_image' alt=''></td>";
                                echo "<td>$item_price</td>";
                                echo "<td>$item_quantity</td>";
                                echo "<td>$total</td>";
                                echo "<td><a href='cart.php?add=$cart_id&user=$client_id'>Add</a></td>";
                                echo "<td><a href='cart.php?reduce=$cart_id&user=$client_id'>Reduce</a></td>";
                                echo "<td><a href='cart.php?remove=$cart_id&user=$client_id'>Remove</a></td>";
                                echo "</tr>";

                            }

                                
                            if (isset($_GET['remove'])) {
                                $removed_item_id = $_GET['remove'];

                                $remove_query = "DELETE FROM cart WHERE item_id = $removed_item_id AND client_id = $client_id";
                                $removed_item_query = mysqli_query($connection,$remove_query);

                                header('Location: cart.php');
                            }
                            if (isset($_GET['add'])) {
                                $added_item_id = $_GET['add'];

                                $add_item_query = "UPDATE cart SET item_quantity = item_quantity + 1 WHERE item_id = $added_item_id AND client_id = $client_id";
                                $added_item_query = mysqli_query($connection,$add_item_query);

                                header('Location: cart.php');
                            }

                            if (isset($_GET['reduce'])) {
                                $reduced_item_id = $_GET['reduce'];

                                $check_query = "SELECT * FROM cart WHERE item_id = $reduced_item_id AND client_id = $client_id ";
                                $check_quantity_query = mysqli_query($connection,$check_query);
                                $check_row = mysqli_fetch_array($check_quantity_query);
                                $quantity = $check_row['item_quantity'];

                                if ($quantity == 1 ) {
                                    $reduce_item_query = "DELETE FROM cart WHERE item_id = $reduced_item_id AND client_id = $client_id";
                                    $reduced_item_query = mysqli_query($connection,$reduce_item_query);
                                }else{
                                    $reduce_item_query = "UPDATE cart SET item_quantity = item_quantity - 1 WHERE item_id = $reduced_item_id AND client_id = $client_id";
                                    $reduced_item_query = mysqli_query($connection,$reduce_item_query);
                                }

                                

                                header('Location: cart.php');
                            }
                            

                            
                        ?>

                      </tbody>
            </table>
            <a href = "../blog.php" class="btn btn-success btn-lg" data-dismiss="modal">Back to store</a>
            <a href = "#" class="btn btn-success btn-lg" data-dismiss="modal">Proceed to checkout</a>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>
<!--connection file-->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jardocs Stores - Cart Details</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file-->
    <link rel="stylesheet" href="style.css">
    <style>
      .cart_img{
      width: 80px;
      height: 80px;
      object-fit: contain;
      }
    </style>


</head>
<body>
    <!-- navebar -->
  <div class="container-fluid p-0" >
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <img src="images/logo.png" alt="" class = "logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="all_products.php">Products</a>
            </li>
            <?php
            if(!isset($_SESSION['username'])){
              echo "
              <li class='nav-item'>
              <a class='nav-link' href='users_area/user_registration.php'>Sign Up</a>
            </li>
              ";
            }else{
              echo "
              <li class='nav-item'>
              <a class='nav-link' href='users_area/profile.php'>My Account</a>
            </li>
              ";
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-shopping-cart" ></i><sup><?php cart_item()?></sup></a>
            </li>
            
            </ul>

          
        </div>
      </div>
    </nav>

    <!-- second child-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        
        <?php

        if(!isset($_SESSION['username'])){
          echo "
          <li class='nav-items'>
          <a href='' class='nav-link'>Welcome Guest</a>
        </li>
          ";
        }else{
          echo "
          <li class='nav-items'>
          <a href='' class='nav-link'>Welcome ".$_SESSION['username']."</a>
        </li>
          ";
        }

        if(!isset($_SESSION['username'])){
          echo "
          <li class='nav-items'>
          <a href='users_area/user_login.php' class='nav-link'>Log in</a>
        </li>
          ";
        }else{
          echo "
          <li class='nav-items'>
          <a href='users_area/logout.php' class='nav-link'>Log out</a>
        </li>
          ";
        }
        
        ?>
      </ul>
    </nav>

    <!--third child-->
    <div class="bg-light">
      <h3 class="text-center">Products in-Stock</h3>
      <p class="text-center">We bring you the Best Products of any kind you are looking for.</p>
      

    </div>

   <!-- fourth child-table -->
  <form action="" method="post">
    <div class="container">
      <div class="row">
        <table class="table table-bordered text-center">
          
            <!-- php code to display dynamic data-->
            <?php
             global $con;
             $get_ip_address = getIPAddress();
             $total_price = 0;
             $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_address'";
             $result = mysqli_query($con, $cart_query);
             $result_count = mysqli_num_rows($result);
             if ($result_count > 0) {
           
              echo "<thead>
              <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan='2'>Operations</th>
  
              </tr>
            </thead>
            <tbody>";



              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id = '$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $product_values = array_sum($product_price);
                  $total_price += $product_values;


                  ?>
            <tr>
              <td><?php echo $product_title ?></td>
              <td><img src="admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
              <td><input type="text" label="" name="qty"  class="form-input w-50"></td>
              <?php
              $get_ip_address = getIPAddress();
              if (isset($_POST['update_cart'])) {
                $quantity = $_POST['qty'];
                $update_cart = "update `cart_details` set quantity = $quantity where ip_address='$get_ip_address'";
                $result_products_quantity = mysqli_query($con, $update_cart);
                $total_price = $total_price * $quantity;
              }
              ?>
              <td>N<?php echo $price_table ?></td>
              <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
              <td>
                <!-- <button class="bg-primary px-3 py-2 mx-3 border-0">Update</button> -->
                <input type="submit" value="Update Cart" class="bg-primary px-3 py-2 mx-3 border-0" name="update_cart">
                <!-- <button class="bg-primary px-3 py-2 mx-3 border-0">Remove</button> -->
                <input type="submit" value="Remove Item" class="bg-primary px-3 py-2 mx-3 border-0" name="remove_item">

              </td>
            </tr>
            <?php
                }
              }
            }else{
              echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
            }
            ?>
          </tbody>


        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
          <?php
           global $con;
           $get_ip_address = getIPAddress();
           
           $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_address'";
           $result = mysqli_query($con, $cart_query);
           $result_count = mysqli_num_rows($result);
           if ($result_count > 0) {
            echo"<h4 class='px-3'>Subtotal: <strong class='text-primary'> $total_price </strong></h4>
            <input type='submit' value='Continue Shopping' class='bg-primary px-3 py-2 mx-3 border-0' name='continue_shopping'>
            <button class='bg-dark px-3 py-2 border-0'><a href='users_area/checkout.php' class='text-light text-decoration-none'>CheckOut</a></button>";
           
          }else{
            echo "<input type='submit' value='Continue Shopping' class='bg-primary px-3 py-2 mx-3 border-0' name='continue_shopping'>";
          }
          if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>
          
        </div>
      </div>
    </div>
  </form>
  <!-- function to remove item-->
  <?php
  function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_item'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query = "Delete  from `cart_details` where product_id = $remove_id";
        $run_delete = mysqli_query($con, $delete_query);
        if($run_delete){
          echo "<script>window.open('cart.php', '_self')</script>";
        }
      }
    }
  }
  echo  remove_cart_item();
  ?>
    


    <!-- calling cart function -->
    <?php
    cart()
    ?>



    <!-- last child-->
    <?php
    include("includes/footer.php");
    ?>




  </div>


    



  <!-- bootsrap js link-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
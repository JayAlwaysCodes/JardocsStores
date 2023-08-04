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
    <title>Jardocs Stores</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file-->
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x: hidden;
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
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: N<?php total_cart_price(); ?></a>
            </li>
            </ul>

          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
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
    <!-- calling cart function -->
    <?php
    cart()
    ?>

    <!-- fourth child-->
    <div class="row">
      <div class="col-md-10">
        <!-- products -->
        <div class="row">
          <?php
          get_all_products();
          get_unique_categories();
          get_unique_brands();
          ?>
          
          
        </div>

      </div>
      <!-- sidenav -->
      <div class="col-md-2 bg-secondary mb-2 p-0">
        <!--Brands to be displayed-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-primary">
            <a href="" class="nav-link text-light"><h3>Delivery Brands</h3></a>
          </li>
          <?php
          getbrands();

          ?>
          
        </ul>
        <!--Categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-primary">
            <a href="" class="nav-link text-light"><h3>Categories</h3></a>
          </li>
          <?php
          getcategories();
          
          ?>
          
          
        </ul>
        

      </div>
    </div>



    <!-- last child-->
    <!-- include footer-->
    <?php
    include("includes/footer.php");
    ?>




  </div>


    



  <!-- bootsrap js link-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
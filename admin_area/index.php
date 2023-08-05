<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
        body{
            overflow-x: hidden;
        }
        .product_img{
            width: 100px;
            margin: 0;
            padding: 0;
            object-fit: contain;
        }
    </style>
    <!--sweet alert link-->
    <!-- <script src="<scrip src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

</head>
<body>
    <!--nav bar-->
    <div class = "container-fluid p-0" >
        <!--first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </nav>

        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>

        </div>

        <!-- Thirsd child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-4">
                    <a href=""> 
                        <img src="../images/admin_avatar.jpeg" alt="" class="admin_image">
                    </a>
                    <p class="text-light text-center"> Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-dark bg-inf0 my-1">Insert Products</a></button>
                    <button class="my-3"><a href="index.php?view_products" class="nav-link text-dark bg-inf0 my-1">View Products</a></button>
                    <button class="my-3"><a href="index.php?insert_category" class="nav-link text-dark bg-inf0 my-1">Insert Categories</a></button>
                    <button class="my-3"><a href="" class="nav-link text-dark bg-inf0 my-1">View Categories</a></button>
                    <button class="my-3"><a href="index.php?insert_brand" class="nav-link text-dark bg-inf0 my-1">Insert Brands</a></button>
                    <button class="my-3"><a href="" class="nav-link text-dark bg-inf0 my-1">View Brands</a></button>
                    <button class="my-3"><a href="" class="nav-link text-dark bg-inf0 my-1">All Orders</a></button>
                    <button class="my-3"><a href="" class="nav-link text-dark bg-inf0 my-1">All Payments</a></button>
                    <button class="my-3"><a href="" class="nav-link text-dark bg-inf0 my-1">List Users</a></button>
                    <button class="my-3"><a href="" class="nav-link text-dark bg-inf0 my-1">Log Out</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child-->
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');


            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');


            }
            if(isset($_GET['view_products'])){
                include('view_products.php');


            }
            if(isset($_GET['edit_product'])){
                include('edit_product.php');


            }
            ?>
        </div>

        <!-- last child-->
        <?php
    include("../includes/footer.php");
    ?>
    </div>
    

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

</body>
</html>
<?php
if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];

    $delete_product = "Delete from `products` where product_id=$delete_id";
    $result_delete = mysqli_query($con, $delete_product);
    if($result_delete){
        echo "<script>alert('Product has been successfully deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>
<?php
if(isset($_GET['delete_brand'])){
    $delete_brand = $_GET['delete_brand'];

    $delete_bra = "Delete from `brands` where brand_id=$delete_brand";
    $result_delete = mysqli_query($con, $delete_bra);
    if($result_delete){
        echo "<script>alert('Brand has been successfully deleted')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}

?>
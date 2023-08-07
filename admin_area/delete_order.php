<?php
if(isset($_GET['delete_order'])){
    $delete_order = $_GET['delete_order'];

    $delete_ord = "Delete from `user_orders` where order_id=$delete_order";
    $result_delete = mysqli_query($con, $delete_ord);
    if($result_delete){
        echo "<script>alert('Order has been successfully deleted')</script>";
        echo "<script>window.open('index.php?all_orders','_self')</script>";
    }
}

?>
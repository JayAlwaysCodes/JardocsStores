<?php
if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];

    $delete_payment = "Delete from `user_payments` where payment_id=$delete_id";
    $result_delete = mysqli_query($con, $delete_payment);
    if($result_delete){
        echo "<script>alert('Payment has been successfully deleted')</script>";
        echo "<script>window.open('index.php?user_payments','_self')</script>";
    }
}

?>
<?php
if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];

    $delete_user = "Delete from `user_table` where user_id=$delete_id";
    $result_delete = mysqli_query($con, $delete_user);
    if($result_delete){
        echo "<script>alert('This User has been successfully deleted')</script>";
        echo "<script>window.open('index.php?list_users','_self')</script>";
    }
}

?>
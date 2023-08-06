<?php
if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category'];

    $delete_cat = "Delete from `categories` where category_id=$delete_category";
    $result_delete = mysqli_query($con, $delete_cat);
    if($result_delete){
        echo "<script>alert('category has been successfully deleted')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>
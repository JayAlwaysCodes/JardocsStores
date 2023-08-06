<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
    $get_category = "Select * from `categories` where category_id = $edit_category";
    $result = mysqli_query($con, $get_category);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
    echo $edit_category;
}
if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['category_title'];

    $update_query = "update `categories` set category_title='$cat_title' where category_id=$edit_category";
    $result_update = mysqli_query($con, $update_query);
    if($result_update){
        echo "<script>alert('Category has been updated')</script>";
        echo "<script>window.open('index.php?view_categories', '_self')</script>";
    }
}

?>



<div class="container mt3">
<h2 class="text-center">Edit Category</h2>
<form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="category_title" class="form-label">Category Title</label>
        <input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $category_title;?>" required >
    </div>
    <div class="form-outline mb-4">
       <input type="submit" value="Update Category" class="btn btn-dark text-light px-3 mb-3 " name="edit_cat">
    </div>
</form>
</div>


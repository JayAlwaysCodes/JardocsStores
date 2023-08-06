<?php
if(isset($_GET['edit_brand'])){
    $edit_brand = $_GET['edit_brand'];
    $get_brand = "Select * from `brands` where brand_id = $edit_brand";
    $result = mysqli_query($con, $get_brand);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
    
}
if(isset($_POST['edit_bra'])){
    $bra_title = $_POST['brand_title'];

    $update_query = "update `brands` set brand_title = $bra_title where brand_id = $edit_brand";
    $result_update = mysqli_query($con, $update_query);
    if($result_update){
        echo "<script>alert('Brand has been Updated')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}

?>

<div class="container mt3">
<h2 class="text-center">Edit Brand</h2>
<form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="brand_title" class="form-label">Brand Title</label>
        <input type="text" name="brand_title" id="brand_title" class="form-control" value="<?php echo $brand_title ?>" required>
    </div>
    <div class="form-outline mb-4">
       <input type="submit" value="Update Brand" class="btn btn-dark text-light px-3 mb-3" name="edit_bra">
    </div>
</form>
</div>


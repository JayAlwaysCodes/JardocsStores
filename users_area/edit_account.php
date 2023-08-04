<?php
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "Select * from `user_table` where username = '$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_password = $row_fetch['user_password'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp, "user_images/$user_image");

        //update query
        $update_data = "update `user_table` set username ='$user_name', user_email ='$user_email', user_password = '$hash_password', user_image = '$user_image', user_address = '$user_address', user_mobile ='$user_mobile'";
        $result_query_update = mysqli_query($con, $update_data);
        if($result_query_update){
            echo "<script>alert('You have successfully updated your details')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" placeholder="Username" value="<?php echo $user_name; ?>" name="user_name">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" placeholder="Email" value="<?php echo $user_email; ?>" name="user_email">
        </div>
        <div class="form-outline mb-4">
            <input type="password" class="form-control w-50 m-auto" placeholder="Password" value="<?php echo $user_password; ?>" name="user_password">
        </div>
        <div class="form-outline mb-4 d-flex form-control w-50 m-auto">
            <input type="file"  placeholder="profile picture" name="user_image">
            <img src="user_images/<?php echo $user_image; ?>" alt="" class="edit_img m-auto">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" placeholder="Address" value="<?php echo $user_address; ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" placeholder="Phone number" value="<?php echo $user_mobile; ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="bg-secondary py-2 px-3 border-0"  name="user_update">
    </form>
</body>
</html>
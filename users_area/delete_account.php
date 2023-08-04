<h3 class="text-danger mb-4">Delete Account</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" value="Delete Account" class="form-control m-auto w-50" name="delete">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" value="Don't Delete Account" class="form-control m-auto w-50" name="dont_delete">
    </div>
</form>

<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "Delete from `user_table` where username = '$username_session'";
    $result = mysqli_query($con, $delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}elseif(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php', '_self')</script>";
}

?>
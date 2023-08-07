<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow: hidhidden ;
        }
        .img-fluid{
            width: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="admin_log_img.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required>
                    </div>
                   
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password" required>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="submit" value="Sign in" name="login" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1">Not an Admin yet?<a href="admin_registration.php" class="text-decoration-none"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

global $con;

if (isset($_POST['login'])) {

    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];


    $select_query = "Select * from `admin_table` where admin_name='$admin_username' ";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($rows_count > 0) {
        $_SESSION['admin_name'] = $admin_username;
        if (password_verify($admin_password, $row_data['admin_password'])) {
            // echo "<script>alert('Login Successful')</script>";
            
                $_SESSION['admin_name'] = $admin_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('index.php', '_self')</script>";

             

        }else {
            echo "<script>alert('Wrong password')</script>";
        }
    }
}

?>
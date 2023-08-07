<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

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
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="admin_reg_img.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_password" class="form-label"> Confirm Password</label>
                        <input type="password" id="conf_password" name="conf_password" class="form-control" placeholder="Confirm your Password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" value="Register" name="register" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1">Are you already an Admin?<a href="admin_login.php" class="text-decoration-none"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!--php code -->

<?php
global $con;
if(isset($_POST['register'])){
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_password = $_POST['conf_password'];
    

    //select query
    $select_query = "Select * from `admin_table` where admin_name = '$admin_username' OR admin_email = '$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('User already exist')</script>";
    }else if($admin_password != $conf_password){
        echo "<script>alert('passwords do not match')</script>";

    }
    
    
    else{
         //insert query
    $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values('$admin_username','$admin_email', '$hash_password')";
    $sql_execute = mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Admin Successfully Registered')</script>";
            echo "<script>window.open('admin_login.php', '_self')</script>";
    }else{
        die(mysqli_error($con));
    }
    }
  
}

?>
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
     <!-- bootstrap CSS link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Payment Page</title>
</head>
<style>
    img{
        width:90%;
        margin:auto;
        display:block;
    }
</style>
<body>
    <!-- php code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    
    ?>
    <div class="container">
        <h2 class="text-center text-primary">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-10">
            <div class="col-md-6">
                <a href="http://www.paypal.com"><img src="../images/OIP.jpeg" target="_blank"></a>
            </div>
            <div class="col-md-6">
                <a href="orders.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>

           
        </div>
    </div>
    
</body>
</html>
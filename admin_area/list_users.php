
<h4 class="text-center text-success"> All Users</h4>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-secondary text-light">
        <tr>
            <th>Sl no</th>
            <th>Username</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>IP Address</th>
            <th>Home Address</th>
            <th>Mobile Number</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-dark text-light">
        <?php
       $select_users = "select * from `user_table`";
       $result_users = mysqli_query($con, $select_users);;
        $number = 0;
        while($row=mysqli_fetch_assoc($result_users)){
            $user_id = $row['user_id'];
            $user_name = $row['username'];
            $email = $row['user_email'];
            $image = $row['user_image'];
            $user_ip = $row['user_ip'];
            $address = $row['user_address'];
            $mobile_num = $row['user_mobile'];
            $number++;


            

            ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $user_name?></td>
            <td><?php echo $email?></td>
            <td><img src="../users_area/user_images/<?php echo $image?>" class="product_img"></td>
            <td><?php echo $user_ip?></td>
            <td><?php echo $address?></td>
            <td><?php echo $mobile_num?></td>
            <td><a href='index.php?delete_user=<?php echo $user_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
<?php
        }
        ?>
       
    </tbody>
</table>

<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5 ">
    <thead class="text-light bg-secondary">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
            


        </tr>
    </thead>
    <tbody class="bg-dark text-light text-center">
        <?php
        $get_products = "Select * from `products`";
        $results = mysqli_query($con, $get_products);
        $number = 0;
        while($row=mysqli_fetch_assoc($results)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image2 = $row['product_image2'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $number++;
            ?>

            
            <tr>
                <td><?php echo $number?></td>
                <td><?php echo $product_title ?></td>
                <td><img src='product_images/<?php echo $product_image2?>' class='product_img' /></td>
                <td>N<?php echo $product_price?></td>
                <td><?php
                $get_count = "Select * from `orders_pending` where product_id=$product_id";
                $result_count = mysqli_query($con, $get_count);
                $rows_count = mysqli_num_rows($result_count);
                echo $rows_count;
                ?></td>
                <td><?php echo $status ?></td>
                <td><a href='index.php?edit_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            
            <?php
        }
       
        ?>
        
    </tbody>

</table>
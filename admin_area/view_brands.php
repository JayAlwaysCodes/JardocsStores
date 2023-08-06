<h3 class="text-success text-center">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-secondary text-light">
        <tr>
            <th>Slno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-dark text-light">
        <?php
        $select_brand = "Select * from `brands`";
        $result = mysqli_query($con, $select_brand);
        $number = 0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
        
        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        
        </tr>
        <?php
        }?>
    </tbody>
</table>
<h3 class="text-success text-center">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-secondary text-light">
        <tr>
            <th>Slno</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-dark text-light">
        <?php
        $select_cat = "Select * from `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        
        ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        
        </tr>
        <?php
        }?>
    </tbody>
</table>
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
            <td><a  class='text-light' type="button"data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        
        </tr>
        <?php
        }?>
    </tbody>
</table>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h5>Are you sure you want to delete this?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light text-decoration-none' >Yes</a></button>
      </div>
    </div>
  </div>
</div>
<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-secondary text-light">
        <tr>
            <th>Slno</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-dark text-light">
        <?php
        $select_orders = "select * from `user_orders`";
        $result_orders = mysqli_query($con, $select_orders);
        $number = 0;
        while($row=mysqli_fetch_assoc($result_orders)){
            $order_id = $row['order_id'];
            $amount_due = $row['amount_due'];
            $invoice_number = $row['invoice_number'];
            $total_products = $row['total_products'];
            $order_date = $row['order_date'];
            $status = $row['order_status'];
            $number++;
            ?>

        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $amount_due ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $total_products ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $status ?></td>
            <td><a  class='text-light' type="button"data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
    <?php    
    }
        ?>
       
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?all_orders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light text-decoration-none' >Yes</a></button>
      </div>
    </div>
  </div>
</div>
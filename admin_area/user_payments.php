<h4 class="text-center text-success">All Payments</h4>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-secondary text-light">
        <tr>
            <th>Sl no</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-dark text-light">
        <?php
        $select_payments = "select * from `user_payments`";
        $result_payments = mysqli_query($con, $select_payments);
        $number = 0;
        while($row=mysqli_fetch_assoc($result_payments)){
            $payment_id = $row['payment_id'];
            $invoice_number = $row['invoice_number'];
            $Amount = $row['amount'];
            $payment_mode = $row['payment_mode'];
            $order_date = $row['date'];
            $number++;


            

            ?>
        <tr>
            <td><?php echo $number ?></td>
            <td><?php echo $invoice_number?></td>
            <td><?php echo $Amount?></td>
            <td><?php echo $payment_mode?></td>
            <td><?php echo $order_date?></td>
            <td><a href='index.php?delete_payment=<?php echo $payment_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
<?php
        }
        ?>
       
    </tbody>
</table>
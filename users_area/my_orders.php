<?php
$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where username = '$username'";
$result_query = mysqli_query($con,$get_user);
$fetch_data = mysqli_fetch_assoc($result_query);
$user_id = $fetch_data['user_id'];


?>


<h3 class="text-success">All My Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light">
        <tr>
        
            <th>Sl no</th>
            <th>Amount Due</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>

    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details = "Select * from `user_orders` where user_id = $user_id";
        $result_orders = mysqli_query($con, $get_order_details);
        $number = 1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $invoice_number = $row_orders['invoice_number'];
            $total_products = $row_orders['total_products'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];
            if($order_status=='pending'){
                $order_status = 'Incomplete';
            }else{
                $order_status = 'Completed';
            }
            

            echo "
            <tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>";
        if($order_status=='Completed'){
            echo "<td>Paid</td>";
        }else{
            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
            </tr>
            
            ";
        }
        
            
            $number++;

        }
        ?>
        

        
    </tbody>
</table>
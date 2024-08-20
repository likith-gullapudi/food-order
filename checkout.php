<?php include('partials-front/menu.php'); ?>
<form method="POST" action="" class="container" style="background-color:black">
    <fieldset>
        <legend class="text-white ">Delivery Details</legend>
        <div class="order-label text-white">Full Name</div>
        <input type="text" name="full-name" placeholder="Gullapudi Likith" class="input-responsive" required>

        <div class="order-label text-white">Phone Number</div>
        <input type="tel" name="contact" placeholder="E.g. 918253****" class="input-responsive" required>

        <div class="order-label text-white">Email</div>
        <input type="email" name="email" placeholder="E.g. abc@gmail.com" class="input-responsive" required>

        <div class="order-label text-white">Address</div>
        <textarea name="address" rows="10" placeholder="eluru" class="input-responsive" required></textarea>

        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
    </fieldset>
</form>

<?php
    echo SITEURL;
    header('location:'.SITEURL);
    echo "here";
    if(isset($_POST['submit'])){

        $total = 0;
        $sn = 1;
        print_r($_SESSION['cart']);
        
        foreach ($_SESSION['cart'] as $cart_item) {
            $food = $cart_item['food_id'];
            $price = $cart_item['productPrice'];
            $qty = $cart_item['productQuantity'];
            $total = $price * $qty;
            
        
            // total = price x qty 

            $order_date = date("Y-m-d h:i:s"); //Order DAte

            $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];
            $sql2 = "INSERT INTO tbl_order SET 
                        user_id='{$_SESSION['user_web']}',
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        sta = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";
            echo "something";
            echo $sql2;

                    //echo $sql2; die();

                    //Execute the Query
                    echo "<br>";
                    echo "before sql";
                    $res2 = mysqli_query($conn, $sql2);
                    echo "here";
                    
                    

        }
        echo "there";
        unset($_SESSION['cart']);

        $_SESSION['cart_items_ordered']="<h1 class='success text-center text-color'>ITEMS IN CART  Ordered Successfully.</h1>";
        header('location:'.SITEURL);
    }
    
    

        

            ?>
        
    <?php include('partials-front/footer.php'); ?>
           
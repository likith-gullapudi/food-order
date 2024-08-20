
<?php include('partials-front/menu.php'); ?>

    <?php 
       
        if(isset($_POST['food_id']))
        {   
            
            $food_id = $_POST['food_id'];
            $qunatity=$_POST['quantity'];

            
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";

            
            $res = mysqli_query($conn, $sql);
        
            $count = mysqli_num_rows($res);
            
            if($count==1)
            {
              
                $row = mysqli_fetch_assoc($res);
                

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                
            }
            else
            {
              
                header('location:'.SITEURL);
            }
        }
        else
        {
      
            header('location:'.SITEURL);
        }
    ?>

    <section class="food-order">
    <?php 
        session_start();
        echo $_SESSION['user_web'];
?>
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend class="text-white">Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                          
                            if($image_name=="")
                            {
                                
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                              
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc text-white">
                        <h3 class="text-white"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price text-white">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label text-white">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="<?php echo $qunatity; ?>" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend class="text-white">Delivery Details</legend>
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

                
                if(isset($_POST['submit']))
                {
                 
                    
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; 

                    $order_date = date("Y-m-d h:i:s");

                    $status = "Ordered"; 

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

                    
                    echo $sql2;
                    $res2 = mysqli_query($conn, $sql2);
                    if (!$res2) {
                        
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }
               
                    if($res2==true)
                    {    
                       
                        $_SESSION['order'] = "<h1 class='success text-center text-color'>Food Ordered Successfully.</h1>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                      
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
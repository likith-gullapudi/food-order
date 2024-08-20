<?php include('partials-front/menu.php'); ?>

<!-- Serach Section Start-->

<!-- Serach Section  End -->
<!-- Using sessions if we get order it will print here Start-->
<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    if(isset($_SESSION['cartmessage'])) {
        // show a message indicating that the quantity of the item in the cart has been updated
        echo $_SESSION['cartmessage'];
        // unset the exists session variable
        unset($_SESSION['cartmessage']);
    }
    if(isset($_SESSION['cart_items_ordered']))
    {
        echo $_SESSION['cart_items_ordered'];
        unset($_SESSION['cart_items_ordered']);
    }

?>
<!-- Using sessions if we get order it will print here End-->


<!-- Displaiung famous categories start taking input from mysql using php and printint it here Start -->

<section class="categories">
    <div class="container">
        <h2 class="text-center ">Find Famous Categories Here</h2>

        <?php 
            //sql query string
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //excute command using php
            $res = mysqli_query($conn, $sql);
            //count no of rows
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //CAtegories Available
                while($row=mysqli_fetch_assoc($res))
                {
                    
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                //checking image avaialble or not
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //no catergoreis avalibale
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>
<div class="clearfix"></div>
    </div>
</section>
<!-- Displaiung famous categories start taking input from mysql using php and printint it here End -->



<!-- Famous foods START -->
<section class="food-menu" >
    <div class="dashboard-content"  style="width:80%; margin:auto">
        

        <?php 
        
        //Getting Foods from Database
        //string for sql query
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

        
        $res2 = mysqli_query($conn, $sql2);

        //getting rows
        $count2 = mysqli_num_rows($res2);

        //checking count greater than 0 or not
        if($count2>0)
        {
            
            while($row=mysqli_fetch_assoc($res2))
            {
                //
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <div class="dashboard-card">
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="" class="card-image">

                    <div class="card-detail">
                        <h4 ><?php echo $title; ?></h4>
                        <p class="food-price">₹<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>
                        <div class="middle">

                        <!-- Form for ordering food -->
                            <form method="post" action="order.php" style="display: inline-flex;
                                                                            justify-content: center;
                                                                            align-items: center;">
                                <input type="number" name="quantity" placeholder="Quantity" min="1" required 
                                                                    style="width:50% ; margin:auto  ;margin-bottom:3px;
                                                                    padding:5px;border:2px solid #ff6b81;border-radius:5px">
                                <input type="hidden" name="food_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <br>
                                <button class="btn btn-primary" type="submit" name="submit-btn" value="order">Order Now</button>
                            </form>

                            <!-- Form for adding food to cart -->
                            <form method="post" action="add_to_cart.php" style="display: inline-flex;
                                                                            justify-content: center;
                                                                            align-items: center;">
                                <input type="hidden" name="food_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                
                                <input type="hidden" name="quantity" id="cart-quantity-<?php echo $id; ?>" value="1">
                                <button class="btn btn-secondary" type="submit" name="add-to-cart" value="cart" style="width:100px">Add to Cart</button>
                            </form>

                        </div>
                    </div>
                </div>

                <?php
            }
        }
        else
        {
            //Food Not Available 
            echo "<div class='error text-center'>Food not available.</div>";
        }
        
        ?>

        



        <div class="clearfix"></div>

        

    </div>

    <p class="text-center">
        <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
    </p>
</section>
<!-- Famous Foods End -->

<!-- Present -->



<?php include('partials-front/footer.php'); ?>
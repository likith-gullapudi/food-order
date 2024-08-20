    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        
        if(isset($_GET['category_id']))
        {
            
            $category_id = $_GET['category_id'];
           
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id and active='Yes';";

            
            $res = mysqli_query($conn, $sql);

            
            $row = mysqli_fetch_assoc($res);
            
            $category_title = $row['title'];
        }
        else
        {
            
            header('location:'.SITEURL);
        }
    ?>


   
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods in <a href="#" class="text-color">"<?php echo $category_title; ?> Category"</a></h2>

        </div>
    </section>
    




    <section class="food-menu" >
    <div class="dashboard-content"  style="width:80%; margin:auto">
        

        <?php 
        

        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' AND category_id=$category_id;";

        
        $res2 = mysqli_query($conn, $sql2);

 
        $count2 = mysqli_num_rows($res2);


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
           
            echo "<div class='error text-center'>Food not available.</div>";
        }
        
        ?>

        



        <div class="clearfix"></div>

        

    </div>

    <p class="text-center">
        <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
    </p>
</section>
    

    <?php include('partials-front/footer.php'); ?>
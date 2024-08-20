<?php include('partials-front/menu.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The chef</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/admin.css">
</head>

<div class="main-content">
    <div class="wrapper">
        <h1>Shopping Cart</h1>
        <br /><br />

        <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        ?>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <?php
                    $total = 0;
                    $sn = 1;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $food_id = $cart_item['food_id'];
                        $product_price = $cart_item['productPrice'];
                        $product_quantity = $cart_item['productQuantity'];

                      
                        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($res);

                        $food_name = $row['title'];
                        $total_price = $product_price * $product_quantity;
                        $total += $total_price;
                ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $food_name; ?></td>
                    <td><?php echo $product_price; ?></td>
                    <td><input type="number" name="quantity"  value="1" min="1" style="width:20% ; margin:auto  ;margin-bottom:3px;
                                                                                        padding:5px;border:2px solid #ff6b81;border-radius:5px" ></td>
                    <td><?php echo $total_price; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>remove-cart-item.php?food_id=<?php echo $food_id; ?>" class="btn-danger">Remove</a>
                    </td>
                </tr>

                <?php
                    }
                ?>

                <tr>
                    <td colspan="4"><strong>Total:</strong></td>
                    <td><?php echo $total; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>checkout.php" class="btn-primary">Checkout</a>
                    </td>
                </tr>

            </table>

        <?php
        } else {
            echo "<div class='error'>Your cart is empty. Please add some items to the cart.</div>";
        }
        ?>

    </div>
</div>

<?php include('partials-front/footer.php'); ?>c

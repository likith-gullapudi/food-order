<?php
session_start();



if(isset($_POST['add-to-cart'])) {
    $food_id = $_POST['food_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    
    $item_exists = false;
    foreach($_SESSION['cart'] as &$item) {
        if($item['food_id'] == $food_id) {
            $item_exists = true;
            $item['productQuantity'] += $quantity;
            
            break;
        }
    }

    if($item_exists) {
        $_SESSION['cartmessage'] = "<h1 class='success text-center text-color'>Already in cart change qunaityt in cart</h1>";
        header('Location: index.php');
    } else {
        $_SESSION['cart'][] = array(
            'food_id' => $food_id,
            'productPrice' => $price,
            'productQuantity' => $quantity
        );
        $_SESSION['cartmessage'] = "<h1 class='success text-center text-color'>Item added to the cart successfully!.</h1>";
        echo '<script>window.location.href = "' . SITEURL . 'admin/index.php";</script>';

    }
    exit();
}
?>

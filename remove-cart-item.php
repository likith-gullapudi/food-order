<?php
session_start();

if(isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    foreach($_SESSION['cart'] as $key => $item) {
        if($item['food_id'] == $food_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    $_SESSION['cartmessage'] = "<h1 class='success text-center text-color'>Item removed from cart successfully!</h1>";
    header('Location: view_Cart.php');
    exit();
}
?>

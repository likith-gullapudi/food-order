<?php
session_start();
echo $_SESSION['cart'][$item_id];
?>
<table>
  <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
  </tr>
  <?php foreach ($_SESSION['cart'] as $item_id => $item): ?>
  <tr>
    <td><?php echo $item['name']; ?></td>
    <td><?php echo $item['price']; ?></td>
    <td>
      <form method="post" action="update_cart.php">
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>">
        <input type="submit" value="Update">
      </form>
    </td>
    <td><?php echo $item['price'] * $item['quantity']; ?></td>
    <td>
      <form method="post" action="remove_from_cart.php">
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
        <input type="submit" value="Remove">
      </form>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
session_destroy()
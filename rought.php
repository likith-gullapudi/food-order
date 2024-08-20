<?php include('partials-front/menu.php'); ?>
<?php 
        session_start();
        echo $_SESSION['user_web'];
?>
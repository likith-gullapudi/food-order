<?php include('config/constants.php'); 
include('login_check_user.php');
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Navbar with Search Box | CodingNepal</title>
      <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/present.css">
      <link rel="stylesheet" href="css/mystyle.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            <a href="<?php echo SITEURL; ?>index.php">Restaurant</a>
            

         </div>
         <div class="nav-items">
                     <li class="menu-links">
                        <a class="menu-links" href="<?php echo SITEURL; ?>index.php" >Home</a>
                    </li>
                    <li class="menu-links"> 
                        <a  class="menu-links" href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li class="menu-links">
                        <a  class="menu-links" href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li class="menu-links">
                        <a  class="menu-links" href="<?php echo SITEURL; ?>order_user_able.php">Orders</a>
                    </li>
                    <li class="menu-links">
                        <a  class="menu-links" href="<?php echo SITEURL; ?>view_Cart.php">Cart</a>
                    </li>
                    <li class="menu-links">
                        <a  class="menu-links" href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                    
                    <li >
                        <a  class="menu-links" href="<?php echo SITEURL; ?>logout_user.php">Log out</a>
                    </li>
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search Here" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
      </nav>
      
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
   </body>
</html>
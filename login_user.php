<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <?php
                if(isset($_SESSION['no-login-message_web']))
                    {
                        echo $_SESSION['no-login-message_web'];
                        unset($_SESSION['no-login-message_web']);
                    }
                ?>
            <br><br>

         
            <form action="" method="POST" class="text-center">
           
            <input type="text" name="username" placeholder="Enter Username"><br><br>

           
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            <div>
                <p>Dont have account sign up here</p>
                <a href="sign_up.php">Sign up</a>
            </div>
            </form>
      

            
        </div>

    </body>
</html>

<?php 

  
    if(isset($_POST['submit']))
    {
   
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

      
        $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";

     
        $res = mysqli_query($conn, $sql);

       
        $count = mysqli_num_rows($res);

        if($count==1)
        {
           
            
            $_SESSION['user_web'] = $username; 

           
            header('location:'.SITEURL);
        }
        else
        {

            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
    
            echo $_SESSION['login'];
           
        }


    }

?>
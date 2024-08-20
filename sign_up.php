<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Sign-Up - Food Order System</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body style="background-color: #ff6b81;
    font-family: Arial, sans-serif;">
        
        <div class="login">
            <h1 class="text-center">Sign Up</h1>
            <br><br>
            <?php 
            if(isset($_SESSION['add_user'])) 
            {
                echo $_SESSION['add_user']; 
                unset($_SESSION['add_user']); 
            }
        ?>
            
            <br><br>

            
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Sign up" class="btn-primary">
            <br><br>
            <div>
         
                <a href="login_user.php">login</a>
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
       
        $user_entered_password = mysqli_real_escape_string($conn, $raw_password);
        
        $sql = "SELECT * FROM tbl_user WHERE username='".$username."'";
       
        $res = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($res) > 0) {
            
            $_SESSION['add_user'] = "<div class='error'>Username already exists.</div>";
            
            header("location:".SITEURL.'/sign_up.php');
            exit;
        }
        






        
        $sql = "INSERT INTO tbl_user SET 
            username='" . mysqli_real_escape_string($conn, $username) . "',
            password='" . mysqli_real_escape_string($conn, $user_entered_password) . "'
        ";


        echo $sql;
     
        $res = mysqli_query($conn, $sql);

        echo "helloefew";
       
        if($res==TRUE)
        {
          
            $_SESSION['add_user'] = "<div class='success'>User Added Successfully.</div>";
           
            echo "here";
            header("location:".SITEURL.'/login_user.php');
            
        }
        else
        {
         
            $_SESSION['add_user'] = "<div class='error'>Failed to Add Admin.</div>";
            
            
        }


    }

?>
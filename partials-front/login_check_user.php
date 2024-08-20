<?php 


    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user_web'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message_web'] = "<div class='error text-center'>Please login</div>";
        //REdirect to Login Page
        
        echo '<script>window.location.href = "' . SITEURL . '/login_user.php";</script>';
    }


?>
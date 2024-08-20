<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
        /* Styling for the form and its elements */
        

        form {
            padding:30px;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #999;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type=text], input[type=email], input[type=tel], textarea {
            width: 80%;
            margin: auto;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;

            box-shadow: 0 0 5px #ccc;
            border:1px solid rgb(95,162,188)
        }

        input[type=submit] {
            background-color: rgb(95,162,188);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;

        }

        input[type=submit]:hover {
            background-color: #0077b3;
        }

        /* Styling for the social media links */
        .social-links {
            max-width: 500px;
            margin: 20px auto;
            text-align: center;
        }

        .social-links a {
            display: inline-block;
            margin: 10px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(95,162,188);
            color: #fff;
            line-height: 40px;
            text-align: center;
            font-size: 20px;
            text-decoration: none;
        }

        .social-links a:hover {
            background-color: #0077b3;
        }
        .content{
            display:grid;
            grid-template-columns:1fr 2fr;
            box-shadow: 0px 0px 10px rgba(95,162,188, 0.2);
            padding: 20px;
            width:80%;
            margin:auto;
        }

        
        .leftside{
            grid-columns:1/2;
            

        }
        
        .rightside{
            grid-columns:2/-1;
        }
        .leftside {

            display: flex;
            flex-direction: column;
            justify-content: space-around;
            text-align: center;
            background-color: #f2f2f2;
            padding: 20px;
            color: rgb(95,162,188);
            font-size: 16px;
            border-right:1px solid #f2f2f2;
            padding-right:20px;
            }

            .details {
            margin-bottom: 20px;
            }

            .details i {
            margin-right: 10px;
            font-size: 50px;
            color:rgb(95,162,188);
            }

            .details .topic {
            font-size: 30px;
            margin-bottom: 5px;
            color:black;
            }

            .details .text-one {
            font-size: 16px;
            margin-bottom: 5px;
            }

            .details .text-two {
            font-size: 14px;
            color: #888;
        }


    </style>
</head>
<body>
<section>
    <div class="except_header">
        <div class="content">
            <div class="leftside">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">VIJAYAWADA </div>
                    <div class="text-two">Near Busstand</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">9182531022</div>
                    <div class="text-two">9876543210</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">abc@gmail.com</div>
                    <div class="text-two">xyz@gmail.com</div>
                </div>
            </div>
            <div class="rightside">

                <form action="" method="POST" >
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="First Name" required>

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname"  placeholder="Last Name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email" required>

                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="phone-number" required>

                    <label for="message">Message</label>
                    <textarea id="message" name="msg" rows="5" placeholder="Explain your query freely here" required></textarea>

                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
            <?php 

                //CHeck whether submit button is clicked or not
                
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form
            
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $msg = $_POST['msg'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql = "INSERT INTO contact SET 
                            fname = '$fname', 
                            lname = '$lname', 
                            email = '$email', 
                            phone = '$phone', 
                            msg = '$msg'
                        ";

                    //echo $sql2; die();
                    
                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql);
                    
                    //Check whether query executed successfully or not
                    if($res2==true)
                    {   echo "trued";
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Query sent.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {   echo "failed";
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Some error occured.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>
        </div>
    </div>
</section>
    <!-- fOOD sEARCH Section Ends Here -->

</body>
</html>

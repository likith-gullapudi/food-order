<?php include('partials/menu.php'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

</head>
<body>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Queries</h1>
        <br /><br />
        <table id="myTable">
                    <thead>
                        <th>S.N.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        
                    </thead>
                    <tbody>
                    <?php 
                        
                        $sql = "SELECT * FROM contact";

                     
                        $res = mysqli_query($conn, $sql);

                        
                        $count = mysqli_num_rows($res);

                       
                        $sn=1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $price = $row['price'];
                                $email = $row['email'];
                                $PhoneNo = $row['phone'];
                                $msg = $row['msg'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $fname; ?></td>
                                    <td>$<?php echo $lname; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $PhoneNo; ?></td>
                                    <td><?php echo $msg; ?></td>
                                    
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            
                            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                        }

                    ?>

                    </tbody>
                </table>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

</body>


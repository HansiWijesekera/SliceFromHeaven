<?php
    include "../db.php";
    session_start();
   
?>
<html>
<head>
<link rel="stylesheet" href="../css/style2.css">


</head>
<body> 
   <form method="post">  
                <table align="center" id="customers" >  
                     <tr>  
                        <th>Date Time</th>
                        <th>Order Number</th>
                        <th>Contact Number</th>
                        <th>Name</th>
                        <th>Address</th> 
                        <th>Type</th>
                        
                     </tr>  
                <?php  
                $query = "SELECT date,number,num,name,address,type from customer";   
              
                
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {
                ?>  
                    <tr> 
                        <td><?php echo $row['date'];?></td> 
                        <td><?php echo $row['number'];?></td>
                        <td><?php echo $row['num'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['type'];?></td>
                       
                    </tr> 

                <?php
                }
                ?>
               
                </table> 
    </form>  
</body>  
</html>
<?php
    include "../db.php";
    session_start();
   
?>
<html>
<head>
<link rel="stylesheet" href="../css/style2.css">
 
</head>
<body> 


        

     

     <div>       

        <form method="post">  
                <table align="center" id="customers" >  
                     <tr>  
                        <th>Employeer</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Pizza</th>
                        <th>Extra Item</th>
                        
                        
                     </tr>  
                <?php  
                $query = "SELECT emp_no,date,price,main_item_data,extra_item_data from cus_order";   
              
                
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {
                ?>  
                    <tr> 
                        <td><?php echo $row['emp_no'];?></td>
                        <td><?php echo $row['date'];?></td> 
                        <td><?php echo $row['price'];?></td>
                        <td><?php echo $row['main_item_data'];?></td>
                        <td><?php echo $row['extra_item_data'];?></td>
                        
                       
                    </tr> 

                    <?php
                }
                ?>
               
                </table> 
        </form> 
    </div>  
    
</body>  
</html>
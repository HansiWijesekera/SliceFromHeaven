<?php 
    include "../db.php";
    session_start();

?>
<!doctype html>
<html>
  <head>
  <link rel="stylesheet" href="../css/style2.css">
   </style></head>
<body>

   </script>
   <form method='post' action=''>
     Select Date <br> <input type='date' class='dateFilter' name='date' value='<?php if(isset($_POST['date'])) echo $_POST['date']; ?>'>
     <br><br>End Date <br><input type='date' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>
     <br>
     <input type='submit' name='but_search' value='Search'>
   </form>

   <div style='height: 80%; overflow: auto;' >
 
     <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;' id="customers">
       <tr>
         <th>Employee</th>
         <th>Price</th>
         <th>Pizza</th>
         <th>Topping</th>
       </tr>

       <?php
       $query1 = "SELECT * FROM cus_order WHERE 1";

       if(isset($_POST['but_search'])){
          $date = $_POST['date'];
          $endDate = $_POST['endDate'];

          if(!empty($date) && !empty($endDate)){
             $query1 .= " and date 
             between '".$date."' and '".$endDate."' ";
          }
        }

        $query1 .= " ORDER BY date DESC";
        $records = mysqli_query($conn,$query1);

        if(mysqli_num_rows($records) > 0){
          while($result = mysqli_fetch_assoc($records)){

            $emplyee = $result['emp_no'];
            $price = $result['price'];
            $pizza =$result['main_item_data'];
            $topping = $result['extra_item_data'];

            echo "<tr>";
            echo "<td>". $emplyee ."</td>";
            echo "<td>". $price ."</td>";
            echo "<td>". $pizza ."</td>";
            echo "<td>". $topping ."</td>";
            echo "</tr>";
          }
        }else{
         
          echo "<td>OOPZ!!! There are no any records</td>";
          
        }
        ?>
      </table>
 
    </div>
 </body>
</html>
<?php 
    include "../db.php";
    session_start();

?>
<!doctype html>
<html>
  <head>
  <link rel="stylesheet" href="../css/style2.css">
    <style>
    
 </style></head>
<body>

   </script>
   <form method='post' action=''>
     Select Employee <br><input type='text' name='emp_no' value='<?php if(isset($_POST['emp_no'])) echo $_POST['emp_no']; ?>'>
     <br><br><input type='submit' name='but_search' value='Search'>
   </form>

   <div style='height: 80%; overflow: auto;' >
 
     <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;' id="customers">
       <tr>
         <th>Date</th>
         <th>Price</th>
         <th>Pizza</th>
         <th>Topping</th>
       </tr>

       <?php
       $query1 = "SELECT * FROM cus_order WHERE 1";

       if(isset($_POST['but_search'])){
          $emp_no = $_POST['emp_no'];

          if(!empty($emp_no)){
             $query1 .= " and emp_no = '".$emp_no."'";
          }
        }

        $query1 .= " ORDER BY emp_no DESC";
        $records = mysqli_query($conn,$query1);

        if(mysqli_num_rows($records) > 0){
          while($result = mysqli_fetch_assoc($records)){

            $date = $result['date'];
            $price = $result['price'];
            $pizza = $result['main_item_data'];
            $topping = $result['extra_item_data'];

            echo "<tr>";
            echo "<td>". $date ."</td>";
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
<?php 
    include "db.php";
    session_start();

?>
<!doctype html>
<html>

  <head>
  <link rel="stylesheet" href="css/style2.css">
    </head>
<body>
   </script>

   <form method='post' action=''>
    Enter Your Pizza Here <input type='text' name='name' value='<?php if(isset($_POST['name'])) echo $_POST['name']; ?>'>
    <br><br> <input type='submit' name='but_search' value='Search'>
   </form>

   <div style='height: 100%; overflow: auto;' >
 
     <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;' id="customers">
       <tr>
         <th>pizza</th>
         <th>size</th>
         <th>price</th>
       </tr>

       <?php
       $query1 = "SELECT * FROM pizza WHERE 1";

       if(isset($_POST['but_search'])){
          $name = $_POST['name'];

          if(!empty($name)){
             $query1 .= " and name = '".$name."'";
          }
        }

        $records = mysqli_query($conn,$query1);

        if(mysqli_num_rows($records) > 0){
          while($result = mysqli_fetch_assoc($records)){

            $name = $result['name'];
            $size = $result['size'];
            $price =$result['price'];

            echo "<tr>";
            echo "<td>". $name ."</td>";
            echo "<td>". $size ."</td>";
            echo "<td>". $price ."</td>";
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
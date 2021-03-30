<?php
require 'db.php';
session_start();

$added_size = $_POST['size'];
$added_toppings = array();
if(isset($_POST['toppings']) && $_POST['toppings'] != null){
    $added_toppings = $_POST['toppings'];
}
$pizza_name = $_POST['pizza_name'];
$employee_no = $_SESSION['Empno'];
$quantity = $_POST['quantity'];
$total_price = $_POST['total_price'];

$main_item_data = [
    'name' => $pizza_name,
    'quantity' => $quantity,
    'size' => $added_size[0]
];

$extra_item_data = [];

//get data about pizza
$query_get_pizza_prize = "SELECT price FROM pizza WHERE name='$pizza_name'";
$result_pizza = mysqli_query($conn, $query_get_pizza_prize);
$pizza_row_count = mysqli_num_rows($result_pizza);
$pizza_price = 0;
if ($pizza_row_count) {
    $pizza_price_data = mysqli_fetch_row($result_pizza);
    $pizza_price = $pizza_price_data[0];
}

$added_toppings_str = "";

foreach ($added_toppings as $index => $added_topping) {
                array_push($extra_item_data, ["name" => $added_topping]);
                $added_toppings_str = $added_toppings_str . "'" . $added_topping . "'";
                if ($index != count($added_toppings) - 1) {
                    $added_toppings_str = $added_toppings_str . ",";
                }
}
//get data about topping
$total_topping_price = 0;
$toppings_data = array();
                    if(strlen($added_toppings_str) > 0){
                                    $query_get_topping_prize = "SELECT * FROM toppping WHERE topping IN (" . $added_toppings_str . ")";

                                    $result_topping = mysqli_query($conn, $query_get_topping_prize);
                                    $topping_row_count = mysqli_num_rows($result_topping);
                                    if ($topping_row_count) {
                                        $toppings_data = mysqli_fetch_all($result_topping, MYSQLI_ASSOC);
                                        foreach ($toppings_data as $topping) {
                                            $total_topping_price += $topping['price'];
                                        }
                                    }
    
}

//calculating price
$total_pizza_price = ($pizza_price * $quantity);

//insert data about items
            $main_item_json_data = json_encode($main_item_data);
            $extra_item_json_data = json_encode($extra_item_data);
                        $query_insert = "INSERT INTO items(emp_no,main_item_data,extra_item_data,price) VALUES('$employee_no','$main_item_json_data','$extra_item_json_data','$total_pizza_price')";
                        $insert_result = mysqli_query($conn, $query_insert);

                        $data = [];

//get last data last added
            if ($insert_result) {
                $user_data_query = "SELECT * FROM items WHERE emp_no='$employee_no' ORDER BY id DESC LIMIT 1";
                $result_user = mysqli_query($conn, $user_data_query);
                $data = mysqli_fetch_assoc($result_user);
            }

//insert to table and create table
        $main_item_data = json_decode($data['main_item_data'], true);
        $extra_item_data = json_decode($data['extra_item_data'], true);
        $td_content = "<td>" . $main_item_data['name'] . "</td><td>" . $main_item_data['size'] . "</td><td>" . $main_item_data['quantity'] . "</td><td>" . $data['price'] . "</td>";
        $extra_items_data = "";
        $toppings_details = array_column($toppings_data, 'price', 'topping');

        foreach ($extra_item_data as $extra_data) {
            $td_extra_content = "<td>extra " . $extra_data['name'] . "</td><td></td><td></td><td>" . $toppings_details[$extra_data['name']] . "</td>";
        
            $extra_items_data .= "<tr>
           " .
                $td_extra_content
                . "</tr>";
        }
        $total_price += ($total_pizza_price + $total_topping_price);
        $total_price_content = "<tr id='total-prize' value='$total_price'><td>Total</td><td></td><td></td><td>" . $total_price . "</td></tr>";
        $html_content = "<tr>
           " .
            $td_content
            . "</tr>" . $extra_items_data . $total_price_content;
        echo($html_content);   



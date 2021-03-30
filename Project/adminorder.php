<?php
   require 'db.php';
   session_start();

   $query = "SELECT * from toppping";
  
   $result = mysqli_query($conn, $query);


   $topping_data_set = mysqli_fetch_all($result, MYSQLI_ASSOC);


   $employee_no = $_SESSION['Empno'];
   # get all user added items
   $user_data_query = "SELECT * FROM items WHERE emp_no='$employee_no'";
   $result_user = mysqli_query($conn, $user_data_query);
   $item_content_data = mysqli_fetch_all($result_user, MYSQLI_ASSOC);
 ?>  
 <!DOCTYPE html>
<html lang="en">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<title>SLICE-FROM-HEVEN</title>



	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style1.css">



<style type="text/css">

.vertical-menu{
    text-align:center;
	 }


  .but
  {
  width: 120px;
  height: 60px;
    background-image: url('ss.jpg');
    background-repeat: no-repeat;
    background-size: 300px 400px;
    padding-left: 80px;
	padding-right: 100px;
  }


  .butx
  {
  width: 250px;
  height: 60px;
    background-image: url('aa.jpg');
    background-repeat: no-repeat;
    background-size: 300px 400px;
    padding-left: 80px;
	padding-right: 100px;
      
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color:black;
	
	
}

.acti {
    color:white;
}

.active-menu-items {
            background-color: #ccc !important;
        }

        .light-box-width {
            width: 100% !important;
        }

        .row-margin {
            margin-right: 0 !important;
        }

        .items-table-content {
            max-height: 726px;
            overflow-y: scroll;
        }




  
</style>

</head>

<body>
<ul>
  <li><a class="active" href="login.php">Home</a></li>
  <li><a href="admincustomer.php">Customer</a></li>
  <li><a href="information.php">Information</a></li>
  <li><a href="price.php">Price Table</a></li>
</ul>

<div class="row row-margin">
    <div class="col-lg-7">
	
		<div class="login-box animated fadeInUp light-box-width">
			<div class="box-header">
				<h2>Menu</h2>
      </div>
      
      <table style="width:100%">
 
  
  <tr>


  <tr>
                    <td>
                        <input type="button" value="Chees pizza" class="btn btn-default but" style="margin:10px;"
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('chees_pizza')">
                    </td>
                    <td>
                        <input type="button" value="Chicken delight" class="btn btn-default but" style="margin:10px;"
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('chicken_delight')">

                    </td>

                    <td>
                        <input type="button" value="mighty meaty" class="btn btn-default but" style="margin:10px;"
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('mighty_meaty')">

                    </td>
                   
                    <td>
                        <input type="button" value="Seafood Hawai" class="btn btn-default but" style="margin:10px;"
                        data-toggle="modal" data-target="#myModal" onclick="addPizzaName('Seafood_Hawai')">
                    </td>
                </tr>
                <tr>

                    <td><input type="button" value="Prown delight" class="btn btn-default but" style="margin:10px;"
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('prown_delight')">

                    </td>
                    <td><input type="button" value="veg lovers" class="btn btn-default but" style="margin:10px;"
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('veg_lovers')"></td>
                    <td><input type="button" value="Hot Veg" class="btn btn-default but" style="margin:10px;"
                    data-toggle="modal" data-target="#myModal" onclick="addPizzaName('Hot_Veg')"></td>
                    <td><input type="button" value="Sausage Pizza" class="btn btn-default but" style="margin:10px;"
                    data-toggle="modal" data-target="#myModal" onclick="addPizzaName('Sausage_Pizza')"></td>

                </tr>
                <tr>

                    <td><input type="button" value="galic prowns" class="btn btn-default but" style="margin:10px; "
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('galic_prowns')">
                    </td>
                    <td><input type="button" value="BBQ chicken" class="btn btn-default but" style="margin:10px; "
                               data-toggle="modal" data-target="#myModal" onclick="addPizzaName('bbq_chicken')">
                    </td>
                </tr>


            </table>
            <div id="myModal" class="modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" onclick="resetModelValues()">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="adminorder.php" method="post" id="formoid">
                                <p>
                                    <input hidden id="pizza-name"/>
                                <div class="vertical-menu" id="toppings">
                                    <a class="active">Extra</a>
                                    <?php foreach ($topping_data_set as $key => $value): ?>
                                        <a href="#" id="<?php echo $value['topping'] ?>"
                                           value='<?php echo $value['topping'] ?>'
                                           onclick="addTopping('<?php echo $value['topping'] ?>')"><?php echo $value['topping'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                                <br><br>

                                <div class="vertical-menu" id="sizes">
                                    <a class="active">Size</a>
                                    <a href="#" onclick="addSize('small')" id="small" value="small">Small</a>
                                    <a href="#" onclick="addSize('medium')" id="medium" value="medium">Medium</a>
                                    <a href="#" onclick="addSize('large')" id="large" value="large">Large</a>
                                </div>
                                <span id="size-error" class="text-danger"></span>
                                <br>
                                <div>
                                    <label for="quentity">Quantity</label>
                                    <br/>
                                    <input type="number" id="quentity" min="1" value="1">
                                    <br/>
                                    <span id="quentity-error" class="text-danger"></span>
                                    <div></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="btn btn-default" type="submit" id="submitButton"
                                               name="submitButton"
                                               value="Add">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            </div>
  </div>

            <div class="col-lg-4">
        <div1 class="login-box animated fadeInUp mt-5 light-box-width items-table-content">
            <div class="box-header">
                <h2>Added Items</h2>
            </div>
            <table style="width:100%" class="table table-hover">
                <thead>
                <tr>
                    <td>name</td>
                    <td>size</td>
                    <td>quantity</td>
                    <td>price</td>
                </tr>
                </thead>
                <tbody id="items-table-body">
                <?php
                $topping_data = array_column($topping_data_set, 'price', 'topping');
                $total_price = 0;
                $content = "";
                foreach ($item_content_data as $key => $value) {
                    $main_item_data = json_decode($value['main_item_data'], true);
                    $extra_item_data = json_decode($value['extra_item_data'], true);
                    $content .= "<tr><td>" . $main_item_data['name'] . "</td>" . "<td>" . $main_item_data['size'] . "</td>" . "<td>" . $main_item_data['quantity'] . "</td>" . "<td>" . $value['price'] . "</td>";
                    $total_price += $value['price'];
                    foreach ($extra_item_data as $extra_data) {
                        $total_price += $topping_data[$extra_data['name']];
                        $content .= "<tr><td>extra " . $extra_data['name'] . "</td><td></td><td></td><td>" . $topping_data[$extra_data['name']] . "</td></tr>";
                    }
                }
                $content .= "<tr id='total-prize' value='$total_price'><td>Total</td><td></td><td></td><td>" . $total_price . "</td></tr>";
                echo $content;
                ?>
                </tbody>

                <tr><td><div>	<button type="submit" ><a class="acti" href="adminquery.php" >Confirm Payment</button><br><br>
                    <button type="submit" ><a class="acti" href="admindev1.php" >Discard Payment</button></div></td></tr>
               

               
            </table>
        </div1>
    </div>
</div>
	
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Confirm Payment</h2>
			
                <label for="value">Bill Value</label>
			<br/>
			<input type="value" id="price" value="<?php echo $total_price ?>">
      <br/>

      <label for="value">Discount Percentage</label>
			<br/>
			<input type="value" id="discount">  %
      <br/>

      <button onclick="getPrice()"  type="submit"  ><a class="acti">
Click Here To Get Final Bill Value
</button>
			
<br><br> 
    <input readonly id="total">
    <script>
        getPrice = function() {
            var numVal1 = Number(document.getElementById("price").value);
            var numVal2 = Number(document.getElementById("discount").value) / 100;
            var totalValue = numVal1 - (numVal1 * numVal2)
            document.getElementById("total").value = totalValue.toFixed(2);
        }
    </script><br><br>
			
			
			<button type="submit" ><a class="acti" target="_incognito" href="payment/card.php">Card Payment</button>
			<br/>
			
			<div>			
            <button type="submit" ><a class="acti" href="admindev.php" >Submit Payment</button>
            </div>

</body>

<script>


//function to highlight selected topping
   function addTopping(topping) {
        if ($('#' + topping).hasClass('active-menu-items')) {
            $('#' + topping).removeClass('active-menu-items');
        } else {
            $('#' + topping).addClass('active-menu-items');
        }

    }

//function to highlight selected size
    function addSize(size) {
        let currentSelectedSize = $("#sizes .active-menu-items").attr('value');
        if (typeof currentSelectedSize != undefined) {
            $('#' + currentSelectedSize).removeClass('active-menu-items');
        }
        $('#' + size).addClass('active-menu-items');
        $('#size-error').text("");
    }

//submit html form
    $("#formoid").submit(function (event) {

        event.preventDefault();
        let quantity = $("#quentity").val()
        let addedToppings = [];
        let addedSizes = [];
        let toppingDivs = $("#toppings .active-menu-items");
        let sizeDivs = $("#sizes .active-menu-items");
        let pizzaName = $("#pizza-name").val();
        let totalPrice = $("#total-prize").attr('value');
        for (let i = 0; i < toppingDivs.length; i++) {
            addedToppings.push(toppingDivs[i].getAttribute('value'))
        }

        for (let i = 0; i < sizeDivs.length; i++) {
            addedSizes.push(sizeDivs[i].getAttribute('value'))
        }

        if (quantity === "") {
            $('#quentity-error').text("Please Add Quantity");
        } else {
            $('#quentity-error').text("");
        }

        if (addedSizes.length === 0) {
            $('#size-error').text("Please Add Size");
        } else {
            $('#size-error').text("");
        }

        if (quantity !== "" && addedSizes.length > 0) {
            $.post("addItem.php", {
                quantity: quantity,
                pizza_name: pizzaName,
                toppings: addedToppings,
                size: addedSizes,
                total_price: totalPrice
            })
                .done(function (data) {
                    console.log(data);
                    $('#total-prize').remove();
                    $('#items-table-body').append(data);
                    resetModelValues()
                });
            $('#myModal').modal('hide')
        }
    });

//reset form values
    function resetModelValues() {
        let toppingDivs = $("#toppings .active-menu-items");
        let sizeDivs = $("#sizes .active-menu-items");

        for (let i = 0; i < toppingDivs.length; i++) {
            $('#' + toppingDivs[i].getAttribute('value')).removeClass('active-menu-items');
        }

        for (let i = 0; i < sizeDivs.length; i++) {
            $('#' + sizeDivs[i].getAttribute('value')).removeClass('active-menu-items');
        }

        $("#quentity").val(1);
        $('#size-error').text("");
        $('#quentity-error').text("");
    }

// get selected pizza's name
    function addPizzaName(name) {
        $("#pizza-name").val(name)
    }
</script>

</html>
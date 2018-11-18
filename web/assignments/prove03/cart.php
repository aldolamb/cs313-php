<?php
    include './items.php';
    if(!isset($_SESSION)) {
        session_start();
    }
    $cart = array();
    $totalPrice = 0;
    if($_SESSION["cart"]) {
        foreach($_SESSION["cart"] as $key=>$num) {
            if(isset($key)) {
                $cart[$key] = array($items[$key],$num);
                $totalPrice += ($items[$key]->price)*$num;
            }
        }
    }
    if($_POST["less"]) {
    	$num = $_SESSION["cart"][$_POST["less"]] - 1;
    	if ($num > 0)
    		$_SESSION["cart"][$_POST["less"]] = $num;
    	else 
    		unset($_SESSION["cart"][$_POST["less"]]);
    }
    if($_POST["more"]) {
		$_SESSION["cart"][$_POST["more"]] = $_SESSION["cart"][$_POST["more"]] + 1;
    }?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Cart</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../../styles.css">
	    <link rel="icon" href="../../images/favicon.ico">
	</head>
	<body>
		<?php require('../../navbar.php');?>
		<h2>Cart</h2>
		<div class="container mt-3 pt-3">
            <div class="row mb-4">
                <div class="col-9">
                   <table class="table table-striped">
                       <thead>
                           <tr>
                               <th scope="col">Item</th>
                               <th scope="col">Quantity</th>
                               <th scope="col">Price per Item</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                                foreach($cart as $key=>$c) {
                                    echo '<tr>';
                                    echo '<td>'.$c[0]->type.'</td>';
                                    echo '<td>'.$c[1];
                                    echo '   <form style="display:inline;" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">'; 
					                echo '      <input class="d-none" type="text" value="'.$key.'" readonly name="less">';
					                echo '      <button>-</button>';
					                echo '   </form>';
                                    echo '   <form style="display:inline;" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">'; 
					                echo '      <input class="d-none" type="text" value="'.$key.'" readonly name="more">';
					                echo '      <button>+</button>';
					                echo '   </form></td>';
                                    echo '<td>$'.number_format($c[0]->price, 2).'</td>';
                                    echo '</tr>';
                                }
                            ?>
                       </tbody>
                   </table>
                    <p class="text-right"><strong>Total:</strong> $<?php echo number_format($totalPrice, 2) ?></p>
                </div>
                <div class="col-3">
                    <div class="list-group">
                        <a href="./browse.php" class="list-group-item list-group-item-action">Browse</a>
                        <a href="./checkout.php" class="list-group-item list-group-item-action bg-success text-light">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
		
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
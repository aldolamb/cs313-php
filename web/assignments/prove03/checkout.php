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
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Checkout</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../../styles.css">
	    <link rel="icon" href="../../images/favicon.ico">
	</head>
	<body>
		<?php require('../../navbar.php');?>
		<h2 class="text-center">Total: $<?php echo number_format($totalPrice, 2) ?></h2>   
        <form class="formWidthFix" action="confirmation.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="jondoe@example.com" name="email">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword">Full Name</label>
                <input type="input" class="form-control" id="inputPassword" placeholder="Jon Doe" name="name">
                </div>
            </div>
                <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Logan" name="city">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <input type="text" class="form-control" id="inputState" placeholder="UT" name="state">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="84321" name="zip">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Complete Order</button>
        </form>
		
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
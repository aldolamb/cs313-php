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
    $_SESSION["cart"] = array();
	?>	

<!DOCTYPE html>
<html>
	<head>
	    <title>Confirmation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../../styles.css">
	    <link rel="icon" href="../../images/favicon.ico">
	</head>
	<body>
		<?php require('../../navbar.php');?>
		<div class="row">
           <div class="col-12">
               <?php if(isset($_POST)) { ?>
               <div class="alert alert-success" role="alert">
                  The Order has been successfully placed!
               </div>
               <?php } ?>
           </div>
        </div>
        <div class="row mb-4">
            <div class="col-9">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo filter_var($_POST["name"], FILTER_SANITIZE_STRING); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo filter_var($_POST["email"], FILTER_SANITIZE_STRING); ?></h6>
                        <div class="card-text"><?php echo filter_var($_POST["address1"], FILTER_SANITIZE_STRING)." ".filter_var($_POST["address2"], FILTER_SANITIZE_STRING)
                                                            ."<br>".filter_var($_POST["city"], FILTER_SANITIZE_STRING).", ".filter_var($_POST["state"], FILTER_SANITIZE_STRING)
                                                            ." ".filter_var($_POST["zip"], FILTER_SANITIZE_STRING)."<br>"."Charged: <strong>".number_format($totalPrice, 2)."</strong>";  ?></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="list-group">
                    <a href="browse.php" class="list-group-item list-group-item-action">Browse</a>
                    <a href="checkout.php" class="list-group-item list-group-item-action">Checkout</a>
                </div>
            </div>
        </div>
		
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
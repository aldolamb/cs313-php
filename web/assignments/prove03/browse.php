<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if($_POST["number"]) {
    	if ($_SESSION["cart"][$_POST["number"]])
    		$_SESSION["cart"][$_POST["number"]] = $_SESSION["cart"][$_POST["number"]] + 1;
    	else 
    		$_SESSION["cart"][$_POST["number"]] = 1;
    }
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Browse</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../../styles.css">
	    <link rel="icon" href="../../images/favicon.ico">
	</head>
	<body class="prove03">
		<?php require('../../navbar.php');?>
		<a href="cart.php" style="position:absolute;right:5vw;">Cart (<?php echo $_SESSION["cart"] ? array_sum($_SESSION["cart"]) : 0?>)</a>
		<div class="cards">
			<?php
                include './items.php';
                foreach($items as $key=>$item) {
	                echo '<div>';
	                echo '   <img src="'.$item->img.'" alt="'.$item->name.'-image">';
	                echo '   <h3>'.$item->type.'</h3>';
	                echo '   <p> Price: $'.number_format($item->price, 2).'</p>';
	                echo '   <form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">'; 
	                echo '      <input class="d-none" type="text" value="'.$key.'" readonly name="number">';
	                echo '      <button class="btn btn-primary">Add to Cart</button>';
	                echo '   </form>';
	                echo '</div>';
	               } ?>  
		</div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
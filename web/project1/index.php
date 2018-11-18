<?php 
    session_start();
    include '../db.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Project 1</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="../styles.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="../images/favicon.ico">
	</head>
	<body class="project1">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
		 		<h1 class="display-4">BowlBase</h1>
				<?php 
				// ".$_SESSION['id']."
				    if( $_SESSION['valid']) 
				        echo "<a href='add.php'>Add</a><a href='edit.php'>Settings</a><a href='logout.php'>Log Out</a>";
				    else
				    	echo "<a href='login.php'>Login</a><a href='signup.php'>Sign Up</a>";
				?>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h2>Bowlers</h2>
				<div class="col-12">
					<?php
						$query = 'select bowler.id, bowler.first, bowler.last, count(game.total), avg(game.total) from bowler inner join game on bowler.id = game.bowler group by bowler.id;';
						foreach($db->query($query) as $row) {
						?>      
						<h3><a href="bowler.php?id=<?php echo $row['id']; ?>"> <?php echo $row['first'].' '.$row['last']; ?> </a></h3>
							<span>Total Games: <?php echo $row['count'];?></span><br>
							<span>Average: <?php echo round($row['avg'],2);?></span>
					<?php } ?>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
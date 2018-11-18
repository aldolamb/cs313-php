<!DOCTYPE html>
<html>
	<head>
	    <title>Teach 03</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../styles.css">
	    <link rel="icon" href="../images/favicon.ico">
	</head>
	<body class="teach03">
		<?php require('../navbar.php');?>
		<h2>Teach 03</h2>
		<form action="teach03Form.php" method="post">
			<div class="form-group">
				<label for="exampleInputText">Name</label>
				<input type="text" class="form-control" id="exampleInputText" placeholder="Name" name="name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
			</div>
			<div>
				<?php
					$majors=Array('Computer Science','Web Design and Development','Computer Information Technology','Computer Engineering'); 
					for($i=0;$i < count($majors);++$i){
						$num=$i+1;
						echo 
						'<div class="form-check">
							<input class="form-check-input" type="radio" name="major" value="'.$majors[$i].'"'.(($i==0)?'checked':'').'>
							<label class="form-check-label">'.$majors[$i].'</label>
						</div>';
					}
				?>
			</div>
			<br>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Comments</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
			</div>
			<div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="na" id="places1">
					<label class="form-check-label" for="defaultCheck1">North America</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="sa" id="places2">
					<label class="form-check-label" for="defaultCheck2">South America</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="eu" id="places3">
					<label class="form-check-label" for="defaultCheck2">Europe</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="as" id="places4">
					<label class="form-check-label" for="defaultCheck2">Asia</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="au" id="places5">
					<label class="form-check-label" for="defaultCheck2">Australia</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="af" id="places6">
					<label class="form-check-label" for="defaultCheck2">Africa</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="places[]" value="an" id="places7">
					<label class="form-check-label" for="defaultCheck2">Antartica</label>
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
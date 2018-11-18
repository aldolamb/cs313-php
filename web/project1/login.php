<?php
    session_start();
    $isLogin = true;
    require '../db.php';
    require 'session.php';
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Project 1</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="../images/favicon.ico">
	</head>
	<body class="project1">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Login</h1>
            </div>
        </div>
        <div class="container mt-3 pt-3">
           <div class="row mb-4">
               <div class="col-12">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class="form-group">
                        <label for="login-username">Username</label>
                        <input type="test" class="form-control" id="login-username" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password">
                        <small id="emailHelp" class="form-text text-muted">new around here? Visit the <a href="signup.php">Sign Up</a> page for a new account.</small>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
               </div>
           </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
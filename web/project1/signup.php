<?php
    session_start();
    require '../db.php';
    try
    {
        $badCreds = false;
        $error = "";
        $first = $_POST['first'];
        $last = $_POST['last'];
        $dob = $_POST['dob'];
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordconfirm'];
        if(isset($userName) || isset($password))
        {
            
            echo "<script>console.log('UserName: ".$userName." | Password: ".$password."');</script>";
            // make sure username isn't null || empty string
            if($userName == "" || !isset($userName)) 
            {
                echo "<script>console.log('Is Set Username: ".(!isset($username))."');</script>";
                $badCreds = true;
                $error .= "Username is required <br>";
            }
            // make sure password isn't null || empty string
            if($password == "" || !isset($password)) 
            {
                $badCreds = true;
                $error .= "Password is required <br>";
            }
            // check for numbers
            if(1 !== preg_match('~[0-9]~', $password))
            {
                $badCreds = true;
                $error .= "Password Must contain a number <br>";
            }
            // check for numbers
            if(strlen($password) < 8)
            {
                $badCreds = true;
                $error .= "Password Must be at least 8 characters long <br>";
            }
            if($password !== $passwordConfirm)
            {
                $badCreds = true;
                $error .= "Passwords Don't Match <br>";
            }
            // if(!$badCreds)
            // {
            //     // so far so good, let's check the DB for the username
            //     $query = 'SELECT exists(SELECT password FROM bowler WHERE username=:username) AS exists';
            //     $statement = $db->prepare($query);
            //     $statement->bindValue(':username', $userName);
            //     $statement->execute();
            //     $result = $statement->fetch();
            //     if($result['exists']) 
            //     {
            //         $badCreds = true;
            //         $error .= "Username already in use. Username must be unique <br>";
            //         //$error = $result;
            //     }
            // }
            if(!$badCreds)
            {
                // everything checks out, add the user w/ hashed password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = 'INSERT INTO bowler (first, last, dob, username, password) VALUES (:first, :last, :dob, :userName, :password)';
                $statement = $db->prepare($query);
                $statement->bindValue(':first', $first);
                $statement->bindValue(':last', $last);
                $statement->bindValue(':dob', $dob);
                $statement->bindValue(':userName', $userName);
                $statement->bindValue(':password', $hashedPassword);
                $statement->execute();
                // redirect to login page.
                //echo "got here";
                header("Location: login.php");
                die();
            }
        }
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    } 
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
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Sign Up</h1>
            </div>
        </div>
        <div class="container mt-3 pt-3">
            <div class="row mb-4">
                <div class="col-12">
                    <h2>Sign Up</h2>
                    <?php if($badCreds) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php print_r($error); ?>
                        </div>
                    <?php } ?>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                       <div class="form-group">
                            <label for="login-first">First Name<span class="required">*</span></label>
                            <input type="test" class="form-control" id="login-first" value="<?php echo $first; ?>" name="first" placeholder="John">
                        </div>
                        <div class="form-group">
                            <label for="login-last">Last Name<span class="required">*</span></label>
                            <input type="test" class="form-control" id="login-last" value="<?php echo $last; ?>" name="last" placeholder="Doe">
                        </div>
                        <div class="form-group">
                            <label for="login-dob">Birthday<span class="required">*</span></label>
                            <input type="test" class="form-control" id="login-dob" value="<?php echo $dob; ?>" name="dob" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="form-group">
                            <label for="login-username">Username<span class="required">*</span></label>
                            <input type="test" class="form-control" id="login-username" name="username" value="<?php echo $userName; ?>" aria-describedby="emailHelp" placeholder="Enter Username">
                            <small id="emailHelp" class="form-text text-muted">username must be unique.</small>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password<span class="required">*</span></label>
                            <input type="password" class="form-control" id="login-password" value="<?php echo $password; ?>" name="password" placeholder="Password" aria-describedby="passwordHelp" onkeyup="validatePassword()">
                            <small id="passwordHelp" class="form-text text-muted">
                                <span id="greater-then-7">Password must be greater then 7 characters</span>
                                <span id="contains-number">, and contain at least 1 number.</span>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Confirm Password<span class="required">*</span></label>
                            <input type="password" class="form-control" id="login-password-confirm" value="<?php echo $passwordConfirm; ?>" name="passwordconfirm" placeholder="Password" onkeyup="comparePasswords()">
                            <small class="required" hidden="true" id="confirm-pw-prompt">Values do not match</small>
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
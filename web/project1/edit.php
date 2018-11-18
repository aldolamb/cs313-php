<?php 
    session_start();
    include '../db.php';
    $bowlers = array();
    $query = $db->prepare("SELECT * FROM bowler WHERE id = :id;");
    $query->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
    $query->execute();
    $id = $_SESSION['id'];
    $first = "";
    $last = "";
    $dob = "";
    $username ="";
    try{
      foreach ($query->fetchAll() as $row) {
        $first = $row[first];
        $last = $row[last];
        $dob = $row[dob];
        $username = $row[username];
      }
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Project 1</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <link rel="icon" href="../images/favicon.ico">
    </head>
    <body class="project1">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Edit User</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="./updateBowler.php" method="post">
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
                            <input type="test" class="form-control" id="login-username" name="username" value="<?php echo $username; ?>" aria-describedby="emailHelp" placeholder="Enter Username">
                            <small id="emailHelp" class="form-text text-muted">username must be unique.</small>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                        <button class="btn btn-secondary mt-3"><a href="./index.php" style="text-decoration: none;">Cancel</a></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
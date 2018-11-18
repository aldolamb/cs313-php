<?php include '../../db.php' ?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Teach 04</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../../styles.css">
	    <link rel="icon" href="../../images/favicon.ico">
	</head>
	<body>
		<?php require('../../navbar.php');?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Scripture Resouces</h1>
                <p class="lead">Find and display scriptures stored in a backend database, via PHP</p>
            </div>
        </div>
        <div class="container">
           <div class="row">
               <div class="col-12">
                   <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="get">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Search By Book: </label>
                            <input type="text" class="form-control" id="book" name="book" aria-describedby="emailHelp" placeholder="Book">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
            <div class="row">
                <div class="col-12">
                    <?php
                        $query = 'SELECT * FROM Scriptures';
                        if($_GET['book']) {
                            $query .= " WHERE book ILIKE '%".$_GET['book']."%'";
                        }
                        foreach($db->query($query) as $row) {
                    ?>      
                           <h3><a href="./details.php?id=<?php echo $row['id']; ?>"> <?php echo $row['book'].' '.$row['chapter'].':'.$row['verse']; ?> </a></h3>
                    <?php } ?>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
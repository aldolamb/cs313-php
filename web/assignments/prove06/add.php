<?php 
    include '../../db.php';
    $bowlers = array();
    try{
      foreach($db->query('select id, first, middle, last from bowler;') as $row){
          $bowlers[$row[id]] = $row[first].' '.$row[middle].' '.$row[last];
      }
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Prove 06</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../styles.css">
        <link rel="icon" href="../../images/favicon.ico">
    </head>
    <body class="prove06">
        <?php require('../../navbar.php');?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Add Game</h1>
            </div>
        </div>
        <div class="container">
           <div class="row">
               <div class="col-12">
                   <a href="./index.php" class="btn btn-secondary">Back</a>
               </div>
           </div>
            <div class="row">
                <div class="col-12">
                    <form action="./insert.php" method="post">
                        <select name='bowler' class="form-control">
                            <?php 
                                foreach($bowlers as $key => $value)
                                    echo '<option value="'.$key.'">'.$value.'</option>'?>
                        </select>
                        <!-- <div class="form-group">
                            <label for="book-input">Bowler</label>
                            <input type="text" class="form-control" id="book-input" name="bowler" placeholder="id number" required>
                        </div> -->
                        <div class="form-group">
                            <label for="chapter-input">Total</label>
                            <input type="text" class="form-control" id="chapter-input" name="total" placeholder="Total" required>
                        </div>
                        <div class="form-group">
                            <label for="verse-input">Creation Date (optional)</label>
                            <input type="text" class="form-control" id="verse-input" name="creation_date" placeholder="yyyy-mm-dd">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
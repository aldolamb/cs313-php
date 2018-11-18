<?php include '../../db.php';
$dataPoints = array();
try{
  foreach($db->query('select creation_date, ROUND(AVG(total), 2) from game WHERE bowler='.$_GET['id'].' group by creation_date order by creation_date;') as $row){
      $temp = array("x" => (new DateTime($row[0]))->format("U")*1000, "y" => $row[1]);
      array_push($dataPoints, $temp);
  }
  $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
} ?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Prove 06</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="../../styles.css">
	    <link rel="icon" href="../../images/favicon.ico">
      <script>
        window.onload = function () {
         
        var chart = new CanvasJS.Chart("chartContainer", {
          title: {
            text: "Average Scores"
          },
          axisX:{
              title: "Date",
              gridThickness: 2
          },
          axisY: {
              title: "Average",
              includeZero: false
          },
          data: [{
            type: "line",
            xValueType: "dateTime",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
          }]
        });
        chart.render();
         
        }
      </script>
	</head>
	<body class="prove06">
		<?php require('../../navbar.php');
      $query = 'SELECT * FROM bowler';
      if($_GET['id']) {
        $query .= " WHERE id = ".$_GET['id'];
      }
      foreach($db->query($query) as $row) { ?>
	  <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><?php echo $row['first'].' '.$row['middle'].' '.$row['last']; ?></h1>
            <p class="lead"><a href="./league.php?id=<?php echo $row['league']; ?>">View League</a></p>
        </div>
    </div>
    <?php } ?>

    <a href="./index.php" class="btn btn-secondary">Back</a>
    <div id="chartContainer" style="height: 400px; width: 95%; resize: both; margin: 0 auto;"></div>
    <br>
    <table class="container">
      <tr><th>Date</th><th colspan="5">Totals</th></tr>
      <?php 

      $query = $db->prepare("SELECT * FROM game WHERE bowler = :bowler order by creation_date DESC;");
      $query->bindValue(':bowler', $_GET['id'], PDO::PARAM_INT);
      
      $games = array();

      $query->execute();

      foreach($query->fetchAll() as $row) {
          $games[$row[creation_date]] .= '<td>'.$row[total].'</td>';
      }
      foreach($games as $key => $value) {
        echo '<tr><th>'.$key.'</th>'.$value.'</tr>'; 
      }; ?>
    </div>
    <br><br>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>



<!-- 
                    <p style="width:100%;text-align:center;"><?php echo $game['creation_date']; ?></p>
                    <table style="width:100%;margin-bottom:2em;">
                      <tr>
                        <th colspan="2">1</th>
                        <th colspan="2">2</th> 
                        <th colspan="2">3</th>
                        <th colspan="2">4</th>
                        <th colspan="2">5</th> 
                        <th colspan="2">6</th>
                        <th colspan="2">7</th>
                        <th colspan="2">8</th> 
                        <th colspan="2">9</th>
                        <th colspan="3">10</th>
                        <th colspan="1" class="total">Total</th> 
                      </tr>
                      <tr>
                        <?php $array = str_split($game['frames']);
                        for ($x = 0; $x < 21; $x++) {
                          if ($x < sizeof($array))
                            echo '<td>'.$array[$x].'</td>';
                          else
                            echo '<td></td>';
                        }?>
                        <th rowspan="2"><?php echo $game['total'] ?></th>   
                      </tr>
                      <tr>
                        <th colspan="2">20</th>
                        <th colspan="2">45</th> 
                        <th colspan="2">62</th>
                        <th colspan="2">69</th>
                        <th colspan="2">84</th> 
                        <th colspan="2">104</th>
                        <th colspan="2">134</th>
                        <th colspan="2">159</th> 
                        <th colspan="2">174</th>
                        <th colspan="3">179</th>
                      </tr>
                    </table> -->
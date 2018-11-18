<html>
<body>

Welcome <?php echo $_POST["name"]; ?>!<br>
Email: <a href=<?php echo 'mailto:'.$_POST["email"]; ?>><?php echo $_POST["email"]; ?></a><br>
Major: <?php echo $_POST["major"]; ?><br>
Comments: <?php echo $_POST["comments"]; ?><br>
You've visited:<br>
<?php 
$places = array(
    "na" => "North America",
    "sa" => "South America",
    "eu" => "Europe",
    "as" => "Asia",
    "au" => "Australia",
    "af" => "Africa",
    "an" => "Antartica",
);
foreach($_POST["places"] as $selected){ echo $places[$selected]."</br>"; }?>

</body>
</html>

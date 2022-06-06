<?php
  require_once "pdo.php";
  $failure = false;
  // Demand a GET parameter
  if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1 ) {
    die('Name parameter missing');
  }
  // If the user requested logout go back to index.php
  if ( isset($_POST['logout']) ) {
    header('Location: index.php');
      return;
  }
  if ( isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) ) {
    if ( strlen($_POST['make']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1) {
      $failure = "<span style='color:red'>All input are required are required</span>";
    } elseif (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])) {
      $failure = "<span style='color:red'>Year and mileage must be integer<span>";
    } else {
      $sql = "INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':make' => $_POST['make'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage']));
      $failure = "<span style='color:green'>Record inserted</span>";
    }
  }

   ?>

<html>
<head>
  <title>AUTOS DATABASE 205823 MUHAMMAD HARITH THAQIF</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devicewidth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <div class="jumbotron" id="head">
       <h1>Tracking Autos for</h1>
       <?php     //forward login user name
           if ( isset($_REQUEST['name']) ) {
             echo "<strong>";
             echo htmlentities($_REQUEST['name']);
             echo "</strong>\n";
           } ?>
     </div>

     <div id="form" class="container">
       <?php
       if ($failure !== false){
         echo ("<p>$failure</p>\n");
       }
       ?>
       <form method="post">
         <label for="who">Make :</label>
         <input type="text" id="make" name="make" placeholder="Enter make here..." ></input><br>
         <label for="pass">Year :</label>
         <input type="text" id="year" name="year" placeholder="Enter year here..." ></input><br>
         <label for="pass">Mileage :</label>
         <input type="text" id="mileage" name="mileage" placeholder="Enter mileage here..." ></input><br>
        <input type="submit" value="Add">
        <input type="submit" name="logout" value="Logout">
       </form>

       <table border="1">
       <?php
       echo "<br><h2><b>Automobiles<b><h2>";
       echo "<tr><th>Make</th><th>Year</th><th>Mileage</th></tr>";
       $stmt = $pdo->query("SELECT make, year, mileage FROM autos");
       while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
       echo ("<tr><td>");
       echo(htmlentities($row['make']));
       echo("</td><td>");
       echo(htmlentities($row['year']));
       echo("</td><td>");
       echo(htmlentities($row['mileage']));
       echo("</td></tr>\n");
       }
       ?>
       </table>
     </div>

</body>
</html>

<html>
<head>
  <title>RPS LOGIN 205823 Harith Thaqif</title>
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
  <h1>Rock Paper Scissors </h1>
</div>

  <?php
  // Demand a GET parameter
  if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1 ) {
    die('Name parameter missing');
  }
  
  if ( isset($_POST['logout']) ) {
   header('Location: login.php');
   return;
  }
  // Set up the values for the game...
  // 0 is Rock, 1 is Paper, and 2 is Scissors
  $names = array('Rock', 'Paper', 'Scissors');
  $human = isset($_POST["human"]) ? $_POST['human']+0 : -1;
  $computer = rand(0,2);
  // Hard code the computer to rock
  // TODO: Make the computer be random
  // $computer = rand(0,2);
  // This function takes as its input the computer and human play
  // and returns "Tie", "You Lose", "You Win" depending on play
  // where "You" is the human being addressed by the computer
  function check($computer, $human) {
      // For now this is a rock-savant checking function
      // TODO: Fix this
      if ( $human == $computer ) {
          return "Tie";
      } else if ( $human == 0 && $computer == 2) {
          return "You Win";
      } else if ( $human == 1 && $computer == 0) {
          return "You Win";
      } else if ( $human == 2 && $computer == 1) {
          return "You Win";
      } else if ( $human == 0 && $computer == 1) {
          return "You Lose";
      } else if ( $human == 1 && $computer == 2) {
          return "You Lose";
      } else if ( $human == 2 && $computer == 0) {
          return "You Lose";
      }
      return false;
  }
  // Check to see how the play happened
  $result = check($computer, $human);
  //forward login user name
  if ( isset($_REQUEST['name']) ) {
   echo "<p>Welcome: ";
   echo htmlentities($_REQUEST['name']);
   echo "</p>\n";
   $name = $_REQUEST['name'];
}
  ?>

  <form method="post">
  <select name="human">
  <option value="-1">Select</option>
  <option value="0">Rock</option>
  <option value="1">Paper</option>
  <option value="2">Scissors</option>
  </select>
  <input type="submit" value="Play">
  <input type="submit" name="logout" value="Logout">
  </form>
<br>
<br>

<div class="container bg-light">
<?php
if (! isset($_POST["human"]) || $_POST["human"] === "-1"){
  for($c=0;$c<3;$c++) {
   for($h=0;$h<3;$h++) {
   $r = check($c, $h);
   print "Human=$names[$h] Computer=$names[$c] Result=$r\n<br>";

   }
  }
}
else{
  print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}

?>

</div>
</body>
</html>

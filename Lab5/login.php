<html>
<head>
  <title>RPS LOGIN 208256 JULIA NURFADHILAH</title>
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
<h1>Please Log In</h1>
</div>

<form method="POST">
<label for="name">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="button" name="cancel" value="Cancel" onclick="location.href='index.php'">
</form>

<?php
$failure = false;
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

if ( isset($_POST['who']) && isset($_POST['pass']) ) {
 if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
 $failure = "User name and password are required";
 } else {
 $check = hash('md5', $salt.$_POST['pass']);
 if ( $check == $stored_hash ) {
 // Redirect the browser to game.php
 header("Location: game.php?name=".urlencode($_POST['who']));
 return;
 } else {
 $failure = "Incorrect password";
 }
 }
}

if ( $failure !== false ) {
 // Look closely at the use of single and double quotes
 echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>


</body>
</html>

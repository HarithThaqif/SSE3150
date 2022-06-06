<!DOCTYPE html>
<html lang="en">

<?php
    $failure = false;
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

     if ( isset($_POST['who']) && isset($_POST['pass']) ) {
       if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
         $failure = "Email and password are required";
       } elseif (!filter_var($_POST['who'], FILTER_VALIDATE_EMAIL)) {
         $failure = "<span style='color:red'>Email must have an aat-sign @</span>";
       } else {
         $check = hash('md5', $salt.$_POST['pass']);
         if ( $check == $stored_hash ) {
           error_log("Login success ".$_POST['who']);
           header("Location: autos.php?name=".urlencode($_POST['who']));
           return;
         } else {
           error_log("Login fail ".$_POST['who']." $check");
           $failure = "<span style='color:red'>Incorrect password</span>";
         }
       }
     }
   ?>

<head>
  <title>AUTOS DATABASE LOGIN 205823 MUHAMMAD HARITH THAQIF</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devicewidth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
    <div class="jumbotron" id="head">
       <h1>Please Log in</h1>
     </div>

     <div id="form" class="container">
         <form method="post">
             <p>Please log in to access the game!</p>
             <label for="who">Email :</label>
             <input type="text" id="who" name="who" placeholder="Enter username here..." ></input><br>
             <label for="pass">Password :</label>
             <input type="text" id="pass" name="pass" placeholder="Enter password here..." ></input>
             <br>
             <input type="submit" value="Log in" ></input>
             <input type="reset" name="cancel" value="Cancel" onclick="location.href='index.php'"></input>

             <?php
            if ($failure !== false){
              echo ("<p>$failure</p>\n");
            }
      ?>

             </form>
     </div>
</body>
</html>

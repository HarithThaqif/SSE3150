<!DOCTYPE html>
<html lang="en">

<head>
  <title>RPS INDEX 208256 JULIA NURFADHILAH</title>
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
       <h1> Welcome to Rock Paper Scissors</h1>
     </div>
     <div class="container">
           <p>Click here to <a href="login.php">log in</a></p>
           <p>Attempt to go to <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">game.php</a> without loggin in - it should fail with an error message<p>
             <div class="modal" id="myModal">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Error Message</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                       <div class="modal-body">
                     <p>You must login to access game.php</p>
                       </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       </div>
                    </div>
               </div>
             </div>
     </div>
</body>
</html>

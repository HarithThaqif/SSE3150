<?php
    session_start();
    // If Reset button is clicked
    if (isset($_POST['reset']) ) {
        // Reset $_SESSION['attendance'] to initial empty value
        // if Reset button has been clicked.
        $_SESSION['attendance'] = Array();
    }

    // If Check-In button is clicked
    if ( isset($_POST['check-in'])) {
        // If there is no $_SESSION['attendance'] then, create it and initialize it with empty array.
        if ( !isset ($_SESSION['attendance']) ) $_SESSION['attendance'] = Array();

        // Record every inputs in $_SESSION['attendance'] when the check-in button is clicked.
        $_SESSION['attendance'] [] = array($_POST['name'], $_POST['matric'], $_POST['datetime']);
    }
?>
<html>
    <head>
        <title>Attendance Form</title>

        <style>
            table, th, tr, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Attendance Form</h1>
        <h3>Insert your student details here:</h3>

        <form method="post" action="index.php">
            <p> Name: <input type="text" name="name" size="40"/></p>
            <p> Matric Number: <input type="number" name="matric" size="15"/></p>
            <p> DateTime: <input type="datetime-local" name="datetime" size="15"/></p>
            <p>
                <!-- submit button to add on attendance list -->
                <button type="submit" value="Check-In" name="check-in" />Check-In</button>
                <!-- Confirmation message before delete action -->
                <button type="submit" onClick="return confirm('All inputs and lists will be cleared. Are you sure want to reset?')" name="reset" value="Reset"/>Reset</button>
            </p>
        </form><br /><br />

        <!-- All current attendance list records will be shown here -->
        <div id="currentattendancelist">
        <table>
            <caption>Current Attendance List</caption>
            <tr><th>Serial No.</th><th>Matric Number</th><th>Name</th><th>DateTime</th></tr>
        </table>
      </div>

        <!-- Load JQuery -->
        <script type="text/javascript" src="jquery.min.js"> </script>

        <script type="text/javascript">
            // Function to deserialize the JSON wireformat & returned from server through the attendancelist.php
            function updateAttendance() {
                // get data from attendancelist.php
                $.getJSON('attendancelist.php', function(rowz){
                    for (var i = 0; i < rowz.length; i++) {
                        arow = rowz[i];
                        // Display each data into the table
                        var html = "<tr><td>"+(i+1)+"</td><td>"+arow[1]+"</td><td>"+arow[0]+"</td><td>"+arow[2]+"</td></tr>";
                        $('#currentattendancelist tr:last').after(html);
                    }
                });
            }

            $(document).ready(function() {
                // Call updateAttendance function
                updateAttendance();
            });

        </script>
    </body>
</html>

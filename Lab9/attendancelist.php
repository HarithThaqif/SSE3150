<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');
    if ( !isset($_SESSION['attendance']) ) $_SESSION['attendance'] = array();
    // Send the JSON data
    echo(json_encode($_SESSION['attendance'], JSON_PRETTY_PRINT));
?>

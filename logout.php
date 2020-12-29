<?php
    include 'connect.php';

    session_start();
    // Free all session variables
    unset($_SESSION["email"]);
    unset($_SESSION["firstName"]);
    //redirect to homepage
    header("Location:index.php");

    //close database connection
    $conn->close();
?>
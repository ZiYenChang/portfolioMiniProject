<!DOCTYPE html>
    <html>
        <head lang="en">
            <meta charset="utf-8">
            <title>Zi Yen Chang</title>
            <link rel="icon" type="image/x-icon" href="ziyenlogo.png" />
            <link rel="stylesheet" href="reset.css" type="text/css"/>
            <link rel="stylesheet" href="login.css" type="text/css"/> 
        </head>

<?php
    include 'connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        // set variable for submitted details
        $email = $_POST["email"];
        $password = $_POST["password"];

        // find user from database
        $sql = "SELECT firstName FROM USERS WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        //if user found
        if ($result->num_rows > 0) {
            // fetch found user's firstname
            $row = mysqli_fetch_assoc($result);
            $firstname = $row['firstName'];

            session_start();
                //set session variable
                $_SESSION['firstname'] = $firstname;
                $_SESSION['email']=$email;

            // redirect to add post
             header("Location:addPost.html");
             exit();
       
       
        } 
        // if user not found
        else {
           echo "<p>Error: Invalid email or password</p><br>";
            // try again and home button when fail to login   
           echo "<p><a href='login.html'>Try Again</a> <a href='index.php'>Home</a></p>";
        }
        //close database connection
        $conn->close();
    } 

?>
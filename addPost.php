<?php
    include 'connect.php';

    //check if the form is submitted from POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        session_start();
        // use session variable
        $email= $_SESSION['email'];
        //set variable for submitted form details
        $title = $_POST["title"];
        $post = $_POST["post"];


        //add data into database table
        $sql = "INSERT INTO POSTS (email, title, content)
            VALUES ('$email', '$title', '$post')";
        
        //if sucessfully INSERT data
        if ($conn->query($sql) === TRUE) {

            //redirect to viewBlog page
            header("Location:viewBlog.php");
            exit();
    
    
        }
        // if fail to INSERT data
        else {
        echo "Error: <br>" . $conn->error;

        }
        //close database connection
        $conn->close();
    } 


?>
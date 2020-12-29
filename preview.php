<!DOCTYPE html>
    <html>
        <head lang="en">
            <meta charset="utf-8">
            <title>Zi Yen Chang</title>
            <link rel="icon" type="image/x-icon" href="ziyenlogo.png" />
            <link rel="stylesheet" href="reset.css" type="text/css"/>
            <link rel="stylesheet" href="viewBlog.css" type="text/css"/> 
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        </head>

        <?php
            include 'connect.php';
            session_start();
        ?>
        <body>
        <article id="blog">
            <p id=pretitle>Preview</p>
            <h1>Blog</h1>
            <br>

                <?php

                    $title = $_POST["pretitle"];
                    $content = $_POST["precon"];
                    
                    date_default_timezone_set("UTC");
                    $datetime =  date('jS F Y, G:i T');

                        echo "<section>";
                        echo "<p class='time'><i class='far fa-clock'></i> ".$datetime."</p>";
                        echo "<h2>".$title."</h2>";
                        echo "<p class='content'>".$content."</p>";
                        echo "<hr class='line'>";
                        echo "</section>";

                    //close database connection
                    $conn->close();

                ?>
            </article>

            <div id="previewPost">
                <form action="addPost.php" method="POST" name="login" id="prepost">
                    <!-- title area -->
                    <input type="text" name="title" id="ftitle" placeholder="Title" maxlength="120" ><br>
                    <!-- text area -->
                    <textarea placeholder="Enter your text here" name="post" id="fpost"  ></textarea>
                    <!-- submit -->
                    <input id="preview" type="submit" value="Preview">
                </form>
            </div>

            <div id="select">
                <button type="button" id="post" onclick="cPost()">Post</button>
                <button onclick="history.go(-1);">Back</button>
            </div>
            

            <script>
                function cPost(){
                    document.getElementById("ftitle").value = "<?php echo $title ?>";
                    document.getElementById("fpost").value = "<?php echo $content ?>";
                    document.getElementById("prepost").submit();
                }
            </script>

        </body>
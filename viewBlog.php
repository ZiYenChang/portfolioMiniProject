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
            <header id=top> 
                <div>
                    <nav role="navigation" id="topnav" class="navi" >
                        <!-- menu icon and welcome user for responsive design -->
                        <a href="javascript:void(0);" class="icon" onclick="deviceRes()">
                            &#9776; 
                            <?php
                                if(isset($_SESSION['email'])) {
                                    $email = $_SESSION['email'];
                                    $sql = "SELECT firstName FROM USERS WHERE email='$email'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $firstname = $row['firstName'];
                                    echo "<span id='welcome1'>Welcome ".$firstname." ! </span>\r\n";
                                }

                        ?>
                        </a>
                        <!-- back to index top link -->
                        <a href="index.php">Zi Yen Chang</a>
                        <!-- back to index about me link -->
                        <a href="index.php#aboutme" >About Me</a>
                        <!-- back to index Skills and Achievements link -->
                        <a href="index.php#skill" >Skills and Achievements</a>
                        <!-- back to index Education and Qualifications link -->
                        <a href="index.php#edu" >Education and Qualifications</a>
                        <!-- back to index Experience link -->
                        <a href="index.php#exp" >Experience</a>
                        <!-- back to index Portfolio link -->
                        <a href="index.php#portfolio">Portfolio</a>
                        <!-- back to index contact link -->
                        <a href="index.php#contact" ">Contact</a>
                        <!-- Blog link -->
                        <a href="#blog" onclick="deviceRes()">Blog</a>
                        <!-- login or logout link -->
                        <?php
                            // if email value is set in the session, show logout button. Else, show login
                            if(isset($_SESSION['email'])){
                                echo "<a href='logout.php'>Log Out</a>\r\n";
                            }
                            else{
                                echo "<a href='login.html'>Login</a>\r\n";
                            }
                        
                            // if email value is set in the session, show firstname
                            if(isset($_SESSION['email'])) {
                                $email = $_SESSION['email'];
                                $sql = "SELECT firstName FROM USERS WHERE email='$email'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $firstname = $row['firstName'];
                                echo "<span id='welcome'>Welcome ".$firstname." ! </span>\r\n";
                            }
                        ?>
                    </nav>

                </div>
            </header>

            <!-- Javascript code for responsive navigation bar -->
            <script>
                function deviceRes() {
                  var x = document.getElementById("topnav");
                  if (x.className === "navi") {
                    x.className += " responsive";
                  } else {
                    x.className = "navi";
                  }
                }
            </script>
                
            <!-- Blog part -->
            <article id="blog">
            <h1>Blog</h1>
                <?php
                    // Add post link button - situation when logged in and havent
                    if(isset($_SESSION['email'])){
                        // if logged in - redirect to addPost page
                        echo "<div class='log'>";
                        echo "<a href='addPost.html'  class='login'>Add post</a>";
                        echo "</div>";
                    }
                    else{
                        //if havent login - redirect to login page first, then addpost
                        echo "<div class='log'>";
                        echo "<a href='login.html' class='login'>Add post</a>";
                        echo "</div>";

                    }
                ?>
                <script>
                function toggleMonth(elementID) {
                    var x = document.getElementById("date"+elementID);
                    var y = document.getElementById("month"+elementID);


                    if (x.style.display === "none") {
                        x.style.display = "block";
                        y.innerHTML = "<i class='fas fa-caret-down'></i>";
                    }
                    else{
                        x.style.display = "none";
                        y.innerHTML = "<i class='fas fa-caret-up'></i>";
                    }
                }
                </script>
                <?php

                    //select post detail from database by date descending order 
                    $sql ="SELECT * FROM POSTS ORDER BY date DESC";
                    $result = mysqli_query($conn, $sql);
                    date_default_timezone_set("UTC");


                    //post all blog
                    $currentyear = 0;
                    $currentmonth = 0;
                    $quote='"';
                    while($rows= mysqli_fetch_assoc($result)){

                        $postyear = date('Y', strtotime($rows['date']));
                        $postmonth = date('m', strtotime($rows['date']));
                        if($postyear!=$currentyear){
                            if($currentyear != 0){
                                echo "</section>\r\n";
                            }
                            echo "<h2 class='year'>".$postyear."<h2>\r\n";
                            $currentyear=$postyear;
                            $currentmonth=0;
                        }
                        if($postmonth!= $currentmonth){
                            if($currentmonth != 0){
                                echo "</section>\r\n";
                            }
                            echo "<h3>".date('F', strtotime($rows['date']))." <span id='month".$postyear.$postmonth."' onclick=".$quote."toggleMonth('".$postyear.$postmonth."')".$quote."><i class='fas fa-caret-up'></i></span></h3>\r\n";
                            $currentmonth=$postmonth;
                            echo "<section style='display:none;' id='date".$postyear.$postmonth."'>\r\n"; 
                        }
                        
                        
                        echo "<p class='time'><i class='far fa-clock'></i> ".date('jS F Y, G:i T', strtotime($rows['date']))."</p>\r\n";
                        echo "<h2>".$rows['title']."</h2>\r\n";
                        echo "<p class='content'>".$rows['content']."</p>\r\n";
                        echo "<hr class='line'>\r\n";
                        

                    }
                    echo "</section>\r\n";
                    //close database connection
                    $conn->close();

                ?>
            </article>


            <footer>
                <!-- back to blog top button -->
                <a href="#top">Back to top</a>

                <!-- copyright text -->
                <p id='copyright'><i>Copyright &copy; 2020 Zi Yen Chang</i></p>
            </footer>
        </body>

        
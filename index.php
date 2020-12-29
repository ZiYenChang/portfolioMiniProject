<!DOCTYPE html>
    <html>
        <head lang="en">
            <meta charset="utf-8">
            <title>Zi Yen Chang</title>
            <link rel="icon" type="image/x-icon" href="ziyenlogo.png" />
            <link rel="stylesheet" href="reset.css" type="text/css"/>
            <link rel="stylesheet" href="index.css" type="text/css"/> 
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
                                    echo "<span id='welcome1'>Welcome ".$firstname." ! </span>";
                                }

                        ?>
                        </a>
                        <!-- back to top link -->
                        <a href="#top" onclick="deviceRes()">Zi Yen Chang</a>
                        <!-- back to about me link -->
                        <a href="#aboutme" onclick="deviceRes()">About Me</a>
                        <!-- back to Skills and Achievements link -->
                        <a href="#skill" onclick="deviceRes()">Skills and Achievements</a>
                        <!-- back to Education and Qualifications link -->
                        <a href="#edu" onclick="deviceRes()">Education and Qualifications</a>
                        <!-- back to Experience link -->
                        <a href="#exp" onclick="deviceRes()">Experience</a>
                        <!-- back to Portfolio link -->
                        <a href="#portfolio" onclick="deviceRes()">Portfolio</a>
                        <!-- back to Contact link -->
                        <a href="#contact" onclick="deviceRes()">Contact</a>
                        <a href="viewBlog.php">Blog</a>
                        
                        <?php
                            // if email value is set in the session, show logout button. Else, show login
                            if(isset($_SESSION['email'])){
                                echo "<a href='logout.php'>Log Out</a>";
                            }
                            else{
                                echo "<a href='login.html'>Login</a>";
                            }
                        
                            // if email value is set in the session, show firstname
                            if(isset($_SESSION['email'])) {
                                $email = $_SESSION['email'];
                                $sql = "SELECT firstName FROM USERS WHERE email='$email'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $firstname = $row['firstName'];
                                echo "<span id='welcome'>Welcome ".$firstname." ! </span>";
                            }

                        ?>
                    </nav>
                </div>
                <!-- homepage - logo, name and occupation -->
                <div id="homep">
                    <img id="logo" src="ziyenlogo1.png" alt="Logo">
                    <hgroup> 
                        <h1><em>Z</em>i <em>Y</em>en<h1>
                        <h1><em>C</em>hang</h1>
                        <h2>Student</h2>
                    </hgroup>
                </div>
                
            </header>

            <!-- JavaScript for navigation bar responsive design -->
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

        
            <article>
                <!-- About me section -->
                <section id=aboutme>
                    <h3>About Me</h3>
                    <figure>
                        <img src="whitebg.jpg" alt="Zi Yen" id="abtziyen">
                    </figure>
                    <p class="content">
                        I was born in Kuala Lumpur, Malaysia on June 11, 2001. On July 2019, I was graduated as the Top Achiever from City College Plymouth for the International Foundation Program Physics Pathway. 
                        On September 2019, I decided to further my studies at the Queen Mary University of London and I was awarded the Queen Mary Global Excellence Scholarships. Now, I am a student at the School of Electronic Engineering and Computer Science at the Queen Mary University of London. I am studying Creative Computing first-year course.
                    </p>
                </section>

                <!-- Skills and Achievements section -->
                <section id=skill>
                    <h3>Skills and Achievements</h3>
                    
                    <div class="content">
                        <!-- Skills -->
                        <h4>Skills</h4>
                        <table>
                            <tr>
                                <th rowspan="3">IT</th>
                                <td colspan="2">Processing</td>
                                <td>Java</td>
                                <td>HTML</td>
                            </tr>
                            <tr>
                                <td colspan="2">Javascript</td>
                                <td>CSS</td>
                                <td>PHP</td>
                            </tr>
                            <tr>                                             
                                <td colspan="2">Microsoft Word</td>
                                <td colspan="2">Microsoft PowerPoint</td>
                            </tr>

                            <tr>
                                <th rowspan="2">Music Instruments</th>
                                <td colspan="2">Percussion (7 years)</td>
                                <td colspan="2">Piano (8 years, Grade 5 - Practical)</td>
                            </tr>
                            <tr>
                                <td colspan="4">Ukulele (1 year Selflearn)</td>
                            </tr>
                            <tr>
                                <th rowspan="2">Sports</th>
                                <td colspan="2">Badminton (6 years)</td>
                                <td>Swimming (3 years)</td>
                                <td>Ballet (3 years)</td>
                            </tr>
                                <tr>
                                <td colspan="2">Track and Field (2 years)</td>
                                <td colspan="2">Frisbee (Half year)</td>
                            </tr>
                            <tr>
                                <th>Others</th>
                                <td colspan="2">Drawing (7 years)</td>
                                <td colspan="2">Calligraphy (3 years)</td>
                            </tr>
                        </table>

                        <!-- Achievements -->
                        <h4 class="sub">Achievements</h4>
                        <!-- collapsible content using button -->
                        <div id="achieve">
                            <button type="button" class="collapsible">University & College</button>
                            <div class="colcontent">
                                <h5>First-year</h5>
                                <h6>Malaysian Society member</h6>
                                <ul>
                                    <li>Junior committee member - 'Spill the tea' baking event</li>
                                    <li>Malaysian Night Musician - Drumset</li>
                                </ul>
                                <h6>Music Society member</h6>
                                <ul>
                                    <li>Percussion - Timpani</li>
                                </ul>
                            </div>
                            <button type="button" class="collapsible">Secondary School</button>
                            <div class="colcontent">
                                <h5>Chinese Orchestra member - Percussion (2014 - 2018)</h5>
                                <h6>Committee Member</h6>
                                <ul>
                                    <li>Public Relation Vice Group Leader (2015)</li>
                                    <li>General Secretary (2016)</li>
                                    <li>Vice President (2017)</li>
                                </ul>
                                <h6>Competition awards</h6>
                                <ul>
                                    <li>National Chinese Orchestra Competition(2016 - gold) (2017 - gold) (2018-silver)</li>
                                    <li>National Chinese orchestra ensemble competition(2014-silver) (2016-silver) (2017-gold*2,silver*1) (2018-gold with honour award*1,gold*1)</li>
                                </ul>
                                <h5>World Vision Malaysia Famine DIY Camp 2017 - Camp organizing team</h5>
                                <ul>
                                    <li>General Secretary</li>
                                </ul>
                            </div>
                            <button type="button" class="collapsible">Primary School</button>
                            <div class="colcontent">
                                <h5>School Badminton Team Representative</h5>
                                <ul>
                                    <li>Badminton single women district level (2011: 1st runner up) (2012: 2nd runner up)</li>
                                    <li>Badminton double women district level (2011: 2nd runner up) (2012: 2nd runner up) (2013:1st runner up)</li>
                                </ul>
                                <h5>Anti-drugs Poster Drawing Competition School Representative</h5>
                                <ul>
                                    <li>district level (2012:1st runner up) (2013: Champion)</li>
                                    <li>State-level (2013: Consolation prize)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <!--JavaScript code for collapsible Achievements--> 
                    <script>
                        var coll = document.getElementsByClassName("collapsible");
                        var i;
                        
                        for (i = 0; i < coll.length; i++) {
                            coll[i].addEventListener("click", function() {
                                this.classList.toggle("active");
                                var content = this.nextElementSibling;
                                if (content.style.display === "block") {
                                    content.style.display = "none";
                                } else {
                                    content.style.display = "block";
                                }
                            });
                        }
                    </script>

                </section>

                <!-- Education and Qualifications section -->
                <section id=edu>
                        <h3>Education and Qualifications</h3>
                        <div class="content">
                        <table>
                            <tr>
                                <th>September 2019 - Present</th>
                                <td>BSc Creative Computing - Queen Mary University of London</br>
                                    • First-year
                                </td>
                            </tr>
                            <tr>
                                <th>January 2019 - July 2019</th>
                                <td>International Foundation Program Physics Pathway - City College Plymouth</br>
                                    • Top Acheiver
                                </td>
                            </tr>
                            <tr>
                                <th>2014 - 2018</th>
                                <td>Chong Hwa Independent High School Kuala Lumpur, Malaysia</br>
                                    • SPM (Malaysian Qualification Equivalent to GCSE’s) : 10 A’s with 5 A*s including English (A) and Additional Mathematics (A*)
                                </td>
                            </tr>
                        </table>
                        <p id="update">
                            Updated on April 22, 2020
                        </p>
                        </div>
                </section>

                <!-- Experience section -->
                <section id=exp>
                    <h3>Experience</h3>
                        <div class="content">
                            <h4>Vice President of Chinese Orchestra Society - 2017</h4>
                            <p>When I was in year ten, I was the vice-president of the Chinese Orchestra which have a hundred members. I am one of the youngest vice presidents in our society. As the vice president of the Chinese orchestra society during secondary school, I was involved in scheduling, planning and organizing the society’s activities. During my society’s anniversary concert, I was appointed as the front stage director and the person in charge of the general affairs. I also led the team that produced the anniversary video. I was the committee member that organized a 7-day cultural exchange trip to Taiwan, learning a lot of leadership and project management skills through these responsibilities. I have learnt a lot of soft skills from this experience. I have learnt how to communicate between committee members and society members, and how to assign task fairly to each committee members. I also learnt how to manage my time wisely between my study time and work time as I need to attend a lot of society meetings. I learnt a lot of leadership skills through those responsibilities. As the percussion team member of the Chinese orchestra, I know how to play different kinds of Chinese and Western percussion instruments. </p>                                                   

                            <h4 class="sub">Part-time working via Stint</h4>
                            <p>Working as a part-time waitress via Stint, a student job agency app. I accept job offers which fit in my free time through the app and work for the restaurant, bar or shop for a certain time within the day. I usually need to take orders, serve food, clean up tables, reset cutlery, refill water jar, wash and polish tableware, etc. I have learnt how to communicate politely with customers. I also have the idea of how each restaurant operates behind the scene, the different roles in a restaurant and the difference of each restaurant. I learnt the difference in the role of a waitress in a different restaurant. For example, some of the restaurants don’t require a waitress to polish tableware as it is the kitchen porter’s job but some required.  I always ask if I can help to do anything if I have done the task given by the employer. I have learnt how to use the dishwasher and how to effectively polish the tableware. I have also learnt that it is important to not waste food because a lot of restaurants throw excess food away.</p>

                        </div>
                </section>
                
                <!-- portfolio section -->
                <section id=portfolio>
                    <h3>Portfolio</h3>
                    <a href="Scenario2.pdf" target="_blank" class="imglink">
                        <figure>
                            <img src="Senario2.png" alt="Senario2">
                            <figcaption>PowerPoint design for Coursework</figcaption>
                        </figure>   
                    </a>
                    <a href="dsPortfolio.pdf" target="_blank" class="imglink">
                        <figure>
                            <img src="ds.png" alt="Design Studio Portfolio">
                            <figcaption>Design Studio Portfolio</figcaption>
                        </figure>   
                    </a>
                </section>

                <!-- contact section -->
                <section id=contact>
                    <h3>Contact</h3>
                    <img id="cntziyen" src="merry.jpg" alt="ZiYen">
                    <div class="content">
                        <h5>Zi Yen Chang</h5>
                        <div  id="emailadd">
                            <img src="email.png" alt="Email Logo" id="email">
                            <p>z.chang@se19.qmul.ac.uk</p>
                        </div>
                    </div>
                </section>
            </article>

            <!-- Footer -->
            <footer>
                <a href="#top">Back to top</a>
                <p id='copyright'><i>Copyright &copy; 2020 Zi Yen Chang</i></p>
            </footer>

        </body>
    </html>
<?php
    include 'config.php';
    include 'includes/head.php';
?>

<title>Journal of Politics</title>
</head>

<body class="is-preload">
    <?php include 'includes/auth-header.php' ?>
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">
                    <h2>Dibrugarh University Journal of Politics</h2>
                </header>
                <section id="banner">
                    <div class="content">
                        <header>
                            <h3>Welcome to the Official Journal of Politics</h3>
                            <!-- <p>About Journal of Historical Research</p> -->
                        </header>
                        <p align="justify"><i>Journal of Politics</i> is a peer-reviewed research
                            journal of Politics published by the Department of Political Science, Dibrugarh University. It is an
                            annual journal which publishes articles/research papers/book reviews on all aspects of
                            politics and allied subjects. The journal intends to provide a suitable forum for publication
                            and dissemination of original research works that contribute to the understanding of the
                            discipline of Politics and its emerging trends.</p>
                    </div>
                    <span>
                        <ul class="actions">
                            <li><a href="guide" class="button primary">Submit Article</a></li>
                        </ul>
                    </span>
                </section>
                <section>
                    <header class="major">
                        <?php
                        //get the current journal info
                        $sql = "SELECT * FROM journals WHERE status = 'Published' ORDER BY journal_id DESC LIMIT 1";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){   
                            echo "Error";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if($result->num_rows > 0 ){
                                $row = mysqli_fetch_assoc($result);
                                echo "<h2>Current Issue: $row[title]</h2>";
                            }
                        }
                    ?>

                    </header>
                    <div class="posts">
                        <?php
                            $sql = "SELECT articles.title,articles.author, articles.article_id FROM articles JOIN journals ON articles.journal_id = journals.journal_id 
                            WHERE journals.journal_id = '$row[journal_id]' ORDER BY article_id DESC";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){   
                                echo "Error";
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if($result->num_rows > 0 ){
                                    while($row = mysqli_fetch_assoc($result)){
                                    echo "
                                        <article>
                                            <h3>$row[title]</h3>";
                                            if($row['author'] != NULL){
                                                echo "<p class='card-text author'><i class='fa-solid fa-user-pen'></i> $row[author]</p>";
                                            }
                                            echo"
                                            <ul class='actions'>
                                                <li><a href='article?id=$row[article_id]' class='button'>More</a></li>
                                            </ul>
                                        </article>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </section>

                <section>
                    <header class="major">
                        <h2>Publisher and Chief Editor</h2>
                    </header>
                    <div class="features">
                        <article>
                            <div class="content">
                                <h3>Publisher</h3>
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Registrar</h4>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: registrar@dibru.ac.in <br>
                                    Phone: 0373 2370231 <br>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <h3>Chief Editor</h3>
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Dibyajyoti Dutta</h4>
                                    <i>Associate Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: dibyajyoti@dibru.ac.in <br>
                                    Phone: 9954153659 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/233'>https://dibru.ac.in/userlist/welcome/profile/233</a>
                                </p>
                            </div>
                        </article>
                                               
                        
                    </div>
                </section>

                <section>
                    <header class="major">
                        <h2>Editorial Board</h2>
                    </header>
                    <div class="features">
                        <article>
                            <!-- <span class="icon fa-gem"></span> -->
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Prof. Rudraman Thapa</h4>
                                    <i>Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: rudraman@dibru.ac.in <br>
                                    Phone: 9435333098 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/228'>https://dibru.ac.in/userlist/welcome/profile/228</a>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Dolly Phukon</h4>
                                    <i>Associate Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: dollyphukon@dibru.ac.in <br>
                                    Phone: 9435333098 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/231'>https://dibru.ac.in/userlist/welcome/profile/231</a>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Monoj Kumar Nath</h4>
                                    <i>Associate Professor </i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    Phone: 9435162422 <br>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Borun Dey</h4>
                                    <i>Assistant Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: borun.dey@dibru.ac.in<br>
                                    Phone: 9954525253 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/232'>https://dibru.ac.in/userlist/welcome/profile/232</a>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Amrita Pritam Gogoi</h4>
                                    <i>Assistant Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: amritapgogoi@dibru.ac.in<br>
                                    Phone: 9101143298 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/234'>https://dibru.ac.in/userlist/welcome/profile/234</a>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Obja Borah Hazarika</h4>
                                    <i>Assistant Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    E-mail: obja@dibru.ac.in<br>
                                    Phone: 8638889452 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/236'>https://dibru.ac.in/userlist/welcome/profile/236</a>
                                </p>
                            </div>
                        </article>
                        <article>
                            <div class="content">
                                <p>
                                    <h4 style='margin-bottom: 0px;'>Dr. Kaustubh Kumar Deka</h4>
                                    <i>Assistant Professor</i> <br>
                                    Department of Political Science <br>
                                    Dibrugarh University <br>
                                    Assam-786004 <br>
                                    Phone: 9654432242 <br>
                                    Profile link: <a href='https://dibru.ac.in/userlist/welcome/profile/547'>https://dibru.ac.in/userlist/welcome/profile/547</a>
                                </p>
                            </div>
                        </article>
                    </div>
                </section>

            </div>
            <?php
                include 'includes/footer-main.php'
            ?>
        </div>

        <!-- Sidebar -->
        <?php
            include 'includes/sidebar.php'
        ?>
    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>
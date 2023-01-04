<?php
    include 'config.php';
    include 'includes/head.php';
?>

<title>Current Issue</title>
</head>

<body class="is-preload">
    <?php include 'includes/auth-header.php' ?>
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">
                    <h2>Dibrugarh University Journal of Politics</h2>
                </header>
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
                            //get the articles from current journal
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
                                            <h3>$row[title]</h3>
                                            <p class='card-text author'><i class='fa-solid fa-user-pen'></i> $row[author]</p>
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
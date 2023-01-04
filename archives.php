<?php
    include 'config.php';
    include 'includes/head.php';
?>

<title>Archives</title>
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
                        <h2>Archives</h2>
                    </header>
                    <?php
                        //get the current journal info
                        $sql = "SELECT * FROM journals WHERE status = 'Published' ORDER BY journal_id DESC ";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){   
                            echo "Error";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if($result->num_rows > 0 ){
                                $currentIssue = true;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<div class='color-orange archive-posts'>
                                            <a href='articles?journal_id=$row[journal_id]'>
                                                $row[title] - $row[published_date]";
                                                if($currentIssue){
                                                    echo " (Current Issue)";
                                                }
                                            echo"
                                            </a>
                                        </div>";
                                    $currentIssue =  false;
                                }                            
                            }
                        }
                    ?>
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
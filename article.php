<?php
    include 'config.php';
    include 'includes/head.php';
?>

<title>Article</title>
</head>

<body class="is-preload">
    <?php include 'includes/auth-header.php' ?>
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">
                    <h2>Dibrugarh University Journal of Historical Research</h2>
                </header>
                <section>
                    <?php
                        // Function to get the client IP address
                        function get_client_ip() {
                            $ipaddress = '';
                            if (isset($_SERVER['HTTP_CLIENT_IP']))
                                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                            else if(isset($_SERVER['HTTP_FORWARDED']))
                                $ipaddress = $_SERVER['HTTP_FORWARDED'];
                            else if(isset($_SERVER['REMOTE_ADDR']))
                                $ipaddress = $_SERVER['REMOTE_ADDR'];
                            else
                                $ipaddress = 'UNKNOWN';
                            return $ipaddress;
                        }

                        $ip_address = get_client_ip();

                        if($ip_address!='UNKNOWN'){
                            $sql = "SELECT * FROM visitor_count WHERE article_id = '$_GET[id]'AND ip_address = '$ip_address'";
                            $stmt = mysqli_stmt_init($conn);
                            if(mysqli_stmt_prepare($stmt, $sql)){
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if($result->num_rows == 0 ){
                                    /* if ip address does not exists
                                    * insert the ip address to visitor_count table */
                                    $sql = "INSERT INTO visitor_count ( ip_address, article_id)
                                    VALUES (?, ?);";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(mysqli_stmt_prepare($stmt, $sql)){
                                        mysqli_stmt_bind_param($stmt, "ss", $ip_address, $_GET['id']);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt); 
                                    }

                                    /* update the visitor count in article table */
                                    $sql = "UPDATE articles SET unique_visitors = unique_visitors+1 WHERE article_id = '$_GET[id]';";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(mysqli_stmt_prepare($stmt, $sql)){
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt); 
                                    }
                                }
                            }
                        }

                        //get the article details
                        $sql = "SELECT * FROM articles WHERE article_id = '$_GET[id]'";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){   
                            echo "Error";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if($result->num_rows > 0 ){
                                $row = mysqli_fetch_assoc($result);
                                echo "
                                    <h2>$row[title]</h2>";
                                    if($row['author'] != NULL){
                                        echo "<p><i class='fa-solid fa-user-pen'></i> $row[author]</p>";
                                    }
                                    
                                    echo"
                                    <ul class='actions'>
                                        <li><a href='Archive/$row[filename]' class='button' download>Download</a></li>
                                    </ul>
                                    Unique Visitors <i class='fas fa-eye'></i> : $row[unique_visitors] <br> <br>
                                    <embed src='Archive/$row[filename]' width='100%' height='1000px' />";
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
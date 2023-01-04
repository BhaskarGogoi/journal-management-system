<?php

	include 'config.php';
	include 'includes/head.php';
	 //csrf token 
	 $csrf_token = md5(uniqid(rand(), true));
	 $_SESSION['csrf_token'] = $csrf_token;

?>

<title>About</title>
</head>

<body class="is-preload">
	<?php include 'includes/auth-header.php' ?>
	<div id="wrapper">
		<div id="main">
			<div class="inner">
				<header id="header">
					<h2>Dibrugarh University Journal of Politics</h2>
				</header>
				<hr class="major" />
				<h2>Journal Particulars</h2>
				<table>
                    <tr>
                        <td><b>Title</b></td>
                        <td>Journal of Politics</td>
                    </tr>
                    <tr>
                        <td><b>Frequency</b></td>
                        <td>Annual</td>
                    </tr>
                    <tr>
                        <td><b>ISSN</b></td>
                        <td>2277-5617</td>
                    </tr>
                    <tr>
                        <td><b>Publisher</b></td>
                        <td>The Registrar, Dibrugarh University, Dibrugarh, Assam-786004</td>
                    </tr>
                    <tr>
                        <td><b>Chief Editor</b></td>
                        <td>Dr. Dibyajyoti Dutta</td>
                    </tr>
                    <tr>
                        <td><b>Copyright</b></td>
                        <td>Registrar, Dibrugarh University, Dibrugarh, Assam-786004</td>
                    </tr>
                    <tr>
                        <td><b>Starting Year</b></td>
                        <td>1987</td>
                    </tr>
                    <tr>
                        <td><b>Subject</b></td>
                        <td>Political Science</td>
                    </tr>
                    <tr>
                        <td><b>Language</b></td>
                        <td>English</td>
                    </tr>
                    <tr>
                        <td><b>Publication Format</b></td>
                        <td>Both Print and Online</td>
                    </tr>
                    <tr>
                        <td><b>Phone No.</b></td>
                        <td>0373-2370231</td>
                    </tr>
                    <tr>
                        <td><b>Email Id</b></td>
                        <td>jop22775617@gmail.com</td>
                    </tr>
                    <tr>
                        <td><b>Mobile No.</b></td>
                        <td>+91 94357 39717</td>
                    </tr>
                    <tr>
                        <td><b>Website</b></td>
                        <td><a href="https://dujop.in">https://dujop.in</a></td>
                    </tr>
                    <tr>
                        <td><b>Address</b></td>
                        <td>Department of Political Science, Dibrugarh University, Dibrugarh, Assam-786004</td>
                    </tr>
                </table>

			</div>
            <?php
                include 'includes/footer-main.php'
            ?>
		</div>
		<?php
			include 'includes/sidebar.php'
		?>
	</div>
	<?php include 'includes/footer.php' ?>
</body>

</html
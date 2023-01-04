<?php

	include 'config.php';
	include 'includes/head.php';
	 //csrf token 
	 $csrf_token = md5(uniqid(rand(), true));
	 $_SESSION['csrf_token'] = $csrf_token;

?>

<title>Contact Us</title>
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
				<h2>Contact Us</h2>
				<hr class="major" />
				<?php
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if (strpos($url, 'error=empty')!== false) {
						echo "
						<script>
						setTimeout(function () {
							alert('Fill out all the fields!');
						}, 300);
						</script>";
					} elseif (strpos($url, 'error=submit')!== false) {
						echo "
						<script>
						setTimeout(function () {
							alert('Something Went Wrong!');
						}, 300);
						</script>";
					}
					elseif (strpos($url, 'error=500')!== false) {
						echo "
						<script>
						setTimeout(function () {
							alert('Something Went Wrong!');
						}, 300);
						</script>";
					}
					elseif (strpos($url, 'success=submitted')!== false) {
						echo "
						<script>
						setTimeout(function () {
							alert('Message Sent!');
						}, 300);
						</script>";
					} 
				?>
				<form method="post" action="includes/send-msg.inc">
					<div class="row gtr-uniform">
						<input type="hidden" name='csrf_token' value='<?php echo $csrf_token; ?>'>
						<div class="col-6 col-12-xsmall">
							<input type="text" name="name" id="name" value="" placeholder="Enter your Name" required />
						</div>
						<div class="col-6 col-12-xsmall">
							<input type="email" name="email" id="email" value="" placeholder="Enter your Email"
								required />
						</div>

						<div class="col-4 col-12-small">

						</div>
						<div class="col-4 col-12-small">

						</div>
						<div class="col-4 col-12-small">

						</div>
						<!-- Break -->
						<div class="col-6 col-12-small">

						</div>
						<div class="col-6 col-12-small">

						</div>
						<!-- Break -->
						<div class="col-12">
							<textarea name="msg" id="msg" placeholder="Enter your message" rows="6" required></textarea>
						</div>
						<!-- Break -->
						<div class="col-12">
							<ul class="actions">
								<li><input type="submit" name="submit" class="primary" /></li>
								<li><input type="reset" value="Reset" /></li>
							</ul>
						</div>
					</div>
				</form>

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
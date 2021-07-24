<?php
// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/");
    exit;
}
include '../ggsheet.php';
$image_list = getPhotos();
?>

<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SOS Camp Photos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
		<style>
			.nav {
			position:fixed;
			top:0;
			width:100%;
			z-index: 5;
			}
		</style>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<nav class="navbar navbar-expand-sm navbar-light bg-light nav" id="header">
					<a class="navbar-brand">
						SOS Homeworks
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
						<a class="nav-link" href="../tasks">Tasks</a>
						</li>
						<li class="nav-item">
						<a class="nav-link active">Photos</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="../lessons">Lessons</a>
						</li>
					</ul>
					<a class="text-dark">Hi, <?php echo htmlspecialchars($_SESSION["name"]); ?></a>
					<a class="btn btn-sm btn-primary m-2"  href="../logout.php" style="color:white;">Logout</a>
					</div>
				</nav>

				<!-- Main -->

					<div id="main">
						<?php
							foreach ($image_list as $file) {
								if ($file[0] === "") continue;
								$data = "<article class='thumb'>
								<a href='" . $file[3] . "' class='image'><img src='" . $file[1] . "' alt='' /></a>
								<h2>" . $file[0] . "
								<a href='" . $file[2] . "'><button type='button' class='btn btn-secondary' >
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentCeolor' class='bi bi-download' viewBox='0 0 16 16'>
								<path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'></path>
								<path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'></path>
								</svg>
								</button></a></h2>
								</article>";
								echo $data;
							}
						?>
					</div>


				<!-- Footer -->

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<!--===============================================================================================-->	
			<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
			<!--===============================================================================================-->
			<script src="vendor/bootstrap/js/popper.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
			<!--===============================================================================================-->
			<script src="vendor/select2/select2.min.js"></script>
			<!--===============================================================================================-->
			<script src="js/main.js"></script>

	</body>
</html>
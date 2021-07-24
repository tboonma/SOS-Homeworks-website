<?php
// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/");
    exit;
}
include '../ggsheet.php';
try {
	$hw_list = getLessons();
} catch (Exception $e) {
	$hw_list = array("", 'Message: ' .$e->getMessage(), "", "", "");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SOS Homeworks</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<style>
		.nav {
		position:fixed;
		top:0;
		width:100%;
		z-index: 5;
		}
	</style>
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm navbar-light bg-light nav">
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
		<a class="nav-link" href="../photos">Photos</a>
		<li class="nav-item">
		<a class="nav-link active">Lessons</a>
		</li>
	</ul>
	<a class="text-dark">Hi, <?php echo htmlspecialchars($_SESSION["name"]); ?></a>
	<a class="btn btn-sm btn-primary m-2"  href="../logout.php">Logout</a>
	</div>
	</nav>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column2">File</th>
								<th class="column3">Link</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($hw_list === NULL) {
									$column = "<tr>
												<td class='column2'></td>
												<td class='column3'>No lesson right now.</td>
											</tr>";
									echo($column);
								}
								foreach ($hw_list as $value) {
									$column = "<tr>
												<td class='column2'>" . $value[1] . "</td>
												<td class='column3'><a href='" . $value[0] . "' target='_blank'>" . $value[0] . "</a></td>
											</tr>";
									echo($column);
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

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
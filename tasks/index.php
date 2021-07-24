<?php
// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/");
    exit;
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
	<?php
		$stdId = $_SESSION["username"];
		include '../ggsheet.php';
		try {
			$hw_list = getHomeworks($stdId);
		} catch (Exception $e) {
			$hw_list = array("", 'Message: ' .$e->getMessage(), "", "", "");
		}
	?>
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
		<a class="nav-link active">Tasks</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="../photos">Photos</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="../lessons">Lessons</a>
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
								<th class="column2">Problem</th>
								<th class="column3">Link</th>
								<th class="column4">Result</th>
								<th class="column5">Details</th>
								<th class="column6">Comment</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($hw_list === NULL) {
									$column = "<tr>
												<td class='column2'></td>
												<td class='column3'>No homework right now.</td>
												<td class='column4 passed'></td>
												<td class='column5'></td>
												<td class='column6'></td>
											</tr>";
									echo($column);
								}
								foreach ($hw_list as $value) {
									if ($value[2] === 'Passed') {
										$column = "<tr>
													<td class='column2'>" . $value[0] . "</td>
													<td class='column3'><a href='" . $value[1] . "'>" . $value[1] . "</a></td>
													<td class='column4 passed'>" . $value[2] . "</td>
													<td class='column5'>" . $value[3] . "</td>
													<td class='column6'>" . $value[4] . "</td>
												</tr>";
										echo($column);
									} elseif ($value[0] === NULL && $value[1] === NULL && $value[2] === NULL && $value[3] === NULL && $value[4] === NULL) {
										continue;
									} else {
									$column = "<tr>
												<td class='column2'>" . $value[0] . "</td>
												<td class='column3'><a href='" . $value[1] . "'>" . $value[1] . "</a></td>
												<td class='column4 failed'>" . $value[2] . "</td>
												<td class='column5'>" . $value[3] . "</td>
												<td class='column6'>" . $value[4] . "</td>
											</tr>";
									echo($column);
									}
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
<?php 
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if ($_SESSION["level"] !== "A") {
        header("location: ../404.html");
        exit;
    }
}
else {
	header("location: ../404.html");
	exit;
}
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = "";
$err = $success = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $err = "Please enter username to delete.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Validate credentials
    if(empty($username_err)){
        if (!$link) {
			die("Connection failed: " . mysqli_connect_error());
		  }
		  
		  $sql = "DELETE FROM `users` WHERE username='" . $username . "'";
		  if (mysqli_query($link, $sql)) {
            $success = $username . " has been deleted.";
		  } else {
			$err = "Error: " . $sql . "<br>" . mysqli_error($link);
		  }
    }
}
    
// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Delete User</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<span class="login100-form-title">
						Delete User
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Username required">
						<input class="input100" type="text" name="username" placeholder="Username to be deleted">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                    <?php 
                    if(!empty($err)){
                        echo '<div class="alert alert-danger">' . $err . '</div>';
                    }
                    if(!empty($success)){
                        echo '<div class="alert">' . $success . '</div>';
                    }        
                    ?>
					<div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Delete">
					</div>

					<div class="text-center p-t-136">
						<a class="txt2">
							
						</a>
					</div>
				</form>
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
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
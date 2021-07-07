<?php
	include('dbconnection.php');

	if (!isset($_SESSION['myid'])) {
		header("Location: old_index.php");
	}

	$result2 = $conn->query("SELECT * FROM `users` WHERE id = '" . $_SESSION['myid'] . "'");
	$row2 = $result2->fetch_assoc();
	if ($row2['code'] == "") {
		header("Location: homepage.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verification - juniors (A JARS Project)</title>
	<!--Icon-->
	<link rel="icon" href="./assets/images/JARS-ICON-rev.png" type="image/x-icon">
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<!--CSS & Font-->
	<link rel="stylesheet" href="./assets/css/custom.css">
	<!--Scripts-->
	<script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/df94d8b582.js" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body> 
	<nav class="navbar navbar-light bg-light logo-change" style="padding:0;">
		<div class="container-fluid">
			<p>JARS</p>
		</div>
	</nav>
	<div id="verificationContainer">
		<div class="d-flex justify-content-center h-100">
			<div class="logo_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./assets/images/JARS-ICON-rev.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<div class="ver_heading">
						<h4>Email Verification</h4>
						<p>We've sent a verification code to your email: </p>
						<?php
						$result = $conn->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['myid'] . "'");
						$row = $result->fetch_assoc();
						?>
						<p id="email-add-disp"><?php echo $row['emailadd']; ?></p>
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<?php
					if (isset($_POST['submit'])) {
						$otp = mysqli_real_escape_string($conn, htmlspecialchars($_POST['code']));
						if ($row['code'] == $otp) {
							$conn->query("UPDATE `users` SET `code` = '' WHERE `id` = '" . $_SESSION['myid'] . "'");
							header("Location: userinfo.php");
						} else {
							echo
							"<script> Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Wrong Code! Please try again...',
							}) </script>";
						}
					}
					?>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user-check"></i></span>
							</div>
							<input type="text" id="code" name="code" class="form-control input_ver" placeholder="Enter verification code" required>
						</div>
						<div class="d-flex justify-content-center login_container">
							<input type="submit" name="submit" class="btn login_btn" value="Submit" style="margin-top:10px;">
						</div>
						<div class="mt-4">
							<div class="d-flex justify-content-end links">
								<a href="old_index.php" class="signup">Logout</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
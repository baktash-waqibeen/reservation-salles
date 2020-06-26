<?php
session_start();
require('config.php');

$erreur = false;
if (isset($_POST['Submit'])) {;

	$login = $_POST['login'];
	$password = $_POST['password'];
	$sql = mysqli_query($dbconnect, "SELECT * FROM utilisateurs WHERE login='$login'");
	$row = mysqli_fetch_array($sql);
	var_dump($row['Password']);

	if (password_verify($_POST['password'], $row['Password'])) {
		$_SESSION['id'] = $row['id'];
		$_SESSION["login"] = $login;

		header('Location:index.php');
	} else {
		$erreur = true;
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Reservation salle - Connexion</title>
</head>

<body>
	<header>
		<nav>
			<b>The sea has neither meaning nor pity</b>
			<ul class="menu">
				<li>
					<?php
					if (isset($_SESSION['login'])) {

					?>
						<a href="profil.php">
							<i class="fa fa-exclamation-triangle"></i>Profile
						</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-exclamation-triangle"></i> Disconnect
					</a>
				</li>


				<li>
					<a href="reservation-form.php">
						<i class="fa fa-envelope"></i> Booking
					</a>
				</li>
			<?php
					}
			?>
			<li>
				<a href="inscription.php">
					<i class="fa fa-exclamation-triangle"></i> Sign Up
				</a>
			</li>
			<li>
				<a href="connexion.php">
					<i class="fa fa-sitemap"></i> Sign in
				</a>
			</li>
			<li>
				<a class="homer" href="index.php">
					<i class="fa fa-home"></i> Home
				</a>
			</ul>
		</nav>
	</header>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Welcome!
						<br>
						Sign in to your accrount


					</span>
					<span class="login100-form-avatar">
						<img src="img/avatar-01 (2).jpg" alt="AVATAR">
					</span>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter username">
						<input class="input100" type="text" name="login">
						<span class="focus-input100" data-placeholder="Type your login"></span>
					</div>
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter username">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Type your Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<button name="Submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
				<?php if ($erreur == true) {
				?><div class="wrongpass">Your Login Name or Password is invalid!</div><?php
																						}
																							?>
			</div>
		</div>
	</div>
	<footer class="footer-of-the-page">

		<div class="footer-left">

			<h3>BOAT<span>Company</span></h3>

			<p class="footer-links">
				<a href="index.php">Home</a>
				<a href="profil.php">Profile</a>
				<a href="reservation-form.php">Booking</a>
				<a href="inscription.php">Sign Up</a>
				<a href="connextion.php">Sign in</a>
				<a href="index.php">Contact</a>
				<a href="disconnection.php">Disconnect</a>
			</p>

			<p class="footer-company-name">Created by: Baktash Waqibeen</p>

		</div>

		</div>

		<div class="footer-right">

			<p>Contact Us</p>

			<form action="#" method="post">

				<input type="text" name="email" placeholder="Email">
				<textarea name="message" placeholder="Message"></textarea>
				<button>Send</button>

			</form>

		</div>

	</footer>
</body>

</html>
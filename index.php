<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Reservation Salle</title>
</head>

<body>
	<header>
		<nav>
			<b>The sea has neither meaning nor pity</b>
			<ul class="menu">
				<li>
					<a href="disconnection.php">
						<i class="fa fa-exclamation-triangle"></i> Disconnect
					</a>
				</li>
				<?php
				if (isset($_SESSION['login'])) {

				?>
					<li>
						<a href="profil.php">
							<i class="fa fa-exclamation-triangle"></i> Profile
						</a>

					<li>
						<a href="reservation-form.php">
							<i class="fa fa-envelope"></i>Booking
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
	<main>
		<header>
			<div id="intero-frt-page">
				<section id="center-of-page">
					<div class="animated-title">
						<div class="text-top">
							<div>
								<span>Welcome to our "BOAT" website! </span>
							</div>
						</div>
						<div class="text-bottom">
							<div>In this website, you can reserve a boat in the Mediterranean sea. To reserve a boat, please create an account!</div>
						</div>
					</div>
				</section>
			</div>
		</header>
	</main>
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
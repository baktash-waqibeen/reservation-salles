<?php
session_start();
$dbconnect = mysqli_connect("localhost", "root", "", "reservationsalles");
$request = "SELECT * FROM utilisateurs WHERE login = '" . $_SESSION["login"] . "'";
$query = mysqli_query($dbconnect, $request);
$result = mysqli_fetch_all($query);

if (isset($_POST["submitBtn"])) {
	if (password_verify($_POST["password"], $result[0][2])) {
		if (!empty($_POST["login"]) && !empty($_POST["newpassword"])) {
			$newPassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
			$id = $result[0][0];
			$request = "UPDATE utilisateurs SET login = '$_POST[login]', Password = '$newPassword' WHERE id = '$id'";
			$test = mysqli_query($dbconnect, $request);
			$_SESSION["login"] = $_POST["login"];
		} else {
			echo '<p>Please fill up the form beofre you change your username or password!';
		}
	} else {
		echo '<p>Wrong password or username</p>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	

	<title>Reservation- Salles profile</title>
</head>

<body id="profile-page">
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
	<div id="mainWrapper">
		<div id="mainTitle">
			<div>
				<a href="index.php" id="title">
					<h1></h1>
				</a>
				<p id="discovered">Profil de <?php echo $_SESSION["login"]; ?></p>
			</div>
			<a href="index.php">
				<img src="img/summer-sea-logo-vector-21048949.jpg" />
			</a>
		</div>

		<form method="post" action="">


			<div>
				<label for="nom">Login</label>
				<input type="text" name="login" value='<?php echo $result[0][1]; ?>' required />
			</div>

			<div id="password">
				<label for="password">Your Password</label>
				<input type="password" name="password" required />
			</div>


			<div id="passwordChange">
				<label for="nepassword">New Password</label>
				<input type="password" name="newpassword" />
			</div>

			<div id="buttonZone" style="border-bottom:0px;">
				<a href="index.php">Return</a>
				<input type="submit" value="Edit" name="submitBtn" />
			</div>
		</form>
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



<style>
	#profile-page {
		background-image: url("img/background.jpg");
		background-size: cover;
	}

	#mainWrapper {
		width: 50%;

		overflow: hidden;
		max-height: 65px;

		margin: auto;
		margin-top: 5%;

		padding: 10px;
		background-color: rgba(200, 200, 200, 0.6);
		border-radius: 3px;

		animation-name: form-scale;
		animation-fill-mode: forwards;
		animation-duration: 3s;
	}

	@keyframes form-scale {
		from {
			margin-top: 5%;
			background-color: rgba(200, 200, 200, 0.6);
			max-height: 65px;
		}

		to {
			margin-top: 8%;
			background-color: rgba(200, 200, 200, 0.8);
			max-height: 60vh;
		}
	}

	#mainTitle {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		padding-bottom: 10px;

		margin: auto;

		border-radius: 2px;

	}


	#title {
		margin-top: 15%;
		font-size: 1.5em;
		color: black;
		text-decoration: none;

		animation-name: title-scale;
		animation-fill-mode: forwards;
		animation-duration: 2s;
	}

	@keyframes title-scale {
		from {
			margin-top: 18%;
			font-size: 1.5em;
		}

		to {
			margin-top: 0%;
			font-size: 1em;
		}
	}

	#mainTitle img {
		width: 400px;
		height: 400px;

		animation-name: image-scale;
		animation-fill-mode: forwards;
		animation-duration: 2s;
	}

	@keyframes image-scale {
		from {
			width: 400px;
			height: 400px;
		}

		to {
			width: 70px;
			height: 70px;
		}
	}

	#discovered {
		margin-top: -30px;
		margin-left: 5px;
		opacity: 0;

		color: black;
		text-decoration: underline;
		font-size: 1em;

		animation-name: discovered;
		animation-delay: 2s;
		animation-duration: 1s;
		animation-fill-mode: forwards;
	}

	@keyframes discovered {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	#mainWrapper form {

		margin: auto;
		margin-top: -0.064%;

		padding-top: 15px;

		border-radius: 0 0 3px 3px;

		opacity: 0;

		animation-name: discovered;
		animation-duration: 0.8s;
		animation-delay: 2s;
		animation-fill-mode: forwards;
	}

	#mainWrapper form div {
		display: flex;
		flex-direction: row;
		justify-content: space-between;

		width: 97%;

		margin: auto;
		margin-top: 10px;

		padding-bottom: 3px;

		border-bottom: 1px solid;
		border-top: 0px;
		border-image: linear-gradient(to right, transparent 15%, black, black)100% 0;

		font-size: 1.5em;
	}

	input {
		border-radius: 4px;
		border: 1px;
	}

	input[type="submit"] {
		border-radius: 3px;
		border: 1px solid grey;

		background-color: rgba(200, 200, 200, 0.7);

		transition: background, border, filter 1s ease;
		filter: drop-shadow(0 0 0.4rem grey);

		font-size: 1.5em;

		cursor: pointer;

	}

	input[type="submit"]:hover,
	#buttonZone a:hover {
		background-color: rgba(250, 250, 250, 0.9);
		transition: border, filter 1s;
		filter: drop-shadow(0 0 0.4rem white);
	}

	#buttonZone a {
		border-radius: 3px;
		border: 1px solid grey;

		background-color: rgba(200, 200, 200, 0.7);

		transition: background, border, filter 1s ease;
		filter: drop-shadow(0 0 0.4rem grey);

		font-size: 1.5em;
		color: black;

		width: 140px;

		text-decoration: none;
		text-align: center;
		cursor: pointer;
	}
</style>
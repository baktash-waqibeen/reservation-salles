<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles") or die('Could not connect, make sure your connection info is good!');
$requete = "SELECT login, titre, description, DATE_FORMAT(debut, \"%T\"), debut, DATE_FORMAT(fin, \"%T\"), fin, DATE_FORMAT(debut, \"%W\") FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
?>

<!DOCTYPE html>

<html>

<head>
    <title>Reservation Salles - Planning</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <nav>
            <b>The sea has neither meaning nor pity</b>
            <ul class="menu">
                <li>
                    <a href="profil.php">
                        <i class="fa fa-exclamation-triangle"></i> Profil
                    </a>
                <li>
                    <a href="disconnection.php">
                        <i class="fa fa-exclamation-triangle"></i> Disconnect
                    </a>


                </li>
                <li>
                    <a href="reservation-form.php">
                        <i class="fa fa-envelope"></i>Booking
                    </a>
                </li>
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
        <section id="ctableau">
            <table>
                <thead>
                    <tr>
                        <th class="cjours"></th>
                        <th class="cjours">Monday</th>
                        <th class="cjours">Tuesday</th>
                        <th class="cjours">Wednesday</th>
                        <th class="cjours">Thursday</th>
                        <th class="cjours">Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("table1.php");
                    ?>
                </tbody>
            </table>
        </section>
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
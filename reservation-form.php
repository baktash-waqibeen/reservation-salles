<?php
session_start();

require('config.php');

if (isset($_POST['submit'])) {
   if (!empty(['submit'])) {

      $id = $_SESSION['id'];
      $titre = $_POST['titre'];
      $description = $_POST['description'];
      $start_date = $_POST['debut'];
      $end_date = $_POST['fin'];

      $request = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$titre','$description','$start_date','$end_date',$id)";
      var_dump($request);
      $query = mysqli_query($dbconnect, $request);
      header('location:planning.php');
   } else {
      echo 'Please fill up the from!';
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
   <link type="text/css" rel="stylesheet" href="booking.css" />
   <link type="text/css" rel="stylesheet" href="style.css" />
   <title>Reservation Salle - Reservation form</title>
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
            <li>
               <a href="profil.php">
                  <i class="fa fa-exclamation-triangle"></i> Profile
               </a>
            </li>
            <li>
               <a href="reservation-form.php">
                  <i class="fa fa-envelope"></i> Booking
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
   <div id="booking" class="section">
      <div class="section-center">
         <div class="container">
            <div class="row">
               <div class="booking-form">
                  <div class="form-header">
                     <h1>Book A BOAT</h1> <br>
                     <h1>you can book only for the same day and only one hour!</h1>
                  </div>
                  <form method="POST">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <span class="form-label">Title of the event</span>
                              <input name="titre" class="form-control" type="text" placeholder="Even">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <span class="form-label">Description</span>
                              <input name="description" class="form-control" type="Description" placeholder="Description">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <span class="form-label">Start Date</span>
                        <input name="debut" class="form-control" type="datetime-local" placeholder="Start date">
                     </div>
                     <div class="form-group">
                        <span class="form-label">End Date</span>
                        <input name="fin" class="form-control" type="datetime-local" placeholder="End date">
                     </div>
                     <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-7">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="form-group">

                                    </select>
                                    <span class="select-arrow"></span>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="form-group">


                                    <span class="select-arrow"></span>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="form-group">


                                    </select>
                                    <!-- <span class="select-arrow"></span> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-btn">
                        <button name="submit" class="submit-btn">Book Now</button>
                     </div>
                  </form>
               </div>
            </div>
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
<?php
$email = $_GET['email'];
$hashcode = $_GET['hashcode'];
$dbc = mysqli_connect('localhost','Kevin','Streekie10', '22263_instaclone') or die ('Kan niet connecten naar database');
$query = "SELECT * FROM register WHERE email='$email' AND hashcode='$hashcode'";
$result = mysqli_query($dbc,$query) or die ('Error querying for user.');
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $userid = $row['id'];
    $query = "UPDATE register SET status=1 WHERE id='$userid'";
    $result = mysqli_query($dbc,$query) or die ('Error updating.');
    echo '<br>Bedankt, je inschrijving is compleet  <a href="inloggen.php">Klik hier</a> om terug te gaan naar de website.';
   }
else { echo 'Error';}
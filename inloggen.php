<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="inloggen.css" type="text/css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Inloggen</title>
  </head>
  <body>
    <h2>Instakilo</h2>
    <nav class="navbalk">
        <ul>
            <li><a id="icons" href="index.php"><i class="material-icons">home</i></a></li>
            <li><a id="icons" href="uploaden.php"><i class="material-icons">file_upload</i></a></li>
            <li><a id="icons" href="admin.php"><i class="material-icons">lock_outline</i></a></li>
            <li><a id="icons" href="inloggen.php"><i class="material-icons">perm_identity</i></a></li>
        </ul>
    </nav>
    <h2>Inloggen</h2>
    <br><br><br><br><br>
    <div id="post">
        <form method="post" action="#">

        <p>username:</p>
        <input type="text" name="username"/>
        <p>Wachtwoord:</p>
        <input type="password" name="password"/>
        <br><br>
        <input type="submit" name="submit" value="inschrijven"/>

        <p>Nog geen account?</p> <ul class="registreren">
                <li><a href="registreren.php">Registreer Hier!</a></li>
            </ul>
            <br><br>
        </form>
      </div>
    <?php
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $dbc = mysqli_connect('localhost','Kevin','Streekie10','22263_instaclone') or die ('Probeer het later, de server is helaas niet beschikbaar!');
    $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc,trim($_POST['password']));
    $hashed_password = hash('sha512', $password);

    $query = "SELECT * FROM register WHERE username='$username' AND password='$hashed_password'";
    $result = mysqli_query($dbc, $query) or die ('Sorry, er is iets fout gegaan!');
    $row = mysqli_fetch_array($result);

    $userlogin = $row['username'];
    $passlogin = $row['password'];
    $status = $row['status'];
    if($userlogin == $username && $userlogin == $hashed_password && $status == 1){
    $_SESSION['username'] = $username;
    echo 'Logged in as user ' . $username;
    $_SESSION['login'] = true;
    header("location: index.php");
    }
    else{
    echo 'Verkeerde gebruikersnaam/wachtwoord';
    }
    }
    ?>
  </body>
</html>

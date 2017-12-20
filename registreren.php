<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="registreren.css" type="text/css">
    <title>Registreren</title>
  </head>
  <body>
    <h1>InstaKilo</h1>

    <nav class="navbalk">
        <ul>
            <li><a id="icons" href="index.php"><i class="material-icons">home</i></a></li>
            <li><a id="icons" href="uploaden.php"><i class="material-icons">file_upload</i></a></li>
            <li><a id="icons" href="admin.php"><i class="material-icons">lock_outline</i></a></li>
            <li><a id="icons" href="inloggen.php"><i class="material-icons">perm_identity</i></a></li>
        </ul>
    </nav>
    <h2>Registreren</h2>
    
    <div id="post">
        <form method="post" action="#">

        <p>Naam:</p>
        <input type="name" name="name"/>
        <p>Gebruikersnaam:</p>
        <input type="text" name="username"/>
        <p>mailadres:</p>
        <input type="text" name="email"/>
        <p>Wachtwoord:</p>
        <input type="password" name="password"/>
        <p>Wachtwoord herhalen:</p>
         <input type="password" name="password"/>
          <br><br>
        <input type="submit" name="submit" value="inschrijven"/>
        </form>
      </div>

    <?php
    $dbc = mysqli_connect('localhost', 'Kevin', 'Streekie10', '22263_instaclone') or die('ERROR!');

    if (isset($_POST['submit'])) {

        $name = mysqli_real_escape_string($dbc,trim($_POST['name']));

        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));

        $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        $hashed_password = hash('sha512', $password);

        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

        $random_nummer = rand(1000, 99999);
        $hashcode = hash('sha512', $random_nummer);


        $query = "INSERT INTO register VALUES(0, '$name', '$username', '$hashed_password', '$email', '$hashcode', 0)";
        $result = mysqli_query($dbc, $query) or die('Error inserting user.');

        $to = $_POST['email'];
        $subject = "E-mail verificatie van Kevin Streekstra";
        $message = 'Welkom op Instakilo. Ter verificatie willen wij u vragen' .
            'om op de volgende link te klikken: ' .
            'http://22263.hosts.ma-cloud.nl/bewijzenmap/Instakilo/verify.php?email=' . $email . '&hashcode=' . $hashcode;
        $from = "22263@ma-web.nl";

        mail($to, $subject, $message, 'From:', $from);

    }
    ?>
  </body>
</html>

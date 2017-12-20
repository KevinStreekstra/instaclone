<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="uploaden.css" type="text/css"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title></title>
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
    <h1>Uploaden</h1>
    <br><br><br>

<!--FORMULIER VOOR UPLOAD-->
    <div id="forms">
        <form enctype="multipart/form-data" method="post" action="uploaden.php">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
            <input type="file" name="image"/><br><br>
            <label for="description">Omschrijving (max. 140 tekens)</label><br>
            <textarea name="description" id="description"></textarea><br>
            <input type="submit" name="Submit" value="Submit"/>
        </form>
    </div>

    <!--PHP VOOR VERWERKING UPLOAD-->

    <?php
    if(isset($_POST['Submit'])) {

        $dbc = mysqli_connect('localhost','Kevin','Streekie10','22263_instaclone') or die ('Error connecting!');
        $description = mysqli_real_escape_string($dbc,htmlentities($_POST['description']));
        $target = 'images/' . time() . $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];

        if(move_uploaded_file($temp,$target)) {
            echo '<div class="uploaden">';
            echo '<br>Het uploaden is gelukt!<br>';
            echo '</div>';
            $query = "INSERT INTO instaclone VALUES (0,NOW(),'kevin','$target','$description')";
            $result = mysqli_query($dbc,$query) or die('Error querying.');
        }
        else {
            echo "<p class='errorupload'>Error! Niet geupload! (Waarschijnlijk is de foto te groot!)</p>";
        }
    }
    ?>
</body>
</html>

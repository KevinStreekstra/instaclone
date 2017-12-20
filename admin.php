<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Instaclone</title>
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
<div id="wrapper">
    <div id="background">
        <br><br>
        <form id="sorteerbalk" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
            <select name="sorteermenu">
                <option value="#">----------</option>
                <option value="date_asc">Datum Oplopend</option>
                <option value="date_desc">Datum Aflopend</option>
                <option value="description_asc">Beschrijving Oplopend</option>
                <option value="description_esc">Beschrijving Aflopend</option>
            </select>
            <input type="submit" name="submit_sort" value="sorteren">
            <input type="text" name="search" placeholder="Search..">
        </form>
        <br>

        <br>
    </div> <!-- background -->
</div> <!--wrapper -->


</body>
</html>

<?php
?>
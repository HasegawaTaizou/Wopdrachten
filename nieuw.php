<?php
include("database/config.inc.php");
$gebruikersnaam_fout = FALSE;
$verzonden = FALSE;
include_once('database/genereer_wachtwoord.fct.php');
if (!empty($_POST)) {
    $wachtwoord = genereer_wachtwoord(8);
    $afzender = 'From: ' . $_SERVER['SERVER_NAME'] . ' <noreply@' . $_SERVER['SERVER_NAME'] . '>';
    $onderwerp = 'Nieuw account';
    $bericht = 'Je gebruikersnaam is:
    ' . $_POST['gebruikersnaam'] . '
    Je wachtwoord is:
    ' . $wachtwoord;
    $wachtwoord = hash('sha256', $wachtwoord);
    $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
    $sql = "INSERT INTO `gebruikers`
    SET
        `gebruikersnaam` = '" . mysqli_real_escape_string($link, $_POST['gebruikersnaam']) . "',
        `wachtwoord` = '" . mysqli_real_escape_string($link, $wachtwoord) . "',
        `email` = '" . mysqli_real_escape_string($link, $_POST['email']) . "' ";
    if (mysqli_query($link, $sql)) {
        $verzonden = mail($_POST['email'], $onderwerp, $bericht, $afzender);
    }
    else {
        $gebruikersnaam_fout = TRUE;
    }
}

?>
<?php include("includes/configtitle.php") ?>
<!DOCTYPE html>
<html>
		<head>

			<!--Meta informatie hieronder-->
<?php include("includes/HEAD.php")
?>
		</head>
<body>
		<?php include("includes/navbar.php") ?>


<h1>Nieuwe gebruiker</h1>

<?php
if ($gebruikersnaam_fout === TRUE) {
    echo '<p class="error">De ingevulde gebruikersnaam bestaat al.</p>';
}
if ($verzonden === TRUE) {
    echo '<p class="succes">Er is een nieuw account gemaakt en de gegevens zijn naar het opgegeven e-mailadres gestuurd.</p>';
}
?>

<form method="post">
<table>
<tr><td>Gebruikersnaam:</td><td><input type="text" name="gebruikersnaam"required></td></tr>
<tr><td>E-mailadres:</td><td><input type="email" name="email"required></td></tr>
<tr><td></td><td><input type="submit" value="Maak account"></td></tr>
</table>
</form>
<div class="link">
  <p><a href="login.php">login</a></p>
</div>
<?php include("includes/Footer.php") ?>
</body>
</html>

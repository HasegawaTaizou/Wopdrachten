<?php include('database/config.inc.php') ?>
<?php include('database/logincheck_beheer.inc.php') ?>
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
    <?php
    $gebruikersnaam_fout = FALSE;
    $verzonden = FALSE;
    include_once('database/genereer_wachtwoord.fct.php');
    if (!empty($_POST)) {
      $link = mysqli_connect($db['server'], $db['user'], $db['password'],$db['database']);
      $gebruikersnaam = ''.$_POST['gebruikersnaam'];
      $wachtwoord = hash('sha256', $_POST['password']);
      $email = ''.$_POST['email'];
      $sql = "INSERT INTO `gebruikers`
      SET
          `gebruikersnaam` = '" . mysqli_real_escape_string($link, $gebruikersnaam) . "',
          `wachtwoord` = '" . mysqli_real_escape_string($link, $wachtwoord) . "',
          `email` = '" . mysqli_real_escape_string($link, $email) . "' ";
         echo $sql . '<br>';
         mysqli_query($link, $sql);
         echo mysqli_error($link) . '<br>';
      }

    ?>

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
<tr><td>E-mailadres:</td><td><input type="text" name="email"required></td></tr>
<tr><td>password:</td><td><input type="text" name="password"required></td></tr>
<tr><td></td><td><input type="submit" value="Maak account"></td></tr>
</table>
</form>
<div class="link">
  <p><a href="login.php">login</a></p>
</div>
<?php include("includes/Footer.php") ?>
</body>
</html>

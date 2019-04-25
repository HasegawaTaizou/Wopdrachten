<?php include("includes/configtitle.php")?>
<?php include('database/config.inc.php') ?>
<?php include_once('database/genereer_wachtwoord.fct.php');
 if (!empty($_POST)) {
  $wachtwoord = genereer_wachtwoord(8);
  $afzender = 'From: ' . $_SERVER['SERVER_NAME'] . ' <noreply@' . $_SERVER['SERVER_NAME'] . '>';
  $onderwerp = 'resetpw';
  $wachtwoordencrypted = hash('sha256', $wachtwoord);
  $bericht = '
  Je wachtwoord is:' . $wachtwoord.'
   niet klikken al heeft u er niet om gevraagt
  link http://localhost/forgotpw.php?ww='.$wachtwoordencrypted.'&mail='.$_POST['email'].'';
$verzonden = mail($_POST['email'], $onderwerp, $bericht, $afzender);
}
if (empty($_GET)) {

} else {
  $ww=$_GET['ww'];
  $mail=$_GET['mail'];
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "UPDATE gebruikers SET wachtwoord = '$ww' WHERE email ='$mail'";
    mysqli_query($link, $sql);
}

?>

<!DOCTYPE html>
	<html>
		<head>

			<!--Meta informatie hieronder-->
			<?php include("includes/HEAD.php")
			?>
		</head>
	<body>
		<!--Dit is de navigatie-->
		<?php include("includes/navbar.php") ?>
<?php
if (empty($_GET)) {
  echo '
  <form method="post">
  <table>
  <tr><td>E-mailadres:</td><td><input type="email" name="email"required></td></tr>
  <tr><td></td><td><input type="submit" value="stuur mail"></td></tr>
  </table>
  </form>';
} else {
echo '<a href="login.php">login to change password</a>';
}


 ?>


    <?php include("includes/Footer.php") ?>
    </body>
    </html>

<?php
if( !isset( $_SESSION ) ) {
    session_start();
}
$login_correct = FALSE;
$login_error = FALSE;
if (!empty($_POST['username']) && !empty($_POST['password'])) {
	include('database/config.inc.php');
	$link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
	mysqli_set_charset($link, 'latin1');
	$wachtwoord = hash('sha256', $_POST['password']);
	$sql = "SELECT
    `id`
    FROM `gebruikers`
    WHERE `gebruikersnaam` = '" . mysqli_real_escape_string($link, $_POST['username']) . "'
    AND `wachtwoord` = '" . mysqli_real_escape_string($link, $wachtwoord) . "'
    LIMIT 1";
	$result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_row($result);
				$_SESSION['id'] = $row[0];
        $_SESSION['password'] = $wachtwoord;
		$login_correct = TRUE;
    }
    else {
        $login_error = TRUE;
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
<?php if ($login_correct === TRUE) { ?>

    <h1>Login gelukt!</h1>
    <p>Welkom in het beveiligde gedeelte van deze website!</p>
<div class="link">
	<p><a href="wijzig_pw.php">wijzig password</a></p>
</div>
<?php } else { ?>

    <h1>Login</h1>
    <p>Vul gebruikersnaam en wachtwoord in om toegang te krijgen tot het beveiligde gedeelte van deze website</p>

    <?php
    if ($login_error === TRUE) {
        echo '<p class="error">De gebruikersnaam/wachtwoord combinatie bestaat niet.</p>';
    }
    ?>

    <form method="post">
    <table>
    <tr><td>Gebruikersnaam:</td><td><input type="text" name="username"></td></tr>
    <tr><td>Wachtwoord:</td><td><input type="password" name="password"></td></tr>
    <tr><td></td><td><input type="submit" value="Login"></td></tr>
    </table>
    </form>
    <a href="forgotpw.php">forgot password?</a>
    <div class="link">

      <p><a href="nieuw.php">register</a></p>
    </div>

<?php } ?>

<?php include("includes/Footer.php") ?>
</body>
</html>

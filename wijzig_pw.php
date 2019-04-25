<?php include("includes/configtitle.php") ?>
<?php
$nieuw_wachtwoord_fout = FALSE;
$oud_wachtwoord_fout = FALSE;
$wachtwoord_gewijzigd = FALSE;
include('database/logincheck.inc.php');
if (!empty($_POST)) {
  if ($_POST['new_password1'] == $_POST['new_password2']) {
    include('database/config.inc.php');
    $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
    mysqli_set_charset($link, 'latin1');
    $wachtwoord = hash('sha256', $_POST['old_password']);
    $sql = "SELECT
    `id`
    FROM `gebruikers`
    WHERE `id` = '" . mysqli_real_escape_string($link, $user_id) . "'
    AND `wachtwoord` = '" . mysqli_real_escape_string($link, $wachtwoord) . "'
    LIMIT 1";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) != 1) {
    $oud_wachtwoord_fout = TRUE;
    }
    else {
    $wachtwoord = hash('sha256', $_POST['new_password1']);
    $sql = "UPDATE `gebruikers`
    SET `wachtwoord` = '" . mysqli_real_escape_string($link, $wachtwoord) . "'
    WHERE `id` = '" . mysqli_real_escape_string($link, $user_id) . "'";
    $wachtwoord_gewijzigd = mysqli_query($link, $sql);
    if ($wachtwoord_gewijzigd === TRUE) {
                $cookie['id'] = $user_id;
                $cookie['password'] = $wachtwoord;
                //zet cookie
                setcookie('login', serialize($cookie), time() + 60*60*24*7*2, '/');
            }
        }
    }
    else {
      $nieuw_wachtwoord_fout = TRUE;
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
  <?php include("includes/HEAD.php")
  ?>
</head>
<body>
<?php include("includes/navbar.php") ?>
<h1>Wijzig wachtwoord</h1>

<?php
if ($nieuw_wachtwoord_fout === TRUE) {
    echo '<p class="error">De ingevulde nieuwe wachtwoorden zijn niet gelijk.</p>';
}
if ($oud_wachtwoord_fout === TRUE) {
    echo '<p class="error">De oude wachtwoord is niet juist.</p>';
}
if ($wachtwoord_gewijzigd === TRUE) {
    echo '<p class="succes">Wachtwoord gewijzigd!</p>';
}
?>

<form method="post">
<table>
<tr><td>Oud wachtwoord/code van mail:</td><td><input type="password" name="old_password"required></td></tr>
<tr><td>Nieuw wachtwoord:</td><td><input type="password" name="new_password1"required></td></tr>
<tr><td>Herhaal wachtwoord:</td><td><input type="password" name="new_password2"required></td></tr>
<tr><td></td><td><input type="submit" value="Wijzig wachtwoord"></td></tr>
</table>
</form>
<?php include("includes/Footer.php") ?>
</body>
</html>

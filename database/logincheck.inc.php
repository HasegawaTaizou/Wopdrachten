<?php
if( !isset( $_SESSION ) ) {
    session_start();
}
$user_id = $_SESSION['id'];
$wachtwoord = $_SESSION['password'];
if (is_numeric($user_id) && (strlen($wachtwoord) == 64)) {
  include('config.inc.php');
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  mysqli_set_charset($link, 'latin1');
  $sql = "SELECT
  `id`
  FROM `gebruikers`
  WHERE `id` = '" . mysqli_real_escape_string($link, $user_id) . "'
  AND `wachtwoord` = '" . mysqli_real_escape_string($link, $wachtwoord) . "'
  LIMIT 1";
  $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) != 1) {
        echo '<p>Ongeldige aanmelding. <a href="login.php">login</a>';
        exit;
    }
}
else {
  echo '<p>Je bent niet aangemeld. <a href="login.php">login</a>';
    exit;
}
?>

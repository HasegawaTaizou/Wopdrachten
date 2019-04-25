<?php
if( !isset( $_SESSION ) ) {
    session_start();
}
if( !isset($_SESSION["idprod"] ) ) {
    $_SESSION["id"] = 0;
}
if( !isset($_SESSION["idprod"] ) ) {
    $_SESSION["password"] = 0;
}
$user_id = $_SESSION['id'];
$wachtwoord = $_SESSION['password'];
include('config.inc.php');
if (is_numeric($user_id) && (strlen($wachtwoord) == 64)) {
    if (in_array($user_id, $beheerder_ids)) {
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
        include("includes/configtitle.php");
        include("includes/HEAD.php");
        include("includes/navbar.php");
        echo '<p>Je bent geen beheerder!</p>';
        include("includes/Footer.php");
        exit;
    }
}
else {
    echo '<p>Je bent niet aangemeld. <a href="login.php">login</a>';
    exit;
}
?>

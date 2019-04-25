<?php
function genereer_wachtwoord($len) {
$tekens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $wachtwoord = '';
    for ($i = 0; $i < $len; $i++) {
        $start = mt_rand(0, strlen($tekens) - 1);
        $wachtwoord = $wachtwoord . substr($tekens, $start, 1);
    }
    return $wachtwoord;
  }
?>

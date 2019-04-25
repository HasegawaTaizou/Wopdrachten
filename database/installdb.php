//db maken
<?php
include('config.inc.php');
$link = mysqli_connect($db['server'], $db['user'], $db['password']);
$sql = "CREATE DATABASE `" . $db['database'] . "` COLLATE 'latin1_general_ci'";
echo $sql . '<br>';
mysqli_query($link, $sql);
echo mysqli_error($link) . '<br>';
?>
//tabel maken
<?php
mysqli_select_db($link, $db['database']);
$sql = "CREATE TABLE `gebruikers`
    (
    `id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `gebruikersnaam` VARCHAR(50) NOT NULL UNIQUE KEY,
    `wachtwoord` VARCHAR(64) NOT NULL,
    `email` VARCHAR(254),
    `laatst_ingelogd` TIMESTAMP
    ) ";
  echo $sql . '<br>';
  mysqli_query($link, $sql);
  echo mysqli_error($link) . '<br>';
?>
//admin account toevoegen
<?php
$gebruikersnaam = 'admin';
$wachtwoord = 'test';
$email = 'admin@example.com';
$wachtwoord = hash('sha256', $wachtwoord);
$sql = "INSERT INTO `gebruikers`
SET
    `gebruikersnaam` = '" . $gebruikersnaam . "',
    `wachtwoord` = '" . $wachtwoord . "',
    `email` = '" . $email . "' ";
    echo $sql . '<br>';
    mysqli_query($link, $sql);
    echo mysqli_error($link) . '<br>';
?>
//producten lijst toevoegen
<?php
mysqli_select_db($link, $db['database']);
$sql = "CREATE TABLE `products`
    (
    `id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `naam` VARCHAR(50) NOT NULL UNIQUE KEY,
    `description` VARCHAR(100000) NOT NULL,
    `price` DECIMAL(30,2) NOT NULL,
    `image` VARCHAR(100000),
    `toegevoegt` TIMESTAMP
  )";
  echo $sql . '<br>';
  mysqli_query($link, $sql);
  echo mysqli_error($link) . '<br>';
?>
//test product
<?php
$createtest = TRUE;
if ($createtest == TRUE) {
  $naam = 'test';
  $description = 'test';
  $price = '1.50';
  $image = 'uploads/test.jpg';
  $sql = "INSERT INTO `products`
  SET
      `naam` = '" . $naam . "',
      `description` = '" . $description . "',
      `price` = '" . $price . "',
      `image` = '" . $image . "' ";
      echo $sql . '<br>';
      mysqli_query($link, $sql);
      echo "<p>create test database/installdb.php has been set to: '$createtest'so a test product has been created</p>";
      echo mysqli_error($link) . '<br>';

} else {
echo "<p>create test database/installdb.php has been set to: '$createtest'</p>";
}


?>

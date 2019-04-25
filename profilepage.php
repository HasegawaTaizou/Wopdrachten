<!DOCTYPE html>
<?php if( !isset( $_SESSION ) ) {
    session_start();
} ?>
<?php include("includes/configtitle.php") ?>
<?php include("database/config.inc.php") ?>

<html>
<head>
  <?php include("includes/HEAD.php")
  ?>
</head>
<?php include("includes/navbar.php") ?>
<body>
  <?php
  $id=$_SESSION["id"];
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "SELECT gebruikersnaam FROM gebruikers WHERE id=$id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_row($result);
      $username = $row[0];
  }
  echo '<h1>Welkom terug '.$username.'</h1>';
  if ($id==1) {
    echo '<div class="link"><a  href="overzicht.php?id=0">beheer</a></div><br><br>';
  }
  ?>
  <div class="link">
  	<p><a href="wijzig_pw.php">wijzig password</a></p>
  </div>
<form action="Home.php" method="post">
<input type="hidden" name="loggout" value="0">
<input type="submit" value="loggout">
</form>
<?php include("includes/Footer.php") ?>
</body>
</html>

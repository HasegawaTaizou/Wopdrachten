<?php
if( !isset( $_SESSION ) ) {
    session_start();
}
$tottal=$_SESSION["tottal"];
 ?>
<?php include("includes/configtitle.php") ?>
<?php include("database/config.inc.php") ?>
<!DOCTYPE html>
	<html>
	<head>
			<!--Meta informatie hieronder-->
			<?php include("includes/HEAD.php")
			?>
	</head>
  <?php include("includes/navbar.php") ?>
	<body>
    <?php




    ?>
<div class="link">
  <br>
<a href="pdf_create.php">to pdf creator</a>
<br><br>
</div>
<?php include("includes/Footer.php") ?>
  </body>
</html>

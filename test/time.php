<!DOCTYPE html>
<html>
<?php include('database/config.inc.php') ?>
<head>
  <meta http-equiv="refresh" content="1">
</head>
<body>

<?php
$t=time();
echo($t . "<br>");
echo(date("d-m-Y-H-i-s",$t ));

?>


</body>
</html>

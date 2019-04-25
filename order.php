<?php
if( !isset( $_SESSION ) ) {
    session_start();
}
if( !isset($_SESSION["idprod"] ) ) {
    $_SESSION["idprod"] = array();
}
if( !isset($_GET['idprod']) ) {
    $urlid = 0 ;
}else{
$urlid = $_GET['idprod'];
}if( !isset($_GET['amount']) ) {
    $urlamount = 0 ;
}else{
$urlamount = $_GET['amount'];
}if( !isset($_GET['urldel']) ) {
    $urldel = -1 ;
}else{
$urldel = $_GET['urldel'];
}?>
<?php include("includes/configtitle.php") ?>
<?php include("database/config.inc.php") ?>
<!DOCTYPE html>
	<html>
		<head>

			<!--Meta informatie hieronder-->
			<?php include("includes/HEAD.php")
			?>
		</head>
	<body>
    <?php include("includes/navbar.php") ?>
<?php
switch ($urldel) {
  case '-1':

    break;

  default:
    unset ($_SESSION['idprod'][$urldel]);
    break;
}
switch ($urlid) {
  case '-1':
    unset ($_SESSION['idprod']);
    $_SESSION["tottal"]=0;
    break;
  default:
$tottal =0;
    $_SESSION["idprod"][$urlid]= $urlamount;
    foreach ($_SESSION["idprod"] as $key => $value) {
      $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
      $sql = "SELECT * FROM products WHERE id=$key";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
          echo '<table id="customers">';
          echo '<tr><th>naam</th><th>description</th><th>price</th><th>image</th><th></th></tr>';
          while ($data = mysqli_fetch_assoc($result)) {
            $priceprod=$data['price']*$value;
              echo '<tr>';
              echo '<td><div style="height:200px;overflow-y:auto;">' . htmlspecialchars($data['naam']) . '</div></td>';
              echo '<td><div style="height:200px;overflow-x:auto;">' . htmlspecialchars($data['description']) . '</div></td>';
              echo '<td><div style="height:200px;overflow-y:auto;">' . htmlspecialchars($data['price']) . 'x'.$value.'='.$priceprod.'</div></td>';
              $tottal = $tottal+$priceprod;
              echo '<td><div style="width:200px;height:200px;overflow:auto;"><a href="' . htmlspecialchars($data['image']) . '"><img style="height:200px;"src="' . htmlspecialchars($data['image']) . '"></a></div> </td>';
              echo '<td><div class="overzicht"><form action="order.php"  method="GET">
              <input type="hidden" type="number" id="urldel" name="urldel"value="'.$key.'">
            <input type="submit" value="remove from cart">
            </form></div></td>';
              echo '';
              echo '</tr>';
          }
          echo '</table>';
      }
      echo "<br>";
      $_SESSION["tottal"]=$tottal;
}
    break;
}
$tottal=$_SESSION["tottal"];
  echo '<div class="overzicht">';
  if ($tottal==0) {
    $textlinlkshop="order something";
  }
  else {
    $textlinlkshop="continue shoping";
  }
  echo "$tottal";
  echo '<div class="overzicht"></br><a href=bestel.php?id=0>'.$textlinlkshop.'</a></br></br><a href=buy.php>naar betaal pagina</a></br></br><a href=order.php?idprod=-1>empty cart</a></br></br></div>';
echo "</div>";
 ?>
<?php include("includes/Footer.php") ?>
</body>
</html>

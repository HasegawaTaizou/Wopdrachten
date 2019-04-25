<?php include("includes/configtitle.php") ?>
<?php
include('database/logincheck_beheer.inc.php');
?>
<!DOCTYPE HTML>
<html>
<head>
  <?php include("includes/HEAD.php")
  ?>
</head>
<body>
<?php include("includes/navbar.php") ?>
<h1>Product verwijderen</h1>

<?php
if (!empty($_POST)) {
$idproduct = $_POST['id'];
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "SELECT image FROM products WHERE id = '$idproduct'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);
$myFile = $data['image'];
$myFileLink = fopen($myFile, 'w') or die("can't open file");
fclose($myFileLink);
$myFile = $data['image'];
unlink($myFile) or die("Couldn't delete file");
    $sql = "DELETE FROM `products`
    WHERE `id` = '" . mysqli_real_escape_string($link, $_POST['id']) . "'";
    if (mysqli_query($link, $sql)) {
        echo '<div class="link"><p>Product is verwijderd.<a href="overzicht.php">terug</a></p></div>';
    }
    else {
        echo '<p>Product kan niet worden verwijderd. ' . mysqli_error($link) . '</p>';
    }
}
else {

    ?>

    <form method="post">
    <p>Weet je zeker dat je het product met id <?php echo htmlspecialchars($_GET['id']); ?> wilt verwijderen</p>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
    <input type="submit" value="product verwijderen">
    </form>

    <?php
}
?>
<?php include("includes/Footer.php") ?>
</body>
</html>

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
<h1>Gebruiker verwijderen</h1>

<?php
if (!empty($_POST)) {
    $sql = "DELETE FROM `gebruikers`
    WHERE `id` = '" . mysqli_real_escape_string($link, $_POST['id']) . "'";
    if (mysqli_query($link, $sql)) {
        echo '<div class="link"><p>Gebruiker is verwijderd.<a href="overzicht.php">terug</a></p></div>';
    }
    else {
        echo '<p>Gebruiker kan niet worden verwijderd. ' . mysqli_error($link) . '</p>';
    }
}
else {

    ?>

    <form method="post">
    <p>Weet je zeker dat je gebruiker met id <?php echo htmlspecialchars($_GET['id']); ?> wilt verwijderen</p>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
    <input type="submit" value="Gebruiker verwijderen">
    </form>

    <?php
}
?>
<?php include("includes/Footer.php") ?>
</body>
</html>

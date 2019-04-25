<?php
include('database/logincheck_beheer.inc.php');
?>
<?php include("includes/configtitle.php") ?>
<!DOCTYPE HTML>
<html>
<head>
  <?php include("includes/HEAD.php")
  ?>
</head>
<?php include("includes/navbar.php") ?>
<body>
  <?php
  $link = mysqli_connect($db['server'], $db['user'], $db['password'],$db['database']);
  $naam = ''.$_POST['name'];
  $description = ''.$_POST['discription'];
  $price = ''.$_POST['price'];
  $id =''.$_POST['id'] ;
  $image = ''.$_POST['image'] ;
  $sql = "UPDATE products SET id='$id', naam = '$naam' , price = '$price' , description = '$description' WHERE id =$id";
      echo $sql . '<br>';
      mysqli_query($link, $sql);
      echo mysqli_error($link) . '<br>';
  ?>
  <div class="link">
    <a href="overzicht.php">terug</a>
  <br><br>
  </div>


</body>
  <?php include("includes/Footer.php") ?>

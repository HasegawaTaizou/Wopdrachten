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
<div class="container">
<h1>Overzicht gebruikers</h1>
<div class="link">
  <p><a href="AdminAddLogin.php">Nieuwe gebruiker</a></p>
</div>
<div class="overzicht">
  <?php
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "SELECT * FROM `gebruikers`";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
      echo '<table id="customers">';
      echo '<tr><th>Gebruikersnaam</th><th>E-mailadres</th><th>laatst_ingelogd</th><th>verwijder:</th></tr>';
      while ($data = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($data['gebruikersnaam']) . '</td>';
          echo '<td>' . htmlspecialchars($data['email']) . '</td>';
          echo '<td>' . htmlspecialchars($data['laatst_ingelogd']) . '</td>';
          if (($data['id'])>1) {
            echo '<td><a href="verwijder.php?id=' . $data['id'] . '">Verwijder</a></td>';
          } else {
            echo '<td></td>';
          }
          echo '';
          echo '</tr>';
      }
      echo '</table>';
  }
  else {
      echo '<p>Er zijn geen gebruikers.</p>';
  }
  ?>
<br>
  </div>
  <h1>Upload productinfo and image.</h1>
  <div class="upload image">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"required>
    <label for="name"><p>naam product:</label>
    <input type="text" id="name" name="name"maxlength="21" placeholder="Enter your name here..."required>
    <label for="price"><p>price:</label>
    <input type="number" step=".01" id="price" name="price" placeholder="price"min="0"required>
    <label for="discription"><p>Vul hier de description in:</label>
    <textarea id="discription" name="discription" placeholder="write description here" style="height:200px;"required></textarea>
    <input type="submit" value="upload product" name="submit">
</form>
</div>
<h1>Overzicht producten.</h1>
</div>
  <div class="container">
  <?php
  if (empty($_GET)){
    $id=0;
  }
  else {
  $id = $_GET['id'];
  }
  $id1 =$id+1 ;
  $id2 =$id-1 ;
  $amount = 10;
  $login = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $query ="SELECT COUNT(id)FROM products";
  $resultamount = mysqli_query($login, $query);
  $amountarray  = mysqli_fetch_assoc($resultamount);
  $amount = $amountarray['COUNT(id)'] ;
  echo '<td>num products:' . htmlspecialchars($amount) . '</td>';
  $maxtable = $amount/10;
  $offset = 10*$id;
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "SELECT * FROM products LIMIT 10 OFFSET $offset";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
      echo '<table id="customers">';
      echo '<tr><th>naam</th><th>description</th><th>price</th><th>id</th><th>image</th><th></th></tr>';
      while ($data = mysqli_fetch_assoc($result)) {
        echo'<form action="overzicht-update.php" method="post" enctype="multipart/form-data">';
          echo '<tr>';
          echo '<td><div style="height:200px;overflow-y:auto;">
          <input type="text" id="name" name="name"maxlength="21" value="'.$data['naam'].'"required>
          </div></td>';
          echo '<td><div style="height:200px;overflow-x:auto;"><textarea id="discription" name="discription" style="height:200px;"required>'.$data['description'].'</textarea></div></td>';
          echo '<td><div style="height:200px;overflow-y:auto;"><input type="number" id="price" name="price" value="' .$data['price'].'"placeholder="price" step=".01" min="0"required></div></td>';
          echo '<td>' . htmlspecialchars($data['id']) . '</td>';
          echo '<td><div style="width:200px;height:200px;overflow:auto;"><a href="' . htmlspecialchars($data['image']) . '"><img style="height:200px;"src="' . htmlspecialchars($data['image']) . '"></a></div> </td>';
          echo '<td><div class="overzicht"><a href="product.php?id=' . $data['id'] . '">product</a></br></br><a href="verwijder_product.php?id=' . $data['id'] . '">Verwijder</a></div></br><div class="overzicht"><input type="submit" value="update product" name="submit"></div></td>';
          echo '<input id="id" name="id" type="hidden"value="'.$data['id'].'">';
          echo '<input id="image" name="image" type="hidden"value="'.$data['image'].'">';
          echo "</form>";
          echo '';
          echo '</tr>';
      }
      echo '</table>';
     echo '<div class="overzicht"><table>';
     echo '<tr><th></th><th></th><th></th><th></th></tr>';
     echo '<tr>';
     if (-1<$id2){
     echo '<td><a href="overzicht.php?id='.$id2.'">prev</a></td>';
     }
     else {
      echo "<td>min page</td>";
     }
     echo '<td>current=</td>';
     if ($maxtable>$id1) {
       echo '<td><a href="overzicht.php?id='.$id1.'">next</a></td>';
     }
     else {
      echo "<td>max page</td>";
     }
     echo '</tr>';
     echo '<tr>';
     echo '<td><p>0</p></td>';
     echo '<td><p>'.$id.'</p></td>';
     echo '<td><p>'.$maxtable.'</p></td>';
     echo '</tr>';
     echo '</table></div>';


  }
  else {

      echo '<p>Er zijn geen producten.</p>';
      echo '<a href="overzicht.php?id='.$id2.'">prev</a>';
  }

  ?>
</div>


<?php include("includes/Footer.php") ?>
</body>
</html>

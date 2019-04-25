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
		<!--Dit is de navigatie-->
		<?php include("includes/navbar.php") ?>
<div class="overzicht">
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
	  $maxtable = $amount/10;
		$offset = 10*$id;
    $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
    $sql = "SELECT * FROM products LIMIT 10 OFFSET $offset";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<table id="customers">';
        echo '<tr><th>naam</th><th>description</th><th>price</th><th></th><th>product</th><th></th></tr>';
        while ($data = mysqli_fetch_assoc($result)) {
					$price = $data['price'];
            echo '<tr>';
            echo '<td><div style="height:200px;overflow-y:auto;">' . htmlspecialchars($data['naam']) . '</div></td>';
            echo '<td><div style="height:200px;overflow-y:auto;">' . htmlspecialchars($data['description']) . '</div></td>';
						echo '<td><div style="height:200px;overflow-y:auto;">' . htmlspecialchars($price) . '</div></td>';
            echo '<td><div style="width:200px;height:200px;overflow:auto;"><img style="height:200px;"src="' . htmlspecialchars($data['image']) . '"></div> </td>';
            echo '';
						echo '<td><a href="product.php?id=' . $data['id'] . '">product</a></td>';
            echo '<td><form action="order.php"  method="GET">
						<input type="hidden" type="number" id="idprod" name="idprod"value="'.$data['id'].'">
  amount:
  <br><br>
	<input type="number" id="amount" name="amount"value=1 min="1">
  <input type="submit" value="add to cart">
</form></td>';
						echo '</tr>';
        }
        echo '</table>';
				echo '<table>';
	      echo '<tr><th></th><th></th><th></th><th></th></tr>';
	      echo '<tr>';
	      if (-1<$id2){
	      echo '<td><a href="bestel.php?id='.$id2.'">prev</a></td>';
	      }
	      else {
	       echo "<td>min page</td>";
	      }
	      echo '<td>current=</td>';
	      if ($maxtable>$id1) {
	        echo '<td><a href="bestel.php?id='.$id1.'">next</a></td>';
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
	      echo '</table>';

    }

    else {
        echo '<p>Er zijn geen producten.</p>';
				echo '<a href="bestel.php?id=0">terug naar 0</a>';
    }

    ?>
		</div>

	    <?php include("includes/Footer.php") ?>
    </body>
    </html>

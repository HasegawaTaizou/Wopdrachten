<?php include("includes/configtitle.php")?>
<?php include('database/config.inc.php') ?>
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
    <?php
    $idproduct = $_GET['id'];
      $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
      $sql = "SELECT * FROM products WHERE id = '$idproduct'";
        $result = mysqli_query($link, $sql);


    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th></th><td></td></tr>';
        while ($data = mysqli_fetch_assoc($result)) {
					  echo '<tr>';
					  echo '<td>Naam:</td>';
					  echo '<td>' . htmlspecialchars($data['naam']) . '</td>';
					  echo '</tr>';
            echo '<tr>';
            echo '';
            echo '<td><img style="width=300px;height:300px;" src="' . htmlspecialchars($data['image']) . '"> </td>';
            echo '<td></td>';
						echo '';
            echo '</tr>';
						echo '<tr>';
						echo '<td>description:</td>';
						echo '<td>' . htmlspecialchars($data['description']) . '</td>';
						echo '</tr>';
        }
        echo '</table>';
    }
    else {
        echo '<p>er is geen product met id='. $idproduct. '</p>';
    }
    ?>

    <?php include("includes/Footer.php") ?>
    </body>
    </html>

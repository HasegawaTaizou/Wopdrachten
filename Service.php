<?php include("includes/configtitle.php") ?>
<!DOCTYPE html>
	<html>
		<head>

			<!--Meta informatie hieronder-->
			<?php include("includes/HEAD.php")
			?>
	<body>

		<!--Dit is het logo en de banner aan de bovenkant van de pagina-->


		<!--Dit is de navigatie-->
		<?php include("includes/navbar.php") ?>

		<!--Hierin komt de content-->
		<div class="content">
			<div class="Herhaalmedicatie">
				<h1><b>Herhaalmedicatie</b></h1>
				<hr>
				<p>Wanneer u langere tijd dezelfde medicijnen gebruikt, kunt u eenvoudig online uw herhaalrecept bij uw apotheek aanvragen.<br>
				U kunt op verschillende manieren gebruik maken van deze herhaal service.</p><br>
				<hr>
				<br>
				<p>Wanneer komt u in aanmerking van een herhaalmedicatie.<br>
				-Als u door een chronische ziektebeeld medicatie nodig heeft.<br>
				-Op aangeven van uw huisarts.<br>
				-Op aangeven van het ziekenhuis.</p><br>
				<br>
				<hr>
				<br>
				<p>Herhaalmedicatie kunt u opgeven doormiddel van het invullen van het herhaalmedicatieformulier.<br>
				Klik <a href="herhaalrecept.php">HIER</a> om het herhaalmedicatieformulier in te vullen.</p><br>
				<br>
				<hr>
			</div>

			<div class="container">
				<?php
if (empty($_POST)) {
    //formulier niet verzonden, geef formulier weer
    ?>
		<h1> Stel een vraag, maak een afspraak of meld je af voor een afspraak.</h1>
		<h3> Binnen 24 uur antwoord! </h3>
			<form action="Service.php" method="post">
			  <label for="ontvanger"><p>ontvanger</label>
			  <select id="ontvanger" name="ontvanger">
			  <option value="j.schut@huisarts.net">j.schut@huisarts.net</option>
			  <option value="nickklaver11@gmail.com">nickklaver11@gmail.com</option>
		    </select>
		  	<label for="subject"><p>Onderwerp</label>
			  <select id="subject" name="subject">
		   	<option value="bestelling">bestelling</option>
		  	<option value="vragen">Vragen/hulp</option>
		  	<option value="afspraak">Een afspraak maken</option>
			  <option value="afspraak cancellen ">Een afspraak cancellen</option>
			  <option value="Overige">Overige</option>
		    </select>
				<label for="name"><p>Voor en Achternaam</label>
				<input type="text" id="fullname" name="fullname" placeholder="Enter your name here...">
				<label for="adress"><p>Woonplaats</label>
				<input type="text" id="woonplaats" name="woonplaats" placeholder="Enter your town/city...">
				<label for="zipcode"><p>Postcode</label>
				<input type="text" id="zipcode" name="zipcode" placeholder="Enter your postal code...">
				<label for="number"><p>Huisnummer</label>
				<input type="text" id="number" name="number" placeholder="Enter your house number...">
				<label for="phone"><p>Telefoon nummer</label>
				<input type="text" id="phone" name="phone" placeholder="Enter your phone number here...">
				<label for="email"><p>E-mail adres</label>
				<input type="text" id="useremail" name="useremail" placeholder="Enter your E-mail adres here...">
				<label for="subject"><p>Vul hier je bericht in.</label>
				<textarea id="subject_text" name="subject_text" placeholder="Write your message here." style="height:200px"></textarea>
				<input type="submit" value="Submit">
			</form>
    <?php
}
else {
    //formulier wel verzonden, verzend bericht
    //definieer verzendopties
    $ontvanger =''.$_POST['ontvanger'];
		$onderwerp =''.$_POST['subject'];
    //stel bericht op
    $bericht = 'Naam: '.$_POST['fullname'].'
    woonplaats: '.$_POST['woonplaats'].'
    Postcode: '.$_POST['zipcode'].'
		Huisnummer: '.$_POST['number'].'
		Telefoon nummer: '.$_POST['phone'].'
	  Email: '.$_POST['useremail'].'
    vraag: '.$_POST['subject_text'];

    //stel verzend-header op
    $verzender = 'From: '.$_POST['fullname'].' <'.$_POST['useremail'].'>';

    //verzend bericht
    if (mail($ontvanger, $onderwerp, $bericht, $verzender)) {
        //succesmelding als correct verzonden
        echo '<p>Bericht is succesvol verzonden.</p>';
    }
    else {
        //foutmelding als niet verzonden
        echo '<p>Er is een fout opgetreden bij het verzenden van het bericht. Probeer het later nogmaals.</p>';
    }
}
?>

			</div>
		</div>

		<!--Dit is de Footer-->
		<?php include("includes/Footer.php") ?>
	</body>
</html>

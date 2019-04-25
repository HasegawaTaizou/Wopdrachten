<?php include("includes/configtitle.php") ?>
<?php
if( !isset( $_SESSION ) ) {
    session_start();
}
if( isset($_POST['loggout']) ) {
    $_SESSION["id"]=-2;
		$_SESSION['password']='';
}
?>
<!DOCTYPE html>
<html>
		<head>

			<!--Meta informatie hieronder-->
<?php include("includes/HEAD.php")
?>
		</head>
	<body>

		<!--Dit is het logo en de banner aan de bovenkant van de pagina-->


		<!--Dit is de navigatie-->
<?php include("includes/navbar.php") ?>

		<!--Hierin komt de content-->
		<div class="content">

				<!--Dit is de slideshow-->
				<div id="slideshow">
					<div class="slide-wrapper">
						<div class="slide"><h1 class="slide-number">Onze medewerkers zijn altijd druk aan het werk.</h1></div>
						<div class="slide"><h1 class="slide-number">Een groot assortiment aan medicijnen.</h1></div>
						<div class="slide"><h1 class="slide-number">Onze wacht ruimte is luxe en rustig.</h1></div>
					</div>
				</div>

			<!--Dit is de "Google" map-->
			<div class="map">
				<h2>Waar zitten wij gevestigt?</h2>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d308890.6349349318!2d4.529191733838462!3d52.78255580839972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47cf4df27a928d25%3A0x10aae2259e80ed2f!2sCo%E2%80%9Dperatieve+Centrale+Inkooporganisatie+Apotheekhoudende+Huisartsen+Noord-Holland+Noord+U.A.!5e0!3m2!1sen!2snl!4v1548678749357" allowfullscreen></iframe>
			</div>

			<!--Dit is het overzicht van medicijnen-->
		<div class="medicijnen">
				<div class="medicijn">
					<center><h4>Medicijnen:</h4></center>
					<hr>
					<h4><b>Sildenafil:</b></h4>
					<img src="images/Sildenafil.png">
					<br><p>-Sildenafil verwijdt sommige bloedvaten. Hierdoor kan het bloed er beter doorstromen.
					<br>-Bij erectieproblemen en bij pulmonale arteriële hypertensie (verhoogde bloeddruk in de longen). Soms bij de ziekte van Raynaud (doorbloedingsstoornis), dit duurt tussen een half uur of een uur na het innemen.
					<br>-Met tabletten in te nemen.
					<br>-De bijwerkingen zijn hoofdpijn en maagklachten.
					<hr>
					<h4><b>Oxazepam</b></h4>
					<img src ="images/Oxazepam.png">
					<br><p>-Werkt rustgevend, ontspant de spieren en maakt je suf. Is voor angstgevoelens, slapeloosheid en als je gespannen bent.
					<br>- Werkt in na 1 uur, het is verslavend en gebruikt u niet meer dan 50 mg per dag, dan mag u weer na 16 uur na inname weer autorijden
					</p>
					<hr>
					<h4><b>Ibuprofen</b></h4>
					<img src ="images/Ibuprofen.png">
					<br><p>-Ibuprofen stilt de pijn, verlaagt de koorts en remt de ontstekingen.
					<br>-Het werkt tussen de 30- en 60 minuten en dan werkt het vervolgens 8 uur
					<br>-Alcohol vergroot de kans op maagklachten,en kan schadelijk zijn tijdens een zwangerschap
					</p>
					<hr>
					<h4><b>Melatonine</b></h4>
					<img src="images/Melatonine.png">
					<br><p>-Het is een medicijn waar je slaperig van wordt, en wordt daarom ook gebruikt bij slapeloosheid.
					<br>-Neem het op een bepaald tijdstip in, of op het aangegeven tijdstip van je huisarts.
					</p>
					<hr>
					<h4><b>Diclofenac</b></h4>
					<img src="images/Diclofenac.png" style="margin-left: 1%;">
					<br><p>-Stilt de pijn, remt de ontstekingen en verlaagt de koorts, wordt onder andere gebruikt bij gewrichtspijn, menstruatie en verkoudheid
					<br>-Het kan maag- en darmklachten veroorzaken
					</p>
					<hr>
					<h4><b>Amoxicilline</b></h4>
					<img src="images/Amoxicilline.png">
					<br><p>-Het doodt bacteriën, bij infecties  van longen, luchtpijp, keel, bijholtes, middenoor, blaas, maag en darmen, en huid. En bij geslachtsziekten (chlamydia, gonorroe), de ziekte van Lyme en hersenvliesontsteking.
					<br>-Het zijn tabletten of capsules en in te nemen met water.
					<br>-Het kan maagklachten geven, Huiduitslag met rode vlekjes en bultjes, droge mond, Ontstoken slijmvliezen en overgevoeligheid.
					</p>
					<hr>
					<h4><b>Xanax</b></h4>
					<img src="images/Xanax.png">
					<br><p>-werkt rustgevend, vermindert angstgevoelens, ontspant spieren en maakt suf.
					<br>-Je gebruikt het bij angstgevoelens en gespannenheid, onder andere bij paniekstoornis of sociale fobie.
					<br>-Het werkt na een half uur bij inname.
					</p>
					<hr>
					<h4><b>Bisacodyl</b></h4>
					<img src="images/Bisacodyl.png">
					<br><p>-Bisacodyl is een laxeermiddel. Het stimuleert de darmbeweging en laat de ontlasting meer vocht opnemen. Hierdoor wordt de stoelgang makkelijker.
					<br>-Bij verstopping. En om de darm leeg te maken voor een darmonderzoek of operatie.
					<br>&nbsp;&nbsp;*Tablet: na 6 tot 12 uur komt de ontlasting op gang.
					<br>&nbsp;&nbsp;*Zetpil: werkt binnen 20 minuten.
					</p>
					<hr>
					<h4><b>Omeprazol (Maagzuurremmer)</b></h4>
					<img src="images/Omeprazol.png" style="margin-left: 1%;">
					<br><p>-Wordt vooral gebruikt bij mensen die last hebben van brandend maagzuur of een maagzweer hebben
					<br>-Binnen enkele dagen heeft u minder last van brandend maagzuur, en dat duurt een paar dagen na het innemen.
					<br>-De mogelijke klachten die het meeste voorkomen zijn Maag darmklachten en hoofdpijn.
					<p>
					<hr>
					<h4><b>Metoprolol (bétablokker)</b></h4>
					<img src="images/Metoprolol.png" style="margin-left: 1%;">
					<br><p>-Metoprolol vertraagt de hartslag, verlaagt de bloeddruk en vermindert de zuurstofbehoefte van het hart.
					<br>-Bij hoge bloeddruk, angina pectoris (hartkramp), hartritmestoornissen, migraine, te snelle schildklierwerking, hartfalen, en na een hartinfarct.
					<br>-Het effect komt geleidelijk gedurende 6 weken tot stand. Dan is te meten hoeveel uw bloeddruk is gedaald. Ook merkt u verbetering van uw klachten.
					<br>-De mogelijke bijwerking die soms tegenkomt bij dit medicijn is Vermoeidheid.
					</p>
					<hr>
				</div>
			</div>

			<!--Dit zijn de veelgestelde vragen-->
			<div class="FAQ">
				<center><h1> Veel gestelde vragen.</h1></center>
				<hr>
				<h3> Hoe werkt het herhaal formulier?</h3>
				<p> Het herhaal formulier wordt nagekeken.<br>
				Zodra er goedkeuring is zal u toestemming krijgen voor<br>
				een herhaal medicijn.</p>
				<hr><br>
				<h3> Waar zijn wij gevestigd? </h3>
				<p> Wij zijn gevestigd in ........................<br>
				Makkelijk bereikbaar met het openbaar vervoer.
				<hr><br>
				<h3> Wat zijn onze openingstijden? </h3>
				<p><b>Openingstijden:</b><br>
				<b>Maandag:</b> van 09:00 tot 17:00 <br>
				<b>Dinsdag:</b> van 09:00 tot 17:00 <br>
				<b>Woensdag:</b> van 09:00 tot 17:00 <br>
				<b>Donderdag:</b> van 09:00 tot 17:00 <br>
				<b>Vrijdag</b> van 12:00 tot 17:00 <br>
				<b>Zaterdag</b> Gesloten<br>
				<b>Zondag</b> Gesloten
				<hr>
			</div>

			<div class="Nieuwtjes">
				<h1> Nieuwtjes </h1>
				<hr>
				<h2><b><center>Hier vind u de actueele informatie over onze apotheek en apotheken in het algemeen</center></b></h2>
				<hr>
				<h3><b>Geneesmiddelentekorten in 2018 weer gestegen!</b></h3>
				<p>Het aantal geneesmiddelentekorten in Nederland is in 2018 weer gestegen. Sterker nog dan een jaar eerder.<br>
				De tekorten in 2016 liepen met drie procent op tot 732 in 2017.<br>
				Nu is er een stijging van maar liefst 5 procent naar 769.<br>
				‘Het is dweilen met de kraan open’, stelt voorzitter Gerben Klein Nulent van de KNMP. <br>
				‘Patiënt en apotheker hebben hier dagelijks enorme last van. De patiënt krijgt regelmatig een ander doosje, omdat de apotheker moet uitwijken naar een alternatief.<br>
				Apothekers hebben er veel werk aan om dit allemaal te regelen.’<br>
				In het oog springende tekorten in 2018 waren onder meer de anticonceptiepil, waardoor onder Nederlandse vrouwen onrust en onzekerheid ontstond.<br>
				Het niet beschikbaar zijn van levodopa/carbidopa had impact op patiënten met de ziekte van Parkinson, omdat deze patiënten heel nauwkeurig ingesteld zijn.<br>
				Verslavingsartsen sloegen alarm toen refusal niet beschikbaar was. Het middel tegen alcoholverslaving is er nu weer tijdelijk. Veel tekorten waren er ook bij de oogpreparaten en antibiotica.
				</p>
				<hr>
				<h3><b>Prijsdaling</b></h3>
				<p>De almaar oplopende tekorten hebben diverse oorzaken. Door de Wet geneesmiddelenprijzen en het preferentiebeleid van de zorgverzekeraars zijn in de loop der jaren de prijzen enorm gedaald.<br>
				Voor fabrikanten is Nederland daarom een weinig aantrekkelijke markt. Ze houden hun voorraden bewust laag en in het geval van een hapering in het productieproces ontstaan snel tekorten.<br>
				De KNMP stelt vast dat er sinds 2010 sprake is van een stijging van de tekorten, ondanks de inzet van de werkgroep geneesmiddelentekorten onder regie van het ministerie van VWS.<br>
				De KNMP pleit al langere tijd voor een versoepeling van het preferentiebeleid. De KNMP is positief over het voorstel om in Nederland de voorraden te verhogen.<br>
				Klein Nulent: ‘Zeker voor de veel gebruikte middelen en bepaalde middelen waar uit oogpunt van goede patiëntenzorg geen tekort van mag zijn. Met name de fabrikanten zullen hun voorraden moeten verhogen. <br>
				Apothekers hebben daar beperkte mogelijkheden voor.’
				</p>
				<hr>
				<h3><b>Tekorten in 2019</b></h3>
				<p>De KNMP vreest voor de tekorten in 2019. ‘We weten nog niet hoe de Brexit gaat uitpakken, maar ook hierdoor kunnen problemen ontstaan.<br>
				Voorts kennen we nog niet de effecten van de invoering van de Falsified Medicines Directive, waardoor mogelijk nog meer tekorten optreden van fabrikanten die hun productie om economische redenen staken.’<br>
				Voor de apothekersorganisatie brengt KNMP Farmanco de geneesmiddelentekorten in kaart. Indien een geneesmiddel landelijk niet verkrijgbaar is, gedurende minimaal 14 dagen, noteert KNMP Farmanco een nieuw tekort voor het jaarlijkse overzicht.<br>
				Meldingen door apothekers verifieert KNMP Farmanco altijd bij de fabrikanten. Farmanco houdt als enige instantie in Nederland al 15 jaar statistieken bij.
				</p>
				<hr>
			</div>
		</div>

		<!--Dit is de Footer-->
<?php include("includes/Footer.php") ?>
	</body>
</html>

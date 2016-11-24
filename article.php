<?php
session_start();
if (isset($_SESSION['nom'])){
	echo 'Connecté en tant que '.$_SESSION['nom']; 
	echo '<form action="deconnection.php" id="deconnection" method="POST">
		<input type="submit" value="Se déconnecter" />
		</form></br></br>';
}
?>
<!doctype HTML>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Mon Blog</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>

<body>
	<p>Ceci est un super article! Laissez vos commentaires!</p>
	<div id="boitecomms"><p>Commentaires déjà envoyés: </p>
		<?php
		$commentaires = fopen("stockcomments.txt","a+");
		while(!feof($commentaires)) {echo fgets($commentaires).'<br/>';}
		fclose($commentaires);
		?>
	</div>
	<p>Formulaire de nouveau message: </p>
	<form action="envoiformulaire.php" method="POST">
		<p>
			<label for="message" id="message">Votre Message: </br></label><textarea type="text" name="message" ></textarea>
			<br/>
			<input type="submit" id="valider" value="Valider" />
		</p>
	</form>
	
	<p></p>
</body>
</html>
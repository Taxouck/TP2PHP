<?php
session_start();
if (empty($_SESSION['nom'])){
	if ( isset($_POST['nom'],$_POST['mdp']) AND !empty($_POST['nom']) AND !empty($_POST['mdp'])){
			$logins = fopen("users.txt","r");
			$reussi=0;
			while(!feof($logins)){
			$nom=fgets($logins);
			$nom=trim($nom);
			$mdp=fgets($logins);
			$mdp=trim($mdp);
			if (strcasecmp($nom,$_POST['nom'])==0 AND strcmp($mdp,$_POST['mdp'])==0 ){
				$reussi=1;
				$_SESSION['nom']=$nom;
			}else{
			}
			/*echo $nom.' '.$_POST['nom'].'</br>';
			echo $mdp.' '.$_POST['mdp'].'</br>';
			echo ftell($logins).'</br>';*/
			}
			if ($reussi==1) {
				echo 'vous êtes connecté, '.$_SESSION['nom'];
				echo '</br><a href="article.php">Accéder à l\'article</a>';
			}else{
				echo 'aucune correspondance pseudo mdp';
			}
		}else{
			echo 'Il manque votre pseudo ou votre mot de passe.';
		}
	}else{
		echo 'Bonjour '.$_SESSION['nom'];
		echo '</br><a href="article.php">Accéder à l\'article</a>';
	}
?>

<?php
if (empty($_SESSION['nom'])){
	echo '<form action="connection.php" method="POST">
		<p>
			<label for="nom">Pseudo </br></label><input type="text" name="nom" maxlength="25" id="nom"/>
			<br/>
			<label for="mdp">Mot de passe </br></label><input type="text" name="mdp" maxlength="25" id="mdp"/>
			<br/>
			<input type="submit" id="valider" value="Valider" />
		</p>
	</form>';
}else{
	echo '<form action="deconnection.php" method="POST">
		<input type="submit" id="deconnection" value="Se déconnecter" />
		</form>';
	
}
?>
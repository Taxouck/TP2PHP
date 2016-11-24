<?php
	session_start();
	if ( isset($_SESSION['nom']) AND isset($_POST['message']) ){
		$commentaires = fopen("stockcomments.txt","a+");
		while(!feof($commentaires)) { fgets($commentaires);}
		fwrite($commentaires, '<div class="commall"><p class="pseudo">'.$_SESSION['nom'].'</p>');
		fwrite($commentaires, '<p class="commentaire">'.$_POST['message'].'</p></div>'.'
		');
		fclose($commentaires);
		echo 'Votre commentaire a été posté';
		echo '<a href="http://localhost/php/tp2/article.php"> Retourner à la page précédente </a>';
	}else{
		echo 'Il manque votre pseudo ou votre message.';
	}
	
	echo '<br/>';	
	unset($_POST);
?>
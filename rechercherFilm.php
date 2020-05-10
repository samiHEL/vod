<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Films en VOD</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="style/vod.css" type="text/css" />
	</head>
	<body>
		<h1>SI6-Fichiers Text - Films en VOD</h1>
		<hr />
		
		  <div id="menu">
			<ul>
			  <li class="menu-style"><a href="vod.html" >Acceuil</a></li>
			  <li class="menu-style"><a href="consulterFilms.php">Consulter la liste des films</a></li>
			  <li class="menu-style"><a href="rechercherFilm.php">Rechercher un film</a></li>
			  <li class="menu-style"><a href="ajouterFilm.php">Ajouter un film</a></li>
			  <li class="menu-style"><a href="supprimerFilm.php">Supprimer un film</a></li>
			</ul>
		  </div>
<?php
	define('FICHIER', 'data/vod.csv');
	 
	if (!isset($_POST['valider'])) {
		
	
			require_once('saisieTitreRecherche.html');
			
		 
		
		} else {
			$resultats =array();
			@ $fp = fopen(FICHIER, 'r') or die('Ouverture en lecture de "' . FICHIER . '" impossible !');
			while (!feof($fp)) {
				$ligne = fgets($fp, 1024);
				if (preg_match('|\b' . preg_quote($_POST['mot']) . '\b|i', $ligne)) {
					$resultats[] = $ligne;
				}
			}
			fclose($fp);
			$mot=$_POST['mot'];
			$nb = count($resultats);
			if ($nb > 0) {
				echo "'$mot' trouvé $nb fois :";
				echo '<ul>';
				foreach ($resultats as $v) {
					echo "<li>$v</li>";
				}
				echo '</ul>';
			} else {
				die("Ce nom n'est pas présent !");
			}
	}
?>
		
	</body>
</html>

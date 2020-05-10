 
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
		  <br/><br/>
		  <?php
			if(isset($_POST['submit'])){
				$title=$_POST['title'];
				$annee=$_POST['annee'];
				$real=$_POST['real'];
				
				$file = fopen("data/vod.csv", "a");
				fwrite($file,$title);
				fwrite($file,":");
				fwrite($file,$annee);
				fwrite($file,":");
				fwrite($file,$real."\n");
				fclose($file);
				echo"votre film a bien été ajouté :)";

			}
			?> 
		  <?php
			require_once('saisieFilm.html');
			?> 
		  
		
	</body>
</html>

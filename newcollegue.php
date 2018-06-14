<html>
	<head>
		<meta charset="utf-8">	
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>
	<body>
		<?php		
			# Nettoyage en cas d'injonctions pirates
			function nettoyer($x){
				if ($x){
					$x = trim($x);
					$x = stripslashes($x);
					$x = htmlspecialchars($x);
				}
				return $x;
			}
			// On verifie que l'ouverture de cette page est bien due à la 
			// soumission du formulaire envoi
			if(isset($_POST['envoi'])){		
				$nom = nettoyer($_POST['Nom']);
				$prenom = nettoyer($_POST['Prenom']);
				$email = nettoyer($_POST['email']);

				$academie = nettoyer($_POST['academie']);
				$duree = nettoyer($_POST['duree']);
				$matiere = nettoyer($_POST['matiere']);
				$effectif = nettoyer($_POST['effectif']);		
				$niveau = nettoyer($_POST['niveau']);		
				$corps = nettoyer($_POST['corps']);		

				$etablissement = $_POST['etablissement'];
				// Le tableau etablissement qui provient d'une checkbox
				// est converti en chaine par concaténation
				$etab="";
				foreach ($etablissement as $key => $value) {
					$etab = $etab . " " . $value;
				}

				// On se connecte à la base de données collegues
				require_once('connexionBddDNL.php');

				// On ecrit les coordonnées dans la table collegues.id
				$commande = "INSERT INTO elstyxprofdnl.id  VALUES (NULL, '$nom', '$prenom', '$email');";
				$connexion = mysqli_query($con, $commande);

				// On ecrit les données pédagogiques dans la table collegues.exp
				$commande = "INSERT INTO elstyxprofdnl.exp VALUES (NULL, '$academie', '$duree',  '$effectif', '$matiere', '$niveau', '$corps', '$etab');";
				$connexion = mysqli_query($con, $commande);	

				// On ferme la connexion
				mysqli_close($con); 								
			}
		?>	

		<div style="width: 450px">
			<p> Vos données ont bien été enregistrées, merci. </p>
			<p> Vos pouvez cliquer sur les boutons ci dessous pour afficher les
			résultats de cette enquête ou pour revenir à la page principale. </p>
			<!-- Deux boutons de navigation -->
			<form style="text-align: center; margin-top: 20px;" action="AfficheTable.php"> 
				<input type="submit" value="Afficher les résultats">
			</form>
			<form style="text-align: center; margin-top: 20px;" action="index.html"> 
				<input type="submit" value="Retour à la page principale">
			</form>
		</div>
	</body>	
</html>